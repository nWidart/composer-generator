<?php

class HomeController extends BaseController
{
    public function showIndex()
    {
        return View::make('site.generate');
    }

    public function postIndex()
    {
        // set the paths
        $pathToFiles = app_path() . '/storage/files/';
        $pathToModels = public_path() . '/assets/baseComposer/';

        // Grab the input
        $input = Input::all();

        // Grab the base json file
        $composer = File::get( $pathToModels . 'composer.json');
        $composerJson = json_decode( $composer, true );

        // If there are development packages selected
        if ( ! empty( $input['packDev'] ) )
        {
            switch ($input['packDev'])
            {
                case 'profiler':
                    $composerJson['require'] = array_add($composerJson['require'], 'loic-sharma/profiler', '1.0.*');
                    break;
                case 'jwGenerators':
                    $composerJson['require'] = array_add($composerJson['require'], 'way/generators', '1.0.*@dev');
                    break;
            }
        }

        // if there are auth packages
        if ( ! empty( $input['packAuth'] ) )
        {
            switch ($input['packAuth'])
            {
                case 'sentry2':
                    $composerJson['require'] = array_add($composerJson['require'], 'cartalyst/sentry', '2.0.*');
                    break;
                case 'confide':
                    $composerJson['require'] = array_add($composerJson['require'], 'zizaco/confide', 'dev-master');
                    break;
                case 'entrust':
                    $composerJson['require'] = array_add($composerJson['require'], 'zizaco/entrust', 'dev-master');
                    break;
            }
        }

        // Encode it back to json
        $newComposer = json_encode($composerJson, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_FORCE_OBJECT);

        // Write the file
        $randomName = str_random(10) . '.json';
        File::put( $pathToFiles . $randomName, $newComposer);

        // Make a download response
        $response = Response::download( $pathToFiles . $randomName, 'composer.json', array('Content-type' => 'application/json'));

        // Fire the event to delete the file
        // $event = Event::queue('file.delete', $pathToFiles . $randomName);

        // Return the response
        return $response;
    }
}

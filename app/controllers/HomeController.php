<?php

class HomeController extends BaseController
{
    public function showIndex()
    {
        return View::make('site.generate');
    }

    public function postIndex()
    {
        // Testing Codeivate stuff
        // Not realy coding here.
        // set the paths
        $pathToFiles = app_path() . '/storage/files/';
        $pathToLaravelModel = app_path() . '/storage/files/laravel/';
        $pathToModels = public_path() . '/assets/baseComposer/';


        // Download fresh Laravel Source
        // $url = "https://github.com/laravel/laravel/archive/master.zip";
        // $fh = fopen( $pathToFiles.'file.zip', 'w');
        // $ch = curl_init();
        // curl_setopt($ch, CURLOPT_URL, $url);
        // curl_setopt($ch, CURLOPT_FILE, $fh);
        // curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // this will follow redirects
        // curl_exec($ch);
        // curl_close($ch);
        // fclose($fh);

        // Grab the input
        $input = Input::all();

        // Grab the base json file
        $composer = File::get( $pathToModels . 'composer.json');
        $composerJson = json_decode( $composer, true );

        // Development packages
        if ( isset( $input['profiler'] ) )
            $composerJson['require'] = array_add($composerJson['require'], 'loic-sharma/profiler', '1.0.*');
        if ( isset( $input['jwGenerators'] ) )
            $composerJson['require'] = array_add($composerJson['require'], 'way/generators', '1.0.*@dev');

        // Auth Packages
        if ( isset( $input['sentry2'] ) )
            $composerJson['require'] = array_add($composerJson['require'], 'cartalyst/sentry', '2.0.*');
        if ( isset( $input['confide'] ) )
            $composerJson['require'] = array_add($composerJson['require'], 'zizaco/confide', 'dev-master');
        if ( isset( $input['entrust'] ) )
            $composerJson['require'] = array_add($composerJson['require'], 'zizaco/confide', 'dev-master');

        if ( isset( $input['basset'] ) )
            $composerJson['require'] = array_add($composerJson['require'], 'jasonlewis/basset', 'dev-master');

        // Encode back to json
        // $newComposer = json_encode($composerJson, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_FORCE_OBJECT); # php 5.4
        $newComposer = nwHelpers::prettyJson( json_encode($composerJson) );
        $newComposer= str_replace('\\/', "/", $newComposer);

        // Write the file
        // $randomName = str_random(10) . '.json';
        $randomName = 'composer.json';
        File::put( $pathToFiles . $randomName, $newComposer);

        // Make the ZIP archive
        // $path = $pathToFiles;
        // $zip = new ZipArchive;
        // $zip->open($pathToModels . 'filetest.zip', ZipArchive::CREATE);
        // if (false !== ($dir = opendir($path)))
        //  {
        //      while (false !== ($file = readdir($dir)))
        //      {
        //          if ($file != '.' && $file != '..')
        //          {
        //             $zip->addFile($path.DIRECTORY_SEPARATOR.$file);
        //          }
        //      }
        //  }
        //  else
        //  {
        //      die('Can\'t read dir');
        //  }
        // $zip->close();

        // Make a download response
        $response = Response::download( $pathToFiles . $randomName, 'composer.json', array('Content-type' => 'application/json'));

        // Fire the event to delete the file
        // $event = Event::queue('file.delete', $pathToFiles . $randomName);

        // Return the response
        return $response;
    }
}

@extends('site/layouts.default')

@section('title')
@parent
:: Generate
@stop

@section('content')
<div class="page-header">
    <h2>
        Generate a composer.json file
    </h2>
</div>

<form class="form-horizontal" method="post" action="" autocomplete="off">
<input type="hidden" name="_token" value="{{ csrf_token() }}" />
<div class="row">
    <div class="span12">
        <h3>CSS Framework</h3>
        <div class="control-group {{ $errors->has('cssf') ? 'error' : '' }}">
            <label class="radio inline">
              <input type="radio" name="cssf" id="cssfBootstrap2" value="bootstrap2">
              Bootstrap 2
            </label>
            <label class="radio inline">
              <input type="radio" name="cssf" id="cssfBootstrap3" value="bootstrap3">
              Bootstrap 3
            </label>
            <label class="radio inline">
              <input type="radio" name="cssf" id="cssfFroundation" value="foundation">
              Foundation
            </label>
            {{ $errors->first('cssf', '<span class="help-inline">:message</span>') }}
        </div>
        <!-- ./ bs -->
    </div><!-- end span12 -->
    <div class="span12">
        <h3>Packages</h3>
    </div>
    <div class="span6">
        <h4>Development</h4>
        <div class="control-group {{ $errors->has('packDev') ? 'error' : '' }}">
            <label class="checkbox inline">
                <input type="checkbox" name="profiler" id="profiler" value="profiler">
                Profiler
                <a href="https://github.com/loic-sharma/profiler" class="nwTip" data-toggle="tooltip" title="View on github" target="_blank"><i class="icon-github"></i> </a>
                <a href="https://packagist.org/packages/loic-sharma/profiler" class="nwTip" data-toggle="tooltip" title="View on Packagist" target="_blank"><i class="icon-dropbox"></i> </a>
            </label>
            <label class="checkbox inline">
                <input type="checkbox" name="jwGenerators" id="jwGenerators" value="jwGenerators">
                Jeffrey Way's Generators
                <a href="https://github.com/JeffreyWay/Laravel-4-Generators" class="nwTip" data-toggle="tooltip" title="View on github" target="_blank"><i class="icon-github"></i> </a>
                <a href="https://packagist.org/packages/way/generators" class="nwTip" data-toggle="tooltip" title="View on Packagist" target="_blank"><i class="icon-dropbox"></i> </a>
            </label>
            {{ $errors->first('packDev', '<span class="help-inline">:message</span>') }}
        </div>
        <!-- ./ development Packages -->
    </div>

    <div class="span6">
        <h4>Authentification & Autorisations</h4>
        <div class="control-group {{ $errors->has('packAuth') ? 'error' : '' }}">
            <label class="checkbox inline">
                <input type="checkbox" name="sentry2" id="sentry2" value="sentry2">
                Sentry 2
                <a href="http://docs.cartalyst.com/sentry-2" class="nwTip" data-toggle="tooltip" title="View Documentation" target="_blank"><i class="icon-file-text-alt"></i> </a>
                <a href="https://packagist.org/packages/cartalyst/sentry" class="nwTip" data-toggle="tooltip" title="View on Packagist" target="_blank"><i class="icon-dropbox"></i> </a>
            </label>
            <label class="checkbox inline">
                <input type="checkbox" name="confide" id="confide" value="confide">
                Confide
                <a href="https://github.com/Zizaco/confide" class="nwTip" data-toggle="tooltip" title="View on github" target="_blank"><i class="icon-github"></i> </a>
                <a href="https://packagist.org/packages/zizaco/confide" class="nwTip" data-toggle="tooltip" title="View on Packagist" target="_blank"><i class="icon-dropbox"></i> </a>
            </label>
            <label class="checkbox inline">
                <input type="checkbox" name="entrust" id="entrust" value="entrust">
                Entrust
                <a href="https://github.com/Zizaco/entrust" class="nwTip" data-toggle="tooltip" title="View on github" target="_blank"><i class="icon-github"></i> </a>
                <a href="https://packagist.org/packages/zizaco/entrust" class="nwTip" data-toggle="tooltip" title="View on Packagist" target="_blank"><i class="icon-dropbox"></i> </a>
            </label>
            {{ $errors->first('packAuth', '<span class="help-inline">:message</span>') }}
        </div>
        <!-- ./ development Packages -->
    </div>

    <div class="span6">
        <h4>More packages...</h4>
        <label class="checkbox inline">
            <input type="checkbox" name="basset" id="basset" value="basset">
            Basset
            <a href="http://jasonlewis.me/code/basset/4.0" class="nwTip" data-toggle="tooltip" title="View Documentation" target="_blank"><i class="icon-file-text-alt"></i> </a>
            <a href="https://github.com/jasonlewis/basset" class="nwTip" data-toggle="tooltip" title="View on github" target="_blank"><i class="icon-github"></i> </a>
            <a href="https://packagist.org/packages/jasonlewis/basset" class="nwTip" data-toggle="tooltip" title="View on Packagist" target="_blank"><i class="icon-dropbox"></i> </a>
        </label>
    </div>

    <div class="span12">
        <div class="form-actions">
            <button type="reset" class="btn">Reset</button>
            <button type="submit" class="btn btn-primary">Generate</button>
        </div>
    </div>
</div>
</form>


@endsection

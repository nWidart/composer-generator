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
                <input type="checkbox" name="packDev" id="profiler" value="profiler">
                Profiler
            </label>
            <label class="checkbox inline">
                <input type="checkbox" name="packDev" id="jwGenerators" value="jwGenerators">
                Jeffrey Way's Generators
            </label>
            {{ $errors->first('packDev', '<span class="help-inline">:message</span>') }}
        </div>
        <!-- ./ development Packages -->
    </div>

    <div class="span6">
        <h4>Authentification & Autorisations</h4>
        <div class="control-group {{ $errors->has('packAuth') ? 'error' : '' }}">
            <label class="checkbox inline">
                <input type="checkbox" name="packAuth" id="sentry2" value="sentry2">
                Sentry 2
            </label>
            <label class="checkbox inline">
                <input type="checkbox" name="packAuth" id="confide" value="confide">
                Confide
            </label>
            <label class="checkbox inline">
                <input type="checkbox" name="packAuth" id="entrust" value="entrust">
                Entrust
            </label>
            {{ $errors->first('packAuth', '<span class="help-inline">:message</span>') }}
        </div>
        <!-- ./ development Packages -->
    </div>

    <div class="span12">
        <div class="form-actions">
            <button type="button" class="btn">Reset</button>
            <button type="submit" class="btn btn-primary">Generate</button>
        </div>
    </div>
</div>
</form>


@endsection

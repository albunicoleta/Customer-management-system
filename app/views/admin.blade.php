@extends('layout')

@section('content')
<div class="form-horizontal">
    {{ Form::open(array('url' => 'admin/postLogin')) }}
            <h1>Login</h1>

            <!-- if there are login errors, show them here -->
            <p>
                    {{ $errors->first('username') }}
                    {{ $errors->first('password') }}
            </p>

            <p>
                    {{ Form::label('username', 'Username') }}
                    {{ Form::text('username') }}
            </p>

            <p>
                    {{ Form::label('password', 'Password') }}
                    {{ Form::password('password') }}
            </p>

            <p>{{ Form::submit('Submit') }}</p>
    {{ Form::close() }}
</div>
@stop
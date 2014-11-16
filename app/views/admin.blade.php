@extends('layout')

@section('content')
<div class="form-horizontal">
    @if(Session::has('login-failed'))
        <div class="alert-warning">
            <h5>Bad credentials!</h5>
        </div>
    @endif
    @if(Session::has('please-login'))
        <div class="alert-warning">
            <h5>Please login first!</h5>
        </div>
    @endif
    {{ Form::open(array('url' => 'admin/postLogin')) }}
            <h1>Login</h1>

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
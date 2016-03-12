@extends('base.base')

@section('title', 'Login')

@section('content')

<p>
    {{ $errors->first('username') }}
    {{ $errors->first('password') }}
</p>

<form class="col s12" method="POST" action="{{ route('login') }}">
    {{ csrf_field() }}
    <div class="row">
        <div class="input-field col s12">
            <input name="username" id="username" type="text" class="validate">
            <label for="username">Username</label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12">
            <input name="password" id="password" type="password" class="validate">
            <label for="password">Password</label>
        </div>
    </div>
    <button class="btn waves-effect waves-light" type="submit" name="action">
        Login
    </button>
</form>
@endsection

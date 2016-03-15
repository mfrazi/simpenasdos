@extends('base.base')

@section('title', 'Login')

@section('moreStyles')
<link href="{{ URL::asset('css/login.css') }}" rel="stylesheet" />
@endsection

@section('content')
@if($errors->any())
<div class="login-error">
    <h6 class="center white-text">{{ $errors->first() }}</h6>
</div>
@endif

<div class="valign-wrapper" style="height:100%;">
    <div class="valign center" style="width:100%;">
        <div class="row">
            <div class="col s10 m4 l4 push-s1 push-m4 push-l4">
                <div class="container login-box">
                    <form class="white" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix light-blue-text">account_circle</i>
                                <input autofocus="autofocus" name="username" id="username" type="text" class="validate" required="" aria-required="true">
                                <label for="username">Username</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <i class="material-icons prefix light-blue-text">vpn_key</i>
                                <input name="password" id="password" type="password" class="validate" required="" aria-required="true">
                                <label for="password">Password</label>
                            </div>
                        </div>
                        <button class="btn waves-effect waves-light light-blue" type="submit" name="action">
                            Login
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

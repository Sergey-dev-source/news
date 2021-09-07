@extends('layout.Header')
@section('title') Login @endsection
@section('content')
<div class="container">
    <div id="user-login" class="row">
        <div class="col s12 margin z-depth-6 card-panel">
            <form class="login-form" action="{{ route('login_form') }}" method="post">
                @csrf
                <div class="row margin">
                    <div class="input-field col s12">
                        <i class="mdi-social-person-outline prefix material-icons">email</i>
                        <input class="validate" id="user_email" name="email" type="email">
                        <label for="email" data-error="wrong" data-success="right" class="center-align">@lang('catalog/auth.email')</label>
                    </div>
                </div>
                <div class="row margin">
                    <div class="input-field col s12">
                        <i class="mdi-action-lock-outline prefix  material-icons">lock</i>
                        <input id="user_pass" type="password" name="password">
                        <label for="password">@lang('catalog/auth.pass')</label>
                    </div>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="row">
                    <div class="input-field col s12">
                        <button class="btn waves-effect waves-light col s12">@lang('catalog/auth.but_log')</button>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6 m6 l6">
                        <p class="margin medium-small"><a href="{{ route('register') }}">@lang('catalog/auth.but_reg')!</a></p>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@extends('layout.Header')
@section('title') Register @endsection

@section('content')
    <div class="container">
        <div id="register-page" class="row">
            <div class="col s12 z-depth-6 card-panel">
                <form class="register-form" action="{{ route('register_form') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row margin">
                        <div class="input-field col s12">
                            <i class="mdi-social-person-outline prefix material-icons">person</i>
                            <input  name="user_name" type="text" class="validate">
                            <label for="user_name" class="center-align">@lang('catalog/auth.u_name')</label>
                        </div>
                    </div>
                    <div class="row margin">
                        <div class="input-field col s12">
                            <i class="mdi-communication-email prefix material-icons">email</i>
                            <input id="user_email" type="email" class="validate" name="email">
                            <label for="user_email" class="center-align">@lang('catalog/auth.email')</label>
                        </div>
                    </div>
                    <div class="row margin">
                        <div class="input-field col s12">
                            <i class="di-action-insert_photo-outline prefix material-icons">insert_photo</i>
                            <div class="fil right file-field input-field">
                                <div class="btn">
                                  <span>@lang('catalog/auth.img')</span>
                                  <input type="file" name="avatar">
                                </div>
                                <div class="file-path-wrapper">
                                  <input class="file-path validate" type="text">
                                </div>
                              </div>
                        </div>
                    </div>
                    <div class="row margin">
                        <div class="input-field col s12">
                            <i class="mdi-action-lock-outline prefix material-icons">lock</i>
                            <input id="user_passw" type="password" name='password' class="validate">
                            <label for="user_passw">@lang('catalog/auth.pass')</label>
                        </div>
                    </div>
                    <div class="row margin">
                        <div class="input-field col s12">
                            <i class="mdi-action-lock-outline prefix material-icons">lock</i>
                            <input id="confirm_pass" name="confirm_pass" type="password">
                            <label for="confirm_pass">@lang('catalog/auth.rpass')</label>
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
                            <button class="btn waves-effect waves-light col s12">@lang('catalog/auth.but_reg')</button>
                        </div>
                        <div class="input-field col s12">
                            <p class="margin center medium-small sign-up">@lang('catalog/auth.s_reg')</p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

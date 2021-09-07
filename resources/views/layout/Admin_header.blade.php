<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googlea"
    <!-- Compiled and minified JavaScript -->
    <link rel="stylesheet" href="{{ asset('css/admin_style.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('title')</title>
</head>
<body class=" grey lighten-4">
<div class="container-fluid">
    <div class="row">
        <a href="#" data-target="slide-out" style='color:white' class="col s3 sidenav-trigger"><i
                class="material-icons" style="color: #1a202c">menu</i></a>
        <div class="right">
            <div class="language-selector__container">
                <label>
                    <input id="csrf1" type="hidden" value="{{ csrf_token() }}">
                    <select class="js_language_selector">
                        <option id='en' value="en">English</option>
                        <option id="ru" value="ru">Русский</option>
                        <option id="arm" value="arm">Հայերեն</option>
                    </select>
                </label>
            </div>
        </div>
    </div>
</div>
<script>


    let lang = '{{ \Illuminate\Support\Facades\App::getLocale() }}';
    document.getElementById(lang).selected = 'selected'



</script>
<ul id="slide-out" class="sidenav">
    <li>
        <div class="user-view">

            <div class="background">
                <img
                    src="https://thumbs.dreamstime.com/b/user-profile-icon-abstract-digital-design-blue-background-isolated-172062850.jpg"/>


            </div>
            <a href="#user">
                @if(auth()->user()->avatar != '')
                <img src="{{ asset('images/avatar/'.auth()->user()->avatar) }}" class="circle"/>
                @endif
            </a>
            <a href="#name"><span class="white-text name">{{ auth()->user()->name }}</span></a>
            <a href="#email"><span class="white-text email">{{ auth()->user()->email }}</span></a>

        </div>
    </li>
    <li>
        <div class="divider"></div>
    </li>

    <li><a class="waves-effect" href="{{ route('category_list') }}">@lang('admin/header.category')</a></li>
    <li><a class="waves-effect" href="{{ route('country_list') }}">@lang('admin/header.country')</a></li>
    <li><a class="waves-effect" href="{{ route('sity_list') }}">@lang('admin/header.town')</a></li>
    <li><a class="waves-effect" href="{{ route('contact') }}">@lang('admin/header.contact')</a></li>
    <li><a class="waves-effect" href="{{ route('logout') }}">@lang('admin/header.logout')</a></li>

</ul>

@yield('content')
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var elems = document.querySelectorAll('.sidenav');
        // var instances = M.Sidenav.init(elems, options);
    });

    $(document).ready(function () {
        $('.sidenav').sidenav();
        $(document.body).on('change','#language-picker-select',function (){
            alert('ok')
            // let lang = $(this).val();
            // console.log(lang)
        });
    });
</script>
<script src="{{ asset('js/adminScript.js') }}"></script>
<script src="{{ asset('js/admin_language.js') }}"></script>
</body>
</html>

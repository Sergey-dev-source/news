@extends('layout.Admin_header')
@section('title') Edit category @endsection
@section('content')
    <div class="container">
        <form action="{{ route('edit_cat') }}" method="post">
            @csrf
            <input type="hidden" name="id" value="{{$category['id']}}">
            <div class="row s12">
                <div class="left">
                    <h5>@lang('admin/category.e_title')</h5>
                </div>
                <div class="right">
                    <button class="btn-floating btn-large pulse waves-effect waves-light teal lighten-1"><i
                            class="material-icons">save</i></button>
                    <a href="{{ route('category_list') }}"
                       class="btn-floating btn-large waves-effect waves-light teal lighten-3"><i class="material-icons">backspace</i></a>
                </div>
            </div>

            <div class="row s6">
                <ul class="sel">
                    <li class="active" id="e">English</li>
                    <li id="r">Русский</li>
                    <li id="h">Հայերեն</li>
                </ul>
            </div>
            <div class="en">
                <div class="row">
                    <div class="input-field col s6">
                        <input name="en_name" type="text" value="{{$category['en_name']}}" class="validate">
                        <label for="disabled">@lang('admin/category.name')</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input name="en_title" value="{{ $category['en_title'] }}" type="text" class="validate">
                        <label for="password">@lang('admin/category.title')</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <textarea id="textarea" name="en_desc" class="materialize-textarea">{{ $category['en_description'] }}</textarea>
                        <label for="textarea">@lang('admin/category.desc')</label>
                    </div>
                </div>


            </div>
            <div class="ru">
                <div class="row">
                    <div class="input-field col s6">
                        <input name="ru_name" value="{{ $category['ru_name'] }}" type="text" class="validate">
                        <label for="disabled">@lang('admin/category.name')</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input  name="ru_title" value="{{ $category['ru_title'] }}" type="text" class="validate">
                        <label for="password">@lang('admin/category.title')</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <textarea id="textarea" name="ru_desc" class="materialize-textarea">{{ $category['ru_description'] }}</textarea>
                        <label for="textarea">@lang('admin/category.desc')</label>
                    </div>
                </div>
            </div>

            <div class="arm">
                <div class="row">
                    <div class="input-field col s6">
                        <input name="arm_name" value="{{ $category['arm_name'] }}" type="text" class="validate">
                        <label for="disabled">@lang('admin/category.name')</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input  name="arm_title" type="text" class="validate" value="{{ $category['arm_title'] }}">
                        <label for="password">@lang('admin/category.title')</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <textarea id="textarea" name="arm_desc" class="materialize-textarea">{{ $category['arm_description'] }}</textarea>
                        <label for="textarea">@lang('admin/category.desc')</label>
                    </div>
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
            @if (\Session::has('success'))
                <div class="materialert success">
                    <div class="material-icons">check</div>
                    {!! \Session::get('success') !!}
                </div>

            @endif
        </form>
    </div>
@endsection

@extends('layout.Admin_header')
@section('title') @lang('admin/town.') @endsection
@section('content')
    <div class="container">
        <form action="{{ route('town_add') }}" method="post">
            @csrf
            <div class="row s12">
                <div class="left">
                    <h5>@lang('admin/town.c_title')</h5>
                </div>
                <div class="right">
                    <button class="btn-floating btn-large pulse waves-effect waves-light teal lighten-1"><i
                            class="material-icons">save</i></button>
                    <a href="{{ route('country_list') }}"
                       class="btn-floating btn-large waves-effect waves-light teal lighten-3"><i class="material-icons">backspace</i></a>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s6">
                    <input name="e_name" type="text" class="validate">
                    <label for="disabled">@lang('admin/town.e_name')</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input name="r_name" type="text" class="validate">
                    <label for="password">@lang('admin/town.r_name')</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s6">
                    <input type="text" name="a_name" class="validate"></input>
                    <label >@lang('admin/town.a_name')</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s6">
                    <select name="country" id="">
                        <option>@lang('admin/town.select')</option>
                        @foreach($country as $item)
                            <option value="{{ $item['id'] }}">{{ $item[$language.'_name'] }}</option>
                        @endforeach
                    </select>
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

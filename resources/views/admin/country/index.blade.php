@extends('layout.Admin_header')
@section('title') list @endsection
@section('content')
    <div class="container">
        <div class="row s12">
            <div class="right">
                <a href="{{ route('create_country') }}" class="btn-floating btn-large waves-effect waves-light teal lighten-3"><i class="material-icons">add</i></a>

                <a class="delete btn-floating btn-large waves-effect waves-light red"><i class="material-icons">delete</i></a>

            </div>
        </div>
        <div class="row s12">
            <table>
                <thead>
                <tr>
                    <th><input id="csrf" type="hidden" value="{{ csrf_token() }}"></th>
                    <th>@lang('admin/category.id')</th>
                    <th>@lang('admin/category.name')</th>
                </tr>
                </thead>

                <tbody>
                @foreach($country as $item)
                    <tr>
                        <th>
                            <label>
                                <input type="checkbox" class="sel" value="{{ $item['id'] }}" />
                                <span></span>
                            </label>
                        </th>
                        <th>{{ $item['id'] }}</th>
                        <th>{{ $item[$language.'_name'] }}</th>
                        <th><a href="{{ route('country_edit',$item['id']) }}"><i class="material-icons">edit</i></a></th>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

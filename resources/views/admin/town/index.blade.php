@extends('layout.Admin_header')
@section('title') @lang('admin/town.') @endsection
@section('content')
    <div class="container">
        <div class="row s12">
            <div class="right">
                <a href="{{ route('create_town') }}" class="btn-floating btn-large waves-effect waves-light teal lighten-3"><i class="material-icons">add</i></a>

                <a class="delete1 btn-floating btn-large waves-effect waves-light red"><i class="material-icons">delete</i></a>

            </div>
        </div>
        <div class="row s12">
            <table>
                <thead>
                <tr>
                    <th><input id="csrf" type="hidden" value="{{ csrf_token() }}"></th>
                    <th>@lang('admin/town.id')</th>
                    <th>@lang('admin/town.name')</th>
                    <th>@lang('admin/town.country')</th>
                    <th>@lang('admin/town.edit')</th>
                </tr>
                </thead>

                <tbody>
                        @foreach($town as $item)
                            <tr>
                                <th>
                                    <label>
                                        <input type="checkbox" class="sel" value="{{ $item['id'] }}" />
                                        <span></span>
                                    </label>
                                </th>
                                <th>{{ $item['id'] }}</th>
                                <th>{{ $item[$language.'_sity_name'] }}</th>
                                <th>{{ $item[$language.'_name'] }}</th>
                                <th><a href="{{ route('town_edit',$item['id']) }}"><i class="material-icons">edit</i></a></th>
                            </tr>
                        @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection

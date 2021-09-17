@extends('layout.Admin_header')
@section('title') @lang('admin/town.') @endsection
@section('content')
    <div class="container">
        <div class="row s12">
            <div class="right">
                <a href="{{ route('create_sliders') }}" class="btn-floating btn-large waves-effect waves-light teal lighten-3"><i class="material-icons">add</i></a>

                <a class="delete1 btn-floating btn-large waves-effect waves-light red"><i class="material-icons">delete</i></a>

            </div>
        </div>
    </div>
@endsection

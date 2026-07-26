@extends('admin.layouts.app')

@section('title', 'Tambah Pangkalan')

@section('content')
    <form method="POST" action="{{ route('admin.pangkalan.store') }}">
        @include('admin.pangkalan._form')
    </form>
@endsection

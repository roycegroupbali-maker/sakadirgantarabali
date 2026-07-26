@extends('admin.layouts.app')

@section('title', 'Tambah Berita')

@section('content')
    <form method="POST" action="{{ route('admin.news.store') }}" enctype="multipart/form-data">
        @include('admin.news._form')
    </form>
@endsection

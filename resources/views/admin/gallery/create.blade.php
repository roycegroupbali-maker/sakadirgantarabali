@extends('admin.layouts.app')

@section('title', 'Tambah Foto Galeri')

@section('content')
    <form method="POST" action="{{ route('admin.gallery.store') }}" enctype="multipart/form-data">
        @include('admin.gallery._form')
    </form>
@endsection

@extends('admin.layouts.app')

@section('title', 'Edit Foto Galeri')

@section('content')
    <form method="POST" action="{{ route('admin.gallery.update', $gallery) }}" enctype="multipart/form-data">
        @include('admin.gallery._form')
    </form>
@endsection

@extends('admin.layouts.app')

@section('title', 'Edit Berita')

@section('content')
    <form method="POST" action="{{ route('admin.news.update', $news) }}" enctype="multipart/form-data">
        @include('admin.news._form')
    </form>
@endsection

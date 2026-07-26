@extends('admin.layouts.app')

@section('title', 'Edit Pangkalan')

@section('content')
    <form method="POST" action="{{ route('admin.pangkalan.update', $pangkalan) }}">
        @include('admin.pangkalan._form')
    </form>
@endsection

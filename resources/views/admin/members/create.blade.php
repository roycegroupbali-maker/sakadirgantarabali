@extends('admin.layouts.app')

@section('title', 'Tambah Anggota')

@section('content')
    <form method="POST" action="{{ route('admin.members.store') }}" enctype="multipart/form-data">
        @include('admin.members._form')
    </form>
@endsection

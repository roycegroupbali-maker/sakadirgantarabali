@extends('admin.layouts.app')

@section('title', 'Edit Anggota')

@section('content')
    <form method="POST" action="{{ route('admin.members.update', $member) }}" enctype="multipart/form-data">
        @include('admin.members._form')
    </form>
@endsection

@extends('Admin.layouts.layout')

@section('title')
Create Category
@endsection

@section('breadcrumb')
@parent
<li class="breadcrumb-item"><a href="#">Create</a></li>
@endsection

@section('home_name', 'Create Category')

@section('content')
<form action="{{ route('dashboard.categories.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @include('Admin.Dashboard.Categories._form')
</form>
@endsection
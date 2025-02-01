@extends('Admin.layouts.layout')

@section('title')
Update Category
@endsection

@section('breadcrumb')
@parent
<li class="breadcrumb-item"><a href="#">Update</a></li>
@endsection

@section('home_name', 'Update Category')

@section('content')
<form action="{{ route('dashboard.categories.update',$category->id) }}" method="POST" enctype="multipart/form-data"
    enctype="multipart/form-data">
    @csrf
    @method('put')
    @include('Admin.Dashboard.Categories._form')
</form>
@endsection
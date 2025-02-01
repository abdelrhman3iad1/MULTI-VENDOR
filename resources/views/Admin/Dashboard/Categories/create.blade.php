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
    <form action="{{ route('dashboard.categories.store') }}" method="POST">
        @csrf
        <div class="form-group mb-3 mt-3">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form-group mb-3">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control"></textarea>
        </div>
        <div class="form-group mb-3">
            <label for="parent_id">Parent</label>
            <select name="parent_id" id="parent_id" class="form-control">
                <option value="">Primary Category</option>
                @forelse ($parents as $parent)
                    <option value="{{ $parent->id }}">{{ $parent->name }}</option>
                @empty
                @endforelse
            </select>
        </div>
        <div class="form-group mb-3">
            <label for="image">Image</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>
        <div class="form-check ">
            <input class="form-check-input" type="radio" name="status" id="flexRadioDefault1"checked value="active">
            <label class="form-check-label" for="flexRadioDefault1">
                Active
            </label>
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="radio" name="status" id="flexRadioDefault2" value="archived">
            <label class="form-check-label" for="flexRadioDefault2">
                Archived
            </label>
        </div>
        <div class="form-group">
            <button class="btn btn-sm btn-outline-success">Save</button>
        </div>
    </form>
@endsection

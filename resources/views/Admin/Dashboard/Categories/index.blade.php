@extends('Admin.layouts.layout')

@section('title','Categories')

@section('home_name','Categories')


@section('breadcrumb')
@parent
<li class="breadcrumb-item"><a href="#">Index</a></li>
@endsection

@section('content')


<div class="mb-2 mt-3">
    <a href="{{route('dashboard.categories.create')}}" class="btn btn-sm btn-outline-primary">Create</a>
</div>
@if (session()->has('success'))    
<div class="alert alert-success">
    {{session()->get('success')}}
</div>
@endif
@if (session()->has('info'))    
<div class="alert alert-info">
    {{session()->get('info')}}
</div>
@endif
    <table class="table ">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Parent</th>
                <th>Status</th>
                <th>Created At</th>
                <th rowspan="2"></th>
            </tr>
        </thead>
        <tbody>
            @forelse($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->parent_id ?? "" }}</td>
                <td>{{ $category->status }}</td>
                <td>{{ $category->created_at }}</td>
                <td>
                    <a href="{{route('dashboard.categories.edit',$category->id)}}" class="btn btn-sm btn-outline-primary">Edit</a>
                </td>
                <td>
                    <form action="{{route('dashboard.categories.destroy',$category->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger" >Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6">No Records</td>
            </tr>
            @endforelse
        </tbody>
    </table>
@endsection
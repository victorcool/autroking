@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-title">{{ $title }}</div>
        </div>
        <div class="card-body">
            <form class="row g-3" action="{{ route('admin.teamCateg.store') }}" method="post">
                @csrf
                <div class="col-md-6">
                  <label for="name" class="visually-hidden">Category</label>
                  <input type="text" class="form-control" name="name" id="name" value="{{ old('name',$toEdit->name??'') }}" placeholder="Name">
                  <input type="hidden" name="id" value="{{ old('name',$toEdit->id??'') }}">
                  <br>
                  <button type="submit" class="btn btn-primary mb-3">
                    @if ($toEdit['id']??'')
                        {{ "Update Now" }}
                    @else
                        {{ "Submit" }}
                    @endif
                  </button>
                    @if ($toEdit->id??'')
                        <span>To create new category <a href="{{ route('admin.teamCateg.create') }}">Click here</a></span>
                    @endif
                </div>
            </form> 
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <div class="card-title">Categories </div>
        </div>
        <div class="card-body">
            <div class="table-responsive mt-4">
                <table id="key-datatable" class="table nowrap">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($categories??'')
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$category->name}}</td>
                                    {{-- <td><span class="">@if($category->published == 0) {{ 'Unpublished' }} @else {{ 'Published' }}  @endif</span></td> --}}
                                    <td>
                                        @if($category->published == 0)
                                        <a href="" class="badge badge-soft-success py-1"> Publish <i class="fa fa-upload"></i></a>
                                        @else 
                                        <a href="" class="badge badge-soft-info py-1">Edit</a> 
                                        @endif
                                        <a href="{{ route('admin.teamCateg.create',['id'=>$category->id]) }}" class="badge badge-soft-info py-1">Edit</a>
                                        <a href="{{ route('admin.teamCateg.remove',$category->id) }}" class="badge badge-soft-danger py-1">Remove</a>
                                        <a href="{{ route('admin.team.show',['type'=>$category->slug]) }}" class="badge badge-soft-info py-1"><i class="fa fa-eye"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>        
        </div>
    </div>
@endsection
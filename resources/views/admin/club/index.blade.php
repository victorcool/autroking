@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-title">{{ $title }}</div>
        </div>
        <div class="card-body">
            <form class="row g-3" action="{{ route('admin.club.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="col-md-6">
                  <label for="name" class="visually-hidden">Club Name</label>
                  <input type="text" class="form-control" name="name" id="name" required value="{{ old('name',$toEdit->name??'') }}" placeholder="Name">
                  <input type="hidden" name="id" value="{{ old('name',$toEdit->id??'') }}">
                
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="president" class="visually-hidden">President Name</label>
                        <input type="text" class="form-control" name="president" id="president" value="{{ old('president',$toEdit->president??'') }}" placeholder="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="coach" class="visually-hidden">Coach Name</label>
                        <input type="text" class="form-control" name="coach" id="coach" required value="{{ old('coach',$toEdit->coach??'') }}" placeholder="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="assistant_coach" class="visually-hidden">Assistant coach Name</label>
                        <input type="text" class="form-control" name="assistant_coach" required id="" value="{{ old('assistant_coach',$toEdit->assistant_coach??'') }}" placeholder="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="location" class="visually-hidden">Club location</label>
                        <input type="text" class="form-control" name="location" id="" value="{{ old('location',$toEdit->location??'') }}" placeholder="">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="pitch" class="visually-hidden">Stadium</label>
                        <input type="text" class="form-control" name="pitch" id="" value="{{ old('pitch',$toEdit->pitch??'') }}" placeholder="">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="established_in" class="visually-hidden">Establishment Date</label>
                        <input type="date" class="form-control" name="established_in" id="" value="{{ old('established_in',$toEdit->established_in??'') }}" placeholder="">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="no_of_players" class="visually-hidden">Number of players</label>
                        <input type="number" class="form-control" name="no_of_players" id="" value="{{ old('no_of_players',$toEdit->no_of_players??'') }}" placeholder="">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="champions" class="visually-hidden">Number of titles won</label>
                        <input type="number" class="form-control" name="champions" id="" value="{{ old('champions',$toEdit->champions??'') }}" placeholder="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="champions" class="visually-hidden">Club logo</label>
                        <input type="file" name="images[]" class="form-control" @if (!@$toEdit->id??'')
                            {{ 'required' }}
                        @endif>
                    </div>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary mb-3">
                        @if ($toEdit['id']??'')
                            {{ "Update Now" }}
                        @else
                            {{ "Submit" }}
                        @endif
                      </button>
                        @if ($toEdit->id??'')
                            <span>To create new category <a href="{{ route('admin.club.index') }}">Click here</a></span>
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
                            <th scope="col">logo</th>
                            <th scope="col">Name</th>
                            <th scope="col">Coach</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($categories??'')
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td><img src="{{asset('uploads/club/'.$category->images->path??'')}}" alt="" width="50"></td>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->coach}}</td>
                                    {{-- <td><span class="">@if($category->published == 0) {{ 'Unpublished' }} @else {{ 'Published' }}  @endif</span></td> --}}
                                    <td>
                                        @if($category->published == 0)
                                        <a href="{{ route('admin.club.action',['id'=>$category->id,'a'=>'publish']) }}" class="badge badge-soft-success py-1"> Publish <i class="fa fa-upload"></i></a>
                                        @else 
                                        <a href="{{ route('admin.club.action',['id'=>$category->id,'a'=>'publish']) }}" class="badge badge-soft-info py-1">unpublish</a> 
                                        @endif
                                        <a href="{{ route('admin.club.index',['id'=>$category->id]) }}" class="badge badge-soft-info py-1">Edit</a>
                                        <a href="{{ route('admin.club.action',['id'=>$category->id,'a'=>'remove']) }}" class="badge badge-soft-danger py-1">Remove</a>
                                        {{-- <a href="{{ route('admin.team.show',['type'=>$category->slug]) }}" class="badge badge-soft-info py-1"><i class="fa fa-eye"></i></a> --}}
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
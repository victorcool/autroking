@extends('layouts.admin')

@section('styles')

@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <div class="card-title">Add new ball position category</div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-4">
                <form class="row g-3" action="{{ route('admin.store_position_category.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                    <label for="name" class="visually-hidden">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $toEdit->name??'' }}" id="name" placeholder="Name">
                    <input type="hidden" class="form-control" value="{{ $id??'' }}" name="id">

                    <br><br><br>
                    @if ($id??'')
                    <button type="submit" class="btn btn-primary btn-block btn-sm mb-3">Update</button>
                    <p>Do you want to add new One? <a href="{{ route('admin.ballposition.index') }}">Click to add new</a></p>
                    @else
                    <button type="submit" class="btn btn-success btn-block btn-sm mb-3"> Submit</button>
                    @endif
                </form> 
            </div>
            <div class="col-md-8">
                <div class="table-responsive mt-4">
                    <table id="key-datatable" class="table nowrap display">
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
                                            <a href="{{ route('admin.about.action',['id'=>$category->id,'a'=>'publish']) }}" class="badge badge-success py-1"> Publish <i class="fa fa-upload"></i></a>
                                            @else 
                                            <a href="{{ route('admin.about.action',['id'=>$category->id,'a'=>'unpublish']) }}" class="badge badge-info py-1">Unpublish</a> 
                                            @endif
                                            <a href="{{ route('admin.ballposition.index',['id'=>$category->id,'a'=>'edit']) }}" class="badge badge-soft-info py-1">Edit</a>
                                            <a href="{{ route('admin.ballpositionCategory.action',['id'=>$category->id,'a'=>'remove']) }}" onclick="myFunction()" class="badge badge-soft-danger py-1">Remove</a>
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
    </div>
</div>

<div class="card">
    <div class="card-header">
        <div class="card-title">{{ $title }} <a href="{{ route('admin.player.index') }}" class="float-right btn btn-primary btn-sm">List player <i class="fa fa-list"></i></a></div>
    </div>
    <div class="card-body">
        <form class="row g-3" action="{{ route('admin.ballposition.store') }}" method="post">
            @csrf
            <div class="col-md-6">
                <label for="name" class="visually-hidden">Category</label>
                <select name="category" class="form-control" required>
                    <option value="" hidden>Select</option>
                    @if ($categories??'')
                        @foreach ($categories as $category)
                            <option @if ($category->id == @$ptoEdit->position_category_id??'')
                                {{ 'selected' }}                        
                            @endif value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="col-md-6">
                <label for="name" class="visually-hidden">Position</label>
                <input type="text" class="form-control" name="name" value="{{ $ptoEdit->name??'' }}" id="name" placeholder="Name">
                    <input type="hidden" class="form-control" value="{{ $pid??'' }}" name="id">
            </div>           
            <div class="col-md-12">
                <br>
                <button type="submit" class="btn btn-primary mb-3">Submit</button>
            </div>
        </form>  
    </div>
</div>

<div class="card">
    <div class="card-header">
        <div class="card-title">xxxxxxx</div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive mt-4">
                    <table id="key-datatable" class="table nowrap display">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Category</th>
                                <th scope="col">Name</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($positions??'')
                                @foreach ($positions as $position)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$position->positionCategory->name}}</td>
                                        <td>{{$position->name}}</td>
                                        {{-- <td><span class="">@if($category->published == 0) {{ 'Unpublished' }} @else {{ 'Published' }}  @endif</span></td> --}}
                                        <td>
                                            @if($position->published == 0)
                                            <a href="{{ route('admin.about.action',['id'=>$position->id,'a'=>'publish']) }}" class="badge badge-success py-1"> Publish <i class="fa fa-upload"></i></a>
                                            @else 
                                            <a href="{{ route('admin.about.action',['id'=>$position->id,'a'=>'unpublish']) }}" class="badge badge-info py-1">Unpublish</a> 
                                            @endif
                                            <a href="{{ route('admin.ballposition.index',['pid'=>$position->id,'a'=>'edit']) }}" class="badge badge-soft-info py-1">Edit</a>
                                            <a href="{{ route('admin.ballposition.action',['pid'=>$position->id,'a'=>'remove']) }}" onclick="myFunction()" class="badge badge-soft-danger py-1">Remove</a>
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
    </div>
</div>
@endsection

@section('scripts')

@endsection
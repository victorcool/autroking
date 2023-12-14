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
                <form class="row g-3" action="{{ route('admin.office_position.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                    <label for="name" class="visually-hidden">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $toEdit->name??'' }}" id="name" placeholder="Name">
                    <input type="hidden" class="form-control" value="{{ $id??'' }}" name="id">

                    <br><br><br>
                    @if ($id??'')
                    <button type="submit" class="btn btn-primary btn-block btn-sm mb-3">Update</button>
                    <p>Do you want to add new One? <a href="{{ route('admin.officeposition.index') }}">Click to add new</a></p>
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
                            @if ($positions??'')
                                @foreach ($positions as $position)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$position->name}}</td>
                                        {{-- <td><span class="">@if($category->published == 0) {{ 'Unpublished' }} @else {{ 'Published' }}  @endif</span></td> --}}
                                        <td>
                                            @if($position->published == 0)
                                            <a href="{{ route('admin.office_position.action',['id'=>$position->id,'a'=>'publish']) }}" class="badge badge-success py-1"> Publish <i class="fa fa-upload"></i></a>
                                            @else 
                                            <a href="{{ route('admin.office_position.action',['id'=>$position->id,'a'=>'unpublish']) }}" class="badge badge-info py-1">Unpublish</a> 
                                            @endif
                                            <a href="{{ route('admin.officeposition.index',['id'=>$position->id,'a'=>'edit']) }}" class="badge badge-soft-info py-1">Edit</a>
                                            <a href="{{ route('admin.office_position.action',['id'=>$position->id,'a'=>'remove']) }}" onclick="myFunction()" class="badge badge-soft-danger py-1">Remove</a>
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
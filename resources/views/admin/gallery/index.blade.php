@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">
        <div class="card-title">{{ $title }} <a href="{{ route('admin.gallery.create') }}" class="float-right btn btn-primary btn-sm">Add new <i class="fa fa-plus"></i></a></div>
    </div>
    <div class="card-body">             
        <div class="table-responsive mt-4">
            <table id="key-datatable" class="table nowrap">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Photo</th>
                        <th scope="col">Caption</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($galleries??'')
                        @foreach ($galleries as $gallery)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td> <img src="{{asset('uploads/gallery/'.@$gallery->images->path??'')}}" alt="{{@$gallery->images->name??''}}" width="50" height="50" /> </td>
                                <td>{{$gallery->caption}}</td>
                                {{-- <td><span class="">@if($list->published == 0) {{ 'Unpublished' }} @else {{ 'Published' }}  @endif</span></td> --}}
                                <td>
                                    @if($gallery->published == 0)
                                    <a href="{{ route('admin.gallery.action',['id'=>$gallery->id??'','a'=>'publish']) }}" class="badge badge-soft-success py-1"> Publish <i class="fa fa-upload"></i></a>
                                    @else 
                                    <a href="{{ route('admin.gallery.action',['id'=>$gallery->id??'','a'=>'unpublish']) }}" class="badge badge-soft-info py-1">unpublish</a> 
                                    @endif
                                    <a href="{{ route('admin.gallery.action',['id'=>$gallery->id??'','a'=>'edit']) }}" class="badge badge-soft-warning py-1">Edit</a>
                                    <a href="{{ route('admin.gallery.action',['id'=>$gallery->id??'','a'=>'remove']) }}" class="badge badge-soft-danger py-1">Remove</a>
                                    {{-- <a href="{{ route('admin.gallery.action',['id'=>$gallery->id,'a'=>'show']) }}" class="badge badge-soft-info py-1"><i class="fa fa-eye"></i></a>  --}}
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
            <div>{{ $galleries->links() }}</div>
        </div>       
    </div>
</div>
@endsection
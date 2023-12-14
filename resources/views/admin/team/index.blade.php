@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-title">{{ $title }} <a href="{{ route('admin.team.create') }}" class="float-right btn btn-primary btn-sm">Add new <i class="fa fa-plus"></i></a></div>
        </div>
        <div class="card-body">             
            <div class="table-responsive mt-4">
                <table id="key-datatable" class="table nowrap">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Category</th>
                            <th scope="col">Name</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($lists??'')
                            @foreach ($lists as $list)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$list->teamCategory->name}}</td>
                                    <td>{{$list->name}}</td>
                                    {{-- <td><span class="">@if($list->published == 0) {{ 'Unpublished' }} @else {{ 'Published' }}  @endif</span></td> --}}
                                    <td>
                                        @if($list->published == 0)
                                        <a href="" class="badge badge-soft-success py-1"> Publish <i class="fa fa-upload"></i></a>
                                        @else 
                                        <a href="" class="badge badge-soft-info py-1">Edit</a> 
                                        @endif
                                        <a href="" class="badge badge-soft-warning py-1">Edit</a>
                                        <a href="{{ route('admin.teamCateg.remove',$list->id) }}" class="badge badge-soft-danger py-1">Remove</a>
                                        <a href="{{ route('admin.team.action',['id'=>$list->id,'a'=>'players-list']) }}" class="badge badge-soft-info py-1"><i class="fa fa-eye"></i></a> 
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



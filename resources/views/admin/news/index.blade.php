@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-title">{{ $title }} 

                <a href="{{ route('admin.blog.create') }}" class="float-right btn btn-success btn-sm">Add new<i class="fa fa-plus"></i></a>
                <a href="{{ route('admin.fb_update',['pageId'=>'kulprice1']) }}" class="float-right btn btn-primary btn-sm mr-4">Facebook Feed <i class="fa fa-reload"></i></a></div>
        </div>
        <div class="card-body">             
            @include('admin.assets.inc.tables.news-list');     
        </div>
    </div>
@endsection
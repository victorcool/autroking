@extends('layouts.admin')

@section('content')
    <!-- content -->

<div class="card">
    <div class="card-header">
        <div class="card-title">Latest news <a href="{{ route('admin.blog.create') }}" class="float-right btn btn-primary btn-sm">Create Blog <i class="fa fa-plus"></i></a></div>
    </div>
    <div class="card-body">
        @include('admin.assets.inc.tables.news-list');   
    </div>
</div>


@endsection
@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-title">{{ $title }} <a href="{{ route('admin.player.create') }}" class="float-right btn btn-primary btn-sm">Add player <i class="fa fa-plus"></i></a></div>
        </div>
        <div class="card-body">
            @include('admin.assets.inc.tables.players-list-tbl') 
        </div>
    </div>
@endsection
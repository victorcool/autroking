@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="card-title">
            {{ $title }} 
            @if ($button??'')
            <a href="{{ $button['link']}}" class="float-right btn btn-primary btn-sm">
                {{ $button['name'] }} <i class="{{ $button['icon'] }}"></i>
            </a>
            @else
                <a href="{{ route('admin.team.index') }}" class="float-right btn btn-primary btn-sm">
                List Team <i class="fa fa-list"></i>
            </a>
            @endif
        </div>
        
    </div>
    <div class="card-body">
        @if ($content == 'list-team')
            @include('admin.assets.inc.tables.team-list') 
        @else
            @include('admin.assets.inc.tables.players-list-tbl') 
        @endif
        
    </div>
</div>
@endsection
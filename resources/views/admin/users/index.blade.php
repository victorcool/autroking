@extends('layouts.admin')

@section('styles')

@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            @include('inc.messages')
            <div class="row">
                <div class="col-md-12">
                    @include('admin.assets.inc.tables.users-table')
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection
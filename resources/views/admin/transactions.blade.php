@extends('layouts.admin')

@section('styles')

@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            @include('inc.messages')
            <div class="row">
                <div class="col-md-12">
                    @if ($type == 'investment')
                    @include('admin.assets.inc.tables.investment')
                    <hr>
                    @else
                    @include('admin.assets.inc.tables.history')
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection
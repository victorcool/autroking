@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-title">{{ $title }} <a href="{{ route('admin.team.index') }}" class="float-right btn btn-primary btn-sm">List Team <i class="fa fa-list"></i></a></div>
        </div>
        <div class="card-body">
            <form class="row g-3" action="{{ route('admin.team.store') }}" method="post">
                @csrf
                <div class="col-md-6">
                  <label for="name" class="visually-hidden">Category</label>
                  <select name="category" class="form-control" id="">
                    <option value="" hidden>Select</option>
                    @if ($categories??'')
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    @endif
                  </select>
                </div>
                <div class="col-md-6">
                  <label for="name" class="visually-hidden">Team</label>
                  <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                </div>
                <div class="col-md-12">
                    <br>
                    <button type="submit" class="btn btn-primary mb-3">Submit</button>
                </div>
            </form>     
        </div>
    </div>
@endsection
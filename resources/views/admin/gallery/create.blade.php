@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-title">{{ $title }}</div>
        </div>
        <div class="card-body">
            <form class="row g-3" action="{{ route('admin.gallery.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="col-md-6">
                  <label for="caption" class="visually-hidden">Caption</label>
                  <input type="text" class="form-control" name="caption" id="caption" placeholder="Caption">
                </div>
                <div class="col-md-6">
                  <label for="name" class="visually-hidden">Image</label>
                  <input type="file" class="form-control" name="images[]" id="image">
                </div>
                <div class="col-md-12">
                    <br>
                    <button type="submit" class="btn btn-primary mb-3">Submit</button>
                </div>
            </form>  
        </div>
    </div>
@endsection
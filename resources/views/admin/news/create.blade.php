@extends('layouts.admin')
@section('styles')
<script src="https://cdn.tiny.cloud/1/pox4x300xgykrzo6lryxg9o7bceqbvwkokheljlulrhop60p/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
@endsection
@section('content')
<div class="card">
    <div class="card-header">
        <div class="card-title">
            @if (@$toEdit->id??'')
            <a href="{{route('admin.blog.create')}}" class="float-right btn btn-sm btn-primary">Add New <i class="fa fa-plus"></i></a>
                
            @else
            <a href="{{route('admin.blog.index')}}" class="float-right btn btn-sm btn-primary">List News <i class="fa fa-list"></i></a>
                
            @endif
        </div>
    </div>
    <div class="card-body">
        <form action="{{route('admin.blog.store')}}" method="post" id="bank-form" enctype="multipart/form-data">
            <div class="row">
                @csrf
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Category</label>
                        <select name="category" class="form-control" id="">
                            <option value="" hidden>Select</option>
                            @if ($categories??'')
                                @foreach ($categories as $category)
                                    <option @if ($category->id == @$toEdit->blogCategory->id)
                                        {{ 'selected' }}
                                    @endif value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            @endif
                          </select>                             
                        @error('category')
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror		
                    </div> 
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Title</label>
                        <input type="text" name="title" value="{{ old('title',@$toEdit->title) }}" class="form-control">                            
                        @error('name')
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror		
                    </div> 
                </div>
                <div class="col-md-12 pb-3">
                    <textarea name="body" placeholder="write the news Body content">{{ old('body',@$toEdit->body) }}</textarea>
                </div>
                <input type="hidden" name="id" value="{{ @$toEdit->id }}">
                <div class="col-md-12">
                    <input type="file" @if (!@$toEdit->id??'')
                        {{ 'required' }}
                    @endif class="form-control" name="images[]">
                </div><br><br><br><br>
                                
                <div class="form-group col-md-12">
                    <button type="submit" class="btn btn-primary btn-block" id="#">
                        <span class="__f_loader svg__white"></span>
                        <span class="__f_text"><i class="fas fa-smile fa-sm"></i> Post</span>
                    </button>
                </div>                       
            </div>
        </form>
    </div>
</div>
@if ($toEdit->id??'')
<div class="card">
    <div class="card-header"><div class="card-title"><h6>Image update</h6></div></div>
    <div class="card-body">
        <form action="{{ route('admin.blog.update_image') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12 text-center mb-5">
                    <img src="{{ asset('uploads/blog_img/'.@$toEdit->images->path??'') }}" width="200" class="img-thumbnail" alt="">
                </div>
                <div class="col-md-12 text-center mb-5">
                    <input type="file" name="images[]"  class="form-control">
                    <input type="hidden" name="id" value="{{ @$toEdit->id }}">
                </div>
                <div class="col-md-12 text-center"><button type="submit" class="btn btn-sm btn-success">Click to update</button></div>
            </div>
        </form>
    </div>
</div>
@endif
@endsection

@section('scripts')
<script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss',
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
      mergetags_list: [
        { value: 'First.Name', title: 'First Name' },
        { value: 'Email', title: 'Email' },
      ]
    });
  </script>
@endsection
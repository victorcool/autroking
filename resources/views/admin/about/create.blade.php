@extends('layouts.admin')
@section('styles')
<script src="https://cdn.tiny.cloud/1/pox4x300xgykrzo6lryxg9o7bceqbvwkokheljlulrhop60p/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
@endsection
@section('content')
<div class="card">
    <div class="card-header">
        <div class="card-title">Add new About category</div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-4">
                <form class="row g-3" action="{{ route('admin.about.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                    <label for="name" class="visually-hidden">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $toEdit->name??'' }}" id="name" placeholder="Name">
                    <input type="hidden" class="form-control" value="{{ $id??'' }}" name="id">

                    <br><br><br>
                    @if ($id??'')
                    <button type="submit" class="btn btn-primary btn-block btn-sm mb-3">Update</button>
                    <p>Do you want to add new One? <a href="{{ route('admin.about.create') }}">Click to add new</a></p>
                    @else
                    <button type="submit" class="btn btn-success btn-block btn-sm mb-3"> Submit</button>
                    @endif
                    
                </form> 
            </div>
            <div class="col-md-8">
                <div class="table-responsive mt-4">
                    <table id="key-datatable" class="table nowrap">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($categories??'')
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$category->name}}</td>
                                        {{-- <td><span class="">@if($category->published == 0) {{ 'Unpublished' }} @else {{ 'Published' }}  @endif</span></td> --}}
                                        <td>
                                            @if($category->published == 0)
                                            <a href="{{ route('admin.about.action',['id'=>$category->id,'a'=>'publish']) }}" class="badge badge-success py-1"> Publish <i class="fa fa-upload"></i></a>
                                            @else 
                                            <a href="{{ route('admin.about.action',['id'=>$category->id,'a'=>'unpublish']) }}" class="badge badge-info py-1">Unpublish</a> 
                                            @endif
                                            <a href="{{ route('admin.about.create',['id'=>$category->id,'a'=>'edit']) }}" class="badge badge-soft-info py-1">Edit</a>
                                            <a href="{{ route('admin.about.action',['id'=>$category->id,'a'=>'remove']) }}" onclick="myFunction()" class="badge badge-soft-danger py-1">Remove</a>
                                            {{-- <a href="{{ route('admin.team.show',['type'=>$category->slug]) }}" class="badge badge-soft-info py-1"><i class="fa fa-eye"></i></a> --}}
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>  
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-header">
        <div class="card-title">About Contents 
        @if ($contentToEdit->id??'')
        <a href="{{ route('admin.about.create') }}" class="btn btn-sm btn-primary float-right">
            New Content <i class="fa fa-plus"></i></a>
        @else
        <a href="{{ route('admin.about.index') }}" class="btn btn-sm btn-primary float-right">
            List Content <i class="fa fa-list"></i></a>
        @endif
        
        </div>
    </div>
    <div class="card-body">
        <form action="{{route('admin.aboutcontent.store')}}" method="post" id="bank-form" enctype="multipart/form-data">
            <div class="row">
                @csrf
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="name">About Category</label>
                        <select name="category" class="form-control" id="">
                            <option value="" hidden>Select</option>
                            @if ($categories??'')
                                @foreach ($categories as $category)
                                    <option @if (@$contentToEdit->about->id == $category->id)
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

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="name">Title (optional)</label>
                        <input type="text" name="title" class="form-control" maxlength="30" value="{{ old('title',$contentToEdit->title??'') }}">                            
                        @error('name')
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror		
                    </div> 
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="name">Name </label>
                        <input type="text" name="name" class="form-control" maxlength="30" value="{{ old('name',$contentToEdit->name??'') }}">                            
                        @error('name')
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror		
                    </div> 
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="name">Position (optional)</label>
                        <select name="position" class="form-control" id="">
                            <option value="" hidden>Select</option>
                            @if ($positions??'')
                                @foreach ($positions as $position)
                                    <option  @if ($position->id == @$contentToEdit->officePosition->id )
                                        {{ 'selected' }}
                                    @endif value="{{ $position->id }}">{{ $position->name }}</option>
                                @endforeach
                            @endif
                        </select>         
                                            
                        @error('name')
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror		
                    </div> 
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="name">Date of birth (optional)</label>
                        <input type="date" name="dob" class="form-control" maxlength="30" value="{{ old('dob',$contentToEdit->dob??'') }}">                            
                        @error('dob')
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror		
                    </div> 
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="name">Date Joined (optional)</label>
                        <input type="date" name="date_joined_club" class="form-control" maxlength="30" value="{{ old('name',$contentToEdit->date_joined_club??'') }}">                            
                        @error('name')
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror		
                    </div> 
                </div>
                <div class="col-md-12 pb-3">
                    <textarea name="body" placeholder="write the news Body content">{{ $contentToEdit->body??'' }}</textarea>
                </div>
                <input type="hidden" class="form-control" value="{{ $contentToEdit->id??'' }}" name="contentToEditId">
                <div class="col-md-12">
                    <input type="file" class="form-control" name="images[]">
                </div><br><br><br><br>
                                
                <div class="form-group col-md-12">
                    <button type="submit" class="btn btn-primary btn-block" id="#">
                        <span class="__f_loader svg__white"></span>
                        <span class="__f_text"><i class="fas fa-smile fa-sm"></i> 
                            @if ($contentToEdit->id??'')
                                {{ 'Update' }}
                            @else
                                {{ 'Submit' }}
                            @endif
                        </span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>



@if ($contentToEdit->id??'')
<div class="card">
    <div class="card-header"><div class="card-title"><h6>Image update</h6></div></div>
    <div class="card-body">
        <form action="{{ route('admin.about.update_image') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12 text-center mb-5">
                    <img src="{{ asset('uploads/about/'.@$contentToEdit->images->path??'') }}" width="200" class="img-thumbnail" alt="">
                </div>
                <div class="col-md-12 text-center mb-5">
                    <input type="file" name="images[]" class="form-control">
                    <input type="text" name="id" value="{{ @$contentToEdit->id }}">
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
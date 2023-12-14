@extends('layouts.admin')

@section('styles')
<script src="https://cdn.tiny.cloud/1/pox4x300xgykrzo6lryxg9o7bceqbvwkokheljlulrhop60p/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-title">{{ $title }} <a href="{{ route('admin.player.index') }}" class="float-right btn btn-primary btn-sm">List player <i class="fa fa-list"></i></a></div>
        </div>
        <div class="card-body">
            <form class="row g-3" action="{{ route('admin.player.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="col-md-6">
                  <label for="name" class="visually-hidden">Category</label>
                  <select name="category" class="form-control" id="Category">
                    <option value="" hidden>Select</option>
                    @if ($categories??'')
                        @foreach ($categories as $category)
                            <option @if (@$toEdit->team_category_id == $category->id)
                              {{ 'selected' }}
                          @endif value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    @endif
                  </select>
                </div>
                <div class="col-md-6">
                  <label for="name" class="visually-hidden">Team</label>
                  <select name="team" class="form-control" id="team">
                    @if (@$toEdit->id??'')
                    <option selected value="{{ @$toEdit->team_id }}">{{ @$toEdit->team->name??'' }}</option>
                    @endif
                    <option value="" hidden>Select</option>
                  </select>
                </div>
                <div class="col-md-6">
                  <label for="name" class="visually-hidden">Position category</label>
                  <select name="position_category" class="form-control" id="position_category">
                    <option value="" hidden>Select</option>
                    @if ($position_categories??'')
                        @foreach ($position_categories as $category)
                            <option @if (@$toEdit->position->positionCategory->id == $category->id)
                                {{ 'selected' }}
                            @endif value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    @endif
                  </select>
                </div>
                <div class="col-md-4">
                  <label for="position" class="visually-hidden">Position</label>
                  <select name="position" class="form-control" id="position">
                    @if (@$toEdit->id??'')
                    <option selected value="{{ @$toEdit->position_id }}">{{ @$toEdit->position->name??'' }}</option>
                    @endif
                    <option value="" hidden>Select</option>
                  </select>
                </div>
                <div class="col-md-2">
                  <label for="position_number" class="visually-hidden">Position</label>
                  <input type="number" name="position_number" class="form-control" value="{{ old('position_number',@$toEdit->position_number??'') }}" id="">
                </div>

                <div class="col-md-6">
                  <label for="name" class="visually-hidden">Name</label>
                  <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="{{old('name',$toEdit->name??'')}}">
                </div>
                <div class="col-md-6">
                  <label for="citizen" class="visually-hidden">Citizenship</label>
                  <input type="text" class="form-control" name="citizen" id="citizen" placeholder="citizen" value="{{old('citizen',$toEdit->citizenship??'')}}">
                </div>
                <div class="col-md-6">
                  <label for="name" class="visually-hidden">Date of Birth</label>
                  <input type="date" class="form-control" name="dob" id="dob" placeholder="DOB" value="{{old('dob',$toEdit->dob??'')}}">
                </div>
                <div class="col-md-6">
                  <label for="name" class="visually-hidden">Place of Birth</label>
                  <input type="text" class="form-control" name="pob" id="pob" placeholder="POB" value="{{old('pob',$toEdit->pob??'')}}">
                </div>

                <div class="col-md-6">
                  <label for="height" class="visually-hidden">Height</label>
                  <input type="text" class="form-control" name="height" id="height" placeholder="height" value="{{old('height',$toEdit->height??'')}}">
                </div>
                <div class="col-md-6">
                  <label for="weight" class="visually-hidden">Weight</label>
                  <input type="text" class="form-control" name="weight" id="weight" placeholder="weight" value="{{old('weight',$toEdit->weight??'')}}">
                </div>

                <div class="col-md-6">
                  <label for="matches" class="visually-hidden">No. of Matches Played</label>
                  <input type="number" class="form-control" name="matches" id="matches" placeholder="20" value="{{old('matches',$toEdit->matches??'')}}">
                </div>
                <div class="col-md-6">
                  <label for="goals" class="visually-hidden">Total Goals</label>
                  <input type="number" class="form-control" name="goals" id="" value="{{old('goals',$toEdit->goals??'')}}">
                </div>
                <div class="col-md-6">
                  <label for="club_debut" class="visually-hidden">club_debut (First public appearance)</label>
                  <input type="date" class="form-control" name="club_debut" id="" value="{{old('club_debut',$toEdit->club_debut??'')}}" placeholder="January 21, 2010">
                </div>

                <div class="col-md-6">
                  <label for="previous_club" class="visually-hidden">Previous Club</label>
                  <input type="text" class="form-control" name="previous_club" id="previous_club" value="{{old('previous_club',$toEdit->previous_club??'')}}" placeholder="Real madrid">
                </div>
                <div class="col-md-6">
                  <label for="current_club" class="visually-hidden">current club</label>
                  <input type="text" class="form-control" name="current_club" value="{{old('current_club',$toEdit->present_club??'')}}" placeholder="Chelsea">
                </div>

                <div class="col-md-6">
                  <label for="discipline" class="visually-hidden">Discipline</label>
                  <input type="text" class="form-control" name="discipline" value="{{old('discipline',$toEdit->discipline??'')}}" id="discipline" placeholder="5 fouls against">
                </div>
                
                <div class="col-md-12 mt-3">
                  <label for="discipline" class="visually-hidden">Player Overview</label>
                  <textarea name="description" placeholder="Write an overview for this player">{{ old('description',$toEdit->description??'') }}</textarea>
                </div>


                <div class="col-md-6">
                  <label for="name" class="visually-hidden">Image</label>
                  <input type="file" class="form-control" name="images[]" id="image">
                </div>
                <input type="hidden" name="id" value="{{ $toEdit->id??'' }}">
                <div class="col-md-12">
                    <br>
                    <button type="submit" class="btn btn-primary mb-3">Submit</button>
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
                    <img src="{{ asset('uploads/team_images/'.@$toEdit->images->path??'') }}" width="200" class="img-thumbnail" alt="">
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
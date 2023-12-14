@extends('layouts.admin')
@section('styles')
<script src="https://cdn.tiny.cloud/1/pox4x300xgykrzo6lryxg9o7bceqbvwkokheljlulrhop60p/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
@endsection
@section('content')
<div class="card">
    <div class="card-body">
      <div class="table-responsive mt-4">
        <table id="key-datatable" class="table nowrap">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Category</th>
                    <th scope="col">Title</th>
                    <th scope="col">Name</th>
                    <th scope="col">Position</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @if ($abouts??'')
                    @foreach ($abouts as $content)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$content->about->name??''}}</td>
                            <td>{{$content->title??'N/A'}}</td>
                            <td>{{$content->name??'N/A'}}</td>
                            <td>{{$content->officePosition->name??'N/A'}}</td>
                            {{-- <td><span class="">@if($category->published == 0) {{ 'Unpublished' }} @else {{ 'Published' }}  @endif</span></td> --}}
                            <td>
                                @if($content->published == 0)
                                <a href="{{ route('admin.aboutContent.action',['id'=>$content->id,'a'=>'publish']) }}" class="badge badge-success py-1"> Publish <i class="fa fa-upload"></i></a>
                                @else 
                                <a href="{{ route('admin.aboutContent.action',['id'=>$content->id,'a'=>'unpublish']) }}" class="badge badge-info py-1">Unpublish</a> 
                                @endif
                                <a href="{{ route('admin.about.create',['contentId'=>$content->id,'a'=>'edit']) }}" class="badge badge-soft-info py-1">Edit</a>
                                <a href="{{ route('admin.aboutContent.action',['id'=>$content->id,'a'=>'remove']) }}" onclick="myFunction()" class="badge badge-soft-danger py-1">Remove</a>
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
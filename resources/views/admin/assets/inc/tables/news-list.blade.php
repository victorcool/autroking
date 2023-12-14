<div class="table-responsive mt-4">
    <table id="key-datatable" class="table nowrap">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Created_at</th>
                <th scope="col">Category</th>
                <th scope="col">Title</th>
                <th scope="col">status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @if ($lists??'')
                @foreach ($lists as $list)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$list->created_at}}</td>
                        <td>{{$list->blogCategory->name}}</td>
                        <td>{{$list->title}}</td>
                        <td>
                            @if($list->published == 0)
                             {{ 'unpublished' }}
                            @else 
                                {{ 'published' }} 
                            @endif
                        </td>
                        {{-- <td><span class="">@if($list->published == 0) {{ 'Unpublished' }} @else {{ 'Published' }}  @endif</span></td> --}}
                        <td>
                            @if($list->published == 0)
                            <a href="{{ route('admin.blog.action',['id'=>$list->id,'a'=>'publish']) }}" class="badge badge-soft-success py-1"> Publish <i class="fa fa-upload"></i></a>
                            @else 
                            <a href="{{ route('admin.blog.action',['id'=>$list->id,'a'=>'unpublish']) }}" class="badge badge-soft-info py-1">unpublish <i class="fa fa-download"></i></a> 
                            @endif
                            <a href="{{ route('admin.blog.create',['id'=>$list->id,'a'=>'edit']) }}" class="badge badge-soft-warning py-1">Edit</a>
                            <a href="{{ route('admin.blog.action',['id'=>$list->id,'a'=>'remove']) }}" class="badge badge-soft-danger py-1">Remove</a>
                            <a href="#." class="badge badge-soft-info py-1"><i class="fa fa-eye"></i></a> 
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>
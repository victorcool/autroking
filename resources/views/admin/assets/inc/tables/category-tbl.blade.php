
    <div class="card">
        <div class="card-body">
            <div class="table-responsive mt-4">
                <table id="key-datatable" class="table dt-responsive nowrap">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($categories??'')
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$category->name}}</td>
                                    <td><span class="">{{$category->status->name??''}}</span></td>
                                    <td>
                                        <a href="" class="badge badge-soft-info py-1 editCategoryBtn" data-id="{{$category->id}}" data-name="{{$category->name}}">Edit</a>
                                        <a href="" class="badge badge-soft-danger py-1 removeCategoryBtn" data-id="{{$category->id}}">Remove</a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        
                    </tbody>
                </table>
            </div> 
            <!-- end table-responsive-->
        </div> <!-- end card-body-->
    </div> <!-- end card-->
<div class="card">
    <div class="card-body">
        <div class="table-responsive mt-4">
            <table id="key-datatable" class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Date</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($users??'')
                        @foreach ($users as $user)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$user->username}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->created_at}}</td>
                                <td>
                                    <a href="{{route('admin.user.show',$user->id)}}" class="badge badge-soft-info py-1" data-id="{{$user->id}}" data-name="{{$user->name}}"><i class="fa fa-eye"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    
                </tbody>
            </table>
        </div> <!-- end table-responsive-->
    </div> <!-- end card-body-->
</div> <!-- end card-->
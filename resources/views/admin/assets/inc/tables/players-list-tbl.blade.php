<div class="table-responsive mt-4">
    <table id="key-datatable" class="table nowrap">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Country</th>
                <th scope="col">State/City</th>
                <th scope="col">DOB</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @if ($players??'')
                @foreach ($players as $player)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td> <img src="{{asset('uploads/team_images/'.@$player->images->path)}}" alt="" width="50"></td>
                        <td>{{ $player->name }}</td>
                        <td>{{ $player->country }}</td>
                        <td>{{ $player->state }}</td>
                        <td>{{ $player->age }}</td>
                        <td>
                            @if($player->published == 0)
                            <a href="{{ route('admin.player.action',['id'=>$player->id,'a'=>'publish']) }}" class="badge badge-soft-primary py-1"> publish <i class="fa fa-upload"></i></a>
                            @else 
                            <a href="{{ route('admin.player.action',['id'=>$player->id,'a'=>'unpublish']) }}" class="badge badge-soft-danger py-1">unpublish <i class="fa fa-download"></i></a> 
                            @endif
                            <a href="{{ route('admin.player.create',['id'=>$player->id,'a'=>'edit']) }}" class="badge badge-soft-info py-1">Edit <i class="fa fa-edit"></i></a>
                            <a href="{{ route('admin.player.action',['id'=>$player->id,'a'=>'remove']) }}" class="badge badge-soft-danger py-1">Remove</a>
                            {{-- <a href="{{ route('admin.team.action',['id'=>$player->id,'a'=>'players-list']) }}" class="badge badge-soft-info py-1"><i class="fa fa-eye"></i></a>  --}}
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div> 
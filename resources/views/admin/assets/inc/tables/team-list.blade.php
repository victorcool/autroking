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
            @if ($teams??'')
                @foreach ($teams as $team)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$team->name}}</td>
                        {{-- <td><span class="">@if($team->published == 0) {{ 'Unpublished' }} @else {{ 'Published' }}  @endif</span></td> --}}
                        <td>
                            @if($team->published == 0)
                            <a href="{{ route('admin.team.action',['id'=>$team->id,'a'=>'publish']) }}" class="badge badge-soft-primary py-1"> publish <i class="fa fa-upload"></i></a>
                            @else 
                            <a href="{{ route('admin.team.action',['id'=>$team->id,'a'=>'unpublish']) }}" class="badge badge-soft-danger py-1">unpublish <i class="fa fa-download"></i></a> 
                            @endif
                            <a href="" class="badge badge-soft-info py-1">Edit <i class="fa fa-edit"></i></a>
                            <a href="{{ route('admin.team.action',['id'=>$team->id,'a'=>'remove']) }}" class="badge badge-soft-danger py-1">Remove</a>
                            <a href="{{ route('admin.team.action',['id'=>$team->id,'a'=>'players-list']) }}" class="badge badge-soft-info py-1"><i class="fa fa-eye"></i></a> 
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div> 
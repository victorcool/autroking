<div class="table-responsive mt-4">
    <table id="datatable-buttons" class="table table-striped nowrap display" style="width:100%">
        <thead>
            <tr class="text-warning">
                <th>#</th>
                <th>Username</th>
                <th>payment Mode</th>
                <th>Amount</th>
                <th>Type</th>
                <th>Status</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if ($transactions??'')
                @foreach ($transactions as $transaction)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$transaction->user['username']}}</td>
                        <td>{{$transaction->paymentchanel['fullname']??'N/A'}}</td>
                        <td><span>$</span>{{number_format($transaction->amount)}}</td>
                        <td>{{$transaction->type}}</td>
                        <td>{{$transaction->status->name}}</td>
                        <td>{{$transaction->created_at}}</td>
                        <td>
                            @if (($transaction->type=='funding') || ($transaction->type=='withdrawal'))
                                @if ($transaction->status->name == 'pending')
                                    <a href="{{route('admin.transaction.process',['id'=>$transaction->id])}}" class="btn btn-sm btn-warning"><i data-feather="send" style="width:15px;"></i> Process</a>
                                @else
                                    
                                @endif
                            @else
                                
                            @endif
                        </td>
                    </tr>
                @endforeach
            @endif                    
        </tbody>
    </table>
</div> <!-- end table-responsive-->

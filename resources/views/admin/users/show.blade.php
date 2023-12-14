@extends('layouts.admin')

@section('styles')

@endsection

@section('content')
@include('inc.messages')
    <!--Info boxes-->
    <div class="row">
        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body p-0">
                    <div class="media p-3">
                        <div class="media-body">
                            <span class="text-muted text-uppercase font-size-12 font-weight-bold">Total Profit</span>
                            <h2 class="mb-0">${{$accountSummary->all_balance??''}}</h2>
                        </div>
                        <div class="align-self-center">
                            <div id="today-revenue-chart" class="apex-charts"></div>
                            <span class="text-success font-weight-bold font-size-13"><i
                                    class='uil uil-arrow-up'></i> 10.21%</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body p-0">
                    <div class="media p-3">
                        <div class="media-body">
                            <span class="text-muted text-uppercase font-size-12 font-weight-bold">Balance</span>
                            <h2 class="mb-0">${{$accountSummary->available_balance??''}}</h2>
                        </div>
                        <div class="align-self-center">
                            <div id="today-product-sold-chart" class="apex-charts"></div>
                            <span class="text-danger font-weight-bold font-size-13"><i
                                    class='uil uil-arrow-down'></i> 5.05%</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body p-0">
                    <div class="media p-3">
                        <div class="media-body">
                            <span class="text-muted text-uppercase font-size-12 font-weight-bold">
                                Wallet</span>
                            <h2 class="mb-0">${{$accountSummary->wallet??''}}</h2>
                        </div>
                        <div class="align-self-center">
                            <div id="today-new-customer-chart" class="apex-charts"></div>
                            <span class="text-danger font-weight-bold font-size-13"><i
                            class='uil uil-arrow-up'></i>0</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="card">
                <div class="card-body p-0">
                    <div class="media p-3">
                        <div class="media-body">
                            <span class="text-muted text-uppercase font-size-12 font-weight-bold">Withdrawal</span>
                            <h2 class="mb-0">${{$accountSummary->debit??''}}</h2>
                        </div>
                        <div class="align-self-center">
                            <div id="today-new-visitors-chart" class="apex-charts"></div>
                            <span class="text-success font-weight-bold font-size-13"><i
                                    class='uil uil-arrow-up'></i> 5.05%</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End Info boxes-->
    <div class="card">
        <div class="card-body">
            <ul class="nav nav-pills navtab-bg nav-justified" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="pills-messages-tab" data-toggle="pill"
                        href="#pills-messages" role="tab" aria-controls="pills-messages"
                        aria-selected="true">
                        Personal Detail
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="pills-activity-tab" data-toggle="pill"
                        href="#pills-activity" role="tab" aria-controls="pills-activity"
                        aria-selected="false">
                        Account Summary
                    </a>
                </li>
            </ul>

            <div class="tab-content" id="pills-tabContent">                      
                <!-- messages -->
                <div class="tab-pane fade show active" id="pills-messages" role="tabpanel"
                    aria-labelledby="pills-messages-tab">
                    <form action="{{route('admin.account.store')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="last_name">Username</label>
                                    <input type="text" name="username" class="form-control" value="{{old('username',$user->username)}}">
                                    <input type="hidden" name="user_id" value="{{$user->id}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" name="email" class="form-control" value="{{old('email',$user->email)}}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Password <small>(Optional)</small></label>
                                    <input type="text" class="form-control" name="password">
                                    <small class="text-muted"><i>Enter new password only if you want to change this client's account password </i></small>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Click to Update</button>                                   
                                </div>
                            </div>
                        </div>                      
                    </form>
                    <hr>
                    <div class="row">
                        <div class="col-12">
                        @if ($user->email_verified_at == null)
                            <form action="{{route('admin.user.action')}}" method="post">
                                @csrf
                                <input type="hidden" value="{{$user->id}}" name="userId" style="display: none;">
                                <input type="hidden" value="activate" name="action" style="display: none;">
                                <button type="submit" class="btn btn-success float-right">Click to Activate</button>
                            </form>
                        @else 
                            <form action="{{route('admin.user.action')}}" method="post">
                                @csrf
                                <input type="hidden" value="{{$user->id}}" name="userId" style="display: none;">
                                <input type="hidden" value="block" name="action" style="display: none;">
                                <button type="submit" name="block" class="btn btn-danger float-right">Click to Block</button>
                            </form>                                       
                        @endif
                        </div>
                    </div>            
                </div>

                <div class="tab-pane" id="pills-activity" role="tabpanel" aria-labelledby="pills-activity-tab">
                    <div class="row">
                        <div class="col-md-4">
                            <form action="{{route('admin.user.action')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control" value="If you wipe account everything will run zero" readonly>
                                    <input type="hidden" name="action" value="wipe" class="form-control">
                                    <input type="hidden" value="{{$user->id}}" name="userId" style="display: none;">
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-danger btn-block">click to wipe account</button>
                                </div>
                            </form>                                
                        </div>
                        <div class="col-md-4">
                            @if ($user->account != '')
                                @if ($user->account->status_id == statusID('pending'))
                                    <form action="{{route('admin.user.action')}}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" class="form-control" value="Client can do transfer again" readonly>
                                            <input type="hidden" name="action" value="activate_account" class="form-control">
                                            <input type="hidden" value="{{$user->id}}" name="userId" style="display: none;">
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-success btn-block">click to unblock account</button>
                                        </div>
                                    </form>
                                @else
                                    <form action="{{route('admin.user.action')}}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" class="form-control" value="Client cannot do transfer again" readonly>
                                            <input type="hidden" name="action" value="block_account" class="form-control">
                                            <input type="hidden" value="{{$user->id}}" name="userId" style="display: none;">
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-warning btn-block">click to block account</button>
                                        </div>
                                    </form>
                                @endif  
                            @endif
                                                         
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-12">
                            <h3>Insert new transaction for this client</h3>
                        </div>
                    </div>
                    <div class="row breadcrumb">
                        <div class="col-12">
                            <form action="{{route('admin.insert_transaction')}}" method="post">
                                @csrf
                                <input type="hidden" value="{{$user->id}}" name="userId" style="display: none;">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="account_type">Amount</label>
                                            <input type="number" class="form-control" name="amount" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="narration">Narration</label>
                                            <input type="text" class="form-control" name="narration" maxlength="20" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="narration">Alert Type</label>
                                            <select name="alert_type" id="" class="form-control" required>
                                            <option value="">Select:</option>
                                            <option value="credit">Credit</option>
                                            <option value="debit">Debit</option>
                                            <option value="wallet">wallet</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="narration">PIN</label>
                                            <input type="text" class="form-control" name="pin" maxlength="20" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary btn-block">Click to insert</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <hr>
                </div>
                @include('admin.assets.inc.tables.history')
            </div>               
        </div>
    </div>
@endsection

@section('scripts')

@endsection
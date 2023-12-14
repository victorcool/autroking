@extends('layouts.admin')
@section('styles')
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            @include('inc.messages')
            <div class="row">
                @if ($transaction->status->name == 'success')
                <p>You have successfully credited or funded {{strtoupper($transaction->user->username)}} {{config('app.name')}} wallet with the SUM of ${{$transaction->amount}}</p>
                @else
                <form action="{{route('update-transaction')}}" method="post" id="transaction-form">
                    <div class="row">
                        @csrf
                        <div class="form-group col-md-6">	
                            <input type="hidden" value="{{$transaction->id}}" name="id">   
                            <input type="hidden" value="{{$transaction->user_id}}" name="user_id">	
                            <input type="hidden" value="{{$transaction->amount}}" name="amount">	
                        </div>
                        <div class="form-group col-md-12">
                            <p>{{strtoupper($transaction->user->username)}} Claims He/She has sent the SUM of ${{$transaction->amount}} to your {{strtoupper($transaction->paymentchanel->fullname)}}</p>
                            <p>If you have received this fund in your wallet kindly enter your access pin and click confirm to fund this user account</p>	
                        </div>
                        <div class="form-group col-md-12">
                            <label for="pin">PIN</label>
                            <input type="password" class="form-control required_elem" name="pin" required>                               
                            @error('pin')
                                <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror		
                        </div>
                        <div class="form-group col-md-12">
                            <button type="submit" class="btn btn-primary btn-block generalBtn" id="productBtn" disabled="disabled">
                                <span class="__f_loader svg__white"></span>
                                <span class="__f_text"><i data-feather="save"></i> Confirmed</span>
                            </button>
                        </div>
                    </div>
                </form>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection
@extends('layouts.admin')
@section('styles')
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            @include('inc.messages')
            <div class="row">
                <form action="{{route('update-paymentMode')}}" method="post" id="paymentMode-form">
                    <div class="row text-white">
                        @csrf
                        <div class="form-group col-md-6">
                            <label for="abr">Abr</label>
                            <input type="text" class="form-control required_elem" value="{{$paymentMode->name}}"  name="abr" required> 
                            <input type="hidden" value="{{$paymentMode->id}}" name="id">                              
                            @error('abr')
                                <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror		
                        </div>
                        <div class="form-group col-md-6">
                            <label for="fullname">Full Name</label>
                            <input type="text" class="form-control required_elem" value="{{$paymentMode->fullname}}"  name="fullname" required>                               
                            @error('fullname')
                                <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror		
                        </div>
                        <div class="form-group col-md-12">
                            <label for="address">Wallet Address</label>
                            <input type="text" class="form-control required_elem" value="{{$paymentMode->address}}" name="address" required>                               
                            @error('address')
                                <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror		
                        </div>
                        <div class="form-group col-md-12">
                            <label for="pin">PIN</label>
                            <input type="password" class="form-control" name="pin" required>                               
                            @error('pin')
                                <span class="invalid-feedback text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                            @enderror		
                        </div>
                        <div class="form-group col-md-12">
                            <button type="submit" class="btn btn-primary btn-block generalBtn" id="productBtn" disabled="disabled">
                                <span class="__f_loader svg__white"></span>
                                <span class="__f_text"><i class="fas fa-smile fa-sm"></i> Submit</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection
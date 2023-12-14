@extends('layouts.admin')

@section('styles')

@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            @include('inc.messages')
            <form action="{{ route('admin.update_plan') }}" method="post">
                @csrf
                <input type="hidden" name="plan_id" value="{{ $plan->id }}">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="type">Plan</label>
                            <input type="text"  class="form-control" name="name" value="{{ old('plan',$plan->name) }}"/>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="type">Minimum Amount</label>
                            <input type="text"  class="form-control" name="min_amount" value="{{ old('min_amount',$plan->min) }}"/>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="type">Maximum Amount</label>
                            <input type="text"  class="form-control" name="max_amount" value="{{ old('max_amount',$plan->max) }}"  />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="type">Hourly Profit</label>
                            <input type="text" class="form-control" name="hourly" value="{{ old('hourly',$plan->hourly_profit) }}" />
                            <small class="form-text"><b>Note:</b> change  it to 0 (Zero) if you don't want it to show at the front-end</small>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="type">Daily Profit</label>
                            <input type="text" class="form-control" name="daily" value="{{ old('daily',$plan->daily_profit) }}"  />
                            <small class="form-text"><b>Note:</b> change  it to 0 (Zero) if you don't want it to show at the front-end</small>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="type">Weekly Profit</label>
                            <input type="text" class="form-control" name="weekly" value="{{ old('weekly',$plan->weekly_profit) }}"  />
                            <small class="form-text"><b>Note:</b> change  it to 0 (Zero) if you don't want it to show at the front-end</small>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="type">Monthly Profit</label>
                            <input type="text" class="form-control" name="monthly" value="{{ old('monthly',$plan->monthly_profit) }}" />
                            <small class="form-text"><b>Note:</b> change  it to 0 (Zero) if you don't want it to show at the front-end</small>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="type">Duration</label>
                            <input type="text" class="form-control" name="duration" value="{{ old('duration',$plan->duration) }}" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="type">Referal Bonus</label>
                            <input type="text" class="form-control" name="bonus" value="{{ old('bonus',$plan->referral_bonus) }}" />
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="type">Enter PIN</label>
                            <input type="password" class="form-control" name="pin"/>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-sm" value="Update now" />
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')

@endsection
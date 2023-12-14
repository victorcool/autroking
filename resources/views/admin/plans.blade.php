@extends('layouts.admin')

@section('styles')

@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            @include('inc.messages')
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive mt-4">
                        <table id="datatable-buttons" class="table table-striped nowrap display" style="width:100%">
                            <thead>
                                <tr class="text-warning">
                                    <th>Action</th>
                                    <th>#</th>
                                    <th>Type</th>
                                    <th>Plan</th>
                                    <th>Amount</th>
                                    <th>Max Amt</th>
                                    <th>Min Amt</th>
                                    <th>Hourly Profit</th>
                                    <th>Daily Profit</th>
                                    <th>Weekly Profit</th>
                                    <th>Monthly Profit</th>
                                    {{-- <th>Yearly Profit</th> --}}
                                    <th>Duration</th>
                                    <th>Referal Bonus</th>
                                    <th>Updated</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($plans??'')
                                    @foreach ($plans as $plan)
                                        <tr class="text-white">
                                            <td><a href="{{ route('admin.edit_plan',$plan->id) }}"><i class="fa fa-cog fa-spin"></i></a></td>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$plan->pricing['name']}}</td>
                                            <td>{{$plan->name}}</td>
                                            <td><span>$</span>{{number_format($plan->amount)}}</td>
                                            <td><span>$</span>{{number_format($plan->max)}}</td>
                                            <td><span>$</span>{{number_format($plan->min)}}</td>
                                            <td><span></span>{{number_format($plan->hourly_profit)}}%</td>
                                            <td><span></span>{{number_format($plan->daily_profit)}}%</td>
                                            <td><span></span>{{number_format($plan->weekly_profit)}}%</td>
                                            <td><span></span>{{number_format($plan->monthly_profit)}}%</td>
                                            {{-- <td><span></span>{{number_format($plan->Yearly_profit)}}%</td> --}}
                                            <td><span></span>{{$plan->duration.' '.$plan->duration_type }}</td>
                                            <td><span></span>{{$plan->referral_bonus}}%</td>
                                            <td>{{$plan->updated_at}}</td>
                                        </tr>
                                    @endforeach
                                @endif                    
                            </tbody>
                        </table>
                    </div> <!-- end table-responsive-->
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection
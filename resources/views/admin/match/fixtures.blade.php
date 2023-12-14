@extends('layouts.admin')
@section('styles')

@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-title">{{ strtoupper($type??'') }}</div>
        </div>
            <div class="card-body">
                <form action="{{ route('admin.match.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-5">
                            <label for="name">Home Team</label>
                            <select name="home_team" class="form-control" id="" required>
                                <option hidden value="">Select</option>
                                @foreach ($teams as $team)
                                <option  value="{{ $team->id }}">{{ $team->name }}</option>
                                @endforeach
                            </select>                              
                            @error('name')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror	
                            @if ($toEdit)
                                <br>
                                <label for="home_score">Home Score</label>
                                <input type="number" name="home_score" class="form-control">	
                            @endif
                        </div>
                        <div class="form-group col-md-2 text-center pt-3">
                        <h2>VS</h2>		
                        </div>
                        <div class="form-group col-md-5">
                            <label for="name">Away Team</label>
                            <select name="away_team" class="form-control" id="" required>
                                <option hidden value="">Select</option>
                                @foreach ($teams as $team)
                                <option  value="{{ $team->id }}">{{ $team->name }}</option>
                                @endforeach
                            </select>                              
                            @error('name')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror	
                            @if ($toEdit)
                                <br>
                                <label for="away_score">Away Score</label>
                                <input type="number" name="away_score" class="form-control">
                            @endif                            	
                        </div>
                    </div>
                    <div class="jumbotron">
                        <div class="form-group">
                            <label for="id_start_datetime">24hr Date-Time:</label>
                            <div class="input-group date" id="id_1">
                                <input type="text" id="id_1" name="match_date" required value="05/16/2018 12:31:00 AM" class="form-control myDatePicker" required/>
                                <div class="input-group-addon input-group-append">
                                    <div class="input-group-text">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if ($toEdit)
                        <div class="row">
                            <div class="col-md-6"><button class="btn btn-warning btn-block">Update</button></div>
                            <div class="col-md-6"><button class="btn btn-warning btn-block">Update</button></div>
                        </div>
                        @else
                        <button class="btn btn-primary btn-block">Submit</button> 
                        @endif
                    </div>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-header"><div class="card-title"><h4>LISTING</h4></div></div>
            <div class="card-body">
                <div class="table-responsive mt-4">
                    <table id="key-datatable" class="table nowrap display">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Home Team</th>
                                <th scope="col">VS</th>
                                <th scope="col">Away Team</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($fixtures??'')
                                @foreach ($fixtures as $fixture)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$fixture->home_club->name}}</td>
                                        <td>VS</td>
                                        <td>{{$fixture->away_club->name}}</td>
                                        {{-- <td><span class="">@if($fixture->published == 0) {{ 'Unpublished' }} @else {{ 'Published' }}  @endif</span></td> --}}
                                        <td>
                                            @if($fixture->published == 0)
                                            <a href="{{ route('admin.about.action',['id'=>$fixture->id,'a'=>'publish']) }}" class="badge badge-success py-1"> Publish <i class="fa fa-upload"></i></a>
                                            @else 
                                            <a href="{{ route('admin.about.action',['id'=>$fixture->id,'a'=>'unpublish']) }}" class="badge badge-info py-1">Unpublish</a> 
                                            @endif
                                            <a href="{{ route('admin.match.index',['type'=>$type,'id'=>$fixture->id,'a'=>'edit']) }}" class="badge badge-soft-info py-1">Edit</a>
                                            <a href="{{ route('admin.ballpositionCategory.action',['id'=>$fixture->id,'a'=>'remove']) }}" onclick="myFunction()" class="badge badge-soft-danger py-1">Remove</a>
                                            {{-- <a href="{{ route('admin.team.show',['type'=>$fixture->slug]) }}" class="badge badge-soft-info py-1"><i class="fa fa-eye"></i></a> --}}
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>  
            </div>
        </div>
@endsection

@section('script')
<script>
    $(function(){
        $('#id_0').datetimepicker({
            "allowInputToggle": true,
            "showClose": true,
            "showClear": true,
            "showTodayButton": true,
            "format": "MM/DD/YYYY hh:mm:ss A",
        });
        $('#id_1').datetimepicker({
            "allowInputToggle": true,
            "showClose": true,
            "showClear": true,
            "showTodayButton": true,
            "format": "MM-DD-YYYY HH:mm:ss",
        });
        $('#id_2').datetimepicker({
            "allowInputToggle": true,
            "showClose": true,
            "showClear": true,
            "showTodayButton": true,
            "format": "hh:mm:ss A",
        });
        $('#id_3').datetimepicker({
            "allowInputToggle": true,
            "showClose": true,
            "showClear": true,
            "showTodayButton": true,
            "format": "HH:mm:ss",
        });
        $('#id_4').datetimepicker({
            "allowInputToggle": true,
            "showClose": true,
            "showClear": true,
            "showTodayButton": true,
            "format": "MM/DD/YYYY",
        });
    });
</script>
@endsection
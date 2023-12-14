@extends('layouts.admin')

@section('styles')

@endsection

@section('content')
@include('inc.messages')
<!--End Info boxes-->
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center mt-3 profile-img-container">
                                @if (Auth::user()->images == '')
                                    <img src="{{asset('temp/admin/assets/images/users/avatar-7.jpg')}}" class="avatar-lg rounded-circle" alt="Shreyu" />            
                                @else
                                    <img src="{{asset('uploads/profile_images/'.Auth::user()->images->path.'')}}" class="avatar-lg rounded-circle" alt="Shreyu" />            
                                @endif
                                <h5 class="mt-2 mb-0">{{$user->name??'N/A'}}</h5>  
                                <input type="file" />                      
                            </div>
                           
                            <div class="mt-3 pt-2 border-top">
                                <h4 class="mb-3 font-size-15">Customer Info</h4>
                                <div class="table-responsive">
                                    <table class="table table-borderless mb-0 text-muted">
                                        <tbody>
                                            <tr>
                                                <th scope="row">Email</th>
                                                <td>{{$user->email??'N/A'}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Phone</th>
                                                <td>{{$user->phone??'N/A'}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Gender</th>
                                                <td>{{$user->gender??'N/A'}}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Loggedin</th>
                                                <td>{{Carbon\Carbon::parse($user->last_login)->diffForHumans()??'N/A'}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end card -->
                </div>  

                <div class="col-md-6">
                    <h4>Change Password</h4>
                    <form action="{{route('admin.password.update')}}" method="POST">
                        @csrf
                      <div class="mb-3">
                        <div class="title mb-2"><i class="lni lni-key"></i><span>Old Password</span></div>
                        <input class="form-control" name="old_password" type="password">
                      </div>
                      <div class="mb-3">
                        <div class="title mb-2"><i class="lni lni-key"></i><span>New Password</span></div>
                        <input class="form-control" name="password" type="password" id="Password">
                      </div>
                      <div class="mb-3">
                        <div class="title mb-2"><i class="lni lni-key"></i><span>Repeat New Password</span></div>
                        <input class="form-control required_elem" type="password" name="password_confirmation" id="Confirm_password">
                      </div>
                      <div class="mb-3">
                        <div class="title mb-2"><i class="lni lni-key"></i><span>Pin</span></div>
                        <input type="password" class="form-control" name="pin" required> 
                    </div>
                      <button class="btn btn-primary btn-block" type="submit">Update Password</button>
                    </form>
                </div>
                    <div class="col-md-6">
                        <h4>Update Profile</h4>
                        <form action="{{route('admin.profile.update')}}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <div class="title mb-2"><i class="lni lni-key"></i><span>Name</span></div>
                                <input class="form-control" name="name" value="{{old('name',$user->name)}}" type="text">
                                <input type="hidden" name="user_id" value="{{$user->id}}" style="display: none;">
                            </div>
                            <div class="mb-3">
                                <div class="title mb-2"><i class="lni lni-key"></i><span>Email</span></div>
                                <input class="form-control" name="email" type="email" value="{{old('email',$user->email)}}"  id="Email">
                            </div>
                            <div class="mb-3">
                                <div class="title mb-2"><i class="lni lni-key"></i><span>Phone Number</span></div>
                                <input class="form-control required_elem" value="{{old('phone',$user->phone)}}" type="text" name="phone" id="Phone">
                            </div>
                            <div class="mb-3">
                                <div class="title mb-2"><i class="lni lni-key"></i><span>Gender</span></div>
                                <select name="gender" class="form-control" id="Gender">
                                    <option value="MALE" {{$user->gender == 'MALE'?'selected':''}}>Male</option>
                                    <option value="FEMALE" {{$user->gender == 'FEMALE'?'selected':''}}>Female</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <div class="title mb-2"><i class="lni lni-key"></i><span>Pin</span></div>
                                <input type="password" class="form-control" name="pin" required> 
                            </div>
                            <button class="btn btn-primary btn-block" type="submit">Update Profile</button>
                        </form>
                    </div>

                    <div class="col-md-6">
                        <h4>Change Pin</h4>
                        <form action="{{route('admin.pin.update')}}" method="POST">
                            @csrf
                          <div class="mb-3">
                            <div class="title mb-2"><i class="lni lni-key"></i><span>Old Pin</span></div>
                            <input class="form-control" name="old_pin" type="password">
                          </div>
                          <div class="mb-3">
                            <div class="title mb-2"><i class="lni lni-key"></i><span>New Pin</span></div>
                            <input class="form-control" name="pin" type="password" id="Password">
                          </div>
                          <button class="btn btn-primary btn-block" type="submit">Save</button>
                        </form>
                    </div>
            </div> 
        </div>
    </div>
@endsection

@section('scripts')

@endsection
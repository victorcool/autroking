
@if(session('success'))
<div class="alert alert-success myalert text-center noRadius_noborder_addShadow_only">
    <span class="glyphicon glyphicon-saved" aria-hidden="true"></span> {{session('success')}}</div>
@endif

@if(session('error'))
    <div class="alert alert-danger myalert text-center"><span class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span> {{session('error')}}</div>
@endif

@if ($errors->any())
<div class="alert alert-danger myalert text-center noRadius_noborder_addShadow_only">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif 



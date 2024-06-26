@if (isset($errors)&&count($errors)>0)
<div class="alert alert-danger">
    <ul class="list-unstyled mb-0">
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
</div>  
@endif 

@if(Session::has('success_green'))
    <p class="alert alert-success">{{Session::get('success_green')}}</p>
@endif

@if(Session::has('primary_blue'))
    <p class="alert alert-primary">{{Session::get('primary_blue')}}</p>
@endif

@if(Session::has('danger_red'))
    <p class="alert alert-danger">{{Session::get('danger_red')}}</p>
@endif

@if(Session::has('secondary_grey'))
    <p class="alert alert-secondary">{{Session::get('secondary_grey')}}</p>
@endif

@if(Session::has('warning_yellow'))
    <p class="alert alert-warning">{{Session::get('warning_yellow')}}</p>
@endif

@if(Session::has('info_bluelight'))
    <p class="alert alert-info">{{Session::get('info_bluelight')}}</p>
@endif

@if(Session::has('light_white'))
    <p class="alert alert-light">{{Session::get('light_white')}}</p>
@endif

@if(Session::has('dark_strongrey'))
    <p class="alert alert-dark">{{Session::get('dark_strongrey')}}</p>
@endif
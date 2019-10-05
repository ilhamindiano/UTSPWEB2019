@if (count($errors)>0)
    @foreach ($errors as $error)
        <div class="alert alert-danger">
           {{$error}}
        </div>
    @endforeach
@endif

@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status','Login Success') }}
</div>
@endif

@if (session('success'))
<br><br><br>
        <div class="container popup alert alert-success">
           {{session('success')}}
        </div>
@endif

@if (session('error'))
<br><br><br>
        <div class="container popup alert alert-danger">
           {{session('error')}}
        </div>
@endif
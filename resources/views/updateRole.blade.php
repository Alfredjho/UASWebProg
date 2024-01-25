@extends ('template.template')
@section('Title', 'Register Page')
@section('Style')
<link rel="stylesheet" href="{{asset('css/registerPage.css')}}">
@endsection

@section('Content')

<div class = "d-flex justify-content-center bg-success" style = "width: 100%">
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">

                <a class="navbar-brand" href="/"><h1>Amazing E-Grocery</h1></a>        
            
        </div>
    </nav>
</div>

<div class = "d-flex justify-content-center bg-warning">
    <nav class = "navbar navbar-expand-lg">
        <div class = "collapse navbar-collapse"">
            <ul class = "navbar-nav">
                <li class = "nav-item"  style = "padding-right: 50px;">
                    <a href="{{route('dashboardAdmin')}}">Home</a>
                </li>

                <li class = "nav-item"  style = "padding-right: 50px;">
                    <a href="{{route('cartPage')}}">Cart</a>
                </li>

                <li class = "nav-item">
                    <a href="{{route('profile')}}">Profile</a>
                </li>

                @if($user->role == 'Admin')
                        <li class="nav-item">
                            <a href="{{route('accountPage')}}" style = "padding-left: 50px;">Account Maintenance</a>
                        </li>
                @endif

            </ul>
        </div>
    </nav>
</div>

<div class = "tampilanUtama">

    <div class = "m-5">
        <br>
        <h2>Change Role {{$user->id}} - {{$user->firstname}}</h2>
        <br>

        @if ($errors->any())
                    <div class = "alert alert-danger">
                        <ul class = "mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
         @endif


        <form action="{{route('updateRole', $user->id)}}" method = "POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')


            <div>

                <label for="role" id="roleLabel">Role: </label>
                <select name="role" id="role">
                    <option value="" selected disabled></option>
                    <option value="Admin" @if(old('role') == 'Admin') selected @endif>Admin</option>
                    <option value="User" @if(old('role') == 'User') selected @endif>User</option>
                </select>
            </div>

             <br>

            <button class ="submit bg-warning">Save</button>
        </form>
        
    </div>
</div>

@endsection

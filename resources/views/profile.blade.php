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


        <form action="{{route('updateProfile')}}" method = "POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div>
                <label for="firstname" id ="firstnameLabel">First Name:</label>
                <input type="text" id ="firstnameField" value = "{{old('firstname') ?? $user->firstname }}" name ="firstname" style = "margin-right: 5vw;">

                <label for="lastname" id ="lastnameLabel">Last Name:</label>
                <input type="text" id ="lastnameField" value = "{{old('lastname') ?? $user->lastname }}" name ="lastname">

            </div>

            <br>

            <div>
                <label for="email" id ="emailLabel">Email:</label>
                <input type="text" id ="emailLabel" name ="email" value = "{{old('email') ?? $user->email }}" style = "margin-right: 7vw;">

                <label for="role" id="roleLabel">Role: </label>
                <select name="role" id="role">
                    <option value="" selected disabled></option>
                    <option value="Admin" @if(old('role', $user->role) == 'Admin') selected @endif>Admin</option>
                    <option value="User" @if(old('role', $user->role) == 'User') selected @endif>User</option>
                </select>
            </div>

            <br>

            <div>
                <label>Gender</label>
                
                    <input class = "form-check-input" type="radio" name = "gender" 
                    id="M" value = "M" @if(old('gender', $user->gender) == "M") checked @endif> 
                    <label class = "form-check-label" for="Male">Male</label>
                
                    <input class = "form-check-input" type="radio" name = "gender" 
                    id="F" value = "F" @if(old('gender', $user->gender) == "F") checked @endif>
                    <label class = "form-check-label" for="Female" style = "margin-right: 10vw;">Female</label>
    
                <label for="displaypicture">Display Picture:</label>
                <input type="file" name="displaypicture" id="displaypicture" accept="image/*">
            </div>

            <br>

            <div>
                <label for="password" id ="passwordLabel">Password:</label>
                <input type="password" id ="passwordField" name ="password" value = "{{old('password') ?? $user->password }}" style = "margin-right: 6vw;">

                <label for="password_confirmation" id ="password_confirmationLabel">Confirm Password:</label>
                <input type="password" id ="password_confirmationField" value = "{{old('password_confirmation') ?? $user->password_confirmation }}" name ="password_confirmation">
            </div>

            <br>

            <button class ="submit bg-warning">Save</button>
        </form>
        
    </div>
</div>

@endsection

@extends ('template.template')
@section('Title', 'Login Page')
@section('Style')
<link rel="stylesheet" href="{{asset('css/loginPage.css')}}">
@endsection

@section('Content')

<div class = "d-flex justify-content-center bg-success" style = "width: 100%">
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">

            
                <a class="navbar-brand" href="/"><h1>Amazing E-Grocery</h1></a>

        
            
        </div>
    </nav>
</div>

<div class = "tampilanUtama">

<div class = "m-5">
        <br>
        <h3>Login</h3>
        <br>

        @if (session()->has('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session()->get('error') }}
                </div>
        @endif

        <form action="{{route('login')}}" method = "POST">
            @csrf

            <div>
                <label for="email" id ="emailLabel">Email Address:</label>
                <input type="text" id ="emailField" name ="email">
            </div>

            <br>

            <div>
                <label for="password" id ="passwordLabel">Password:</label>
                <input type="password" id ="passwordField" name ="password">
            </div>

            <br>

            <button class ="submit bg-warning">Submit</button>
        </form>
        

        <br>
        <br>

        <a href="{{route('registerPage')}}">Don't have an account? click here to sign up</a>
</div>
    

</div>

@endsection

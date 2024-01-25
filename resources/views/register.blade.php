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

<div class ="tampilanUtama">
    <div class = "m-5">
        <br>
        <h3>{{__('form.judul')}}</h3>
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

        <form action="{{route('registerUser')}}" method = "POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="firstname">{{__('form.input.firstname')}}</label>
                <input type="text" name = "firstname" value = "{{old('firstname')}}">

                <label for="lastname">{{__('form.input.lastname')}}</label>
                <input type="text" name = "lastname" value = "{{old('lastname')}}">
            </div>

            <br>

            <div>
                <label for="email">{{__('form.input.email')}}</label>
                <input type="text" name = "email" value = "{{old('email')}}">

                <label for="role">{{__('form.input.role')}}</label>
                <select name="role" id="role">
                    <option value="" selected disabled></option>
                    <option value="Admin" @if(old('role') == 'Admin') selected @endif>Admin</option>
                    <option value="User" @if(old('role') == 'User') selected @endif>User</option>
                </select>
            </div>

            <br>

            <div>
                <label for="gender">{{__('form.input.gender')}}</label>

                <input class = "form-check-input" type="radio" name = "gender" value = "M" @if(old('gender') == "M") checked @endif>
                <label for="Male">{{__('form.input.gender_option.Male')}}</label>

                <input class = "form-check-input" type="radio" name = "gender" value = "F" @if(old('gender') == "F") checked @endif>
                <label for="Female">{{__('form.input.gender_option.Female')}}</label>

                <label for="displaypicture">{{__('form.input.displaypicture')}}</label>
                <input type="file" name= "displaypicture" accept = "image/*">
            </div>

            <br>

            <div>
                <label for="password">{{__('form.input.password')}}</label>
                <input type="password" name = "password" value = "{{old('password')}}">

                <label for="password_confirmation">{{__('form.input.password_confirmation')}}</label>
                <input type="password" name = "password_confirmation" value = "{{old('password_confirmation')}}">
            </div>

            <br>

            <button class = "submit bg-warning">Submit</button>

        </form>

        <br>
        <br>

        <a href="{{route('loginPage')}}">Already have an account? Click here to log in</a>
    </div>
</div>

@endsection

@extends ('template.template')
@section ('Title', 'Dashboard')
@section ('Style')
<link rel="stylesheet" href="{{asset('css/account.css')}}">
@endsection

@section ('Content')

<div class = "d-flex justify-content-center bg-success" style = "width: 100%">
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">

            
                <a class="navbar-brand" href="/"><h1>Amazing E-Grocery</h1></a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
        
            
            <div class="collapse navbar-collapse bg-warning" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                    <a class="nav-link" href="{{route('logout')}}">Logout</a>
                    </li>
                </ul>
            </div>
            
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

                <li class = "nav-item" style = "padding-right: 50px;">
                    <a href="{{route('profile')}}">Profile</a>
                </li>

                <li class = "nav-item">
                    <a href="{{route('accountPage')}}">Account Maintenance</a>
                </li>
            </ul>
        </div>
    </nav>
</div>



<div class = "tampilanUtama">
    
    <div class = "mainContainer">

    <table class="table">
        <thead>
            <tr>
            <th scope="col">Account</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach($users as $u)
             <tr>
                <th scope ="row">Account {{$u->id}} - {{$u->role}}</th>
                <td colspan="2">

                    <div class = "d-flex flex-row justify-content-evenly align-items-center">

                        <div>
                            <a href="{{route('updateRolePage', $u->id)}}">
                                Update Role
                            </a>
                        </div>
                        
                        <div>
                            <form action="{{route('removeAccount', $u->id)}}" method = "POST">
                                @csrf
                                @method('DELETE')
                                <button type = "submit" class = "btn btn-danger mb-2">Delete</button>
                            </form>
                        </div>
                    </div>
                    
                    

                </td>
             </tr>
           @endforeach

            
        </tbody>
    </table>
        


    </div>

</div>

@endsection
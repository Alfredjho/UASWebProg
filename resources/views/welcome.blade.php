@extends ('template.template')
@section('Title', 'Landing Page')
@section('Style')
<link rel="stylesheet" href="{{asset('css/landingPage.css')}}">
@endsection

@section('Content')

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
                    <a class="nav-link" href="{{route('registerPage')}}">Register</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="{{route('loginPage')}}">Login</a>
                    </li>
                </ul>
            </div>
            
        </div>
    </nav>
</div>

<div class = "tampilanUtama d-flex justify-content-center align-items-center">
     <img src="{{asset('img/mainContent.png')}}" alt="" style = "width: 35vw;">
</div>


@endsection

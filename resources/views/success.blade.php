@extends ('template.template')
@section ('Title', 'Success')
@section ('Style')
<link rel="stylesheet" href="{{asset('css/success.css')}}">
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


<div class = "tampilanUtama">
    
    <div class = "mainContainer">

        <h2>Success!</h2>
        <br>
        <p>We will contact you 1x24 hours.</p>

        <a href="{{route('dashboardAdmin')}}">
            <p>Click here to "Home"</p>
        </a>
       
    </div>

</div>

@endsection
@extends ('template.template')
@section ('Title', 'Dashboard')
@section ('Style')
<link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
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

                <li class = "nav-item">
                    <a href="{{route('profile')}}">Profile</a>
                </li>
            </ul>
        </div>
    </nav>
</div>



<div class = "tampilanUtama">
    
    <div class = "mainContainer">

        @forelse($vegetable as $v)
        <div class="cardContainer">
            <img src="{{asset($v->image)}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{$v->name}}</h5>
                <a href="{{route('detail', $v->id)}}">Detail</a>
            </div>
         </div>

        @empty
        <p>No product yet</p>

        @endforelse

        


    </div>

</div>

@endsection
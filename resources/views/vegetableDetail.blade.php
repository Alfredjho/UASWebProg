@extends ('template.template')
@section('Title', 'Detail')
@section('Style')
<link rel="stylesheet" href="{{asset('css/detail.css')}}">
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

    <div class = "detailContainer">
        <div class = "kiri">
            <h2>{{$vegetable -> name}}</h2>
            <img src="{{asset($vegetable -> image)}}" alt="" style ="width: 250px;">
        </div>

        <div class = "kanan">
            <h2>Rp. {{$vegetable-> price}} ,-</h2>

            {{$vegetable -> info}}
            <br>
            <br>
            
            <!-- ini nanti diinsert ke cart -->
            <form action="{{route('addCart', $vegetable->id)}}" method = "POST">
                @csrf
                <button class = "btn-submit bg-warning">Buy</button>
            </form>

        </div>
    </div>

</div>



@endsection
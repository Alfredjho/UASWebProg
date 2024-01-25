@extends('template.template')
@section('Title', 'Cart')
@section('Style')
<link rel="stylesheet" href="{{asset('css/cart.css')}}">
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
    <div class = "cartContainer">
        <h1>Cart</h1>

        <br>

        <div class = "cartItems">
            @foreach($cart as $cartItem)
                <div class = "info">

                    <img src="{{asset($cartItem->vegetable->image)}}" alt="">
                    <p>{{ $cartItem->vegetable->name }}</p>
                    <p>Rp. {{ $cartItem->vegetable->price }},-</p>
                    <!-- Tambahkan informasi lain yang diperlukan -->

                    <form action="{{route('remove', $cartItem->vegetable->id)}}" method = "POST">
                        @csrf
                        @method('DELETE')
                        <button type = "submit" class = "btn btn-danger mb-2">Delete</button>
                    </form>

                </div>

            @endforeach
        </div>
        <br>

        <h3>Total: Rp. {{$totalPrice}},-</h3>

        <form action="{{route('checkOut')}}" method = "POST">
            @csrf
            @method('DELETE')
            <button type = "submit" class = "btn btn-warning mb-2">Check Out</button>
        </form>

    </div>
    
</div>


@endsection
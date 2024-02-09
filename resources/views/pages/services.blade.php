@extends('layouts.app')

@section('title')
    Services
@endsection

@section('content')

        @if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
                {{Session::put('success', null)}}
            </div>
        @endif

        <h1>Welcome to the services page</h1>
        @foreach ($products as $product)
            <div class="well">
                <h2><a href="/show/{{$product->id}}">{{$product->product_name}}</a></h2>
                <h3><strong>${{$product->product_price}}</strong></h3>
                {{-- <p>{{$product->product_description}}</p> --}}
                <hr>
                {{-- <h4>{{$product->created_at}}</h4> --}}
            </div>
        @endforeach

        {{$products->links()}}

@endsection


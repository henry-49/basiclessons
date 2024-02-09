@extends('layouts.app')

@section('title')
    Show
@endsection

@section('content')

        <h1>Welcome to the show page</h1>
        <h2>Product details</h2>
            <div class="well">
                <h2>{{$product->product_name}}</h2>
                <h4>${{$product->product_price}}</h4>
                <p>{{$product->product_description}}</p>
                <hr>
                <h4>Created at: {{$product->created_at}}</h4>
                <hr>
                <a href="/edit/{{$product->id}}" class="btn btn-default">Edit</a>
                <a href="/delete/{{$product->id}}" class="btn btn-danger">Delete</a>
            </div>


@endsection

@extends('layouts.app')

@section('title')
    Create product
@endsection

@section('content')
    @if(Session::has('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
            {{Session::put('success', null)}}
        </div>
    @endif

        <h1>Welcome to the create product page</h1>

            <div class="well">

                {{-- <form method="POST" action="{{url('/saveproduct')}}" class="form-horizontal"> --}}


                {{-- {{!! Form::open(['action' => 'PagesController', 'put' => '/saveproduct', 'method' => 'POST', 'class' => 'form-horizontal']) !!}} --}}
                {{ html()->form('POST', '/updateproduct')->open() }}
                   {{--  @csrf --}}

                    {{csrf_field()}}

                  <div class="form-group">

                    {{Form::hidden('id', $product->id)}}

                       {{--  <label for="">Product Name</label> --}}
                        {{Form::label('', 'Product Name')}}
                       {{--  {{Form::text('product_name', ['placeholder' => 'Product Name', 'class' => 'form-control'])}} --}}
                       {{ html()->text('product_name', $product->product_name)->class('form-control')->placeholder('Product Name') }}

                        {{-- <input type="text" name="product_name" id="product_name"
                                placeholder="Product Name" class="form-control" required /> --}}
                    </div>
                    <div class="form-group">
                        {{Form::label('', 'Product Price')}}
                       {{--  {{Form::text('product_price', ['placeholder' => 'Product Price', 'class' => 'form-control'])}} --}}
                       {{ html()->text('product_price', $product->product_price)->class('form-control')->placeholder('Product Price') }}

                        {{-- <label for="">Product Price</label> --}}
                       {{--  <input type="text" name="product_price" id="product_price"
                                placeholder="Product Price" class="form-control" required /> --}}
                    </div>
                    <div class="form-group">
                        {{Form::label('', 'Product Description')}}
                        {{-- {{Form::textarea('product_description', ['placeholder' => 'Product Description', 'class' => 'form-control'])}} --}}
                        {{ html()->textarea('product_description', $product->product_description)->class('form-control')->placeholder('Product Description') }}

                       {{--  <label for="">Product Description</label> --}}
                       {{--  <textarea name="product_description" cols="30" rows="3" class="form-control"></textarea> --}}
                    </div>

                    {{-- <input type="submit" value="Add Product"  class="btn btn-primary"/> --}}
                     {{Form::submit('Update Product', ['class' => 'btn btn-primary'])}}
                    {{ html()->form()->close() }}
                     {{-- {{!! Form::close() !!}} --}}
                {{-- </form> --}}
            </div>


@endsection

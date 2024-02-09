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
                {{ html()->form('PUT', "/products/{$product->id}")->open() }}
                   {{--  @csrf --}}

                    {{csrf_field()}}

                  <div class="form-group">
                        {{Form::label('', 'Product Name')}}
                       {{ html()->text('product_name', $product->product_name)->class('form-control')->placeholder('Product Name') }}
                    </div>

                    <div class="form-group">
                        {{Form::label('', 'Product Price')}}
                       {{ html()->text('product_price', $product->product_price)->class('form-control')->placeholder('Product Price') }}
                    </div>

                    <div class="form-group">
                        {{Form::label('', 'Product Description')}}
                        {{ html()->textarea('product_description', $product->product_description)->class('form-control')->placeholder('Product Description') }}
                       {{--  {{Form::hidden('_method', 'PUT')}} --}}
                    </div>


                     {{Form::submit('Update Product', ['class' => 'btn btn-primary'])}}
                {{ html()->form()->close() }}
            </div>


@endsection

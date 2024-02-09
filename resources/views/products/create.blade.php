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

                {{ html()->form('POST', '/products')->attribute('enctype', 'multipart/form-data')->open() }}
                   {{--  @csrf --}}

                    {{csrf_field()}}

                   <div class="form-group">
                        {{Form::label('', 'Product Name')}}
                       {{ html()->text('product_name')->class('form-control')->placeholder('Product Name') }}
                    </div>

                    <div class="form-group">
                        {{Form::label('', 'Product Price')}}
                       {{ html()->text('product_price')->class('form-control')->placeholder('Product Price') }}
                    </div>

                     <div class="form-group">
                        {{Form::label('', 'Product Image')}}
                        {{ html()->file('product_image')->class('form-control') }}
                    </div>

                    <div class="form-group">
                        {{Form::label('', 'Product Description')}}
                        {{ html()->textarea('product_description')->class('form-control')->placeholder('Product Description') }}
                    </div>

                     {{Form::submit('Add Product', ['class' => 'btn btn-primary'])}}
                {{ html()->form()->close() }}
            </div>


@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if($errors->any())

                    <div class="alert alert-success" role="alert">
                        {{ $errors->first() }}
                    </div>
                    @endif

                    <div>
                        <a class="btn btn-danger" id="deleteAllSelected" href="#" onclick="return confirm('Are you sure? you want to delete these products?')">
                            Delete Selected
                        </a>
                        <a class="float-right pull-right" href="{{route('createProduct')}}">
                        <button type="button" class="btn btn-primary">
                            Add Product
                        </button>
                        </a>


                    </div>
                    <br>
                    <div>
                        <table class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col"><input type="checkbox" name="check" id="checkAll"> Select</th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">UPC</th>
                                <th scope="col">Status</th>
                                <th scope="col">Image</th>
                                <th scope="col">Action</th>

                            </tr>
                            </thead>
                            <tbody>
                                @if ($products)

                                @foreach ($products as $product)

                                <tr  id="pid{{$product->id}}">
                                    <th scope="row"><input class="checkboxSelect" type="checkbox" value="{{$product->id}}" name="id" id=""></th>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->price.' '.'RM'}}</td>
                                    <td>{{$product->universal_product_code}}</td>
                                    <td>{{$product->status == 1 ? 'In Stock' : "Out of Stock"}}</td>
                                    <td><img width="50" src="/images/{{$product->image}}" alt=""></td>
                                    <td>
                                        <a href="/product/delete/{{$product->id}}" onclick="return confirm('Are you sure? you want to delete this product?')">
                                            <button class="btn btn-danger" id="delete" data-id="{{$product->id}}">Delete</button>
                                        </a>
                                        <a href="/product/edit/{{$product->id}}">
                                            <button class="btn btn-info">Edit</button>
                                        </a>
                                        </td>
                                </tr>

                                @endforeach


                                @endif
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


@endsection

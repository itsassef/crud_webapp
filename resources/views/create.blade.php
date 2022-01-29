@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ !empty($product->name) ? $product->name : 'Add Product' }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <br>
                    <div>
                        <div class="container">
                            <form enctype='multipart/form-data' action="{{route('addProduct')}}" method="post">
                                @csrf
                                @if (!empty($product))
                                    <input type="hidden" name="id" value="{{$product->id}}">
                                @endif
                                <div class="form-row">
                                <div class="form-group">
                                    <label for="inputName">Product Name</label>
                                    <input type="text" name="name" class="form-control" id="inputName" placeholder="Product name..." value="{{!empty($product) ? $product->name : ''}}">
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="inputPrice">Price</label>
                                        <input type="number"  value="{{!empty($product) ? $product->price : ''}}" name="price" class="form-control" id="inputPrice" placeholder="Price">
                                      </div>
                                      <div class="form-group col-md-6">
                                        <label for="inputPassword4">UPC</label>
                                        <input  value="{{!empty($product) ? $product->universal_product_code : ''}}" name="universal_product_code" type="text"  style="text-transform: uppercase" class="form-control" id="inputUpc" placeholder="Product Code">
                                      </div>
                                </div>

                                </div>

                                <div class="form-row">

                                  <div class="form-group col-md-6">
                                    <label for="inputState">Status</label>
                                    <select  value="{{!empty($product) ? $product->status : ''}}" id="inputStatus" name="status" class="form-control">
                                      <option value="1" selected>In Stock</option>
                                      <option {{!empty($product) && $product->status == 0 ? 'selected' : ''}} value="0">Out of Stock</option>
                                    </select>
                                  </div>
                                  <div class="form-group col-md-6">
                                    <label for="imageFile">Image</label>
                                    @if(!empty($product->image))
                                    <div>
                                        <img style="max-width: 200px;" src="/images/{{!empty($product) ? $product->image : ''}}" alt="">
                                    </div><br>
                                    @endif
                                    <input type="file" name="image"  value="{{!empty($product) ? $product->image : ''}}" class="form-control-file" id="imageFile" accept="image/*">
                                  </div>
                                  <br>
                                  <div class="form-group col-md-6">
                                    <input type="submit" class="form-control btn btn-primary" id="submit">
                                  </div>
                                </div>

                              </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Modal body text goes here.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary">Save changes</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
@endsection

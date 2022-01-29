<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
    //Show the add products page
    public function create(){
        return view('create');
    }

    //Show the edit products page
    public function edit($product){
        $product = Product::find($product);
        return view('create', compact('product'));
    }

    //Store the product (add/update)
    public function store(Request $request){

        $data = $request->except(['image', '_token']);
        $image = $request->image;
        $message = '';

        if(!isset($data['id'])) {
            if($image) {
                $ImgName = $image->getClientOriginalName();
                $image->move('images', $ImgName);
                $data['image'] = $ImgName;
            }

            $data['user_id'] = \Auth::id();
            $message = "The product has been added";
            Product::create($data);
        } else {

            if($image) {
                $ImgName = $image->getClientOriginalName();
                $image->move('images', $ImgName);
                $data['image'] = $ImgName;
            }

            Product::where('id', $data['id'])->update($data);
            $message = "The product has been updated";
        }


        return redirect('home')->withErrors(['msg' => $message]);
    }

    //Delete product
    public function delete($product){

        $product = Product::find($product);
        $product->delete();
        $message = 'Product has been deleted successfully';

        return redirect('home')->withErrors(['msg' => $message]);
    }

    //Delete multiple
    public function deleteMultiple(Request $request){

        $products = Product::whereIn('id', $request->all_selected);
        $products->delete();
        $message = 'Selected Products have been deleted successfully';

        return response()->json(['success' => $message]);
    }

}

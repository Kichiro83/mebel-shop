<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Cart;
use App\Order;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use File;
use Storage;
use App\User;

class ProductController extends Controller
{
    public function getIndex(){
        $products = Product::all();
        return view('shop.index',['products' => $products]);
    }
    public function getAddToCart($id, Request $request){
        $product = Product::find($id);
        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);
        return redirect()->back();
    }
    public function getReduceByOne($id){
        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);
        if (count($cart->items)>0){
            Session::put('cart',$cart);
        }
        else{
            Session::forget('cart');
        }
        return redirect()->route('product.shoppingCart');
    }
    public function getRemoveItem($id){
        $oldCart = Session::has('cart')? Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if (count($cart->items)>0){
            Session::put('cart',$cart);
        }
        else{
            Session::forget('cart');
        }
        return redirect()->route('product.shoppingCart');
    }
    public function getCart(){
        if(!Session::has('cart')){
            return view('shop.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('shop.shopping-cart',['products'=>$cart->items, 'totalPrice' => $cart -> totalPrice]);
    }
    public function getCheckout(){
        if(!Session::has('cart')){
            return view('shop.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;
        $order = new Order();
        $order->cart = serialize($cart);
        Auth::user()->orders()->save($order);
        Session::forget('cart');
        return view('shop.checkout',['total'=>$total]);
    }
    public function addProductForm(){
        return view('products.add-product');
    }
    public function getAll(){
//        $products = Product::all()
        $products = Product::paginate(9);      
        return view('products.products',['products'=>$products]);
    }
    public function addProduct(Request $request) {
        if($request->method() == "POST") {
            $this->validate($request,[
                'title' => 'required',
                'description' => 'required',
                'price' => 'required| integer'
            ],[
                'title.required'=>'Поле Название не должно быть пустым',
                'description.required'=>'Поле Описание не должно быть пустым',
                'price.required'=>'Поле цена не должно быть пустым',
            ]);//
            $file = $request->file('foto');
            $extention =$file->extension();
            $newfile = rand(0, 100).'.'.$extention;
            if($newfile){
                 Storage::disk('public')->put('images/'.$newfile,  File::get($file));
            }
            Product::create(['title' => $request->title,
                'description' => $request->description,
                'price' => $request->price,
                'imagePath' => $newfile,
                'categories_id'=> $request->categories]);
            return redirect()->route('adminProducts');
        }
        return view('products.add-product');
    }
    public function editProduct($id, Request $request){
        if($request->method() == "POST"){
            $this->validate($request,[
                'title' => 'required',
                'description' => 'required',
                'price' => 'required| integer'
            ],[
                'title.required'=>'Поле Название не должно быть пустым',
                'description.required'=>'Поле Описание не должно быть пустым',
                'price.required'=>'Поле цена не должно быть пустым',
            ]);
            $file = $request->file('foto');
            $extention =$file->extension();
            $newfile = rand(0, 100).'.'.$extention;
            if($newfile){
                 Storage::disk('public')->put('/storage/images/'.$newfile,  File::get($file));
            }
            Product::find($id)->update(['title' => $request->title,
                'description' => $request->description,
                'price' => $request->price,
                'imagePath' => $newfile,
                'categories_id'=> $request->categories]);
            return redirect()->route('adminProducts');
        }
        $product = Product::find($id);
        return view('products.edit-product',['product'=>$product]);
    }

    public function deleteProduct($id){
        Product::destroy($id);
        return redirect()->route('adminProducts');
    }
    public function categoryProfile($categories_id){
        $products = Product::where('categories_id' , '=', $categories_id)
                        ->get();
        return view('categories.profile',['products'=>$products]);
    }







}

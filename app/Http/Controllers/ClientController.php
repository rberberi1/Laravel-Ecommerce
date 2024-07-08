<?php

namespace App\Http\Controllers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;
use App\Models\ShippingInfo;
use App\Models\Order;


class ClientController extends Controller
{
    public function CategoryPage($id){
        $category=Category::findOrFail($id);
        $products=Product::where('product_category_id', $id)->latest()->get();
        return view('user_template.layouts.category', compact('category', 'products'));
    }

    public function SingleProduct($id){
        $product=Product::findOrFail($id);
        $subcategory_id=Product::where('id', $id)->value('product_subcategory_id');
        $relatedproducts=Product::where('product_subcategory_id', $subcategory_id)->latest()->get();
        return view('user_template.layouts.product', compact('product', 'relatedproducts'));
    }

    public function AddToCart(){
        $userid=Auth::id();
        $cart_items = Cart::where('user_id', $userid)->get();
        return view('user_template.layouts.addtocart', compact('cart_items'));
    }

    public function AddProductToCart(Request $request){

        $request->validate([
            'quantity' => 'required|integer|min:1',
            'product_id' => 'required|integer|exists:products,id',
            'price' => 'required|numeric',
        ]);

        $product_price=$request->price;
        $quantity=$request->quantity;
        $price=$product_price * $quantity;
        Cart::insert([
            'product_id'=> $request->product_id,
            'user_id'=>Auth::id(),
            'quantity'=>$request->quantity,
            'price'=>$price,
        ]);

        return redirect()->route('addtocart')->with('message', 'Item added to cart successfully!');
    }

    public function RemoveCartItem($id){
        Cart::findOrFail($id)->delete();
        return redirect()->route('addtocart')->with('message', 'Item removed from cart!');
    }

    public function GetShippingAddress(){
        return view('user_template.layouts.shippingaddress');
    }

    public function AddShippingAddress(Request $request){

        $request->validate([
            'phone_number' => 'required',
            'city' => 'required',
            'postal_code' => 'required',
        ]);

        ShippingInfo::insert([
            'user_id' =>Auth::id(),
            'phone_number'=>$request->phone_number,
            'city'=>$request->city,
            'postal_code'=>$request->postal_code,
        ]);

        return redirect()->route('checkout');
    }

    public function Checkout(){
        $userid=Auth::id();
        $cart_items = Cart::where('user_id', $userid)->get();
        $shipping_address=ShippingInfo::where('user_id', $userid)->first();
        return view('user_template.layouts.checkout', compact('cart_items', 'shipping_address'));
    }

    public function PlaceOrder(){
        $userid=Auth::id();
        $shipping_address=ShippingInfo::where('user_id', $userid)->first();
        $cart_items = Cart::where('user_id', $userid)->get();

        foreach($cart_items as $item){
            Order::insert([
                'userid'=> $userid,
                'shipping_phone'=>$shipping_address->phone_number,
                'shipping_city'=>$shipping_address->city,
                'shipping_postalcode'=>$shipping_address->postal_code,
                'product_id'=>$item->product_id,
                'quantity'=>$item->quantity,
                'total_price'=>$item->price,
            ]);
            $id=$item->id;
            Cart::findOrFail($id)->delete();
        }
        ShippingInfo::where('user_id', $userid)->first()->delete();

        return redirect()->route('pendingorders')->with('message', 'Your Order Has Been Placed!');
    }

    public function UserProfile(){
        return view('user_template.layouts.userprofile');
    }

    public function PendingOrders(){
        $userid=Auth::id();
        $pending_orders=Order::where('userid', $userid)->where('status', 'pending')->latest()->get();
        return view('user_template.layouts.pendingorders', compact('pending_orders'));
    }

    public function History(){
        return view('user_template.layouts.history');
    }

    public function NewRelease(){
        return view('user_template.layouts.newrelease');
    }

    public function TodaysDeal(){
        return view('user_template.layouts.todaysdeal');
    }

    public function CustomerService(){
        return view('user_template.layouts.customerservice');
    }


    public function Logout(Request $request): RedirectResponse
    {
        Auth::logout();
     
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect('/');
    }
}

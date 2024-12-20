<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Darryldecode\Cart\Facades\CartFacade as Cart;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        Cart::add([
            'id' => $request->id, 
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => 1, 
            'attributes' => [
                'description' => $request->description ?? null,
                'discount' => (int) ($request->discount ?? 0),
                'image' => $request->image ?? null,
            ], 
        ]);

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function viewCart()
    {
        $cartItems = Cart::getContent();
        $discount = 0;
        $deliveryFee = 150;
        $GST = 10;

        foreach ($cartItems as $item) {
            $discount += ($item->attributes->discount * $item->quantity);
        }
        $cartTotal = Cart::getTotal() - $discount ;
        // dd($cartItems);
        return view('cart', compact('cartItems', 'cartTotal', 'deliveryFee', 'GST'));
    }
    public function removeFromCart(Request $request)
    {

        Cart::remove($request->id);

        return redirect()->back()->with('success', 'Product removed from cart successfully!');
    }


    public function clearCart()
    {
        
        Cart::clear();

        return redirect()->back()->with('success', 'Cart cleared successfully!');
    }
    public function saveCartToDatabase()
    {
        if (auth()->check()) {
            Cart::store(auth()->id());
            return redirect()->back()->with('success', 'Cart saved to your account!');
        }

        return redirect()->back()->with('error', 'You need to log in to save the cart!');
    }

    
    public function restoreCartFromDatabase()
    {
        if (auth()->check()) {
            Cart::restore(auth()->id());
            return redirect()->back()->with('success', 'Cart restored from your account!');
        }

        return redirect()->back()->with('error', 'You need to log in to restore the cart!');
    }

    public function updateQuantity(Request $request)
{
    $cartItem = Cart::get($request->id);

    if ($cartItem) {
        $newQuantity = max(1, (int) $request->quantity);
        Cart::update($request->id, [
            'quantity' => [
                'relative' => false,
                'value' => $newQuantity,
            ],
        ]);
    }

    return redirect()->back();
}


}

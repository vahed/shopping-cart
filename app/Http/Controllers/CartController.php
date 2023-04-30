<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Http\Repository\ProductRepository;
use Inertia\Inertia;
use Redirect;

class CartController extends Cart
{
    public function index()
    {
        $cartItems = Cart::content();

        return Inertia::render('Products/Cart', [
            'cartItems' => $cartItems
        ]);
    }

    // public function index(CartService $cartService) {
    //     return Inertia::render('Cart/Index', [
    //         'cartItems' => $cartService->setCartValues()->get('cartItems'),
    //         'cartTaxRate' => $cartService->setCartValues()->get('cartTaxRate'),
    //         'cartSubtotal' => $cartService->setCartValues()->get('cartSubtotal'),
    //         'newTax' => $cartService->setCartValues()->get('newTax'),
    //         'code' =>$cartService->setCartValues()->get('code'),
    //         'discount' => $cartService->setCartValues()->get('discount'),
    //         'newSubtotal' => $cartService->setCartValues()->get('newSubtotal'),
    //         'newTotal' => $cartService->setCartValues()->get('newTotal'),
    //         'laterItems' =>$cartService->setCartValues()->get('laterItems'),
    //         'laterCount' => $cartService->setCartValues()->get('laterCount'),
    //     ]);
    // }

    public function store(Request $request)
    {
        $cartItems = Cart::content();

        // foreach($cartItems as $key => $items ) {

        //     if ($items->id === $request->id){
        //         Cart::instance()->update(
        //             $items->rowId, $request->quantity
        //         );
        //     }
        // }
        //dd($request->description);
        /* need to get total quantity sorted */
        $cartItems = Cart::instance('default')->add(
            $request->id,
            $request->name,
            $request->quantity,
            $request->price,
            $request->featureId,
            [
                'product_code' => $request->id,
                'quantity'=> $request->quantity,
                'totalQty' => $request->totalQuantity,
                'color' => $request->color,
                'size' => $request->size,
                //'image' => $request->image,
                //'slug' => $request->slug,
                'description' => $request->description
            ]
        )->associate('App\Models\Product');

        return redirect()->route('cart.index');
    }

    // public function cart()
    // {
    //     $cartCollection = Cart::getContent();
    //     return redirect()->route('cart.index')->with('success_msg', 'Item is removed');
    // }

    // public function add(Request $request)
    // {
    //     Cart::add(array(
    //        'id' => $request->id,
    //         'name' => $request->name,
    //         'price' => $request->price,
    //         'quantity' => $request->quantity,
    //         'attributes' => array(
    //             'image' => $request->img,
    //             'slug' => $request->slug
    //         )
    //     ));

    //     return redirect()->route('cart.index')->with('success_msg', 'Item is added');
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        
        // Cart::instance()->update($id, $request->price);
        // return back();
    }

    public function incrementItem(ProductRepository $productRepository, Request $request, $id) {

        $totalQuantity = $productRepository->getQuantity($request);

        if($request->qty >= $totalQuantity){
            return back()->with('error', "Maximum available quantity is $totalQuantity");
        }

        $request->qty++;
        
        Cart::instance()->update($id, $request->qty);

        return redirect()->route('cart.index');
    }

    public function decrementItem(Request $request, $id) {
        $request->qty--;
        Cart::instance()->update($id, $request->qty);

        return redirect()->route('cart.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id) {
        Cart::remove($id, $request->id);

        return redirect()->route('cart.index');
    }
}

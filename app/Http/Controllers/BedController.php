<?php

namespace App\Http\Controllers;
use Cart;
use Stripe\Stripe;
use App\Models\Bed;
use Illuminate\Http\Request;
use Laravel\Cashier\Cashier;

class BedController extends Controller
{
    public function index() {
        $beds = Bed::get();

        return view('Beds', ['beds'=>$beds]);
        
    }
    public function removealldata(){
        Bed::truncate();
    }

    public function addtocart(Request $request) {
        $bed = Bed::find($request->id);
        $i =0;
        $productOnCart=\Cart::add($bed->id, $bed->name, $bed->quantity, $bed->price, ['image'=>$bed->image]);

        return back()->with('cartItem','cart item added to cart successfuly');
        
    }

    public function get(){
        $pr=Cart::content();
        
       $subtotal= str_replace(',', '', Cart::subtotal());
        $tax = str_replace(',', '', Cart::tax());
        $total= str_replace(',', '',Cart::total());
        session()->flash('totalamount', $total);
        return view('Cart', ['items'=>$pr, 'total'=>$total, 'tax'=> $tax, 'subtotal'=>$subtotal]);
    }

    public function destroy() {
        Cart::destroy();

    }
    public function deleteCartItem($rowId){       
        Cart::remove($rowId);
        return redirect()->route('get');  
    }

    public function update(Request $request){
        Cart::update($request->rowId, $request->quantity);
        return back()->with('cartItemUpdated','cart item updated');
        
    }
    
}

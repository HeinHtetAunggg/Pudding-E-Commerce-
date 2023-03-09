<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Pudding;
use Illuminate\Http\Request;

class PuddingController extends Controller
{
    public function intro()
    {
        return view('puddings.welcome',[
            'randomPuddings'=>Pudding::inRandomOrder()->take(4)->get()
        ]);
    }


    public function index()
    {
        return view('puddings.index',[
            'puddings'=>Pudding::latest()
                                 ->filter(request(['search','category']))
                                ->paginate(3)
                                ->withQueryString(),
        ]);
    }

    // public function addToCart(Request $request)
    // {
    //     $puddingid=$request->input('pudding_id');
    //     $quantity=$request->input('quantity');

    //     $pudding=Pudding::find($puddingid);

    //     $cart=session()->get('cart');

    //     if(isset($cart[$puddingid])){
    //         $cart[$puddingid]['quantity'] +=$quantity;
    //     }else{
    //         $cart[$puddingid]=[
    //             'name'=>$pudding->name,
    //             'price'=>$pudding->price,
    //             'quantity'=>$quantity,
    //             'image'=>$pudding->image

    //         ];
    //     }
    //     session()->put('cart',$cart);
    //     return redirect()->back()->with('success','Product Added To Cart');
    // }

    public function cart()
    {
        return view ('cart');
    }

    public function addToCart($id)
    {
        $pudding=Pudding::findOrFail($id);
        $cart=session()->get('cart',[]);

        if(isset($cart[$id])){
            $cart[$id]['quantity']++;
        }else{
            $cart[$id]=[
                'name'=>$pudding->name,
                'image'=>$pudding->image,
                'price'=>$pudding->price,
                'quantity'=>1
            ];
        }
        session()->put('cart',$cart);
        return redirect()->back()->with('success',"Pudding Add To Cart Successfully!");
    }

    public function update(Request $request)
    {
       if($request->id && $request->quantity){
        $cart=session()->get('cart');
        $cart[$request->id]["quantity"]= $request->quantity;
        session()->put('cart',$cart);
        session()->flash('success','Cart Successfully Update!');

       }
    }

    public function remove(Request $request)
    {
        if($request->id){
            $cart=session()->get('cart');
            if(isset($cart[$request->id])){
                unset($cart[$request->id]);
                session()->put('cart',$cart);
            }
            session()->flash('success','Product Successfully Removed!');
        }
    }
}

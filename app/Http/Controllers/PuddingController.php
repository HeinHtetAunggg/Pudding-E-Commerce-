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
}

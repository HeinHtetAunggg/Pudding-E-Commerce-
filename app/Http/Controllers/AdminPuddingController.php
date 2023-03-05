<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Pudding;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminPuddingController extends Controller
{
    public function create()
    {

        return view('menu.create',[
            'categories'=>Category::all(),
        ]);
    }
 
    public function store()
    {
        $formData=request()->validate([
            'name'=>['required'],
            'slug'=>['required',Rule::unique('puddings','slug')],
           'price'=>['required','numeric','min:0','max:100000000'],
           'quantity'=>['required','integer','min:1','max:100000000'],
           'body'=>['required'],
           'category_id'=>['required',Rule::exists('categories','id')],
        ]);
        if(request()->hasFile('image'))
        {
            $formData['image']=request()->file('image')->store('thumbnails');
        }else{
            $formData['image']='thumbnails/defaultmenu.jpg';
        }
        $pudding=Pudding::create($formData);
        return redirect('/')->with('success','Successfully Created '.$pudding->name);
    }
  
  
}

<?php

namespace App\Http\Controllers;

use App\Models\Pudding;
use Illuminate\Http\Request;

class AddToCartController extends Controller
{
    public function insert(Pudding $id)
    {
       $pudding=Pudding::find($id);

       if(!$pudding){
         abort(404);
       }
    }
}

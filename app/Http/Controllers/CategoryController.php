<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    public function create()
    {
        return view('category.create');
    }

    public function store()
    {
        $formData=request()->validate([
            'name'=>['required','min:1',Rule::unique('categories','name')],
            'slug'=>['required','min:1',Rule::unique('categories','slug')],
        ]);
        $category=Category::create($formData);
        return redirect('/admin/category/create')->with('success','Successfully Created '. $category->name);
    }
}

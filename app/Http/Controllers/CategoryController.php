<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function edit(Category $category){
        return view('category.edit', [
            'category' => $category
        ]);
    }
}

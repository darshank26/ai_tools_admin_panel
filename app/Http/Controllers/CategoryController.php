<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index() {
        $category = Category::all();
        return response()->json($category);
    }


    public function show($id)
    {
        $model = Category::findOrFail($id);
        return response()->json($model);
    }

    public function store(Request $request)
    {
        $model = Category::create($request->all());
        return response()->json($model, 201);
    }

    public function update(Request $request, $id)
    {
        $model = Category::findOrFail($id);
        $model->update($request->all());
        return response()->json($model, 200);
    }

    public function destroy($id)
    {
        Category::destroy($id);
        return response()->json(null, 204);
    }

}

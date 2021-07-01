<?php
/*
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
}*/

namespace App\Http\Controllers;
use App\Category;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\NewsResource;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
      return CategoryResource::collection(Category::with('news')->paginate(10));
    }

    public function getNewsInCategory(Category $category)
    {
     
      
    return NewsResource::collection($category->news()->paginate(10));
    }


    public function store(Request $request)
    {
      $category = Category::create([
        'user_id' => $request->user()->id,
        'name' => $request->title,
      ]);

      return new CategoryResource($category);
    }

    public function show(Category $category)
    {
      return new CategoryResource($category);
    }

    public function update(Request $request, Category $category)
    {
      // check if currently authenticated user is the owner of the category
      if ($request->user()->id !== $category->user_id) {
        return response()->json(['error' => 'You can only edit your own categories.'], 403);
      }

      $category->update($request->only(['name']));

      return new CategoryResource($category);
    }

    public function destroy(Category $category)
    {
      $category->delete();

      return response()->json(null, 204);
    }
}
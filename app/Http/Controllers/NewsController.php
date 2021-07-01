<?php
/*
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    //
}*/
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\News;
use App\Http\Resources\NewsResource;
class NewsController extends Controller
{
public function store(Request $request, Category $category)
    {
      $news = News::firstOrCreate(
        [
          'user_id' => $request->user()->id,
          'category_id' => $category->id,
        ],
        [
            'title' => $request->title,
            'description' => $request->description,
            'pubDate' => $request->pubDate,
            'thumbnail_url' => $request->thumbnail_url,
        
        ]
      );

      return new NewsResource($news);
    }

    public function __construct()
    {
      $this->middleware('auth:api');
    }
}
<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\NewsCategory;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Resources\NewsResource;
use App\Http\Resources\NewsCategoryResource;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::all();
        return response()->json(NewsResource::collection($news), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'preview' => 'required|string|max:255',
            'text' => 'required',
            'author_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $news = new News();
        $news->title = $request->title;
        $news->preview = $request->preview;
        $news->text = $request->text;
        $news->author_id = $request->author_id;
        $news->save();

        foreach ($request->category_id as $category_id) {
            NewsCategory::insert([
                'news_id' => $news->id,
                'category_id' => $category_id,
            ]);
        }
       return response()->json(new NewsResource($news), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        return response()->json(new NewsResource($news), 200);
    }

    /**
     * Display the specified resource.
     *
     * @param $author_id
     * @return \Illuminate\Http\Response
     */
    public function getByAuthor($author_id)
    {
        $news = News::where('author_id', $author_id)->get();
        return response()->json($news, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param $category_id
     * @return \Illuminate\Http\Response
     */
    public function getByCategory($category_id)
    {
        $newsCategories = NewsCategory::where('category_id', $category_id)->groupBy('news_id', 'category_id')->get('news_id', 'category_id');
        $news = [];
        foreach ($newsCategories as $newsCategory) {
            $news[] = News::where('id', $newsCategory['news_id'])->get();
        }
        return response()->json($news, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param $category_id
     * @param $subcategory_id
     * @return \Illuminate\Http\Response
     */
    public function getBySubcategory($category_id, $subcategory_id)
    {
        $newsCategories = NewsCategory::where('category_id', $category_id)->where('subcategory_id', $subcategory_id)->groupBy('news_id', 'category_id', 'subcategory_id')->get('news_id', 'category_id', 'subcategory_id');
        $news = [];
        foreach ($newsCategories as $newsCategory) {
            $news[] = News::where('id', $newsCategory['news_id'])->get();
        }
        return response()->json($news, 200);
    }


    /**
     * Display the specified resource.
     *
     * @param $category_id
     * @param $subcategory_id
     * @param $subcategory_parameter_id
     * @return \Illuminate\Http\Response
     */
    public function getBySubcategory_parametr($category_id, $subcategory_id, $subcategory_parameter_id)
    {
        $newsCategories = NewsCategory::where('category_id', $category_id)->where('subcategory_id', $subcategory_id)->where('subcategory_parametr_id', $subcategory_parameter_id)->get();
        $news = [];
        foreach ($newsCategories as $newsCategory) {
            $news[] = News::where('id', $newsCategory['news_id'])->get();
        }
        return response()->json($news, 200);
    }

    
    /**
     * Display the specified resource.
     *
     * @param $title
     * @return \Illuminate\Http\Response
     */
    public function getByTitle($title)
    {
        $news = News::where('title','like',  "%$title%")->get();
        return response()->json($news, 200);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $news->delete();
        $res = [
            'message' => 'News successfully deleted',
            'status' => true
        ];

        return response()->json($res, 200);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Http\Request;
use App\Http\Resources\NewsResource;

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
       /*$news = News::create([
            'title' => $request->title,
            'author_id' => $request->author_id,
       ]); //$request->validated()*/
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
        //
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

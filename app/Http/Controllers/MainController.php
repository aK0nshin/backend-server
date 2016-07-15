<?php

namespace App\Http\Controllers;

use DB;

use Laravel\Lumen\Routing\Controller as BaseController;

use App\News;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends BaseController
{
    public function getNewsById(Request $request, $id)
    {
        $news = News::find($id);
        $news->creator;
        $news->relatedNews = $news->relatedIds;
        $news->lastEditor;
        $news->image;
        $news->status;
        $news->filials;
        $news->tags;

        return response()->json($news);
    }

    public function getNewsMass(Request $request)
    {
        if ($request->isJson())
        {
            $input = $request->all();
            $news = News::find($input['id']);

            foreach ($news as $n) {
                $n->creator;
                $n->relatedNews = $n->relatedIds;
                $n->lastEditor;
                $n->image;
                $n->status;
                $n->filials;
                $n->tags;
            }
        }

        return response()->json($news);
    }

}
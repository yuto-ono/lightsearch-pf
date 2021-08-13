<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class ReviewSearchController extends Controller
{
    public function show(Request $request)
    {
        //検索ワード取得
        $searchWord = $request->input('searchWord');
        //カテゴリ取得
        $conditions = Category::orderBy('sort_no')->get();

        return view('reviews.search', [
            'searchWord' => $searchWord,
            'conditions' => $conditions
        ]);
    }
}

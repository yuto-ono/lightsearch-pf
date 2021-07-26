<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class ReviewsController extends Controller
{
    /**
     * レビュー投稿画面表示
     *
     * @return void
     */
    public function createReviewForm()
    {
        //カテゴリ取得
        $conditions = Category::orderBy('sort_no')->get();
        return view('reviews.create')->with('conditions', $conditions);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Review;
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
            'conditions' => $conditions,
        ]);
    }

    public function search(Request $request)
    {
        //タイトル名の中身を定義
        $searchWord = $request->input('searchWord');

        $query = Review::query();

        //検索ワードが有ったら
        if (isset($searchWord)) {
            $query->where('title', 'like', '%' . self::escapeLike($searchWord) . '%')
                ->orwhere('author_name', 'like', '%' . self::escapeLike($searchWord) . '%')
                ->orwhere('impressions', 'like', '%' . self::escapeLike($searchWord) . '%');
        }

        $products = $query->orderBy('title', 'asc')->paginate(4);

        //カテゴリ取得
        $conditions = Category::orderBy('sort_no')->get();

        return view('reviews.search', [
            'products' => $products,
            'searchWord' => $searchWord,
            'conditions' => $conditions,
        ]);
    }

    public static function escapeLike($str)
    {
        return str_replace(['\\', '%', '_'], ['\\\\', '\%', '\_'], $str);
    }
}

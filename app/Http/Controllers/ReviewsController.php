<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewsCreateRequest;
use App\Models\Category;
use App\Models\Review;

class ReviewsController extends Controller
{
    /**
     * レビュー一覧画面表示
     *
     * @return void
     */
    public function index()
    {
        //レビュー情報取得
        $reviews = Review::all();
        return view('reviews.index', compact('reviews'));
    }
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

    /**
     * レビュー投稿処理
     *
     * @return void
     */
    public function create(ReviewsCreateRequest $request)
    {
        //値を取得
        $post = $request->all();

        //条件分岐(ファイルが存在するかいなか)
        if ($request->hasFile('image')) {
            //ファイルをアップロードする
            $request->file('image')->store('/public/images');
            //取得した値とアップロードした画像パスを配列に入れる
            $data = ['user_id' => \Auth::id(), 'title' => $post['title'], 'author_name' => $post['author_name'], 'category_id' => $post['category_id'], 'impressions' => $post['impressions'],  'image' => $request->file('image')->hashName()];
        } else {
            //取得した値を配列に入れる
            $data = ['user_id' => \Auth::id(), 'title' => $post['title'], 'author_name' => $post['author_name'], 'category_id' => $post['category_id'], 'impressions' => $post['impressions']];
        }
        //DBに保存
        Review::insert($data);
        //リダイレクト
        return redirect('/');
    }
}

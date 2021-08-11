<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewsRequest;
use App\Models\Category;
use App\Models\Review;
use Illuminate\Support\Facades\DB;

class ReviewsController extends Controller
{
    /**
     * レビュー一覧画面表示
     *
     * @return void
     */
    public function index()
    {
        //ページネーション実装+n+1問題解消(id)
        $reviews = Review::with('user')->orderBy('id', 'asc')->paginate(4);
        //n+1問題解消(category)
        $categories = Review::with('category')->limit(5)->get();
        //カテゴリ取得
        $conditions = Category::orderBy('sort_no')->get();
        return view('reviews.index', compact('reviews', 'categories', 'conditions'));
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
    public function create(ReviewsRequest $request)
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

    /**
     * レビュー詳細画面表示
     *
     * @return void
     */
    public function showReviewForm($id)
    {
        //レビューのユーザー情報取得
        $user = Review::find($id);
        return view('reviews.show', compact('user'));
    }

    /**
     * レビュー編集画面表示
     *
     * @return void
     */
    public function editReviewForm(Review $review, $id)
    {
        //レビューのユーザー情報取得
        $user = Review::find($id);
        //認可機能
        $this->authorize('view', $user);
        //カテゴリ取得
        $conditions = Category::orderBy('sort_no')->get();
        return view('reviews.edit', compact('user', 'conditions'));
    }

    /**
     * レビュー編集処理
     *
     * @return void
     */
    public function update(ReviewsRequest $request)
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
        DB::table('reviews')->where('id', $request->id)->update($data);
        //リダイレクト
        return redirect('/');
    }

    /**
     * レビュー編集処理
     *
     * @return void
     */
    public function destroy($id)
    {
        $reviews = Review::find($id);
        $reviews->delete();
        //リダイレクト
        return redirect('/');
    }
}

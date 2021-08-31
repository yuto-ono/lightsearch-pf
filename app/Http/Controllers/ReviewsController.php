<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewsRequest;
use App\Models\Category;
use App\Models\Review;
use Illuminate\Support\Facades\Storage;


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
    public function create(ReviewsRequest $request, Review $review)
    {
        //画像以外を保存する
        $review->fill($request->all());
        //条件分岐で画像を保存する
        if ($request->file('image')) {
            //画像パスをリクエストから取得
            $image = $request->file('image');
            //ディスクをS3に指定して、保存先をpublic/imagesのmyprefixに指定
            $path = Storage::disk('s3')->put('myprefix', $image, 'public');
            //ｓ3からアップロードした画像パスを取得
            $review->image = Storage::disk('s3')->Storage::url($path);
        }
        //ユーザーIDを取得
        $review->user_id = $request->user()->id;
        //DBに保存する
        $review->save();
        //リダイレクト
        return redirect('/')->with('flash_message', 'レビュー投稿が完了しました');
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
    public function update(ReviewsRequest $request, $id)
    {
        //レビューのユーザー情報取得
        $review_edit = Review::find($id);
        //画像以外を更新する
        $review_edit->fill($request->all());
        //条件分岐で画像を保存する
        if ($request->file('image')) {
            //画像パスをリクエストから取得
            $image = $request->file('image');
            //ディスクをS3に指定して、保存先をpublicのmyprefixに指定
            $path = Storage::disk('s3')->put('myprefix', $image, 'public');
            //ｓ3からアップロードした画像パスを取得
            $review_edit->image = Storage::disk('s3')->Storage::url($path);
        }
        //ユーザーIDを取得
        $review_edit->user_id = $request->user()->id;
        //DBに保存する
        $review_edit->save();
        //リダイレクト
        return redirect('/')->with('flash_message', 'レビュー編集が完了しました');
    }

    /**
     * レビュー削除処理
     *
     * @return void
     */
    public function destroy($id)
    {
        $reviews = Review::find($id);
        $reviews->delete();
        //リダイレクト
        return redirect('/')->with('flash_message', 'レビュー削除しました');
    }
}

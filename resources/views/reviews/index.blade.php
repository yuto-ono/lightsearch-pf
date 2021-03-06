@extends('layouts.app')

@section('title')
レビュー一覧
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="row">
                @foreach ($reviews as $review)
                <div class="col-md-6">
                    <div class="card mb-5">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div class="font-weight-bold">
                                <i class="fas fa-user-edit mr-2"></i>{{ $review->user->name }}
                            </div>
                            <!-- 自分の記事のみの編集・削除ボタンを表示する -->
                            @if($review->user->id == Auth::id())
                            <div class="d-flex justify-content-around">
                                <a href="{{ route('reviews.edit', $review ) }}"
                                    class="btn btn-primary rounded-pill ml-auto">
                                    <i class="far fa-edit mr-1"></i>
                                    編集
                                </a>
                                <!-- 空白 -->
                                &nbsp;&nbsp;
                                <form action="{{ route('reviews.delete', $review ) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger rounded-pill ml-auto">
                                        <i class="far fa-trash-alt mr-1"></i>
                                        削除
                                    </button>
                                </form>
                            </div>
                            @endif
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <p class="col-md-4 text-md-right">ライトノベル名</p>
                                <p class="col-md-6">{{ $review->title }}</p>
                            </div>
                            <div class="row">
                                <p class="col-md-4 text-md-right">サムネイル</p>
                                @if(!empty($review->image))
                                <div class='image-wrapper'>
                                    <img class='book-image' src="{{ asset('storage/images/'.$review->image) }}">
                                </div>
                                @else
                                <div class='image-wrapper'>
                                    <img class='book-image' src="{{ asset('images/book.png') }}">
                                </div>
                                @endif
                            </div>
                            <form>
                                <!-- ログインした人・自分の記事のみ表示 -->
                                @if(Auth::check() && $review->user->id == Auth::id())
                                <div class="row">
                                    <a class="btn btn-primary text-white col-md-4 mx-auto looking"
                                        href="{{ route('reviews.show', $review ) }}">詳細を見る</a>
                                </div>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<div class="d-flex justify-content-center">
    {{ $reviews->links() }}
</div>

@endsection

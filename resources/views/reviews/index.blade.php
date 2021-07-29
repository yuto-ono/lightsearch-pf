@extends('layouts.app')

@section('title')
レビュー一覧
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="row">
                <div class="col-md-6">
                    @foreach ($reviews as $review)
                    <div class="card mb-5">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div class="font-weight-bold">
                                <i class="fas fa-user-edit mr-2"></i>{{ $review->user->name }}
                            </div>
                            <div class="d-flex justify-content-around">
                                <a href="" class="btn btn-secondary rounded-pill ml-auto">
                                    <i class="far fa-edit mr-1"></i>
                                    編集
                                </a>
                                <!-- 空白 -->
                                &nbsp;&nbsp;
                                <form action="" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger rounded-pill ml-auto">
                                        <i class="far fa-trash-alt mr-1"></i>
                                        削除
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <p class="col-md-4 text-md-right">作者名</p>
                                <p class="col-md-6">{{ $review->author_name }}</p>
                            </div>
                            <div class="row">
                                <p class="col-md-4 text-md-right">タイトル</p>
                                <p class="col-md-6">{{ $review->title }}</p>
                            </div>
                            <div class="row">
                                <p class="col-md-4 text-md-right">カテゴリ</p>
                                <p class="col-md-6">{{ $review->category->name }}</p>
                            </div>
                            <div class="row">
                                <p class="col-md-4 text-md-right">感想</p>
                                <p class="col-md-6">{{ $review->impressions }}</p>
                            </div>
                            <div class="row">
                                <p class="col-md-4 text-md-right">サムネイル</p>
                                @if(!empty($review->image))
                                <div class='image-wrapper'>
                                    <img class='book-image' src="{{ asset('storage/images/'.$review->image) }}" style="object-fit: cover; width: 100px; height: 100px;">
                                </div>
                                @else
                                <div class='image-wrapper'>
                                    <img class='book-image' src="{{ asset('storage/images/book.png') }}" style="object-fit: cover; width: 100px; height: 100px;"></div>
                                @endif
                            </div>
                            <form>
                                <div class="row">
                                    <a class="btn btn-secondary text-white col-md-4 mx-auto looking">詳細を見る</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

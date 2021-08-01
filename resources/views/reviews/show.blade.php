@extends('layouts.app')

@section('title')
レビュー詳細
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-5">
                <div class="card-header">
                    <h3 class="text-center my-2"><i class="fas fa-user mr-2"></i>レビュー詳細</h3>
                </div>
                <div class="card-body col-md-9 mx-auto">
                    <div class="card-body">
                        <div class="row mb-2">
                            <p class="col-md-4 text-md-right">ライトノベル名</p>
                            <p class="col-md-6">{{ $user->title }}</p>
                        </div>
                        <div class="row mb-2">
                            <p class="col-md-4 text-md-right">作者名</p>
                            <p class="col-md-6">{{ $user->author_name }}</p>
                        </div>
                        <div class="row mb-2">
                            <p class="col-md-4 text-md-right">カテゴリ</p>
                            <p class="col-md-6">{{ $user->category->name }}</p>
                        </div>
                        <div class="row mb-2">
                            <p class="col-md-4 text-md-right">感想</p>
                            <p class="col-md-6">{{ $user->impressions }}</p>
                        </div>
                        <div class="row mb-2">
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
                        <div class="d-flex flex-row bd-highlight mb-3" style="text-align:center;">
                            <a href="" class="btn button-pink text-white col-md-3 py-2 mx-1 mb-4">
                                <i class="far fa-heart"></i> いいね
                            </a>
                            <a href="" class="btn btn-success text-white col-md-3 py-2 mx-1 mb-4">
                                <i class="fas fa-comment"></i> コメント
                            </a>
                            <a href="" class="btn btn-secondary text-white col-md-3 py-2 mx-1 mb-4">
                                <i class="fas fa-edit"></i> 編集する
                            </a>
                            <a href="" class="btn btn-danger text-white col-md-3 py-2 mx-1 mb-4">
                                <i class="fas fa-trash"></i> 削除
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

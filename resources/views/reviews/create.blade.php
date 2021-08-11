@extends('layouts.app')

@section('title')
レビュー投稿
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-5">
                <div class="card-header">
                    <h3 class="text-center my-2"><i class="fas fa-pen"></i> レビュー投稿</h3>
                </div>
                <div class="card-body col-md-9 mx-auto">
                    <form method="POST" action="{{ route('reviews.post') }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">ライトノベル名</label>
                                <input id="title" type="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" name="title" autofocus>
                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="author_name">作者名</label>
                                <input id="author_name" type="author_name" class="form-control @error('author_name') is-invalid @enderror" value="{{ old('author_name') }}" name="author_name">
                                @error('author_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="category_id">カテゴリ</label>
                                <select name="category_id" class="custom-select form-control @error('category_id') is-invalid @enderror">
                                    @foreach ($conditions as $condition)
                                    <option value="{{$condition->id}}" {{old('category_id')==$condition->id ? 'selected' : ''}}>
                                        {{$condition->name}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="impressions">感想</label>
                                <textarea id="impressions" type="impressions" class="form-control @error('impressions') is-invalid @enderror" value="{{ old('impressions') }}" name="impressions"></textarea>
                                @error('impressions')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="file">サムネイル</label>
                                <div class="form-group">
                                    <input type="file" id="file" name='image' class="form-control-file @error('image') is-invalid @enderror">
                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="d-fix justify-content-center" style="text-align:center;">
                            <button class="btn btn-primary text-white col-md-3 py-2 mx-1 mb-4">投稿する</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('title')
レビュー投稿画面
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
                    <form method="POST" action="">
                        @method('POST')
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">ライトノベル名</label>
                                <input id="title" type="title" class="form-control" name="title" autofocus>
                            </div>
                            <div class="form-group">
                                <label for="author_name">作者名</label>
                                <input id="author_name" type="author_name" class="form-control" name="author_name">
                            </div>
                            <div class="form-group">
                                <label for="author_name">カテゴリ</label>
                                <select name="condition" class="custom-select form-control @error('condition') is-invalid @enderror">
                                @foreach ($conditions as $condition)
                                    <option value="{{$condition->id}}" {{old('condition') == $condition->id ? 'selected' : ''}}>
                                        {{$condition->name}}
                                    </option>
                                @endforeach
                            </select>
                            </div>
                            <div class="form-group">
                                <label for="impressions">感想</label>
                                <textarea id="impressions" type="impressions" class="form-control " name="impressions"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="file">サムネイル</label>
                                <div class="form-group">
                                    <input type="file" id="file" name='image' class="form-control-file">
                                </div>
                            </div>
                        </div>
                        <div class="d-fix justify-content-center" style="text-align:center;">
                            <button class="btn btn-secondary text-white col-md-3 py-2 mx-1 mb-4">投稿する</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('title')
レビュー検索
@endsection

@section('content')
<div class="container">
    <div class="row">
        <p class="col-md-4 text-md-right category">カテゴリ</p>
        <div class="col-md-4 category">
            <select name="category_id" class="custom-select form-control @error('category_id') is-invalid @enderror">
                @foreach ($conditions as $condition)
                <option value="{{$condition->id}}" {{old('category_id')==$condition->id ? 'selected' : ''}}>
                    {{$condition->name}}
                </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row freeword">
        <p class="col-md-4 text-md-right freeword">フリーワード</p>
        <div class="col-md-6">
            <input type="text" name="word" value="" class="freeword">
        </div>
        <button type="submit" class="btn btn-block btn-primary col-md-4 mx-auto py-2 mt-3 search">検索する</button>
    </div>
</div>

@endsection

@extends('layouts.app')

@section('title')
レビュー検索
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <form method="GET" action="{{ route('search')}}">
                <div class="card mb-6">
                    <div class="card-header">
                        <h3 class="text-center my-2"><i class="fas fa-search"></i> レビュー投稿</h3>
                    </div>
                    <div class="card-body col-md-7 mx-auto">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="searchWord">フリーワード</label>
                                <input id="searchWord" type="searchWord" class="form-control" value="{{ $searchWord }}"
                                    name="searchWord" autofocus>
                            </div>
                            <div class="form-group">
                                <label for="category">カテゴリ</label>
                                <select name="categoryId" class="form-control" value="{{ $categoryId }}">
                                    <option value="">未選択</option>
                                    @foreach($conditions as $condition)
                                    <option value="{{$condition->id}}" {{old('category_id')==$condition->id ? 'selected'
                                        : ''}}>
                                        {{ $condition->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="d-fix justify-content-center" style="text-align:center;">
                            <button class="btn btn-primary text-white col-md-3 py-2 mx-1 mb-4">検索する</button>
                        </div>
                    </div>
                    @if (!empty($products))
                    <p>全{{ $products->count() }}件</p>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ライトノベル名</th>
                                <th scope="col">作者</th>
                                <th scope="col">カテゴリ</th>
                                <th scope="col">感想</th>
                            </tr>
                        </thead>
                        @foreach($products as $product)
                        <tbody>
                            <tr>
                                <td>{{ $product->title }}</td>
                                <td>{{ $product->author_name }}</td>
                                <td>{{ $product->category->name }}</td>
                                <td>{{ $product->impressions }}</td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
                <div class="d-flex justify-content-center">
                    {{ $products->appends(request()->input())->links() }}
                </div>
                @endif
            </form>
        </div>
    </div>
</div>


@endsection

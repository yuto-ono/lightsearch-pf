@extends('layouts.app')

@section('title')
ユーザー情報変更
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-5">
                <div class="card-header">
                    <h3 class="text-center my-2"><i class="fas fa-user mr-2"></i>ユーザー情報変更</h3>
                </div>
                <div class="card-body col-md-9 mx-auto">
                    <div class="card-body">
                        <div class="row mb-2">
                            <label for="name">名前</label>
                            <input id="name" type="name" class="form-control" name="name" required autocomplete="test" autofocus>
                        </div>
                        <div class="row mb-2">
                            <label for="email">メールアドレス</label>
                            <input id="email" type="email" class="form-control" name="email" required autocomplete="test@test.com">
                        </div>
                    </div>
                    <div class="d-fix justify-content-center" style="text-align:center;">
                        <button class="btn btn-secondary text-white col-md-3 py-2 mx-1 mb-4">更新する</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

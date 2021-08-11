@extends('layouts.app')

@section('title')
会員登録
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center my-2">ユーザー登録</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" class="p-3">
                        @csrf
                        <div class="form-group row">
                            <p class="col-md-12 text-center">
                                <span class="text-danger">(※)</span>
                                は入力必須項目です。
                            </p>
                        </div>
                        <div class="form-group">
                            <label for="name">ニックネーム<span class="text-danger">(※)</span></label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                                placeholder="テスト" autofocus>
                            <small>ニックネームを入力してください</small>
                            <!-- 名前のバリエーションエラー -->
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">メールアドレス<span class="text-danger">(※)</span></label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email"
                                placeholder="test@test.com">
                            <small>今回は仮のメールアドレスを入力してください。</small>
                            <!-- メールアドレスのバリエーションエラー -->
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">パスワード<span class="text-danger">(※)</span></label>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="new-password" placeholder="*******">
                            <small>半角数字8文字以上を入力してください。</small>
                            <!-- パスワードのバリエーションエラー -->
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="re_password">パスワード(確認用)<span class="text-danger">(※)</span></label>
                            <input id="password-confirm" type="password" class="form-control"
                                name="password_confirmation" required autocomplete="new-password" autofocus
                                placeholder="********">
                            <small>確認のためパスワードを再度入力してください。</small>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-block btn-primary">
                                会員登録
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

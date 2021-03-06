@extends('layouts.app')

@section('title')
ログイン
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center my-2">ログイン</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}" class="p-5">
                        @csrf

                        <div class="form-group">
                            <label for="email">メールアドレス</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">パスワード</label>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group mb-0">
                            <button type="submit" class="btn btn-block btn-secondary">
                                ログイン
                            </button>
                            <a href="{{ route('login.guest') }}" class="btn btn-block btn-primary">
                                ゲストログイン
                            </a>
                        </div>

                        <div class="mt-3">
                            アカウントをお持ちでない方は<a href="{{ route('register') }}">こちら</a>
                        </div>
                        <div class="mt-1">
                            パスワードをお忘れの方は<a href="{{ route('password.request') }}">こちら</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

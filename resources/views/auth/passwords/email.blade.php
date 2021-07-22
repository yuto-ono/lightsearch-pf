@extends('layouts.app')

@section('title')
    パスワードリセット
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center my-2">パスワードをお忘れの方</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('password.email') }}" class="p-5">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @csrf
                        <div class="form-group">
                            <label for="email">メールアドレス</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group mb-0">
                            <button type="submit" class="btn btn-block btn-secondary">
                                送信する
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

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
                    <form method="POST" action="{{ route('user.update', Auth::id()) }}">
                        @method('PUT')
                        @csrf
                        <div class="card-body">

                            <div class="form-group">
                                <label for="name">名前</label>
                                <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" name="name" required autocomplete="test" autofocus>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">メールアドレス</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" name="email" required
                                    autocomplete="test@test.com">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="d-fix justify-content-center" style="text-align:center;">
                            <button class="btn btn-primary text-white col-md-3 py-2 mx-1 mb-4">更新する</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('title')
マイページ
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-5">
                <div class="card-header">
                    <h3 class="text-center my-2"><i class="fas fa-user mr-2"></i>マイページ</h3>
                </div>
                <div class="card-body col-md-9 mx-auto">
                    <div class="card-body">
                        <div class="row mb-2">
                            <p class="col-md-4 text-md-right">名前</p>
                            <p class="col-md-6">{{ $auth->name }}</p>
                        </div>
                        <div class="row mb-2">
                            <p class="col-md-4 text-md-right">メールアドレス</p>
                            <p class="col-md-6">{{ $auth->email }}</p>
                        </div>
                        <div class="d-fix justify-content-center">
                            <form action="{{ route('user.delete', $auth ) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger col-md-3 py-2 mx-1 mb-4">
                                    <i class="far fa-trash-alt mr-1"></i>
                                    退会
                                </button>
                            </form>
                            <a href="{{ route('user.edit', Auth::id() ) }}" class="btn btn-secondary col-md-3 py-2 mx-1 mb-4">編集する</a>
                        </div>
                        @if (Auth::id() == 1)
                        <p class="text-danger">※ゲストユーザーは、パスワードを編集できません</p>
                        @else
                        <div class="mt-1">
                            パスワードを変更したい方は<a href="{{ route('password.request') }}">こちら</a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

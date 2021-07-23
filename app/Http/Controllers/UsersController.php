<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    /**
     * マイページ
     *
     * @return void
     */
    public function showUsersForm()
    {
        //ユーザー情報取得
        $auth = Auth::user();
        return view('user.mypage', ['auth' => $auth]);
    }
}

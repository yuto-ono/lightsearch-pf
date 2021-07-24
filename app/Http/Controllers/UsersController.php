<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    /**
     * マイページ画面表示
     *
     * @return void
     */
    public function showUsersForm()
    {
        //ユーザー情報取得
        $auth = Auth::user();
        return view('user.mypage', ['auth' => $auth]);
    }

    /**
     *  ユーザー情報変更画面表示
     *
     * @return void
     */
    public function editUsersForm()
    {
        //ユーザー情報取得
        $auth = Auth::user();
        return view('user.edit', ['auth' => $auth]);
    }
}

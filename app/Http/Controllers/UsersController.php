<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UsersUpdateRequest;

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

    /**
     *  ユーザー情報変更処理
     *
     * @return void
     */
    public function edit(UsersUpdateRequest $request, $id)
    {
        //id取得
        $user = User::find($id);
        //全ての値を更新
        $user->fill($request->all());
        //DBに保存
        $user->save();
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * ログイン後のリダイレクト先指定
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * ログアウトしたときの画面遷移先
     */
    protected function loggedOut()
    {
        return redirect('/')->with('flash_message', 'ログアウトが完了しました');
    }

    //ゲストログイン用のIDを定数として定義
    private const GUEST_USER_ID = 1;

    //ゲストログイン処理
    public function guestLogin()
    {
        //ゲストログインのidがDBに存在すれば、ゲストログインする
        if (Auth::loginUsingId(self::GUEST_USER_ID)) {
            //トップページにリダイレクト
            return redirect('/')->with('flash_message', 'ゲストログインしました');
        }
    }
}

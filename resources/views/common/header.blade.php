<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand site-logo" href="">LightSearch</a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mr-3">
                @if (Auth::check())
                <!-- ログイン済み -->
                <li class="nav-item">
                    <a class="nav-link active" href="">マイページ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="">レビュー投稿</a>
                </li>
                <li class="navbar-logout">
                    <a class="nav-link active" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">ログアウト</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
                @else
                <!-- 非ログイン -->
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('login') }}">ログイン</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('register') }}">会員登録</a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

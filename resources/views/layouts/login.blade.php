<script>
    const postID = @json($postsLists);
</script>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->
</head>
<body>
    <header>
        <div class = "head">
            <h1><a href="/home"><img src="{{ asset('images/atlas.png') }}" class="logo"></a></h1>
            <div class="head-menu">
                <div class="head-name">
                    <p>{{ Auth::user()->username}}さん</p>
                    <div class ="arrow"></div>
                    <img src="{{ asset('/storage/'.Auth::user()->images) }}" class="icon">
                </div>
            </div>
        </div>
        <div class="head-accordion">
            <ul>
                <li><a href="/home" class="li-link">HOME</a></li>
                <li class="li-blue"><a href="/profile" class="li-white">プロフィール編集</a></li>
                <li><a href="/logout" class="li-link">ログアウト</a></li>
            </ul>
        </div>
    </header>
    <div id="row">
        <div id="container">
            @yield('content')
        </div >
        <div id="side-bar">
            <div id="confirm">
                <p class="side-name">{{ Auth::user()->username}}さんの</p>
                <div class="follows">
                    <p class="follows-num">フォロー数</p>
                    <p>{{$following}}名</p>
                </div>
                <p class="btn follows-list"><a href="/follow-list" class="side-btn">フォローリスト</a></p>
                <div class="follows">
                    <p class="follows-num">フォロワー数</p>
                    <p>{{$followed}}名</p>
                </div>
                <p class="btn follows-list"><a href="/follower-list" class="side-btn">フォロワーリスト</a></p>
            </div>
            <p class="btn search"><a href="/user/search" class="side-btn">ユーザー検索</a></p>
        </div>
    </div>
    <footer>
    </footer>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="{{ asset('js/index.js') }}"></script>
</body>
</html>

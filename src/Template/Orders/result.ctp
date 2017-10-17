
<!doctype html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>ORDER COMFIRM</title>
        <meta name="robots" content="noindex">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <?= $this->Html->meta('icon') ?>
        <?= $this->Html->css('style.css') ?>
        <?= $this->Html->css('slick.css') ?>
        <?= $this->Html->css('default.css') ?>

        <!-- for original theme CSS -->

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="jquery-1.11.3.min.js"><\/script>')</script>


    </head>

    <body id="page_shopping" class="other_page">
        <div id="wrapper">
            <header id="header">
                <div class="container-fluid inner">
                    <!-- ▼ロゴ -->
                    <div class="header_logo_area">
                        <p class="copy">welcome </p>
                        <h1 class="header_logo"><a href="http://localhost/eccube-3.0.15/html/">MAMOL EC SITE</a></h1>
                    </div>


                    <div id="member" class="member drawer_block pc">
                        <ul class="member_link">
                            <li>
                                <a href="#">
                                    <svg class="cb cb-user-circle"><use xlink:href="#cb-user-circle" /></svg>マイページ
                                </a>
                            </li>
                            <li>
                                <a href="http://localhost/eccube-3.0.15/html/mypage/favorite">
                                    <svg class="cb cb-heart-circle">
                                    <use xlink:href="#cb-heart-circle"></use>
                                    </svg>お気に入り
                                </a>
                            </li>
                            <li>
                                <a href="http://localhost/eccube-3.0.15/html/logout">
                                    <svg class="cb cb-lock-circle">
                                    <use xlink:href="#cb-lock-circle" />
                                    </svg>ログアウト
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!-- ▲ログイン -->
                    <!-- ▼カテゴリ -->

                    <nav id="category" class="drawer_block pc">
                        <ul class="category-nav">
                            <li><a href="http://localhost/eccube-3.0.15/html/products/list?category_id=2">インテリア</a></li>
                            <li><a href="http://localhost/eccube-3.0.15/html/products/list?category_id=1">キッチンツール</a>
                                <ul>
                                    <li><a href="http://localhost/eccube-3.0.15/html/products/list?category_id=4">調理器具</a></li>
                                    <li><a href="http://localhost/eccube-3.0.15/html/products/list?category_id=3">食器</a>
                                        <ul>
                                            <li><a href="http://localhost/eccube-3.0.15/html/products/list?category_id=5">フォーク</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="http://localhost/eccube-3.0.15/html/products/list?category_id=6">新入荷</a></li>
                        </ul> <!-- category-nav -->
                    </nav>

                    <!-- ▲カテゴリ -->

                    <p id="btn_menu"><a class="nav-trigger" href="#nav">Menu<span></span></a></p>
                </div>
            </header>

            <div id="contents" class="theme_main_only">
                <div id="contents_top"></div>
                <div class="container-fluid inner">
                    <div id="main">
                        <div id="main_middle">
                            <h1 class="page-heading">ご注文内容のご確認</h1>
                            <div id="confirm_wrap" class="container-fluid">
                                <div id="confirm_flow_box" class="row">
                                    <div id="confirm_flow_box__body" class="col-md-12">
                                        <div id="confirm_flow_box__flow_state" class="flowline step3">
                                            <ul id="confirm_flow_box__flow_state_list" class="clearfix">
                                                <li><span class="flow_number">1</span><br>カートの商品</li>
                                                <li><span class="flow_number">2</span><br>ご注文内容確認</li>
                                                <li  class="active"><span class="flow_number">3</span><br>完了</li>
                                            </ul>
                                        </div>
                                    </div><!-- /.col -->
                                </div><!-- /.row -->
                                <div class="centered-text center-block"><center><?php echo $result; ?></center></div>
                                <p class="centered-text"><a onclick="javascript:window.history.back(-1);" herf="#"><返回上一页</a></p>

                            </div>
                        </div>
                    </div>

                    <footer id="footer">
                        <!-- ▼フッター -->
                        <div class="container-fluid inner">
                            <ul>
                                <li><a href="http://localhost/eccube-3.0.15/html/help/about">当サイトについて</a></li>
                                <li><a href="http://localhost/eccube-3.0.15/html/help/privacy">プライバシーポリシー</a></li>
                                <li><a href="http://localhost/eccube-3.0.15/html/help/tradelaw">特定商取引法に基づく表記</a></li>
                                <li><a href="http://localhost/eccube-3.0.15/html/contact">お問い合わせ</a></li>
                            </ul>
                            <div class="footer_logo_area">
                                <p class="logo"><a href="http://localhost/eccube-3.0.15/html/">ec_cube</a></p>
                                <p class="copyright">
                                    <small>copyright (c) ec_cube all rights reserved.</small>
                                </p>
                            </div>
                        </div>
                        <!-- ▲フッター -->
                    </footer>
                </div>

                <div id="drawer" class="drawer sp"></div>
            </div>

            <div class="overlay"></div>
            <?= $this->Html->script('bootstrap.custom.min'); ?>
            <?= $this->Html->script('slick.min.min'); ?>
            <?= $this->Html->script('function'); ?>
            <?= $this->Html->script('eccube'); ?>

    </body>
</html>

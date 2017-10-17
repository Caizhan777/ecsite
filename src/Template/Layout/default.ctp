<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    

    <?= $this->Html->css('style.css') ?>
    <?= $this->Html->css('bootstrap.custom.min.css') ?>
    <?= $this->Html->css('slick.css') ?>
    <?= $this->Html->css('default.css') ?>
    
    <?= $this->Html->script('jquery.min'); ?>
    <?= $this->Html->script('jquery-1.11.3.min'); ?>
    <?= $this->Html->script('slick.min'); ?>
    <?= $this->Html->script('function'); ?>
    <?= $this->Html->script('eccube'); ?>
    <?= $this->Html->script('bootstrap.custom.min'); ?>


    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ec_cube / ディナーフォーク</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="favicon.ico">
    <link rel="stylesheet" href="style.css?v=3.0.15">
    <link rel="stylesheet" href="slick.css?v=3.0.15">
    <link rel="stylesheet" href="default.css?v=3.0.15">
<!-- for original theme CSS -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="jquery-1.11.3.min.js"><\/script>')</script>

</head>
<body id ="page_product_detail" class="product_page">
<div id="wrapper">
    <header id="header">
        <div class="container-fluid inner">
<!-- ▼ロゴ -->
            <div class="header_logo_area">
                <p class="copy">くらしを楽しむライフスタイルグッズ</p>
                <h1 class="header_logo"><a href="http://localhost/eccube-3.0.15/html/">ec_cube</a></h1>
                </div>

<!-- ▲ロゴ -->
<!-- ▼カゴの中 -->
                <div id="cart_area">
                    <p class="clearfix cart-trigger">
                        <a href="#cart">
                            <svg class="cb cb-shopping-cart">
                                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#cb-shopping-cart"></use>
                            </svg>
                            <span class="badge"><?php if(isset($cart)){echo count($cart);}else{echo 0;} ?></span>
                            <svg class="cb cb-close">
                                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#cb-close"></use>
                            </svg>
                        </a>
                        <?php $jiage=0; ?>
                        <?php 
                        if(isset($cart)){
                            for($i=0;$i<count($cart);$i++){
                            $jiage+=$cart[$i]['Product.price']*$cart[$i]['buy.num']; 
                            }
                        }?>
                        <span class="cart_price pc">合計
                            <span class="price">¥ <?php if(isset($jiage)){echo $jiage;}else{echo 0;} ?></span>
                        </span>
                    </p>
                    <div id="cart" class="cart">
                        <div class="inner">
                            <div class="item_box clearfix">
                                <!-- <div class="item_photo">

                                    <img src="fork-1.jpg" alt="ディナーフォーク">
                                </div> -->
                            <?php if(isset($cart)){
                            for($i=0;$i<count($cart);$i++){ ?>
                            <dl class="item_detail">
                                <dt class="item_name"><?= $cart[$i]['Product.name']?></dt>
                                <dd class="item_pattern small"><br></dd>
                                <dd class="item_price">¥ <?= $cart[$i]['Product.price']?><span class="small">税込</span></dd>
                                <dd class="item_quantity form-group form-inline">数量：<?= $cart[$i]['buy.num'] ?></dd>
                            </dl>
                            <?php }} ?>
                            </div><!--/item_box-->
                            <p class="cart_price sp">合計
                                <span class="price"><?=$jiage ?></span>
                            </p>

                            <div class="btn_area">
                                <ul>
                                    <li>
                                        <a href="http://localhost/eccube-3.0.15/html/cart" class="btn btn-primary">カートへ進む</a>
                                    </li>
                                    <li>
                                        <button type="button" class="btn btn-default btn-sm cart-trigger">キャンセル</button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
        <!-- ▲カゴの中 -->
        <!-- ▼商品検索 -->
                <div class="drawer_block pc header_bottom_area">
                    <div id="search" class="search">
                        <form method="get" id="searchform" action="/eccube-3.0.15/html/products/list">
                            <div class="search_inner">
                                <select id="category_id" name="category_id" class="form-control">
                                    <option value="">全ての商品</option>
                                    <option value="2">インテリア</option>
                                    <option value="1">キッチンツール</option>
                                    <option value="4">　調理器具</option>
                                    <option value="3">　食器</option>
                                    <option value="5">　　フォーク</option>
                                    <option value="6">新入荷</option>
                                </select>
                                <div class="input_search clearfix">
                                    <input type="search" id="name" name="name" maxlength="50" placeholder="キーワードを入力" class="form-control">
                                    <button type="submit" class="bt_search">
                                        <svg class="cb cb-search">
                                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#cb-search"></use>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div class="extra-form"></div>
                        </form>
                    </div>
                </div>
        <!-- ▲商品検索 -->
        <!-- ▼ログイン -->
                <div id="member" class="member drawer_block pc">
                    <ul class="member_link">
                        <li>
                            <a href="http://localhost/eccube-3.0.15/html/mypage">
                                <svg class="cb cb-user-circle"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#cb-user-circle"></use></svg>マイページ
                            </a>
                        </li>
                        <li>
                            <a href="http://localhost/eccube-3.0.15/html/mypage/favorite">
                                <svg class="cb cb-heart-circle">
                                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#cb-heart-circle"></use>
                                </svg>お気に入り
                            </a>
                        </li>
                        <li>
                            <a href="http://localhost/eccube-3.0.15/html/logout">
                                <svg class="cb cb-lock-circle">
                                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#cb-lock-circle"></use>
                                </svg>ログアウト
                            </a>
                        </li>
                    </ul>
                </div>

        <!-- ▲ログイン -->
        <!-- ▼カテゴリ -->

                <nav id="category" class="drawer_block pc">
                    <ul class="category-nav">
                        <li>
                            <a href="http://localhost/eccube-3.0.15/html/products/list?category_id=2">インテリア</a>
                        </li>
                        <li>
                            <a href="http://localhost/eccube-3.0.15/html/products/list?category_id=1">キッチンツール</a>
                            <ul>
                                <li>
                                    <a href="http://localhost/eccube-3.0.15/html/products/list?category_id=4">調理器具</a>
                                </li>

                                <li>
                                    <a href="http://localhost/eccube-3.0.15/html/products/list?category_id=3">食器</a>
                                        <ul>
                                            <li><a href="http://localhost/eccube-3.0.15/html/products/list?category_id=5">フォーク</a></li>
                                        </ul>
                                </li>

                            </ul>
                        </li>
                        <li>
                            <a href="http://localhost/eccube-3.0.15/html/products/list?category_id=6">新入荷</a>
                        </li>
                    </ul> <!-- category-nav -->
                </nav>

        <!-- ▲カテゴリ -->

                <p id="btn_menu"><a class="nav-trigger" href="#nav">Menu<span></span></a></p>
            </div>
        </header>

        <?= $this->Flash->render() ?>
    
        <?= $this->fetch('content') ?>

</div>
</body>




<!-- <body>
    <nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-3 medium-4 columns">
            <li class="name">
                <h1><a href=""><?= $this->fetch('title') ?></a></h1>
            </li>
        </ul>
        <div class="top-bar-section">
            <ul class="right">
                <li><a target="_blank" href="https://book.cakephp.org/3.0/">Documentation</a></li>
                <li><a target="_blank" href="https://api.cakephp.org/3.0/">API</a></li>
            </ul>
        </div>
    </nav>
    
    <footer>
    </footer>
</body> -->
</html>

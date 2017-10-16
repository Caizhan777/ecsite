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
                        <h1 class="header_logo"><a href="#">MAMOL EC SITE</a></h1>
                    </div>

                    <div id="member" class="member drawer_block pc">
                        <ul class="member_link">


                            <li>


                                <?php
                                echo $this->Html->link(
                                        "ログアウト", ['controller' => 'users', 'action' => 'logout']
                                );
                                ?>
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
<?php echo $this->Form->create($order, ['url' => ['controller' => 'Orders', 'action' => 'add']]); ?>
                <input type="hidden"  name="form_name" id="form_name" value="orderform"/>
                <input type="hidden"  name="user_id"  value="<?php echo $cart_data["user_id"]; ?>"/>
                <input type="hidden"  name="order_email"  value="<?php echo $cart_data["order_email"]; ?>"/>
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
                                                <li class="active"><span class="flow_number">2</span><br>ご注文内容確認</li>
                                                <li><span class="flow_number">3</span><br>完了</li>
                                            </ul>
                                        </div>
<?php if (count($order_detail) == 0) {
    ?>
                                            <div id="cart_box__message" class="message">
                                                <p class="errormsg bg-danger">
                                                    <svg class="cb cb-warning"><use xlink:href="#cb-warning"></use></svg>現在カート内に商品はございません。
                                                </p>
                                                <p >
                                                    <svg class="cb cb-warning">                               </p>
                                            </div>
<?php } else { ?> 

                                        </div><!-- /.col -->

                                    </div><!-- /.row -->

                                    <div id="shopping_confirm" class="row">
                                        <div id="confirm_main" class="col-sm-8">
                                            <div id="cart_box" class="cart_item table">
                                                <div id="cart_box_list" class="tbody">

    <?php foreach ($order_detail as $key => $value) { ?>
                                                        <div id="cart_box_list__item_box--1" class="item_box tr">

                                                            <div id="cart_box_list__item--1" class="td table">
                                                                <div id="cart_box_list__photo--1" class="item_photo">
                                                                    <img src="<?php echo $order_detail[$key]["product_img"]; ?>" />
                                                                </div>
                                                                <dl id="cart_box_list__detail--1" class="item_detail">

                                                                    <dt id="cart_box_list__name--1" class="item_name text-default"><?php echo $order_detail[$key]["product_name"]; ?></dt>

                                                                    <dd id="cart_box_list__price--1" class="item_price">¥<?php echo $order_detail[$key]["product_price"]; ?>× <?php echo $order_detail[$key]["product_num"]; ?></dd>
        <?php
        $p_price = 0;
        $p_price = $order_detail[$key]["product_price"] * $order_detail[$key]["product_num"];
        ?>

                                                                    <dd id="cart_box_list__subtotal--1" class="item_subtotal">小計：¥ <?php echo $p_price; ?></dd>
                                                                </dl>
                                                            </div>

                                                        </div>  <?php } ?>
                                                </div>
                                            </div>
                                            <p>

    <?php
    echo $this->Html->link(
            '数量を変更または削除する', ['controller' => 'carts', 'action' => 'obtain'], ['class' => 'btn btn-default btn-sm']
    );
    ?>
                                            </p>
                                            <h2 class="heading02">お配送情報</h2>
                                            <div id="customer_detail_box" class="column is-edit">
                                                <p id="customer_detail_box__customer_address" class="address">
                                                    <span class="customer-edit customer-addr01"><?php echo $order["order_email"]; ?></span>
                                                    <br>

                                                    <span class="customer-edit customer-name01"><?php echo $this->Form->input('荷受人：', ['name' => 'order_name', 'value' => $cart_data["order_name"]]); ?></span>
                                                    <br>
                                                    <span class="customer-edit customer-addr01"><?php echo $this->Form->input('住所：', ['name' => 'order_address', 'value' => $cart_data["order_address"]]); ?></span>

                                                    <br>
                                                    <span class="customer-edit customer-tel01"><?php echo $this->Form->input('TEL：', ['name' => 'order_tel', 'value' => $cart_data["order_tel"]]); ?></span>
                                                </p>
                                            </div>
                                            <h2 class="heading02">お支払方法</h2>
                                            <div id="payment_list" class="column">
                                                <div id="payment_list__body" class="form-group">
                                                    <ul id="payment_list__list" class="payment_list">
    <?php echo $this->Form->input('クレジットカ—ド：', ['name' => 'credit_code', 'value' => $cart_data["credit_code"]]); ?>

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="confirm_side" class="col-sm-4">
                                            <div id="summary_box__total_box" class="total_box">
                                                <p>
                                                    テスト中は免税、無料で配送します。
                                                </p>

                                                <div id="summary_box__result" class="total_amount">
                                                    <p id="summary_box__total_amount" class="total_price">合計
                                                        <strong class="text-primary">¥ <?php echo $cart_data["price"] ?>

                                                        </strong>
                                                    </p>
                                                    <p id="summary_box__confirm_button">
                                                        <button id="order-button" type="submit" class="btn btn-primary btn-block prevention-btn">注文する</button>
                                                    </p>
                                                </div>
                                            </div>
                                        </div> </form>
                                    </div><!-- /.row -->
<?php } ?>
                            </div>       

                            <p><a href="javascript:window.history.back(-1);"><返回上一页</a></p>

                        </div>
                    </div>
                </div>

                <footer id="footer">
                    <!-- ▼フッター -->
                    <div class="container-fluid inner">
                        <ul>
                            <li><a href="#">当サイトについて</a></li>
                            <li><a href="#">プライバシーポリシー</a></li>
                            <li><a href="#">特定商取引法に基づく表記</a></li>
                            <li><a href="#">お問い合わせ</a></li>
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

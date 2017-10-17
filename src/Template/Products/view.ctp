
        <div class="container-fluid inner">

            <div id="main">

                <div id="main_middle">

    <!-- ▼item_detail▼ -->
    <div id="item_detail">
        <div id="detail_wrap" class="row">
            <!--★画像★-->
            <div id="item_photo_area" class="col-sm-6">
                <div id="detail_image_box__slides" class="slides">
                                                                    <div id="detail_image_box__item--1"><img src="/ec-cube/html/upload/save_image/cafe-1.jpg"/></div>
                                                <div id="detail_image_box__item--2"><img src="/ec-cube/html/upload/save_image/cafe-2.jpg"/></div>
                                                <div id="detail_image_box__item--3"><img src="/ec-cube/html/upload/save_image/cafe-3.jpg"/></div>
                                                            </div>
            </div>

            <section id="item_detail_area" class="col-sm-6">

                <!--★商品名★-->
                <h3 id="detail_description_box__name" class="item_name"><?= h($product->product_name) ?></h3>
                <div id="detail_description_box__body" class="item_detail">


                    <!--★通常価格★-->
                                            <p id="detail_description_box__normal_price" class="normal_price"> 通常価格：<span class="price01_default"><?= h($product->product_price) ?></span> <span class="small">税込</span></p>
                                            <!--★販売価格★-->
                    <p id="detail_description_box__sale_price" class="sale_price text-primary"> <span class="price02_default"><?= h($product->product_price) ?></span> <span class="small">税込</span></p>
                    <!--▼商品コード-->

                    <!--▲商品コード-->

                    <!-- ▼関連カテゴリ▼ -->
                    <div id="relative_category_box" class="relative_cat">
                        <p>関連カテゴリ</p>
                                                  <ol id="relative_category_box__relative_category--2_1">
                                                        <li><a id="relative_category_box__relative_category--2_1_1" href="http://localhost/ec-cube/html/products/list?category_id=1">キッチンツール</a></li>
                                                    </ol>
                                                <ol id="relative_category_box__relative_category--2_2">
                                                        <li><a id="relative_category_box__relative_category--2_2_1" href="http://localhost/ec-cube/html/products/list?category_id=1">キッチンツール</a></li>
                                                        <li><a id="relative_category_box__relative_category--2_2_4" href="http://localhost/ec-cube/html/products/list?category_id=4">調理器具</a></li>
                                                    </ol>
                                                <ol id="relative_category_box__relative_category--2_3">
                                                        <li><a id="relative_category_box__relative_category--2_3_6" href="http://localhost/ec-cube/html/products/list?category_id=6">新入荷</a></li>
                                                    </ol>
                                            </div>
                    <!-- ▲関連カテゴリ▲ -->
                    <?= $this->Form->create($product, [
                      'type'=>'post',
                      'url'=> [
                        "controller" => "Products",
                        "action" => "view",
                        $product->id
                      ]
                    ]);?>
                        <!--▼買い物かご-->
                        <div id="detail_cart_box" class="cart_area">


                                                                <dl id="detail_cart_box__cart_quantity" class="quantity">
                                    <dt>数量</dt>
                                    <dd>
                                        <input type="number" id="buy_num" name="buy_num" required="required" min="1" maxlength="9" class="form-control" value="1" />

                                    </dd>
                                </dl>

                                <div class="extra-form">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                </div>

                                                                <div id="detail_cart_box__button_area" class="btn_area">
                                    <ul id="detail_cart_box__insert_button" class="row">
                                        <li class="col-xs-12 col-sm-8"><button type="submit" id="add-cart" class="btn btn-primary btn-block prevention-btn prevention-mask">カートに入れる</button></li>
                                    </ul>
                                                                                                                <ul id="detail_cart_box__favorite_button" class="row">
                                                                                            <li class="col-xs-12 col-sm-8"><button type="submit" id="favorite" class="btn btn-info btn-block prevention-btn prevention-mask">お気に入りに追加</button></li>
                                                                                    </ul>
                                                                    </div>                                                      </div>
                        <!--▲買い物かご-->
                        <div style="display: none"><input type="hidden" id="mode" name="mode" /></div><div style="display: none"><input type="hidden" id="product_id" name="id" value="<?=$product->id?>" /></div>
                       <?= $this->Form->end()?>
                    <!--★商品説明★-->
                    <p id="detail_not_stock_box__description_detail" class="item_comment"><br />
パーコレーターはコーヒーの粉をセットして直火にかけて抽出する器具です。<br />
アウトドアでも淹れたてのコーヒーをお楽しみいただけます。<br />
いまだけ、おいしい淹れ方の冊子つきです。</p>

                </div>
                <!-- /.item_detail -->

            </section>
            <!--詳細ここまで-->
        </div>

                    </div>
    <!-- ▲item_detail▲ -->
                </div>

                                                            </div>



        </div>

        <footer id="footer">
                                                            <!-- ▼フッター -->
            <div class="container-fluid inner">
    <ul>
        <li><a href="http://localhost/ec-cube/html/help/about">当サイトについて</a></li>
        <li><a href="http://localhost/ec-cube/html/help/privacy">プライバシーポリシー</a></li>
        <li><a href="http://localhost/ec-cube/html/help/tradelaw">特定商取引法に基づく表記</a></li>
        <li><a href="http://localhost/ec-cube/html/contact">お問い合わせ</a></li>
    </ul>
    <div class="footer_logo_area">
        <p class="logo"><a href="http://localhost/ec-cube/html/">ソウビキング</a></p>
        <p class="copyright">
            <small>copyright (c) ソウビキング all rights reserved.</small>
        </p>
    </div>
</div>


        <!-- ▲フッター -->


        </footer>

    </div>

    <div id="drawer" class="drawer sp">
    </div>

</div>

<div class="overlay"></div>

<script src="/ec-cube/html/template/default/js/vendor/bootstrap.custom.min.js?v=3.0.15"></script>
<script src="/ec-cube/html/template/default/js/vendor/slick.min.js?v=3.0.15"></script>
<script src="/ec-cube/html/template/default/js/function.js?v=3.0.15"></script>
<script src="/ec-cube/html/template/default/js/eccube.js?v=3.0.15"></script>
<script>
$(function () {
    $('#drawer').append($('.drawer_block').clone(true).children());
    $.ajax({
        url: '/ec-cube/html/template/default/img/common/svg.html',
        type: 'GET',
        dataType: 'html',
    }).done(function(data){
        $('body').prepend(data);
    }).fail(function(data){
    });
});
</script>
<script>
    eccube.classCategories = {"__unselected":{"__unselected":{"name":"\u9078\u629e\u3057\u3066\u304f\u3060\u3055\u3044","product_class_id":""}},"__unselected2":{"#":{"classcategory_id2":"","name":"","stock_find":true,"price01":"3,240","price02":"3,024","product_class_id":"10","product_code":"cafe-01","product_type":"1"}}};

    // 規格2に選択肢を割り当てる。
    function fnSetClassCategories(form, classcat_id2_selected) {
        var $form = $(form);
        var product_id = $form.find('input[name=product_id]').val();
        var $sele1 = $form.find('select[name=classcategory_id1]');
        var $sele2 = $form.find('select[name=classcategory_id2]');
        eccube.setClassCategories($form, product_id, $sele1, $sele2, classcat_id2_selected);
    }

    </script>

<script>
$(function(){
    $('.carousel').slick({
        infinite: false,
        speed: 300,
        prevArrow:'<button type="button" class="slick-prev"><span class="angle-circle"><svg class="cb cb-angle-right"><use xlink:href="#cb-angle-right" /></svg></span></button>',
        nextArrow:'<button type="button" class="slick-next"><span class="angle-circle"><svg class="cb cb-angle-right"><use xlink:href="#cb-angle-right" /></svg></span></button>',
        slidesToShow: 4,
        slidesToScroll: 4,
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3
                }
            }
        ]
    });

    $('.slides').slick({
        dots: true,
        arrows: false,
        speed: 300,
        customPaging: function(slider, i) {
            return '<button class="thumbnail">' + $(slider.$slides[i]).find('img').prop('outerHTML') + '</button>';
        }
    });

    $('#favorite').click(function() {
        $('#mode').val('add_favorite');
    });

    $('#add-cart').click(function() {
        $('#mode').val('add_cart');
    });

    // bfcache無効化
    $(window).bind('pageshow', function(event) {
        if (event.originalEvent.persisted) {
            location.reload(true);
        }
    });
});
</script>

</body>
</html>

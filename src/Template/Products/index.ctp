
    	<div id="contents" class="theme_main_only">
	        <div id="contents_top"></div>
	        	<div class="container-fluid inner">
	            	<div id="main">
	                	<div id="main_middle">
	                	    <form name="form1" id="form1" method="get" action="?">
													<?php
				 									 echo $this->Form->hidden('mode');
				 									 echo $this->Form->hidden('category_id',['value' => '']);
				 									 echo $this->Form->hidden('name');
				 									 echo $this->Form->hidden('pageno');
				 									 echo $this->Form->hidden('disp_number',['value' => '15']);
				 									 echo $this->Form->hidden('orderby',['value' => '1']);
				 									?>

	    					       </form>
	<!-- ▼topicpath▼ -->
						    <div id="topicpath" class="row">
						        <ol id="list_header_menu">
						            <li><a href="http://localhost/ecsite/index">全商品</a></li>
								</ol>
						    </div>
	<!-- ▲topicpath▲ -->
						    <div id="result_info_box" class="row">
						        <form name="page_navi_top" id="page_navi_top" action="?">
						            <p id="result_info_box__item_count" class="intro col-sm-6">
										<strong>
											<span id="productscount"><?= $data_count;?></span>件
										</strong>の商品がみつかりました。
						            </p>
						                <div id="result_info_box__menu_box" class="col-sm-6 no-padding">
						                    <ul id="result_info_box__menu" class="pagenumberarea clearfix">
						                        <li id="result_info_box__disp_menu">
						                            <select id="" name="disp_number" onchange="javascript:fnChangeDispNumber(this.value);" class="form-control">
														<option value="15">15件</option>
														<option value="30">30件</option>
														<option value="50">50件</option>
													</select>
						                        </li>
						                        <li id="result_info_box__order_menu">
						                            <select id="" name="orderby" onchange="javascript:fnChangeOrderBy(this.value);" class="form-control">
														<option value="1">価格が低い順</option>
														<option value="3">価格が高い順</option>
														<option value="2">新着順</option>
													</select>
						                        </li>
						                    </ul>
						                </div>
						        </form>
						    </div>

	<!-- ▼item_list▼ -->
	    					<div id="item_list">
						        <div class="row no-padding">
											   <?php $i=0;?>
											   <?php foreach ($products as $product): ?>
											   <?php if($product->del_flg == 0){?>
					                <div id="result_list_box--2" class="col-sm-3 col-xs-6">
					                    <div id="result_list__item--2" class="product_item">
					                        <a href="<?php echo $this->Url->build([
									                              'type' => 'post',
									                              "controller" => "products",
									                              "action" => "view",
									                               $product->id
									                            ]);
									                            ?>">
					                            <div id="result_list__image--2" class="item_photo">
					                                <img src="<?= $product->product_img;?>">
					                            </div>
					                            <dl id="result_list__detail--2">
					                                <dt id="result_list__name--2" class="item_name"><?= h($product->product_name) ?></dt>
					                                <dd id="result_list__price02_inc_tax--2" class="item_price"><?= h($product->product_price) ?></dd>
					                            </dl>
					                        </a>
					                    </div>
					                </div>
													<?php }
													endforeach; ?>
	                   </div>
	    					</div>
	    <!-- ▲item_list▲ -->

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

	<script src="bootstrap.custom.min.js"></script>
	<script src="slick.min.js"></script>
	<script src="function.js"></script>
	<script src="eccube.js"></script>
	<script>
	$(function () {
	    $('#drawer').append($('.drawer_block').clone(true).children());
	    $.ajax({
	        url: 'svg.html',
	        type: 'GET',
	        dataType: 'html',
	    }).done(function(data){
	        $('body').prepend(data);
	    }).fail(function(data){
	    });
	});
	</script>
	    <script>
	        // 並び順を変更
	        function fnChangeOrderBy(orderby) {
	            eccube.setValue('orderby', orderby);
	            eccube.setValue('pageno', 1);
	            eccube.submitForm();
	        }

	        // 表示件数を変更
	        function fnChangeDispNumber(dispNumber) {
	            eccube.setValue('disp_number', dispNumber);
	            eccube.setValue('pageno', 1);
	            eccube.submitForm();
	        }
	        // 商品表示BOXの高さを揃える
	        $(window).load(function() {
	            $('.product_item').matchHeight();
	        });
	    </script>
</body>
</html>

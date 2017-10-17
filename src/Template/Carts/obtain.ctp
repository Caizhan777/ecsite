<?php  
	/**
	 * 
	 */
?>




<div id="contents" class="theme_main_only">

    <div id="contents_top">
    </div>

    <div class="container-fluid inner">
                                    
        <div id="main">
                                                
            <div id="main_middle">
                <h1 class="page-heading">ショッピングカート</h1>
                <div id="cart" class="container-fluid">
                    <div id="cart_box" class="row">
                        <div id="cart_box__body" class="col-md-10 col-md-offset-1">
                            <div id="cart_box__flow_state" class="flowline step4">
                                <ul id="cart_box__flow_state_list" class="clearfix">
                                    <li class="active"><span class="flow_number">1</span><br>カートの商品</li>
                                    <li><span class="flow_number">2</span><br>お客様情報</li>
                                    <li><span class="flow_number">3</span><br>ご注文内容確認</li>
                                    <li><span class="flow_number">4</span><br>完了</li>
                                </ul>
                            </div>

                                                
                            <form name="form" id="form_cart" method="post" action="http://127.0.0.1/eccube/html/cart">
                                <p id="cart_item__info" class="message">
                                <?php $jiage=0; ?>
                                <?php for($i=0;$i<count($cart);$i++){ 
                				$jiage+=$cart[$i]['Product.price']*$cart[$i]['buy.num']; 
                						}?>
                                商品の合計金額は「<strong>¥ <?= $jiage ?></strong>」です。
                                                        </p>
                                <div id="cart_item_list" class="cart_item table">
                                    <div class="thead">
                                        <ol id="cart_item_list__header">
                                            <li id="cart_item_list__header_cart_remove">削除</li>
                                            <li id="cart_item_list__header_product_detail">商品内容</li>
                                            <li id="cart_item_list__header_total">数量</li>
                                            <li id="cart_item_list__header_sub_total">小計</li>
                                        </ol>
                                    </div>
                                    <div id="cart_item_list__body" class="tbody">    
                                    		
                						<?php for($i=0;$i<count($cart);$i++){ ?>                                                  
                                        <div id="cart_item_list__item" class="item_box tr">
                                                
                                            <div id="cart_item_list__cart_remove" class="icon_edit td">
                                                <?=
                								$this->Html->link(
                									'删除',
                									['action' => 'delete',$i],
                									['confirm' => 'このレシピを削除してよろしいですか?']
                								);
                								?>
                                                <svg class="cb cb-close"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#cb-close"></use></svg>
                            
                                            </div>
                                            <div class="td table">
                                                <div id="cart_item_list__product_image" class="item_photo">
                                                    <a target="_blank" href="http://127.0.0.1/eccube/html/products/detail/3">
                                                        <img src="/eccube/html/upload/save_image/0928162639_59cca42fed1c7.png" alt="logo">
                                                    </a>
                                                </div>
                                                <dl class="item_detail">
                                                    <dt id="cart_item_list__product_detail" class="item_name text-default">
                                                        <a target="_blank" href="http://127.0.0.1/eccube/html/products/detail/3"><?= $cart[$i]['Product.name'] ?></a>
                                                    </dt>
                                                    <dd id="cart_item_list__class_category" class="item_pattern small">
                                                    </dd>
                                                    <dd id="cart_item_list__item_price" class="item_price"> ￥<?= $cart[$i]['Product.price'] ?></dd>

                                                </dl>
                                                </div>
                                                <div id="cart_item_list__quantity" class="item_quantity td">
                                                    <?= $cart[$i]['buy.num'] ?>
                                                    <ul id="cart_item_list__quantity_edit">
                                                        
                                                    <?= $this->Html->image('increase.png', [
                											'alt' => 'addreduce',
                											'url' => ['action' => 'addreduce','add',$i]
                										]) ?>
                				
                                                        <?php if($cart[$i]['buy.num']<=1){ ?>
                                                        	<?= $this->Html->image('wu.png');?>	

                                                        	<?php }else{  ?>
                                                        	<?= $this->Html->image('decrease.png', [
                												'alt' => 'addreduce',
                												'url' => ['action' => 'addreduce','reduce',$i]
                										]) ?>
                										<?php } ?>
                                                        
                                                    </ul>
                                                </div>
                                                <div id="cart_item_list__subtotal" class="item_subtotal td">￥<?= $cart[$i]['buy.num']*$cart[$i]['Product.price']?></div>
                                            </div><!--/item_box-->
                                                                                                        
                						<?php } ?>
                                        
                                    </div>
                                </div><!--/cart_item-->
                                <div class="total_box">
                                    <dl id="total_box__total_price" class="total_price">
                                        <dt>合計：</dt>
                                        <dd class="text-primary">￥<?= $jiage ?></dd>
                                    </dl>
                                    <div id="total_box__user_action_menu" class="btn_group">

                                        <p id="total_box__next_button">
                                            <a href="" class="btn btn-primary btn-block">レジに進む</a>
                                        </p>
                                        <p id="total_box__top_button">
                                            <a href="" class="btn btn-info btn-block">お買い物を続ける</a>
                                        </p>
                                    </div>
                                </div>

                            </form>
                            
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div>
    	   </div>
    	</div>
	</div>
</div>
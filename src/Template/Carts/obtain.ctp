<<<<<<< HEAD:src/Template/cards/obtain.ctp
<?php  
	/**
	 * 
	 */
	$id=1;
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li><?= $this->Html->link(__('返回主页'), ['controller' =>'cards','action' => 'obtain']) ?></li>
    </ul>
</nav>
<div class="books index large-9 medium-8 columns content">
	<table cellpadding="0" cellspacing="0">
		<fieldset>
			

	
	
		</fieldset>
		<thead>
			<tr>
				<th scope="col">
					<?= $this->Paginator->sort('消除') ?>
				</th>
				<th scope="col">
					<?= $this->Paginator->sort('物品名') ?>
				</th>
				<th scope="col">
					<?= $this->Paginator->sort('数量') ?>
				</th>
				<th scope="col">
					<?= $this->Paginator->sort('小计') ?>
				</th>
					
			</tr>
		</thead>
		<tbody>
			<?php $jiage=0; ?>
			<?php for($i=0;$i<count($cart);$i++){ 
				$jiage+=$cart[$i]['jiage']*$cart[$i]['buy.num'];

				?> 
			<tr>
				<td>
					<?= $this->Html->image('shanchu.png', [
						'alt' => 'delete',
						'url' => ['action' => 'delete',$i]
						]) ?>
					
				</td>
				<td>
					<?= $cart[$i]['name'] ?>
				</td>
				
				<td>
					<?= $cart[$i]['buy.num'] ?>
					<?= $this->Html->image('increase.png', [
						'alt' => 'addreduce',
						'url' => ['action' => 'addreduce','add',$i]
						]) ?>
					<?= $this->Html->image('decrease.png', [
						'alt' => 'addreduce',
						'url' => ['action' => 'addreduce','reduce',$i]
						]) ?>
				</td>
				
				<td>
					<?= $cart[$i]['jiage'] ?>
				</td>
			</tr>
			<?php } ?>
			<tr>
				<td>
					<?= "合计" ?>
				</td>
				<td>
				</td>
				<td>
				</td>
				<td>
					<?= $jiage ?>
				</td>
			</tr>
			<tr>
				<td>
				</td>
				<td>
				</td>
				<td>
					<h3><?= $this->Html->image('xiadan.jpg', [
						'alt' => 'obtain',
						'url' => ['action' => 'obtain']
						]) ?></h3>
				</td>
			</tr>
			
		</tbody>
=======
<?php  
	/**
	 * 
	 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li><?= $this->Html->link(__('返回主页'), ['controller' =>'cards','action' => 'obtain']) ?></li>
    </ul>
</nav>
<div class="books index large-9 medium-8 columns content">
	<table cellpadding="0" cellspacing="0">
		<fieldset>
			

	
	
		</fieldset>
		<thead>
			<tr>
				<th scope="col">
					<?= $this->Paginator->sort('消除') ?>
				</th>
				<th scope="col">
					<?= $this->Paginator->sort('物品名') ?>
				</th>
				<th scope="col">
					<?= $this->Paginator->sort('数量') ?>
				</th>
				<th scope="col">
					<?= $this->Paginator->sort('小计') ?>
				</th>
					
			</tr>
		</thead>
		<tbody>
			<?php $jiage=0; ?>
			<?php for($i=0;$i<count($cart);$i++){ 
				$jiage+=$cart[$i]['jiage']*$cart[$i]['buy.num'];

				?> 
			<tr>
				<td>

				<?=

				$this->Html->link(
					'删除',
					['action' => 'delete',$i],
					['confirm' => 'このレシピを削除してよろしいですか?'
					]
				);
			?>
					
					
				</td>
				<td>
					<?= $cart[$i]['name'] ?>
				</td>
				
				<td>
					<?= $cart[$i]['buy.num'] ?>
					<?= $this->Html->image('increase.png', [
						'alt' => 'addreduce',
						'url' => ['action' => 'addreduce','add',$i]
						]) ?>
					<?= $this->Html->image('decrease.png', [
						'alt' => 'addreduce',
						'url' => ['action' => 'addreduce','reduce',$i]
						]) ?>
				</td>
				
				<td>
					<?= $cart[$i]['jiage'] ?>
				</td>
			</tr>
			<?php } ?>
			<tr>
				<td>
					<?= "合计" ?>
				</td>
				<td>
				</td>
				<td>
				</td>
				<td>
					<?= $jiage ?>
				</td>
			</tr>
			<tr>
				<td>
				</td>
				<td>
				</td>
				<td>
					<h3><?= $this->Html->image('xiadan.jpg', [
						'alt' => 'obtain',
						'url' => ['action' => 'obtain']
						]) ?></h3>
				</td>
			</tr>
			
		</tbody>
>>>>>>> 93f5b2a78f658e03dae5805d1c49b62055514a0a:src/Template/Carts/obtain.ctp
	</table>
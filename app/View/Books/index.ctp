<div class="books index">
	<h2><?php echo __('Sách mới'); ?></h2>
	<h4><?php echo $this->Html->link('Xem thêm', '/sach-moi'); ?></h4>
	<?php //pr($books); ?>
	<?php echo $this->element('books', array('books'=>$books)); ?>
</div>


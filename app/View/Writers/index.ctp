<div class="writers index">
	<h2><?php echo __('Writers'); ?></h2>
	<?php echo $this->Paginator->sort('name', 'Sắp xếp theo tên');?>
	<br>
	<?php foreach($writers as $wrtier): ?>
		<?php echo $wrtier['Writer']['name'] ?>
		<br>
	<?php endforeach ?>
	<hr>
	<?php echo $this->element('pagination', array('object'=>'Tác giả'))?>
</div>

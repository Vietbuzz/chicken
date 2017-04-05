<div class="books index">
	<h2><?php echo __('Books'); ?></h2>
	<?php pr($books); ?>
	<?php foreach($books as $book): ?>
		<?php echo $book['Book']['title']; ?> <br>
		<?php echo $book['Book']['image']; ?> <br>
		<?php echo $book['Book']['sale_price']; ?> <br>
	<?php endforeach ?>
</div>


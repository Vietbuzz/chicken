<div class="booksWriters view">
<h2><?php echo __('Books Writer'); ?></h2>
	<dl>
		<dt><?php echo __('Book'); ?></dt>
		<dd>
			<?php echo $this->Html->link($booksWriter['Book']['title'], array('controller' => 'books', 'action' => 'view', $booksWriter['Book']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Writer'); ?></dt>
		<dd>
			<?php echo $this->Html->link($booksWriter['Writer']['name'], array('controller' => 'writers', 'action' => 'view', $booksWriter['Writer']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Books Writer'), array('action' => 'edit', $booksWriter['BooksWriter']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Books Writer'), array('action' => 'delete', $booksWriter['BooksWriter']['id']), array(), __('Are you sure you want to delete # %s?', $booksWriter['BooksWriter']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Books Writers'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Books Writer'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Books'), array('controller' => 'books', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Book'), array('controller' => 'books', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Writers'), array('controller' => 'writers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Writer'), array('controller' => 'writers', 'action' => 'add')); ?> </li>
	</ul>
</div>

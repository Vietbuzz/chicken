<div class="writers view">
<h2><?php echo __('Writer'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($writer['Writer']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($writer['Writer']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Slug'); ?></dt>
		<dd>
			<?php echo h($writer['Writer']['slug']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Biography'); ?></dt>
		<dd>
			<?php echo h($writer['Writer']['biography']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($writer['Writer']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Writer'), array('action' => 'edit', $writer['Writer']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Writer'), array('action' => 'delete', $writer['Writer']['id']), array(), __('Are you sure you want to delete # %s?', $writer['Writer']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Writers'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Writer'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Books'), array('controller' => 'books', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Book'), array('controller' => 'books', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Books'); ?></h3>
	<?php if (!empty($books)): ?>
		<?php echo $this->element('books', array('books'=>$books))?>
		<?php echo $this->element('pagination', array('object'=>'quyển'))?>
	<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Book'), array('controller' => 'books', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>

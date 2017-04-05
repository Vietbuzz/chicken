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
	<?php if (!empty($writer['Book'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Category Id'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Slug'); ?></th>
		<th><?php echo __('Image'); ?></th>
		<th><?php echo __('Info'); ?></th>
		<th><?php echo __('Price'); ?></th>
		<th><?php echo __('Sale Price'); ?></th>
		<th><?php echo __('Pages'); ?></th>
		<th><?php echo __('Publisher'); ?></th>
		<th><?php echo __('Publish Date'); ?></th>
		<th><?php echo __('Link Download'); ?></th>
		<th><?php echo __('Published'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($writer['Book'] as $book): ?>
		<tr>
			<td><?php echo $book['id']; ?></td>
			<td><?php echo $book['category_id']; ?></td>
			<td><?php echo $book['title']; ?></td>
			<td><?php echo $book['slug']; ?></td>
			<td><?php echo $book['image']; ?></td>
			<td><?php echo $book['info']; ?></td>
			<td><?php echo $book['price']; ?></td>
			<td><?php echo $book['sale_price']; ?></td>
			<td><?php echo $book['pages']; ?></td>
			<td><?php echo $book['publisher']; ?></td>
			<td><?php echo $book['publish_date']; ?></td>
			<td><?php echo $book['link_download']; ?></td>
			<td><?php echo $book['published']; ?></td>
			<td><?php echo $book['created']; ?></td>
			<td><?php echo $book['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'books', 'action' => 'view', $book['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'books', 'action' => 'edit', $book['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'books', 'action' => 'delete', $book['id']), array(), __('Are you sure you want to delete # %s?', $book['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Book'), array('controller' => 'books', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>

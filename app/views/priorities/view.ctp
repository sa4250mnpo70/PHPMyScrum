<div id="snavi">
	<ul>
		<li><?php echo $this->Html->link(sprintf(__('Edit %s', true), __('Priority', true)), array('action' => 'edit', $priority['Priority']['id'])); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('Delete %s', true), __('Priority', true)), array('action' => 'delete', $priority['Priority']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $priority['Priority']['id'])); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('List %s', true), __('Priorities', true)), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('New %s', true), __('Priority', true)), array('action' => 'add')); ?> </li>
	</ul>
</div>


<div class="priorities view">
<h2><?php  __('Priority');?>&nbsp;#<?php echo $priority['Priority']['id']; ?>&nbsp;<?php echo h($priority['Priority']['name']); ?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $priority['Priority']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo h($priority['Priority']['name']); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Disabled'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $priority['Priority']['disabled']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $priority['Priority']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Updated'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $priority['Priority']['updated']; ?>
			&nbsp;
		</dd>
	</dl>
</div>

<div class="related">
	<h3><?php printf(__('Related %s', true), __('Stories', true));?></h3>
	<?php if (!empty($priority['Story'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Name'); ?></th>
		<th><?php __('Businessvalue'); ?></th>
		<th><?php __('Disabled'); ?></th>
		<th><?php __('Created'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($priority['Story'] as $story):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $story['id'];?></td>
			<td><?php echo h($story['name']);?></td>
			<td><?php echo $story['businessvalue'];?></td>
			<td><?php echo $story['disabled'];?></td>
			<td><?php echo date('Y-m-d', strtotime($story['created']));?></td>
			<td class="actions">
				<?php echo $this->Html->link($html->image('detail.png'), array('controller' => 'stories', 'action' => 'view', $story['id']), array('escape' => false)); ?>
				<?php echo $this->Html->link($html->image('edit.png'), array('controller' => 'stories', 'action' => 'edit', $story['id']), array('escape' => false)); ?>
				<?php echo $this->Html->link($html->image('delete.png'), array('controller' => 'stories', 'action' => 'delete', $story['id']), array('escape' => false), sprintf(__('Are you sure you want to delete # %s?', true), $story['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
</div>

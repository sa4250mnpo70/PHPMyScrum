<?php echo $html->meta(__('Story', true), $html->url('/stories/index.rss'), array('type' => 'rss'), true);?>

<div id="snavi">
	<ul>
		<li><?php echo $this->Html->link(sprintf(__('New %s', true), __('Story', true)), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Story Board', true), array('controller' => 'stories', 'action' => 'board')); ?> </li>
		<li class="save"><?php echo $this->Html->link(sprintf(__('Save to %s', true), __('Excel', true)), array('controller' => 'stories', 'action' => 'output', 'type' => 'xls')); ?> </li>
		<li class="save"><?php echo $this->Html->link(sprintf(__('Save to %s', true), __('CSV', true)), array('controller' => 'stories', 'action' => 'output', 'type' => 'csv')); ?> </li>
		<?php if($login_user["admin"] == true) { ?>
		<li class="upload"><?php echo $this->Html->link(sprintf(__('Bulk upload %s', true), __('Story', true)), array('controller' => 'stories', 'action' => 'upload')); ?> </li>
		<?php } ?>
	</ul>
</div>

<script type="text/javascript">
<!--
jQuery(document).ready(function()
{
    jQuery('#stories_table').flexigrid({height:'auto',striped:true});
}
);
-->
</script>


<div class="stories index">
	<h2><?php __('Product Backlog');?></h2>
	<table cellpadding="0" cellspacing="0" id="stories_table">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th class="narrow"><?php echo $this->Paginator->sort(__('Story Points'), 'storypoints');?></th>
			<th><?php echo sprintf(__('Count of %s', true), __('Tasks', true)); ?></th>
			<th><?php echo sprintf(__('Sum of %s', true), __('Remaining Hours', true)); ?></th>
			<th class="narrow"><?php echo $this->Paginator->sort('businessvalue');?></th>
			<th><?php echo $this->Paginator->sort('sprint_id');?></th>
			<th><?php echo $this->Paginator->sort('priority_id');?></th>
			<th><?php echo $this->Paginator->sort('resolution_id');?></th>
			<th><?php echo $this->Paginator->sort('team_id');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<?php if(0) { ?>
			<th><?php echo $this->Paginator->sort('updated');?></th>
			<?php } ?>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	foreach ($stories as $story):
		$class = null;
		if(@$story["Story"]["resolution_id"] == RESOLUTION_DONE)
		{
			$class = ' class="done"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $this->Html->link($story['Story']['id'], array('action' => 'view', $story['Story']['id'])); ?></td>
		<td><?php echo $this->Html->link($story['Story']['name'], array('action' => 'view', $story['Story']['id'])); ?></td>
		<td><?php echo $story['Story']['storypoints']; ?>&nbsp;</td>
		<td><?php echo $story['Story']["task_count"]; ?></td>
		<td><?php echo $story['Story']["total_hours"]; ?></td>
		<td><?php echo $story['Story']['businessvalue']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($story['Sprint']['name'], array('controller' => 'sprints', 'action' => 'view', $story['Sprint']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($story['Priority']['name'], array('controller' => 'priorities', 'action' => 'view', $story['Priority']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($story['Resolution']['name'], array('controller' => 'resolutions', 'action' => 'view', $story['Resolution']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($story['Team']['name'], array('controller' => 'teams', 'action' => 'view', $story['Team']['id'])); ?>
		</td>
		<td><?php echo date('Y-m-d', strtotime($story['Story']['created'])); ?>&nbsp;</td>
		<?php if(0) { ?>
		<td><?php echo date('Y-m-d', strtotime($story['Story']['updated'])); ?>&nbsp;</td>
		<?php } ?>
		<td class="actions narrow">
			<?php echo $this->Html->link($html->image('check.png'), array('controller' => 'stories', 'action' => 'done', $story['Story']['id'], '?' => array('return_url' => urlencode($_SERVER['REQUEST_URI']))), array('escape' => false), sprintf(__('Are you sure you want to chage # %s to be finished?', true), $story['Story']['id'])); ?>
			<?php echo $this->Html->link($html->image('edit.png'), array('action' => 'edit', $story['Story']['id']), array('escape' => false)); ?>
			<?php echo $this->Html->link($html->image('delete.png'), array('action' => 'delete', $story['Story']['id']), array('escape' => false), sprintf(__('Are you sure you want to delete # %s?', true), $story['Story']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true).' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>

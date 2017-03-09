<div class="albuns view">
<h2><?php echo __('Album'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($album['Album']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Album Tipo Id'); ?></dt>
		<dd>
			<?php echo h($album['Album']['album_tipo_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Galeria Id'); ?></dt>
		<dd>
			<?php echo h($album['Album']['galeria_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nome'); ?></dt>
		<dd>
			<?php echo h($album['Album']['nome']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Slug'); ?></dt>
		<dd>
			<?php echo h($album['Album']['slug']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($album['Album']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($album['Album']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Album'), array('action' => 'edit', $album['Album']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Album'), array('action' => 'delete', $album['Album']['id']), array(), __('Are you sure you want to delete # %s?', $album['Album']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Albuns'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Album'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Albuns Tipos'), array('controller' => 'albuns_tipos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Albuns Tipo'), array('controller' => 'albuns_tipos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Albuns Imagens'), array('controller' => 'albuns_imagens', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Albuns Imagem'), array('controller' => 'albuns_imagens', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Albuns Videos'), array('controller' => 'albuns_videos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Albuns Video'), array('controller' => 'albuns_videos', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Albuns Imagens'); ?></h3>
	<?php if (!empty($album['AlbunsImagem'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Album Id'); ?></th>
		<th><?php echo __('Imagem'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($album['AlbunsImagem'] as $albunsImagem): ?>
		<tr>
			<td><?php echo $albunsImagem['id']; ?></td>
			<td><?php echo $albunsImagem['album_id']; ?></td>
			<td><?php echo $albunsImagem['imagem']; ?></td>
			<td><?php echo $albunsImagem['created']; ?></td>
			<td><?php echo $albunsImagem['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'albuns_imagens', 'action' => 'view', $albunsImagem['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'albuns_imagens', 'action' => 'edit', $albunsImagem['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'albuns_imagens', 'action' => 'delete', $albunsImagem['id']), array(), __('Are you sure you want to delete # %s?', $albunsImagem['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Albuns Imagem'), array('controller' => 'albuns_imagens', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Albuns Videos'); ?></h3>
	<?php if (!empty($album['AlbunsVideo'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Album Id'); ?></th>
		<th><?php echo __('Url'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($album['AlbunsVideo'] as $albunsVideo): ?>
		<tr>
			<td><?php echo $albunsVideo['id']; ?></td>
			<td><?php echo $albunsVideo['album_id']; ?></td>
			<td><?php echo $albunsVideo['url']; ?></td>
			<td><?php echo $albunsVideo['created']; ?></td>
			<td><?php echo $albunsVideo['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'albuns_videos', 'action' => 'view', $albunsVideo['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'albuns_videos', 'action' => 'edit', $albunsVideo['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'albuns_videos', 'action' => 'delete', $albunsVideo['id']), array(), __('Are you sure you want to delete # %s?', $albunsVideo['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Albuns Video'), array('controller' => 'albuns_videos', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>

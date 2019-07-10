<?php
/* @var $this \Cake\View\View */
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('New Worker'), ['action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Rentals'), ['controller' => 'Rentals', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Rental'), ['controller' => 'Rentals', 'action' => 'add']); ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>

<table class="table table-striped" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id'); ?></th>
            <th><?= $this->Paginator->sort('user_id'); ?></th>
            <th><?= $this->Paginator->sort('turn'); ?></th>
            <th><?= $this->Paginator->sort('cell_phone_number'); ?></th>
            <th><?= $this->Paginator->sort('created'); ?></th>
            <th><?= $this->Paginator->sort('modified'); ?></th>
            <th class="actions"><?= __('Actions'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($workers as $worker): ?>
        <tr>
            <td><?= $this->Number->format($worker->id) ?></td>
            <td>
                <?= $worker->has('user') ? $this->Html->link($worker->user->name, ['controller' => 'Users', 'action' => 'view', $worker->user->id]) : '' ?>
            </td>
            <td><?= h($worker->turn) ?></td>
            <td><?= $this->Number->format($worker->cell_phone_number) ?></td>
            <td><?= h($worker->created) ?></td>
            <td><?= h($worker->modified) ?></td>
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'view', $worker->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                <?= $this->Html->link('', ['action' => 'edit', $worker->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                <?= $this->Form->postLink('', ['action' => 'delete', $worker->id], ['confirm' => __('Are you sure you want to delete # {0}?', $worker->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<div class="paginator">
    <ul class="pagination">
        <?= $this->Paginator->prev('< ' . __('previous')) ?>
        <?= $this->Paginator->numbers(['before' => '', 'after' => '']) ?>
        <?= $this->Paginator->next(__('next') . ' >') ?>
    </ul>
    <p><?= $this->Paginator->counter() ?></p>
</div>

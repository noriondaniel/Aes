<?php
/* @var $this \Cake\View\View */
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('New Rental'), ['action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Client'), ['controller' => 'Clients', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Boxs'), ['controller' => 'Boxs', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Box'), ['controller' => 'Boxs', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Workers'), ['controller' => 'Workers', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Worker'), ['controller' => 'Workers', 'action' => 'add']); ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>

<table class="table table-striped" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id'); ?></th>
            <th><?= $this->Paginator->sort('client_id'); ?></th>
            <th><?= $this->Paginator->sort('box_id'); ?></th>
            <th><?= $this->Paginator->sort('worker_id'); ?></th>
            <th><?= $this->Paginator->sort('number_of_people'); ?></th>
            <th><?= $this->Paginator->sort('time'); ?></th>
            <th><?= $this->Paginator->sort('status'); ?></th>
            <th class="actions"><?= __('Actions'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($rentals as $rental): ?>
        <tr>
            <td><?= $this->Number->format($rental->id) ?></td>
            <td>
                <?= $rental->has('client') ? $this->Html->link($rental->client->id, ['controller' => 'Clients', 'action' => 'view', $rental->client->id]) : '' ?>
            </td>
            <td>
                <?= $rental->has('box') ? $this->Html->link($rental->box->id, ['controller' => 'Boxs', 'action' => 'view', $rental->box->id]) : '' ?>
            </td>
            <td>
                <?= $rental->has('worker') ? $this->Html->link($rental->worker->id, ['controller' => 'Workers', 'action' => 'view', $rental->worker->id]) : '' ?>
            </td>
            <td><?= $this->Number->format($rental->number_of_people) ?></td>
            <td><?= $this->Number->format($rental->time) ?></td>
            <td><?= h($rental->status) ?></td>
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'view', $rental->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                <?= $this->Html->link('', ['action' => 'edit', $rental->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                <?= $this->Form->postLink('', ['action' => 'delete', $rental->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rental->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
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

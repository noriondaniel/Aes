<?php
/* @var $this \Cake\View\View */
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('New Reservation'), ['action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Client'), ['controller' => 'Clients', 'action' => 'add']); ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>

<table class="table table-striped" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id'); ?></th>
            <th><?= $this->Paginator->sort('client_id'); ?></th>
            <th><?= $this->Paginator->sort('number_of_people'); ?></th>
            <th><?= $this->Paginator->sort('start'); ?></th>
            <th><?= $this->Paginator->sort('finished'); ?></th>
            <th><?= $this->Paginator->sort('status'); ?></th>
            <th><?= $this->Paginator->sort('created'); ?></th>
            <th class="actions"><?= __('Actions'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($reservations as $reservation): ?>
        <tr>
            <td><?= $this->Number->format($reservation->id) ?></td>
            <td>
                <?= $reservation->has('client') ? $this->Html->link($reservation->client->id, ['controller' => 'Clients', 'action' => 'view', $reservation->client->id]) : '' ?>
            </td>
            <td><?= $this->Number->format($reservation->number_of_people) ?></td>
            <td><?= h($reservation->start) ?></td>
            <td><?= h($reservation->finished) ?></td>
            <td><?= h($reservation->status) ?></td>
            <td><?= h($reservation->created) ?></td>
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'view', $reservation->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                <?= $this->Html->link('', ['action' => 'edit', $reservation->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                <?= $this->Form->postLink('', ['action' => 'delete', $reservation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reservation->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
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

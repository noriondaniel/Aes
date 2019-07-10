<?php
/* @var $this \Cake\View\View */
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('New Client'), ['action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Ballots'), ['controller' => 'Ballots', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Ballot'), ['controller' => 'Ballots', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Punishments'), ['controller' => 'Punishments', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Punishment'), ['controller' => 'Punishments', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Rentals'), ['controller' => 'Rentals', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Rental'), ['controller' => 'Rentals', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Reservations'), ['controller' => 'Reservations', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Reservation'), ['controller' => 'Reservations', 'action' => 'add']); ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>

<table class="table table-striped" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id'); ?></th>
            <th><?= $this->Paginator->sort('user_id'); ?></th>
            <th><?= $this->Paginator->sort('dni'); ?></th>
            <th><?= $this->Paginator->sort('cell_phone_number'); ?></th>
            <th><?= $this->Paginator->sort('created'); ?></th>
            <th><?= $this->Paginator->sort('modified'); ?></th>
            <th class="actions"><?= __('Actions'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($clients as $client): ?>
        <tr>
            <td><?= $this->Number->format($client->id) ?></td>
            <td>
                <?= $client->has('user') ? $this->Html->link($client->user->name, ['controller' => 'Users', 'action' => 'view', $client->user->id]) : '' ?>
            </td>
            <td><?= h($client->dni) ?></td>
            <td><?= $this->Number->format($client->cell_phone_number) ?></td>
            <td><?= h($client->created) ?></td>
            <td><?= h($client->modified) ?></td>
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'view', $client->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                <?= $this->Html->link('', ['action' => 'edit', $client->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                <?= $this->Form->postLink('', ['action' => 'delete', $client->id], ['confirm' => __('Are you sure you want to delete # {0}?', $client->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
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

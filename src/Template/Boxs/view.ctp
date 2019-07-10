<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Box'), ['action' => 'edit', $box->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Box'), ['action' => 'delete', $box->id], ['confirm' => __('Are you sure you want to delete # {0}?', $box->id)]) ?> </li>
<li><?= $this->Html->link(__('List Boxs'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Box'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Rentals'), ['controller' => 'Rentals', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Rental'), ['controller' => 'Rentals', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Box'), ['action' => 'edit', $box->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Box'), ['action' => 'delete', $box->id], ['confirm' => __('Are you sure you want to delete # {0}?', $box->id)]) ?> </li>
<li><?= $this->Html->link(__('List Boxs'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Box'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Rentals'), ['controller' => 'Rentals', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Rental'), ['controller' => 'Rentals', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($box->id) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($box->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Created') ?></td>
            <td><?= h($box->created) ?></td>
        </tr>
        <tr>
            <td><?= __('Modified') ?></td>
            <td><?= h($box->modified) ?></td>
        </tr>
        <tr>
            <td><?= __('Status') ?></td>
            <td><?= $box->status ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related Rentals') ?></h3>
    </div>
    <?php if (!empty($box->rentals)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Client Id') ?></th>
                <th><?= __('Box Id') ?></th>
                <th><?= __('Worker Id') ?></th>
                <th><?= __('Number Of People') ?></th>
                <th><?= __('Time') ?></th>
                <th><?= __('Status') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($box->rentals as $rentals): ?>
                <tr>
                    <td><?= h($rentals->id) ?></td>
                    <td><?= h($rentals->client_id) ?></td>
                    <td><?= h($rentals->box_id) ?></td>
                    <td><?= h($rentals->worker_id) ?></td>
                    <td><?= h($rentals->number_of_people) ?></td>
                    <td><?= h($rentals->time) ?></td>
                    <td><?= h($rentals->status) ?></td>
                    <td><?= h($rentals->created) ?></td>
                    <td><?= h($rentals->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'Rentals', 'action' => 'view', $rentals->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['controller' => 'Rentals', 'action' => 'edit', $rentals->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                        <?= $this->Form->postLink('', ['controller' => 'Rentals', 'action' => 'delete', $rentals->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rentals->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">no related Rentals</p>
    <?php endif; ?>
</div>

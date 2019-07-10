<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Rental'), ['action' => 'edit', $rental->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Rental'), ['action' => 'delete', $rental->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rental->id)]) ?> </li>
<li><?= $this->Html->link(__('List Rentals'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Rental'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Client'), ['controller' => 'Clients', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Boxs'), ['controller' => 'Boxs', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Box'), ['controller' => 'Boxs', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Workers'), ['controller' => 'Workers', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Worker'), ['controller' => 'Workers', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Rental'), ['action' => 'edit', $rental->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Rental'), ['action' => 'delete', $rental->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rental->id)]) ?> </li>
<li><?= $this->Html->link(__('List Rentals'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Rental'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Client'), ['controller' => 'Clients', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Boxs'), ['controller' => 'Boxs', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Box'), ['controller' => 'Boxs', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Workers'), ['controller' => 'Workers', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Worker'), ['controller' => 'Workers', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($rental->id) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Client') ?></td>
            <td><?= $rental->has('client') ? $this->Html->link($rental->client->id, ['controller' => 'Clients', 'action' => 'view', $rental->client->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Box') ?></td>
            <td><?= $rental->has('box') ? $this->Html->link($rental->box->id, ['controller' => 'Boxs', 'action' => 'view', $rental->box->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Worker') ?></td>
            <td><?= $rental->has('worker') ? $this->Html->link($rental->worker->id, ['controller' => 'Workers', 'action' => 'view', $rental->worker->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($rental->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Number Of People') ?></td>
            <td><?= $this->Number->format($rental->number_of_people) ?></td>
        </tr>
        <tr>
            <td><?= __('Time') ?></td>
            <td><?= $this->Number->format($rental->time) ?></td>
        </tr>
        <tr>
            <td><?= __('Created') ?></td>
            <td><?= h($rental->created) ?></td>
        </tr>
        <tr>
            <td><?= __('Modified') ?></td>
            <td><?= h($rental->modified) ?></td>
        </tr>
        <tr>
            <td><?= __('Status') ?></td>
            <td><?= $rental->status ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>


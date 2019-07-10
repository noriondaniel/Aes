<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Reservation'), ['action' => 'edit', $reservation->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Reservation'), ['action' => 'delete', $reservation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reservation->id)]) ?> </li>
<li><?= $this->Html->link(__('List Reservations'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Reservation'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Client'), ['controller' => 'Clients', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Reservation'), ['action' => 'edit', $reservation->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Reservation'), ['action' => 'delete', $reservation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reservation->id)]) ?> </li>
<li><?= $this->Html->link(__('List Reservations'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Reservation'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Client'), ['controller' => 'Clients', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($reservation->id) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Client') ?></td>
            <td><?= $reservation->has('client') ? $this->Html->link($reservation->client->id, ['controller' => 'Clients', 'action' => 'view', $reservation->client->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($reservation->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Number Of People') ?></td>
            <td><?= $this->Number->format($reservation->number_of_people) ?></td>
        </tr>
        <tr>
            <td><?= __('Start') ?></td>
            <td><?= h($reservation->start) ?></td>
        </tr>
        <tr>
            <td><?= __('Finished') ?></td>
            <td><?= h($reservation->finished) ?></td>
        </tr>
        <tr>
            <td><?= __('Created') ?></td>
            <td><?= h($reservation->created) ?></td>
        </tr>
        <tr>
            <td><?= __('Modified') ?></td>
            <td><?= h($reservation->modified) ?></td>
        </tr>
        <tr>
            <td><?= __('Status') ?></td>
            <td><?= $reservation->status ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>


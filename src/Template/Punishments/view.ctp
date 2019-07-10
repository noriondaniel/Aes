<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Punishment'), ['action' => 'edit', $punishment->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Punishment'), ['action' => 'delete', $punishment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $punishment->id)]) ?> </li>
<li><?= $this->Html->link(__('List Punishments'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Punishment'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Client'), ['controller' => 'Clients', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Punishment'), ['action' => 'edit', $punishment->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Punishment'), ['action' => 'delete', $punishment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $punishment->id)]) ?> </li>
<li><?= $this->Html->link(__('List Punishments'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Punishment'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Client'), ['controller' => 'Clients', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($punishment->id) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Client') ?></td>
            <td><?= $punishment->has('client') ? $this->Html->link($punishment->client->id, ['controller' => 'Clients', 'action' => 'view', $punishment->client->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Type') ?></td>
            <td><?= h($punishment->type) ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($punishment->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Created') ?></td>
            <td><?= h($punishment->created) ?></td>
        </tr>
        <tr>
            <td><?= __('Modified') ?></td>
            <td><?= h($punishment->modified) ?></td>
        </tr>
        <tr>
            <td><?= __('Status') ?></td>
            <td><?= $punishment->status ? __('Yes') : __('No'); ?></td>
        </tr>
    </table>
</div>


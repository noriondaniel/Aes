<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Purchase'), ['action' => 'edit', $purchase->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Purchase'), ['action' => 'delete', $purchase->id], ['confirm' => __('Are you sure you want to delete # {0}?', $purchase->id)]) ?> </li>
<li><?= $this->Html->link(__('List Purchases'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Purchase'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Ballots'), ['controller' => 'Ballots', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Ballot'), ['controller' => 'Ballots', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Purchase'), ['action' => 'edit', $purchase->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Purchase'), ['action' => 'delete', $purchase->id], ['confirm' => __('Are you sure you want to delete # {0}?', $purchase->id)]) ?> </li>
<li><?= $this->Html->link(__('List Purchases'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Purchase'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Ballots'), ['controller' => 'Ballots', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Ballot'), ['controller' => 'Ballots', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($purchase->id) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Ballot') ?></td>
            <td><?= $purchase->has('ballot') ? $this->Html->link($purchase->ballot->id, ['controller' => 'Ballots', 'action' => 'view', $purchase->ballot->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Product') ?></td>
            <td><?= $purchase->has('product') ? $this->Html->link($purchase->product->name, ['controller' => 'Products', 'action' => 'view', $purchase->product->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($purchase->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Quantity') ?></td>
            <td><?= $this->Number->format($purchase->quantity) ?></td>
        </tr>
        <tr>
            <td><?= __('Created') ?></td>
            <td><?= h($purchase->created) ?></td>
        </tr>
        <tr>
            <td><?= __('Modified') ?></td>
            <td><?= h($purchase->modified) ?></td>
        </tr>
    </table>
</div>


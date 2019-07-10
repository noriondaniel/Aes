<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Ballot'), ['action' => 'edit', $ballot->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Ballot'), ['action' => 'delete', $ballot->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ballot->id)]) ?> </li>
<li><?= $this->Html->link(__('List Ballots'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Ballot'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Client'), ['controller' => 'Clients', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Purchases'), ['controller' => 'Purchases', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Purchase'), ['controller' => 'Purchases', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('Export to PDF'), ['action' => 'view', $ballot->id, '_ext' => 'pdf']); ?></li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Ballot'), ['action' => 'edit', $ballot->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Ballot'), ['action' => 'delete', $ballot->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ballot->id)]) ?> </li>
<li><?= $this->Html->link(__('List Ballots'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Ballot'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Client'), ['controller' => 'Clients', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Purchases'), ['controller' => 'Purchases', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Purchase'), ['controller' => 'Purchases', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('Export to PDF'), ['action' => 'view', $ballot->id, '_ext' => 'pdf']); ?></li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($ballot->id) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Client') ?></td>
            <td><?= $ballot->has('client') ? $this->Html->link($ballot->client->id, ['controller' => 'Clients', 'action' => 'view', $ballot->client->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($ballot->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Created') ?></td>
            <td><?= h($ballot->created) ?></td>
        </tr>
        <tr>
            <td><?= __('Modified') ?></td>
            <td><?= h($ballot->modified) ?></td>
        </tr>
    </table>
</div>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related Purchases') ?></h3>
    </div>
    <?php if (!empty($ballot->purchases)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Ballot Id') ?></th>
                <th><?= __('Product Id') ?></th>
                <th><?= __('Quantity') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($ballot->purchases as $purchases): ?>
                <tr>
                    <td><?= h($purchases->id) ?></td>
                    <td><?= h($purchases->ballot_id) ?></td>
                    <td><?= h($purchases->product_id) ?></td>
                    <td><?= h($purchases->quantity) ?></td>
                    <td><?= h($purchases->created) ?></td>
                    <td><?= h($purchases->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'Purchases', 'action' => 'view', $purchases->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['controller' => 'Purchases', 'action' => 'edit', $purchases->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                        <?= $this->Form->postLink('', ['controller' => 'Purchases', 'action' => 'delete', $purchases->id], ['confirm' => __('Are you sure you want to delete # {0}?', $purchases->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">no related Purchases</p>
    <?php endif; ?>
</div>

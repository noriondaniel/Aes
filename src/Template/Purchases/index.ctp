<?php
/* @var $this \Cake\View\View */
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('New Purchase'), ['action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Ballots'), ['controller' => 'Ballots', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Ballot'), ['controller' => 'Ballots', 'action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']); ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>

<table class="table table-striped" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id'); ?></th>
            <th><?= $this->Paginator->sort('ballot_id'); ?></th>
            <th><?= $this->Paginator->sort('product_id'); ?></th>
            <th><?= $this->Paginator->sort('quantity'); ?></th>
            <th><?= $this->Paginator->sort('created'); ?></th>
            <th><?= $this->Paginator->sort('modified'); ?></th>
            <th class="actions"><?= __('Actions'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($purchases as $purchase): ?>
        <tr>
            <td><?= $this->Number->format($purchase->id) ?></td>
            <td>
                <?= $purchase->has('ballot') ? $this->Html->link($purchase->ballot->id, ['controller' => 'Ballots', 'action' => 'view', $purchase->ballot->id]) : '' ?>
            </td>
            <td>
                <?= $purchase->has('product') ? $this->Html->link($purchase->product->name, ['controller' => 'Products', 'action' => 'view', $purchase->product->id]) : '' ?>
            </td>
            <td><?= $this->Number->format($purchase->quantity) ?></td>
            <td><?= h($purchase->created) ?></td>
            <td><?= h($purchase->modified) ?></td>
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'view', $purchase->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                <?= $this->Html->link('', ['action' => 'edit', $purchase->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                <?= $this->Form->postLink('', ['action' => 'delete', $purchase->id], ['confirm' => __('Are you sure you want to delete # {0}?', $purchase->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
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

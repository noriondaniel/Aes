<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Purchase $purchase
 */
?>
<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('List Purchases'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Ballots'), ['controller' => 'Ballots', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Ballot'), ['controller' => 'Ballots', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?= $this->Html->link(__('List Purchases'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Ballots'), ['controller' => 'Ballots', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Ballot'), ['controller' => 'Ballots', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($purchase); ?>
<fieldset>
    <legend><?= __('Add {0}', ['Purchase']) ?></legend>
    <?php
    echo $this->Form->control('ballot_id', ['options' => $ballots]);
    echo $this->Form->control('product_id', ['options' => $products]);
    echo $this->Form->control('quantity');
    ?>
</fieldset>
<?= $this->Form->button(__("Add")); ?>
<?= $this->Form->end() ?>

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Rental $rental
 */
?>
<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('List Rentals'), ['action' => 'index']) ?></li>
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
    <li><?= $this->Html->link(__('List Rentals'), ['action' => 'index']) ?></li>
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
<?= $this->Form->create($rental); ?>
<fieldset>
    <legend><?= __('Add {0}', ['Rental']) ?></legend>
    <?php
    echo $this->Form->control('client_id', ['options' => $clients]);
    echo $this->Form->control('box_id', ['options' => $boxs]);
    echo $this->Form->control('worker_id', ['options' => $workers]);
    echo $this->Form->control('number_of_people');
    echo $this->Form->control('time');
    echo $this->Form->control('status');
    ?>
</fieldset>
<?= $this->Form->button(__("Add")); ?>
<?= $this->Form->end() ?>

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Worker $worker
 */
?>
<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $worker->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $worker->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Workers'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Rentals'), ['controller' => 'Rentals', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Rental'), ['controller' => 'Rentals', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $worker->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $worker->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Workers'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Rentals'), ['controller' => 'Rentals', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Rental'), ['controller' => 'Rentals', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($worker); ?>
<fieldset>
    <legend><?= __('Edit {0}', ['Worker']) ?></legend>
    <?php
    echo $this->Form->control('user_id', ['options' => $users]);
    echo $this->Form->control('turn');
    echo $this->Form->control('cell_phone_number');
    ?>
</fieldset>
<?= $this->Form->button(__("Save")); ?>
<?= $this->Form->end() ?>

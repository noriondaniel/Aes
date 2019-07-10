<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Box $box
 */
?>
<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $box->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $box->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Boxs'), ['action' => 'index']) ?></li>
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
        ['action' => 'delete', $box->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $box->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Boxs'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Rentals'), ['controller' => 'Rentals', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Rental'), ['controller' => 'Rentals', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($box); ?>
<fieldset>
    <legend><?= __('Edit {0}', ['Box']) ?></legend>
    <?php
    echo $this->Form->control('status');
    ?>
</fieldset>
<?= $this->Form->button(__("Save")); ?>
<?= $this->Form->end() ?>

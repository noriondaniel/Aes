<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Reservation $reservation
 */
?>
<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $reservation->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $reservation->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Reservations'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Client'), ['controller' => 'Clients', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $reservation->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $reservation->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Reservations'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Client'), ['controller' => 'Clients', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($reservation); ?>
<fieldset>
    <legend><?= __('Edit {0}', ['Reservation']) ?></legend>
    <?php
    echo $this->Form->control('client_id', ['options' => $clients]);
    echo $this->Form->control('number_of_people');
    echo $this->Form->control('start');
    echo $this->Form->control('finished');
    echo $this->Form->control('status');
    ?>
</fieldset>
<?= $this->Form->button(__("Save")); ?>
<?= $this->Form->end() ?>

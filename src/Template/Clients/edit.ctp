<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Client $client
 */
?>
<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $client->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $client->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Clients'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Ballots'), ['controller' => 'Ballots', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Ballot'), ['controller' => 'Ballots', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Punishments'), ['controller' => 'Punishments', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Punishment'), ['controller' => 'Punishments', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Rentals'), ['controller' => 'Rentals', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Rental'), ['controller' => 'Rentals', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Reservations'), ['controller' => 'Reservations', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Reservation'), ['controller' => 'Reservations', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $client->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $client->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Clients'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Ballots'), ['controller' => 'Ballots', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Ballot'), ['controller' => 'Ballots', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Punishments'), ['controller' => 'Punishments', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Punishment'), ['controller' => 'Punishments', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Rentals'), ['controller' => 'Rentals', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Rental'), ['controller' => 'Rentals', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Reservations'), ['controller' => 'Reservations', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Reservation'), ['controller' => 'Reservations', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($client); ?>
<fieldset>
    <legend><?= __('Edit {0}', ['Client']) ?></legend>
    <?php
    echo $this->Form->control('user_id', ['options' => $users]);
    echo $this->Form->control('dni');
    echo $this->Form->control('cell_phone_number');
    ?>
</fieldset>
<?= $this->Form->button(__("Save")); ?>
<?= $this->Form->end() ?>

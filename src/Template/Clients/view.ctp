<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Client'), ['action' => 'edit', $client->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Client'), ['action' => 'delete', $client->id], ['confirm' => __('Are you sure you want to delete # {0}?', $client->id)]) ?> </li>
<li><?= $this->Html->link(__('List Clients'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Client'), ['action' => 'add']) ?> </li>
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
<li><?= $this->Html->link(__('Edit Client'), ['action' => 'edit', $client->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Client'), ['action' => 'delete', $client->id], ['confirm' => __('Are you sure you want to delete # {0}?', $client->id)]) ?> </li>
<li><?= $this->Html->link(__('List Clients'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Client'), ['action' => 'add']) ?> </li>
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
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($client->id) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('User') ?></td>
            <td><?= $client->has('user') ? $this->Html->link($client->user->name, ['controller' => 'Users', 'action' => 'view', $client->user->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Dni') ?></td>
            <td><?= h($client->dni) ?></td>
        </tr>
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= $this->Number->format($client->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Cell Phone Number') ?></td>
            <td><?= $this->Number->format($client->cell_phone_number) ?></td>
        </tr>
        <tr>
            <td><?= __('Created') ?></td>
            <td><?= h($client->created) ?></td>
        </tr>
        <tr>
            <td><?= __('Modified') ?></td>
            <td><?= h($client->modified) ?></td>
        </tr>
    </table>
</div>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related Ballots') ?></h3>
    </div>
    <?php if (!empty($client->ballots)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Client Id') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($client->ballots as $ballots): ?>
                <tr>
                    <td><?= h($ballots->id) ?></td>
                    <td><?= h($ballots->client_id) ?></td>
                    <td><?= h($ballots->created) ?></td>
                    <td><?= h($ballots->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'Ballots', 'action' => 'view', $ballots->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['controller' => 'Ballots', 'action' => 'edit', $ballots->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                        <?= $this->Form->postLink('', ['controller' => 'Ballots', 'action' => 'delete', $ballots->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ballots->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">no related Ballots</p>
    <?php endif; ?>
</div>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related Punishments') ?></h3>
    </div>
    <?php if (!empty($client->punishments)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Client Id') ?></th>
                <th><?= __('Status') ?></th>
                <th><?= __('Type') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($client->punishments as $punishments): ?>
                <tr>
                    <td><?= h($punishments->id) ?></td>
                    <td><?= h($punishments->client_id) ?></td>
                    <td><?= h($punishments->status) ?></td>
                    <td><?= h($punishments->type) ?></td>
                    <td><?= h($punishments->created) ?></td>
                    <td><?= h($punishments->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'Punishments', 'action' => 'view', $punishments->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['controller' => 'Punishments', 'action' => 'edit', $punishments->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                        <?= $this->Form->postLink('', ['controller' => 'Punishments', 'action' => 'delete', $punishments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $punishments->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">no related Punishments</p>
    <?php endif; ?>
</div>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related Rentals') ?></h3>
    </div>
    <?php if (!empty($client->rentals)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Client Id') ?></th>
                <th><?= __('Box Id') ?></th>
                <th><?= __('Worker Id') ?></th>
                <th><?= __('Number Of People') ?></th>
                <th><?= __('Time') ?></th>
                <th><?= __('Status') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($client->rentals as $rentals): ?>
                <tr>
                    <td><?= h($rentals->id) ?></td>
                    <td><?= h($rentals->client_id) ?></td>
                    <td><?= h($rentals->box_id) ?></td>
                    <td><?= h($rentals->worker_id) ?></td>
                    <td><?= h($rentals->number_of_people) ?></td>
                    <td><?= h($rentals->time) ?></td>
                    <td><?= h($rentals->status) ?></td>
                    <td><?= h($rentals->created) ?></td>
                    <td><?= h($rentals->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'Rentals', 'action' => 'view', $rentals->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['controller' => 'Rentals', 'action' => 'edit', $rentals->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                        <?= $this->Form->postLink('', ['controller' => 'Rentals', 'action' => 'delete', $rentals->id], ['confirm' => __('Are you sure you want to delete # {0}?', $rentals->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">no related Rentals</p>
    <?php endif; ?>
</div>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related Reservations') ?></h3>
    </div>
    <?php if (!empty($client->reservations)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Client Id') ?></th>
                <th><?= __('Number Of People') ?></th>
                <th><?= __('Start') ?></th>
                <th><?= __('Finished') ?></th>
                <th><?= __('Status') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($client->reservations as $reservations): ?>
                <tr>
                    <td><?= h($reservations->id) ?></td>
                    <td><?= h($reservations->client_id) ?></td>
                    <td><?= h($reservations->number_of_people) ?></td>
                    <td><?= h($reservations->start) ?></td>
                    <td><?= h($reservations->finished) ?></td>
                    <td><?= h($reservations->status) ?></td>
                    <td><?= h($reservations->created) ?></td>
                    <td><?= h($reservations->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'Reservations', 'action' => 'view', $reservations->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['controller' => 'Reservations', 'action' => 'edit', $reservations->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                        <?= $this->Form->postLink('', ['controller' => 'Reservations', 'action' => 'delete', $reservations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $reservations->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">no related Reservations</p>
    <?php endif; ?>
</div>

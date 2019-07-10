<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<?= $this->Html->css(captcha_layout_stylesheet_url(), ['inline' => false]) ?>
<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Client'), ['controller' => 'Clients', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Workers'), ['controller' => 'Workers', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Worker'), ['controller' => 'Workers', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Client'), ['controller' => 'Clients', 'action' => 'add']) ?> </li>
    <li><?= $this->Html->link(__('List Workers'), ['controller' => 'Workers', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Worker'), ['controller' => 'Workers', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($user); ?>
<fieldset>
    <legend><?= __('Add {0}', ['User']) ?></legend>
    <?php
    echo $this->Form->control('name');
    echo $this->Form->control('email');
    echo $this->Form->control('password');
    echo $this->Form->control('status');
    echo $this->Form->control('role');
    ?>
</fieldset>
<!-- show captcha image --> 
    <?= captcha_image_html() ?> 
    <!-- Captcha code user input textbox --> 
    <?= $this->Form->input('CaptchaCode', [ 
        'label' => 'Retype the characters from the picture:', 
            'maxlength' => '10', 
            'style' => 'width: 270px;', 
            'id' => 'CaptchaCode' 
    ]) ?>
<?= $this->Form->button(__("Add")); ?>
<?= $this->Form->end() ?>

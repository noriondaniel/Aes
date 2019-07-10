<?php
/* @var $this \Cake\View\View */
use Cake\Core\Configure;

$this->Html->css('BootstrapUI.dashboard', ['block' => true]);
$this->prepend('tb_body_attrs', ' class="' . implode(' ', [$this->request->getParam('controller'), $this->request->getParam('action')]) . '" ');
$this->start('tb_body_start');
?>
<body <?= $this->fetch('tb_body_attrs') ?>>
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><?= Configure::read('App.title') ?></a>
            </div>
            <div class="navbar-collapse collapse">
             

                <ul class="nav navbar-nav navbar-right"> 
                <?= $this->Html->image("icons/32/United-States-Flag-icon.png",[
                    "alt"=>"English",
                    'url'=>['controller'=>'App','action'=>'change-language','en-US']
                    ]); ?>
                <?= $this->Html->image("icons/32/Peru-Flag-icon.png",[
                    "alt"=>"Español",
                    'url'=>['controller'=>'App','action'=>'change-language','es-PE']
                    ]); ?>
                <?= $this->Html->image("icons/32/Brazil-Flag-icon.png",[
                    "alt"=>"Portugues",
                    'url'=>['controller'=>'App','action'=>'change-language','pt-BR']
                    ]); ?>

                    <li class="nav-divider"></li>
                    <li>
                   
                    <?php
                     echo $this->Html->link(  'Home',
                    ['controller'=>'#home','action'=>'index','_full'=>true]
                    );
                    ?>
                    </li>
                    <li>
                    <?php
                    echo $this->Html->link(  'Users',
                    ['controller'=>'users','action'=>'index','_full'=>true]
                    );
                    ?>
                    </li>
                    <li>
                    <?php
                    echo $this->Html->link(  'Clients',
                    ['controller'=>'clients','action'=>'index','_full'=>true]
                    );
                    ?>
                    </li>
                    <li>
                    <?php
                    echo $this->Html->link(  'Workers',
                    ['controller'=>'workers','action'=>'index','_full'=>true]
                    );
                    ?>
                    </li>
                    <li>
                    <?php
                    echo $this->Html->link(  'Reservations',
                    ['controller'=>'reservations','action'=>'index','_full'=>true]
                    );
                    ?>
                    </li>
                    <li>
                    <?php
                    echo $this->Html->link(  'Rentals',
                    ['controller'=>'rentals','action'=>'index','_full'=>true]
                      );
                    ?>
                    </li>
                    <li>
                    <?php
                    echo $this->Html->link(  'Punishments',
                    ['controller'=>'punishments','action'=>'index','_full'=>true]
                    );
                    ?>
                    </li>
                    <li>
                    <?php
                    echo $this->Html->link(  'Purchases',
                    ['controller'=>'purchases','action'=>'index','_full'=>true]
                    );
                    ?>
                    </li>
                    <li>
                    <?php
                     echo $this->Html->link(  'Products',
                    ['controller'=>'products','action'=>'index','_full'=>true]
                    );
                    ?>
                      </li>
                    <li>
                     <?php
                    echo $this->Html->link(  'Ballots',
                    ['controller'=>'ballots','action'=>'index','_full'=>true]
                    );
                    ?>
                    </li>
                    <li>
                    <?php
                    echo $this->Html->link(  'Boxs',
                    ['controller'=>'boxs','action'=>'index','_full'=>true]
                    );
                    ?> 
                    </li>
                    </ul>
 <!--
                <form class="navbar-form navbar-right">
                    <input type="text" class="form-control" placeholder="Search...">
                </form>
                -->
            </div>
        </div>

    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 col-md-2 sidebar">
                <?= $this->fetch('tb_sidebar') ?>
            </div>
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <h1 class="page-header"><?= $this->request->getParam('controller'); ?></h1>
<?php
/**
 * Default `flash` block.
 */
if (!$this->fetch('tb_flash')) {
    $this->start('tb_flash');
    if (isset($this->Flash)) {
        echo $this->Flash->render();
    }
    $this->end();
}
$this->end();

$this->start('tb_body_end');
echo '</body>';
$this->end();

$this->append('content', '</div></div></div>');
echo $this->fetch('content');

<?php
use yii\helpers\Html;
?>
<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <?= Html::img('uploads/person/'.Yii::$app->user->identity->person->photo,['class' => 'img-circle', 'alt' => Yii::$app->user->identity->person->firstname.' '.Yii::$app->user->identity->person->lastname, ])?>
            </div>
            <div class="pull-left info">
                <p>
                    <?= Yii::$app->user->identity->person->firstname.' '.Yii::$app->user->identity->person->lastname?>
                </p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'เมนู', 'options' => ['class' => 'header']],
                    ['label' => 'หน้าหลัก', 'icon' => 'home', 'url' => ['/site/index']],
                    //['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
                    ['label' => 'เข้าสู่ระบบ', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    [
                        'label' => 'ระบบจองห้องประชุม',
                        'icon' => 'calendar',
                        'url' => '#',
                        'items' => [
                            ['label' => 'ปฏิทินการจอง', 'icon' => 'calendar', 'url' => ['/meeting/default/index'],],
                            ['label' => 'จองห้องประชุม', 'icon' => 'calendar-check-o', 'url' => ['/meeting/meeting/create'],],
                            ['label' => 'รายการจองห้องประชุม', 'icon' => 'list', 'url' => ['/meeting/meeting/index'],],
                            [
                                'label' => 'รายงาน',
                                'icon' => 'book',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'รายงาน1', 'icon' => 'bar-chart', 'url' => ['/meeting/report/report1'],],
                                    ['label' => 'รายงาน2', 'icon' => 'line-chart', 'url' => ['/meeting/report/report2'],],
                                    ['label' => 'รายงาน3', 'icon' => 'file-pdf-o', 'url' => ['/meeting/report/report3'],],
                                ],
                            ],
                            // [
                            //     'label' => 'ข้อมูลพื้นฐาน',
                            //     'icon' => 'cogs',
                            //     'url' => '#',
                            //     'items' => [
                            //         ['label' => 'ห้องประชุม', 'icon' => 'building-o', 'url' => ['/meeting/room/index'],],
                            //         ['label' => 'อุปกรณ์', 'icon' => 'cog', 'url' => ['/meeting/equipment/index'],],
                            //     ],
                            // ],
                        ],
                    ],
                    // [
                    //     'label' => 'ระบบงานบุคคล',
                    //     'icon' => 'cogs',
                    //     'url' => '#',
                    //     'items' => [
                    //         ['label' => 'หน้าหลัก', 'icon' => 'home', 'url' => ['/personal/default/index'],],
                    //         ['label' => 'เพิ่มบุคคล', 'icon' => 'user', 'url' => ['/personal/person/create'],],
                    //         ['label' => 'รายการบุคคล', 'icon' => 'list', 'url' => ['/personal/person/index'],],        
                    //     ],
                    // ],
                ],
            ]
        ) ?>

        <?php $auth = \Yii::$app->authManager;?>

        <?php if($auth->getRole('admin') && Yii::$app->user->identity->person->user_id == 1) {?>
        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    // ['label' => 'เมนู', 'options' => ['class' => 'header']],
                    // ['label' => 'หน้าหลัก', 'icon' => 'home', 'url' => ['/site/index']],
                    //['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
                    ['label' => 'เข้าสู่ระบบ', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    [
                        'label' => 'ระบบงานบุคคล',
                        'icon' => 'users',
                        'url' => '#',
                        'items' => [
                            //['label' => 'หน้าหลัก', 'icon' => 'home', 'url' => ['/personal/default/index'],],
                            ['label' => 'เพิ่มบุคคล', 'icon' => 'user', 'url' => ['/personal/person/create'],],
                            ['label' => 'รายการบุคคล', 'icon' => 'list', 'url' => ['/personal/person/index'],],    
                            ['label' => 'กำหนดบทบาท', 'icon' => 'list', 'url' => ['/assignment/default/index'],],    
                        ],
                        
                    ],
                    [
                        'label' => 'ข้อมูลพื้นฐาน',
                        'icon' => 'cogs',
                        'url' => '#',
                        'items' => [
                            ['label' => 'ห้องประชุม', 'icon' => 'building-o', 'url' => ['/meeting/room/index'],],
                            ['label' => 'อุปกรณ์', 'icon' => 'cog', 'url' => ['/meeting/equipment/index'],],
                        ],
                    ],
                ],
            ]
        ) ?>
        <?php }?>

    </section>

</aside>
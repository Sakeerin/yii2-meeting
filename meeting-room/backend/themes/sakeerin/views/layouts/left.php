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
                    ['label' => '菜单', 'options' => ['class' => 'header']],
                    ['label' => '主页面', 'icon' => 'home', 'url' => ['/site/index']],
                    //['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
                    ['label' => 'เข้าสู่ระบบ', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    [
                        'label' => '预订管理',
                        'icon' => 'calendar',
                        'url' => '#',
                        'items' => [
                            ['label' => '预订日历', 'icon' => 'calendar', 'url' => ['/meeting/default/index'],],
                            ['label' => '预订会议室', 'icon' => 'calendar-check-o', 'url' => ['/meeting/meeting/create'],],
                            ['label' => '预订名单', 'icon' => 'list', 'url' => ['/meeting/meeting/index'],],
                            [
                                'label' => '报告',
                                'icon' => 'book',
                                'url' => '#',
                                'items' => [
                                    ['label' => '每个房间的报告', 'icon' => 'bar-chart', 'url' => ['/meeting/report/report1'],],
                                    ['label' => '每月总结报告', 'icon' => 'line-chart', 'url' => ['/meeting/report/report2'],],
                                    ['label' => '导出pdf', 'icon' => 'file-pdf-o', 'url' => ['/meeting/report/report3'],],
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
                        'label' => '人员管理',
                        'icon' => 'users',
                        'url' => '#',
                        'items' => [
                            //['label' => 'หน้าหลัก', 'icon' => 'home', 'url' => ['/personal/default/index'],],
                            ['label' => '添加人员', 'icon' => 'user', 'url' => ['/personal/person/create'],],
                            ['label' => '人员名单', 'icon' => 'list', 'url' => ['/personal/person/index'],],    
                            ['label' => '分配角色', 'icon' => 'cog', 'url' => ['/assignment/default/index'],],    
                        ],
                        
                    ],
                    [
                        'label' => '基本信息管理',
                        'icon' => 'cogs',
                        'url' => '#',
                        'items' => [
                            ['label' => '会议室', 'icon' => 'building-o', 'url' => ['/meeting/room/index'],],
                            ['label' => '设备', 'icon' => 'cog', 'url' => ['/meeting/equipment/index'],],
                        ],
                    ],
                ],
            ]
        ) ?>
        <?php }?>

    </section>

</aside>
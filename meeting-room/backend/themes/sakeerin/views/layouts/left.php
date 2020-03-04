<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..." />
                <span class="input-group-btn">
                    <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i
                            class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.search form -->

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
                                'label' => 'ข้อมูลพื้นฐาน',
                                'icon' => 'cogs',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'ห้องประชุม', 'icon' => 'building-o', 'url' => ['/meeting/room/index'],],
                                    ['label' => 'อุปกรณ์', 'icon' => 'cog', 'url' => ['/meeting/equipment/index'],],
                                    // [
                                    //     'label' => 'Level Two',
                                    //     'icon' => 'circle-o',
                                    //     'url' => '#',
                                    //     'items' => [
                                    //         ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                    //         ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                    //     ],
                                    // ],
                                ],
                            ],
                        ],
                    ],
                ],
            ]
        ) ?>

    </section>

</aside>
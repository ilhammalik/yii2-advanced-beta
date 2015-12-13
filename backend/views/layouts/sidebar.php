<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;
use hscstudio\mimin\components\Mimin;
use yii\widgets\Menu;
            use kartik\sidenav\SideNav;
?>
<?= Html::csrfMetaTags() ?>
<div id="sidebar">
    <div class="sidebar-scroll">
        <div class="sidebar-content">
            <a href="./index.php.html" class="sidebar-brand">
            <img src="<?= Url::to(['/images/ilham.png']) ?>" width="160px"/>
            </a>
            <div class="sidebar-section sidebar-user clearfix">
                <div class="sidebar-user-avatar">
                    <a href="./page_ready_user_profile.php.html">
                    <?= Html::img('@web/theme/img/User-Icon.png'); ?></a>
                </div>
                <div class="sidebar-user-name"><?= ucwords(Yii::$app->user->identity->username) ?></div>
                <div class="sidebar-user-links">
                  <?=
                                    Html::a(Yii::t('app', ' <i class="fa fa-sign-out fa-fw"></i> Logout'), ['/site/logout'], [
                                        //'class' => 'btn btn-danger',
                                        'data' => [
                                            //'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                                            'method' => 'post',
                                        ],
                                    ])
                                    ?>
                </div>
            </div>
            <?php
                    
                        
                            $items = [
                                ['label' => 'Home', 'url' => ['/simpel/index/']],
                                ['label' => 'Home', 'url' => ['/simpel/pimpinan1/']],
                                ['label' => 'Home', 'url' => ['/simpel/pimpinan2/']],
                                ['label' => 'Home', 'url' => ['/simpel/user/']],
                                ['label' => 'Proses', 'url' => ['/simpel-keg/index/']],
                                ['label' => 'Rekapitulasi', 'url' => ['/simpel-rekap/index/']],
                                ['label' => 'Referensi', 'url' => ['/tabel-sbu/index/']],
                                ['label' => 'Laporan', 'url' => ['/simpel-laporan/index/']],
                                ['label' => 'Pengaturan', 'url' => ['/mimin/user/index/'], 'items' => [
                                    ['label' => 'Pagu Mak', 'url' => ['/simpel-pagu/index']],
                                    ['label' => 'User', 'url' => ['/mimin/user/']],
                                    ['label' => 'User Group', 'url' => ['/mimin/role/']],
                                    // ['label' => 'Generator', 'url' => ['/mimin/route']],
                                
                                ]],
                               
                            ];
                            $items = Mimin::filterRouteMenu($items);
                            if(count($items)>0){
                                $menuItems[] = ['label' => 'Reporting', 'items' => $items];
                            }
                            echo SideNav::widget([
                                'options' => ['class' => 'sidebar-nav'],
                                'encodeLabels' => false, // set this to nav-tab to get tab-styled navigation
                                'items' => $items,
                            ]);
                        
            ?>
            <div class="sidebar-header">
                <span class="sidebar-header-options clearfix">
                <a href="javascript:void(0)" data-toggle="tooltip" title="Refresh"><i class="gi gi-refresh"></i></a>
                </span>
                <span class="sidebar-header-title">Activity</span>
                <br/>
                <br/>
                <br/>

                <center>Computer Info</center>
                <p align="center">
                <font color="white">Anda login  dengan alamat IP :
                <?php echo isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : ''; ?>
                </font>
                </p>
            </div>
        </div>
    </div>
</div>
<script>
    function startTime() {
        var today = new Date();
        var h = today.getHours();
        var m = today.getMinutes();
        var s = today.getSeconds();
        m = checkTime(m);
        s = checkTime(s);
        document.getElementById('txt').innerHTML = h + ":" + m + ":" + s;
        var t = setTimeout(function () {
            startTime()
        }, 500);
    }
    function checkTime(i) {
        if (i < 10) {
            i = "0" + i
        }
        ;  // add zero in front of numbers < 10
        return i;
    }

    
</script>
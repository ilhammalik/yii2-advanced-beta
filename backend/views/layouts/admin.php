<?php

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use kartik\icons\Icon;
use yii\helpers\Url;
use  \common\components\MyHelper;
/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html class="no-js"> 
    <head>
        <meta charset="utf-8" />
        <title>SIMPEL BAPETEN</title>
        <meta name="description" content="ProUI is a Responsive Admin Dashboard Template created by pixelcave and published on Themeforest. This is the demo of ProUI! You need to purchase a license for legal use!" />
        <meta name="author" content="pixelcave" />
        <meta name="robots" content="noindex, nofollow" />
        <meta name="Ilham Malik Ibrahim" content="Ilhan Malik Ibrahim">

        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0" />
        <?php $this->head() ?>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
    <body onload="startTime()">
        <?php $this->beginBody() ?>
        <div id="page-container" class="sidebar-full">
            <?= $this->render('//layouts/sidebar.php') ?>

            <div id="main-container">
                <header class="navbar navbar-default">
                    <ul class="nav navbar-nav-custom">
                        <li class="hidden-xs hidden-sm">
                            <a href="javascript:void(0)" id="sidebar-toggle-lg">
                                <i class="fa fa-list-ul fa-fw"></i>
                            </a>
                        </li>
                           <li class="hidden-xs hidden-sm">
                            <a href="#" onclick="return goBack();" onclick="" id="sidebar-toggle-lg">
                            <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span> <span style="padding-top:-100px;">Kembali</span>
                            </a>

                        </li>
                        <li class="hidden-md hidden-lg">
                            <a href="javascript:void(0)" id="sidebar-toggle-sm">
                                <i class="fa fa-bars fa-fw"></i>
                            </a>
                        </li>
                        <li class="hidden-md hidden-lg">
                            <a href="./index.php.html">
                                <i class="gi gi-stopwatch fa-fw"></i>
                            </a>
                        </li>
                    </ul>
                   

                    <ul class="nav navbar-nav-custom pull-right">
                        <li>
                            <br/>
                            <i class="fa fa-calendar fa-fw"></i> <?= MyHelper::GetDayName(date('l')).' '.MyHelper::Formattgl(date('Y-m-d')) ?> <i class="fa fa-clock-o fa-fw pull-right"></i>&nbsp;&nbsp;
                        </li>
                        <li>
                            <br/>
                            <div id="txt"></div>
                        </li>

                        <li class="dropdown">
                            <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                                <?= Html::img('@web/theme/img/User-Icon.png'); ?><i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-custom dropdown-menu-right">

                                <li class="divider"></li>
                                <li>
                                    <?= Html::a(Yii::t('app', ' <i class="fa fa-user fa-fw pull-right"></i> Profile'), ['/mimin/user/profile', 'id' => Yii::$app->user->id]) ?>
                                </li>
                                

                                <li class="divider"></li>
                                <li>
                                    <?=
                                    Html::a(Yii::t('app', ' <i class="fa fa-sign-out fa-fw"></i> Logout'), ['/site/logout'], [
                                        //'class' => 'btn btn-danger',
                                        'data' => [
                                            //'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                                            'method' => 'post',
                                        ],
                                    ])
                                    ?>
                                </li>
                            </ul>
                            </header><div id="page-content">
                                <?=
                                Breadcrumbs::widget([
                                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                                ])
                                ?>
                                <?= Alert::widget() ?>

                                <?= $content ?>

                            </div>
                            <footer class="clearfix">
                               
                                <div>
                                 <center>  Copyright Subbag Perjalanan Dinas Biro Umum BAPETEN <?php echo date('Y') ?> </center>
                                </div>
                            </footer>
                            </div>
                            </div>
                            <a href="#" id="to-top"><i class="fa fa-angle-double-up"></i></a>

                            <?php $this->endBody() ?>   
                            </body>
                            </html>
                            <?php $this->endPage() ?>
<style type="text/css">
    :required {
  background: red;
}
input:required {
  box-shadow: 4px 4px 20px rgba(200, 0, 0, 0.85);
}

/**
 * style input elements that have a required
 * attribute and a focus state
 */
input:required:focus {
  border: 1px solid red;
  outline: none;
}

/**
 * style input elements that have a required
 * attribute and a hover state
 */
input:required:hover {
  opacity: 1;
}
.required label {
    font-weight: bold;
}
.required label:after {
    color: #e32;
    content: ' *';
    display:inline;
}
  .form-group.required .control-label:after { 
   content:"  Wajib*";
   color:red;
}

</style>

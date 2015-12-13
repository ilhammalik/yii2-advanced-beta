<?php
use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use kartik\icons\Icon;
use yii\helpers\Url;
/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html class="no-js"> <!--<![endif]-->
<head>

<meta charset="utf-8" />
<title>Admin-Web Internal</title>

<meta name="description" content="">
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0" />
<?php $this->head() ?>
<link rel="shortcut icon" href="./img/favicon.ico" />
<link rel="apple-touch-icon" href="./img/icon57.png" sizes="57x57" />
<link rel="apple-touch-icon" href="./img/icon72.png" sizes="72x72" />
<link rel="apple-touch-icon" href="./img/icon76.png" sizes="76x76" />
<link rel="apple-touch-icon" href="./img/icon114.png" sizes="114x114" />
<link rel="apple-touch-icon" href="./img/icon120.png" sizes="120x120" />
<link rel="apple-touch-icon" href="./img/icon144.png" sizes="144x144" />
<link rel="apple-touch-icon" href="./img/icon152.png" sizes="152x152" />
<meta name="Ilham Malik Ibrahim" content="Ilhan Malik Ibrahim">
<meta name="www.ipteku.com" content="ilhammalik19@gmail.com">

    <style type="text/css">
body{
    font-family:"Century Gothic" Geneva Helvetica, sans-serif;
    background: url('../images/bg.png');
}
    </style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
<body>
 <?php $this->beginBody() ?>
 <?= $content ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
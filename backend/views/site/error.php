<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = $name;
?>
<div class="site-error">

  

 


</div>

<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
<title>Poses-404 Website Template | Home :: W3layouts</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
</head>
<body>
<div class="wrap">
    <div class="banner">
        <img src="<?= Url::to(['/images/banner.png']) ?>" alt="" />
          <h1><?= Html::encode($this->title) ?></h1>
        
    </div>
    <div class="page">
        <h2><?= ucwords(Yii::$app->user->identity->username) ?>,,we can't find that page!</h2>
        <a href="#" onclick="return goBack();" onclick="" id="sidebar-toggle-lg">
            <span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span> <h3>Kembali</h3></span>
                            </a>

           <div class="alert alert-danger">
        <?= nl2br(Html::encode($message)) ?>
    </div>
    </div>
    
</div>
</body>
</html>

<style type="text/css">
    /* reset */
html,body,div,span,applet,object,iframe,h1,h2,h3,h4,h5,h6,p,blockquote,pre,a,abbr,acronym,address,big,cite,code,del,dfn,em,img,ins,kbd,q,s,samp,small,strike,strong,sub,sup,tt,var,b,u,i,dl,dt,dd,ol,nav ul,nav li,fieldset,form,label,legend,table,caption,tbody,tfoot,thead,tr,th,td,article,aside,canvas,details,embed,figure,figcaption,footer,header,hgroup,menu,nav,output,ruby,section,summary,time,mark,audio,video{margin:0;padding:0;border:0;font-size:100%;font:inherit;vertical-align:baseline;}
article, aside, details, figcaption, figure,footer, header, hgroup, menu, nav, section {display: block;}
ol,ul{list-style:none;margin:0px;padding:0px;}
blockquote,q{quotes:none;}
blockquote:before,blockquote:after,q:before,q:after{content:'';content:none;}
table{border-collapse:collapse;border-spacing:0;}
/* start editing from here */
a{text-decoration:none;}
.txt-rt{text-align:right;}/* text align right */
.txt-lt{text-align:left;}/* text align left */
.txt-center{text-align:center;}/* text align center */
.float-rt{float:right;}/* float right */
.float-lt{float:left;}/* float left */
.clear{clear:both;}/* clear float */
.pos-relative{position:relative;}/* Position Relative */
.pos-absolute{position:absolute;}/* Position Absolute */
.vertical-base{ vertical-align:baseline;}/* vertical align baseline */
.vertical-top{  vertical-align:top;}/* vertical align top */
.underline{ padding-bottom:5px; border-bottom: 1px solid #eee; margin:0 0 20px 0;}/* Add 5px bottom padding and a underline */
nav.vertical ul li{ display:block;}/* vertical menu */
nav.horizontal ul li{   display: inline-block;}/* horizontal menu */
img{max-width:100%;}
/*end reset*/
body{
    font-family:"Century Gothic" Geneva Helvetica, sans-serif;
    background: url('../images/bg.png');
}
.wrap{
    margin:0 auto; 
    width: 96%;
}
h1{
    margin-top: 20px;
    color: #603813;
    font-size: 3em;
    text-transform: uppercase;
    font-weight: bold;
}
.banner{
    text-align:center;
    margin-top: 30px;
}
.banner img{
    margin-top: 0px;
}
.page{
    text-align:center;
    font-family: "Century Gothic";
}
.page h2{
    font-size:3em;
    color: rgb(99, 44, 37);
    font-weight:bold;
}
.footer{
    font-family: "Century Gothic";
    position: absolute;
    right: 30px;
    bottom:20px;
}
.footer p{
    font-size:1em;
    color: #603813;
}
.footer a{
     color: #f9614d;
}
.footer a:hover{
    text-decoration:underline;
}
/*media queries*/
@media all and (max-width:1366px) and (min-width:1280px){
.wrap{
    width: 90%;
}
.banner{
    margin-top: 30px;
}
}
@media all and (max-width:1280px) and (min-width:1024px){
.wrap{
    width: 90%;
}
}   
@media all and (max-width:1024px) and (min-width:800px){
.wrap{
    width: 90%;
}
h1{
    font-size: 2em;
}
.banner{
    margin-top: 0px;
}
.page h2{
    font-size: 2em;
}
}
@media all and (max-width:800px) and (min-width:640px){
.wrap{
    width: 90%;
}
h1{
    font-size: 2em;
}
.banner{
    margin-top: 10px;
}
.banner img{
    width: 34%;
}
.page h2{
    font-size:2em;
}
}
@media all and (max-width:640px) and (min-width:480px){
.wrap{
    width: 90%;
}
h1{
    font-size: 1.6em;
}
.banner{
    margin-top: 0px;
}
.banner img{
    width: 32%;
}
.page h2{
    font-size:1.6em;
}
}
@media all and (max-width:480px) and (min-width:320px){
.wrap{
    width: 90%;
}
h1{
    font-size: 1.4em;
}
.banner{
    margin-top: 0px;
}
.banner img{
    width: 32%;
}
.page h2{
    font-size:1.4em;
}
.footer p{
    font-size: 0.9em;
}
}
@media all and (max-width:320px){
.wrap{
    width: 90%;
}
h1{
    font-size: 1.4em;
}
.banner{
    margin-top: 10px;
}
.banner img{
    width:80%;
}
.page h2{
    font-size:1.4em;
}
.footer{
    bottom: 10px;
}
.footer p{
    font-size: 0.9em;
}
}
</style>


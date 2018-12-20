<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>成功案例</title>
    <link rel="stylesheet" type="text/css" href="<?php echo JS_PATH;?>swiper/swiper.min.css">

    <link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH;?>common.css">
    <script src="<?php echo JS_PATH;?>jquery.min.js"></script>
</head>
<body>
<div class="wrap_box">
    <!--top-->
    <div class="top clearfix">
        <img class="fl top_logo" src="<?php echo IMG_PATH;?>top_logo.jpg">
        <div class="fl search_box">
            <form action="<?php echo APP_PATH;?>index.php" method="get" target="_blank">
                <input type="hidden" name="m" value="search"/>
                <input type="hidden" name="c" value="index"/>
                <input type="hidden" name="a" value="init"/>
                <input type="hidden" name="typeid" value="1" id="typeid"/>
                <input type="hidden" name="siteid" value="<?php echo $siteid;?>" id="siteid"/>
                <input type="text" class="fl search" name="q" id="q"/>
                <input type="submit" value="" class="button icon_search" />
            </form>
        </div>
        <img class="top_tel" src="<?php echo IMG_PATH;?>tel.jpg">
    </div>
    <!--banner-->
    <div class="banner rel">
        <img src="<?php echo IMG_PATH;?>banner1.jpg">
        <!--导航-->
        <div class="navs">
            <ul class="nav clearfix f14">
            <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=b43f1459ac702900c8d44c91a5e796dd&action=category&catid=0&num=25&siteid=%24siteid&order=listorder+ASC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {$data = $content_tag->category(array('catid'=>'0','siteid'=>$siteid,'order'=>'listorder ASC','limit'=>'25',));}?>
                <li><a href="<?php echo siteurl($siteid);?>">首页</a></li>
                <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
                <li>
                    <?php if($r[catid]==50 || $r[catid] == 37) { ?>
                    <a href="#"><?php echo $r['catname'];?></a>
                    <?php } else { ?>
                    <a href="<?php echo $r['url'];?>"><?php echo $r['catname'];?></a>
                    <?php } ?>
                    <?php if($r[catid]!=74) { ?>
                    <div class="nav_er">
                    <?php $n=1;if(is_array(subcat($r['catid']))) foreach(subcat($r['catid']) AS $c2) { ?>
                        <div class="f12">
                            <a href="<?php echo $c2['url'];?>" class="fw-b f14"><?php echo $c2['catname'];?></a>
                            <?php $n=1;if(is_array(subcat($c2['catid']))) foreach(subcat($c2['catid']) AS $c3) { ?>
                                <a href="<?php echo $c3['url'];?>"><?php echo $c3['catname'];?></a>
                            <?php $n++;}unset($n); ?>
                        </div>
                    <?php $n++;}unset($n); ?>
                        <img class="icon_nav2" src="images/icon_nav2.png">
                    </div>
                </li>
                <?php $n++;}unset($n); ?>
                <?php } ?>
            <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
            </ul>
        </div>
        <!--左侧固定导航-->
        <div class="nav_left">
            <div class="nav_er nav_left1">
                <div class="f12">
                    <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=8e54900cbcec77d682edd021fc51fcd7&action=category&catid=50&num=25&siteid=%24siteid&order=listorder+ASC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {$data = $content_tag->category(array('catid'=>'50','siteid'=>$siteid,'order'=>'listorder ASC','limit'=>'25',));}?>
                        <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
                            <a href="<?php echo $r['url'];?>" class="fw-b f13"><?php echo $r['catname'];?></a>
                            <?php $n=1;if(is_array(subcat($r['catid']))) foreach(subcat($r['catid']) AS $c2) { ?>
                                <a href="<?php echo $c2['url'];?>"><?php echo $c2['catname'];?></a>
                            <?php $n++;}unset($n); ?>
                        <?php $n++;}unset($n); ?>
                    <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                </div>

            </div>
            <div class="nav_er  nav_left2">
                <div class="f12">
                    <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=f00377ea89cdcbe298b1cab5304752f5&action=category&catid=37&num=25&siteid=%24siteid&order=listorder+ASC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {$data = $content_tag->category(array('catid'=>'37','siteid'=>$siteid,'order'=>'listorder ASC','limit'=>'25',));}?>
                        <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
                            <a href="<?php echo $r['url'];?>" class="fw-b f13"><?php echo $r['catname'];?></a>
                            <?php $n=1;if(is_array(subcat($r['catid']))) foreach(subcat($r['catid']) AS $c2) { ?>
                                <a href="<?php echo $c2['url'];?>"><?php echo $c2['catname'];?></a>
                            <?php $n++;}unset($n); ?>
                        <?php $n++;}unset($n); ?>
                    <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                </div>
            </div>
        </div>
    </div>
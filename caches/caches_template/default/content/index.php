<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>首页</title>
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
    
        <div class="swiper-container swiper-container_index">
            <div class="swiper-wrapper">
            <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=138fc8ee93b7c32bafc0e0b07791498a&action=lists&catid=77&num=5&siteid=%24siteid&order=listorder+DESC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'77','siteid'=>$siteid,'order'=>'listorder DESC','limit'=>'5',));}?>
            <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
                <div class="swiper-slide"><img src="<?php echo $r['thumb'];?>"></div>
            <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
            </div>
            <!-- Add Pagination -->
            <?php $n++;}unset($n); ?>
            <div class="swiper-pagination swiper-pagination_index"></div>
        </div>
        <!--导航-->
        <div class="navs">
            <ul class="nav clearfix f14">
            <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=89762d79a4ea5720e809916b057ded38&action=category&catid=0&num=25&siteid=%24siteid&order=listorder+DESC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {$data = $content_tag->category(array('catid'=>'0','siteid'=>$siteid,'order'=>'listorder DESC','limit'=>'25',));}?>
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
        <!--右侧新闻-->
        <ul class="fff right_news">
           <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=7a7a0e753182bcf4d42b038435e627ed&action=position&posid=2&order=listorder+DESC&num=3\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'position')) {$data = $content_tag->position(array('posid'=>'2','order'=>'listorder DESC','limit'=>'3',));}?>
            <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
                <li>
                    <p><?php echo $r['title'];?><br></p>
                    <a class="fff" href="<?php echo $r['url'];?>">了解详情 >></a>
                </li>
            <?php $n++;}unset($n); ?>
            <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </ul>
    </div>
    <!--动态新闻-->
    <div class="in_box clearfix">
        <div class="fl rel in_video">
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=2cbb382e852663d12abd11f83e536f04&sql=select+%2A+FROM+p_shipinti_data+&num=1&cache=0&return=data\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * FROM p_shipinti_data  LIMIT 1");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data = $a;unset($a);?> 
        <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
             <?php $rr = string2array($r['shipin']); ?>
           <video width="304" height="263" controls poster="<?php echo IMG_PATH;?>video.jpg">
            <source src="<?php echo $rr['0']['fileurl'];?>" type="video/mp4">
           </video>

        <?php $n++;}unset($n); ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </div>
        <!--留学资讯-->
        <div class="fl in_liu1" style="margin-left:25px">
            <div class="clearfix rel in_tcol1 in_title">
                <p class=" fl rel"><?php echo $CATEGORYS['69']['catname'];?></p>
                <a class="in_more fr" href="<?php echo $CATEGORYS['69']['url'];?>"><img class=" " src="<?php echo IMG_PATH;?>icon_more.png"></a>
            </div>
            <div class="clearfix">
                <ul class="in_zuixin fl">
                <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=e4f3336a186c90a86e5549d30cc5316d&action=lists&catid=69&num=5\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'69','limit'=>'5',));}?>
                <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
                    <li>
                        <a class="clearfix"  href="" >
                            <div class="fl tover"><a href="<?php echo $r['url'];?>"><?php echo $r['title'];?></a></div>
                            <span class="fr"><?php echo date('Y-m-d',$r[inputtime]);?></span>
                        </a>
                    </li>
                <?php $n++;}unset($n); ?>
                <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                </ul>
                <ul class="in_zuixin fr">
                <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=1dce2118d1f205133454884d45dcc8e2&action=lists&catid=69&num=5&start=5\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'69','limit'=>'5,5',));}?>
                <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
                    <li>
                        <a class="clearfix"  href="" >
                            <div class="fl tover"><a href="<?php echo $r['url'];?>"><?php echo $r['title'];?></a></div>
                            <span class="fr"><?php echo date('Y-m-d',$r[inputtime]);?></span>
                        </a>
                    </li>
                <?php $n++;}unset($n); ?>
                <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                </ul>
            </div>
        </div>
        <!--热门标签-->
        <div class="fl" style="float:right">
            <div class="clearfix rel in_tcol2 in_title">
                <p class=" fl rel">热门标签</p>
                <!--<a class="in_more fr" href="<?php echo APP_PATH;?>index.php?m=content&c=tag&catid=<?php echo $catid;?>&tag=<?php echo urlencode($keyword);?>"><img class=" " src="<?php echo IMG_PATH;?>icon_more.png"></a>-->
            </div>
            <ul class="in_hot clearfix">
                <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=45786349cfa0def694c9b5816d3907ad&sql=SELECT+%2A+FROM+p_news+WHERE+catid+IN+%2866%2C69%29+order+by+id+DESC&num=15&return=data\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}pc_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("SELECT * FROM p_news WHERE catid IN (66,69) order by id DESC LIMIT 15");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data = $a;unset($a);?>
                    <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
                        <?php $keywords = explode(' ',$r[keywords]);?>
                        <?php $n=1;if(is_array($keywords)) foreach($keywords AS $keyword) { ?>
                            <?php if($keyword) { ?>
                            <li>
                                <a href="<?php echo APP_PATH;?>index.php?m=content&c=tag&a=lists&tag=<?php echo urlencode($keyword);?>"><?php echo $keyword;?></a>
                            </li>
                            <?php } ?>
                        <?php $n++;}unset($n); ?>
                    <?php $n++;}unset($n); ?>
                <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
            </ul>
        </div>

    </div>
    <!--低龄留学服务-->
    <div class="in_fw1">
        <img class="in_ft" src="<?php echo IMG_PATH;?>in_t1.png">
        <div class="swiper-container swiper-container1 in_swiper rel">
            <div class="swiper-wrapper fw_hover1">
              <div class="swiper-slide pointer"><img class="fw_1" src="<?php echo IMG_PATH;?>f1.png"><img class="fw_2" src="<?php echo IMG_PATH;?>ff1.png"><p class="fw_3">专业咨询</p><div class="tc in_bu">第一步</div></div>
              <div class="swiper-slide pointer"><img class="fw_1" src="<?php echo IMG_PATH;?>f2.png"><img class="fw_2" src="<?php echo IMG_PATH;?>ff2.png"><p class="fw_3">全面评估</p><div class="tc in_bu">第二步</div></div>
              <div class="swiper-slide pointer"><img class="fw_1" src="<?php echo IMG_PATH;?>f3.png"><img class="fw_2" src="<?php echo IMG_PATH;?>ff3.png"><p class="fw_3">名校规划</p><div class="tc in_bu">第三步</div></div>
              <div class="swiper-slide pointer"><img class="fw_1" src="<?php echo IMG_PATH;?>f4.png"><img class="fw_2" src="<?php echo IMG_PATH;?>ff4.png"><p class="fw_3">名校申请</p><div class="tc in_bu">第四步</div></div>
              <div class="swiper-slide pointer"><img class="fw_1" src="<?php echo IMG_PATH;?>f5.png"><img class="fw_2" src="<?php echo IMG_PATH;?>ff5.png"><p class="fw_3">实地访校</p><div class="tc in_bu">第五步</div></div>
              <div class="swiper-slide pointer"><img class="fw_1" src="<?php echo IMG_PATH;?>f6.png"><img class="fw_2" src="<?php echo IMG_PATH;?>ff6.png"><p class="fw_3">考试辅导</p><div class="tc in_bu">第六步</div></div>
              <div class="swiper-slide pointer"><img class="fw_1" src="<?php echo IMG_PATH;?>f7.png"><img class="fw_2" src="<?php echo IMG_PATH;?>ff7.png"><p class="fw_3">入学考试</p><div class="tc in_bu">第七步</div></div>
              <div class="swiper-slide pointer"><img class="fw_1" src="<?php echo IMG_PATH;?>f8.png"><img class="fw_2" src="<?php echo IMG_PATH;?>ff8.png"><p class="fw_3">成功录取</p><div class="tc in_bu">第八步</div></div>
              <div class="swiper-slide pointer"><img class="fw_1" src="<?php echo IMG_PATH;?>f9.png"><img class="fw_2" src="<?php echo IMG_PATH;?>ff9.png"><p class="fw_3">办理签证</p><div class="tc in_bu">第九步</div></div>
              <div class="swiper-slide pointer"><img class="fw_1" src="<?php echo IMG_PATH;?>f10.png"><img class="fw_2" src="<?php echo IMG_PATH;?>ff10.png"><p class="fw_3">监护服务</p><div class="tc in_bu">第十步</div></div>
              <div class="swiper-slide pointer"><img class="fw_1" src="<?php echo IMG_PATH;?>f11.png"><img class="fw_2" src="<?php echo IMG_PATH;?>ff11.png"><p class="fw_3">行前准备</p><div class="tc in_bu">第十一步</div></div>
              <div class="swiper-slide pointer"><img class="fw_1" src="<?php echo IMG_PATH;?>f12.png"><img class="fw_2" src="<?php echo IMG_PATH;?>ff12.png"><p class="fw_3">开学报到</p><div class="tc in_bu">第十二步</div></div>
              <div class="swiper-slide pointer"><img class="fw_1" src="<?php echo IMG_PATH;?>f13.png"><img class="fw_2" src="<?php echo IMG_PATH;?>ff13.png"><p class="fw_3">海外科目补习</p><div class="tc in_bu">第十三步</div></div>
              <div class="swiper-slide pointer"><img class="fw_1" src="<?php echo IMG_PATH;?>f14.png"><img class="fw_2" src="<?php echo IMG_PATH;?>ff14.png"><p class="fw_3">升学转学</p><div class="tc in_bu">第十四步</div></div>
              <div class="swiper-slide pointer"><img class="fw_1" src="<?php echo IMG_PATH;?>f15.png"><img class="fw_2" src="<?php echo IMG_PATH;?>ff15.png"><p class="fw_3">大学圆梦</p><div class="tc in_bu">第十五步</div></div>
            </div>
            <!-- Add Pagination -->
            <!-- <div class="swiper-pagination"></div> -->
            <!-- Add Pagination -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="in_k1"></div>
            <div class="in_k2"></div>
        </div>
    </div>
    <!--大学生留学项目-->
    <div class="in_fw2">
        <img class="in_ft" src="<?php echo IMG_PATH;?>in_t2.png">
        <div class="swiper-container swiper-container2 in_swiper rel">
            <div class="swiper-wrapper fw_hover2">
                <div class="swiper-slide pointer">
                    <img class="fw_img" src="<?php echo IMG_PATH;?>fw1.png">
                    <div class="fw_num tc">1</div>
                    <div class="fw_title tc">留学规划</div>
                    <ul class="fw_text">
                        <li>多套留学方案</li>
                        <li>私人订制</li>
                        <li>全方位指导</li>

                    </ul>
                </div>
                <div class="swiper-slide pointer">
                    <img class="fw_img" src="<?php echo IMG_PATH;?>fw2.png">
                    <div class="fw_num tc">2</div>
                    <div class="fw_title tc">名校申请</div>
                    <ul class="fw_text">
                        <li>精准定位</li>
                        <li>全面评估</li>

                    </ul>
                </div>
                <div class="swiper-slide pointer">
                    <img class="fw_img" src="<?php echo IMG_PATH;?>fw3.png">
                    <div class="fw_num tc">3</div>
                    <div class="fw_title tc">高端文案</div>
                    <ul class="fw_text">
                        <li>资深文案团队</li>
                        <li>海外留学背景</li>
                        <li>专业对专业服务</li>
                        <li>个性化量身定制</li>

                    </ul>
                </div>
                <div class="swiper-slide pointer">
                    <img class="fw_img" src="<?php echo IMG_PATH;?>fw4.png">
                    <div class="fw_num tc">4</div>
                    <div class="fw_title tc">签证办理</div>
                    <ul class="fw_text">
                        <li>资料整理</li>
                        <li>资料翻译</li>
                        <li>填表预约</li>
                        <li>轻松快捷获约</li>

                    </ul>
                </div>
                <div class="swiper-slide pointer">
                    <img class="fw_img" src="<?php echo IMG_PATH;?>fw5.png">
                    <div class="fw_num tc">5</div>
                    <div class="fw_title tc">行前指导</div>
                    <ul class="fw_text">
                        <li>教授中英学习技巧的区别</li>
                        <li>如何应对作业和考试</li>

                    </ul>
                </div>
                <div class="swiper-slide pointer">
                    <img class="fw_img" src="<?php echo IMG_PATH;?>fw6.png">
                    <div class="fw_num tc">6</div>
                    <div class="fw_title tc">学术先修</div>
                    <ul class="fw_text">
                        <li>解决在英国学习期间面临的学习困难</li>
                        <li>对所学专业的学科专业预习</li>
                        <li>提高学术英语</li>

                    </ul>
                </div>
                <div class="swiper-slide pointer">
                    <img class="fw_img" src="<?php echo IMG_PATH;?>fw7.png">
                    <div class="fw_num tc">7</div>
                    <div class="fw_title tc">接机服务</div>
                    <ul class="fw_text">
                        <li>针对各个年龄段</li>
                        <li>二十四小时，风雨无阻</li>
                        <li>覆盖英国所有机场</li>
                        <li>全程中文接待，安全保险</li>
                        <li>点对点的服务（机场到宿舍，协助学生拿钥匙，搬行李），报平安电话</li>

                    </ul>
                </div>
                <div class="swiper-slide pointer">
                    <img class="fw_img" src="<?php echo IMG_PATH;?>fw8.png">
                    <div class="fw_num tc">8</div>
                    <div class="fw_title tc">安排海外住宿</div>
                    <ul class="fw_text">
                        <li>大量的房源信息</li>
                        <li>详尽的家庭信息</li>
                        <li>长期、短期住宿要求都能满足</li>
                        <li>安全、舒适的住宿环境</li>
                        <li>及时的住宿情况反馈</li>
                        <li>满足不同年龄和价位要求</li>

                    </ul>
                </div>
                <div class="swiper-slide pointer">
                    <img class="fw_img" src="<?php echo IMG_PATH;?>fw9.png">
                    <div class="fw_num tc">9</div>
                    <div class="fw_title tc">英国科目辅导</div>
                    <ul class="fw_text">
                        <li>帮助学生辅导专业科目</li>
                        <li>海外家教</li>
                        <li>线上线下随意选择</li>
                        <li>顺利通过各类型考试</li>

                    </ul>
                </div>
                <div class="swiper-slide pointer">
                    <img class="fw_img" src="<?php echo IMG_PATH;?>fw10.png">
                    <div class="fw_num tc">10</div>
                    <div class="fw_title tc">论文指导</div>
                    <ul class="fw_text">
                        <li>Eassy语法修改</li>
                        <li>论文语法修改</li>
                        <li>Eassy专业内容指导</li>
                        <li>论文专业内容指导</li>

                    </ul>
                </div>
            </div>


            <!-- Add Pagination -->
            <!-- <div class="swiper-pagination"></div> -->
            <!-- Add Pagination -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="in_k1 in_k3"></div>
            <div class="in_k2 in_k3"></div>
        </div>
    </div>
    <!--名校介绍-->
    <div class="in_fw3">
        <img class="in_ft" src="<?php echo IMG_PATH;?>in_t3.png">
        <div class="mx_title clearfix">
            <div class="mx_t active tc fl pointer">中小学</div>
            <div class="mx_t tc fr pointer">大学</div>
        </div>
        <div class="mx_schools">
            <ul class="mx_school active clearfix">
                <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=81ebca787e8c16c66a093c650e139e09&action=lists&catid=71&num=8&siteid=%24siteid&moreinfo=1&order=id+DESC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'71','siteid'=>$siteid,'moreinfo'=>'1','order'=>'id DESC','limit'=>'8',));}?>
                    <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
                        <li>
                            <a class="clearfix" href="<?php echo $r['url'];?>">
                                <img class="mx_img fl" src="<?php echo IMG_PATH;?>mx_school.png">
                                <div class="mx_st fff fl">
                                    <div class="tover"><?php echo $r['title'];?></div>
                                    <p class="tover"><?php echo $r['clsj'];?> 排名：<?php echo $r['paiming'];?></p>
                                </div>
                            </a>
                        </li>
                    <?php $n++;}unset($n); ?>
                <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
            </ul>
            <ul class="mx_school hide  clearfix">
                <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=c6d3330ea24d42136193f5c1c1d76d0d&action=lists&catid=72&num=8&siteid=%24siteid&moreinfo=1&order=id+DESC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'72','siteid'=>$siteid,'moreinfo'=>'1','order'=>'id DESC','limit'=>'8',));}?>
                    <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
                        <li>
                            <a class="clearfix" href="<?php echo $r['url'];?>">
                                <img class="mx_img fl" src="<?php echo IMG_PATH;?>mx_school.png">
                                <div class="mx_st fff fl">
                                    <div class="tover"><?php echo $r['title'];?></div>
                                    <p class="tover"><?php echo $r['clsj'];?> 排名：<?php echo $r['paiming'];?></p>
                                </div>
                            </a>
                        </li>
                    <?php $n++;}unset($n); ?>
                <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
            </ul>
        </div>
    </div>
    <!--小可爱-->
    <div class="in_fw4">
        <img class="in_ft" src="<?php echo IMG_PATH;?>in_t4.png">
        <ul class="xk_box clearfix">
            <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=8f268f10897beec9a9de32af6ed8f85c&action=lists&catid=68&num=5&siteid=%24siteid&moreinfo=1&order=id+DESC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'68','siteid'=>$siteid,'moreinfo'=>'1','order'=>'id DESC','limit'=>'5',));}?>
            <?php $i=0;?>
            <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
            <?php $i++?>
            <li class="">
                <?php if($i == 1 or $i == 3 or $i == 5) { ?> <a href="<?php echo $r['url'];?>"><img class="xk_img" src="<?php echo IMG_PATH;?>xka.png"></a><?php } ?>
                <div class="xk_text rel">
                    <div class="xk_bg"></div>
                    <div class="xk_t1 "><?php echo $r['zuozhe'];?></div>
                    <div class="xk_t2"><?php echo $r['title'];?></div>
                    <div class="xk_t3"><?php echo $r['description'];?></div>

                </div>
                 <?php if($i == 2 or $i == 4) { ?> <a href="<?php echo $r['url'];?>"><img class="xk_img" src="<?php echo IMG_PATH;?>xka.png"></a><?php } ?>
            </li>
            <?php $n++;}unset($n); ?>
            <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </ul>
    </div>
    <!--留学小百科-->
    <div class="clearfix in_fw5">
        <div class="fl erweima">
            <div class="fl">
                <div class="if_m"><img src="<?php echo IMG_PATH;?>erweima.jpg"></div>
                <p>优学阁官方微信<br>每时每刻掌握留学动态<br>随时随地知晓申请进度</p>
            </div>
            <div class="fl">
                <div class="if_m"><img src="<?php echo IMG_PATH;?>erweima.jpg"></div>
                <p>优学阁官方微信<br>每时每刻掌握留学动态<br>随时随地知晓申请进度</p>
            </div>
            <div class="fl">
                <div class="if_m"><img src="<?php echo IMG_PATH;?>erweima.jpg"></div>
                <p>优学阁官方微信<br>每时每刻掌握留学动态<br>随时随地知晓申请进度</p>
            </div>
        </div>

        <!--留学资讯-->
        <div class="fl  xbk">
            <div class="clearfix rel in_tcol1 in_title">
                <p class=" fl rel">留学小百科</p>
                <a class="in_more fr" href="<?php echo $CATEGORYS['69']['url'];?>"><img class=" " src="<?php echo IMG_PATH;?>icon_more.png"></a>
            </div>
                <ul class="in_zuixin in_zuixin11">
                <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=7c4fe28ac2f43e2ea0351a0f57aa8bb4&action=lists&catid=65&num=5\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'65','limit'=>'5',));}?>
                <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
                    <li class="clearfix">
                        <div class="fl tover"><a href="<?php echo $r['url'];?>"><?php echo $r['title'];?></a></div>
                        <span class="fr"><?php echo date('Y-m-d',$r[inputtime]);?></span>
                    </li>
                <?php $n++;}unset($n); ?>
                <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                </ul>
        </div>

        <!--优学阁最新动态-->
        <div class="fl xbk">
            <div class="clearfix rel in_tcol3 in_title">
                <p class=" fl rel"><?php echo $CATEGORYS['66']['catname'];?></p>
                <a class="in_more fr" href="<?php echo $CATEGORYS['66']['url'];?>"><img class=" " src="<?php echo IMG_PATH;?>icon_more.png"></a>
            </div>
            <ul class="in_youxuege">
            <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=4cdbf216d6631dd00f49d04117c3c7fc&action=lists&catid=66&num=2\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'66','limit'=>'2',));}?>
            <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
                <li>
                    <a class="clearfix"  href="<?php echo $r['url'];?>" >
                        <img class="fl" src="<?php echo $r['thumb'];?>">
                        <div class="fl in_yti">
                            <p class="fw-b  f14 tover2"><?php echo $r['title'];?></p>
                            <div class="tover2"><?php echo $r['description'];?></div>
                        </div>
                    </a>
                </li>
            <?php $n++;}unset($n); ?>
            <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
            </ul>
        </div>
    </div>
    <!--footer-->
    <div class="footer tc fff rel">
        <p>
        电话：010-65155863&nbsp&nbsp&nbsp&nbsp手机：13683346650<br>
        地址：中国北京朝阳区建国门外大街26号，长富宫中心，云享客一层 23室 &nbsp&nbsp&nbsp&nbsp邮箱：zhangrongustudy@163.com<br>
        版权所有：北京优学阁教育科技有限公司   京ICP备  17039690<br>
        技术支持：艾易创投
        </p>

    </div>
</div>
    <script type="text/javascript" src="<?php echo JS_PATH;?>index.js"></script>
    <script type="text/javascript" src="<?php echo JS_PATH;?>swiper/swiper.min.js"></script>
    <script type="text/javascript">
    $(function(){
        $(".video_btn").click(function(){
            $(".video_btn").hide();
            $("#video")[0].play();
        })
        $(".mx_title .mx_t").click(function(){
            if(!$(this).hasClass("active")){
                $(this).addClass("active");
                $(this).siblings(".mx_t").removeClass("active");
                $(".mx_schools .active").removeClass("active").siblings(".mx_school").addClass("active");;
                
            }
        })


        var swiper = new Swiper('.swiper-container1', {
          slidesPerView: 6,
          spaceBetween: 50,
          autoplay: {
            delay: 2000,
            stopOnLastSlide: false,
            disableOnInteraction: true,
           },
           // loop:true,
          // init: false,
          pagination: {
            el: '.swiper-pagination',
            clickable: true,
          },
          navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
          },
        });
        var swiper = new Swiper('.swiper-container2', {
          slidesPerView: 5,
          spaceBetween: 30,
          // init: false,
          pagination: {
            el: '.swiper-pagination',
            clickable: true,
          },
          navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
          },
        });

        //首页轮播
        var swiper = new Swiper('.swiper-container_index', {
          autoplay: {
            delay: 2000,
            stopOnLastSlide: false,
            disableOnInteraction: true,
          },
          loop:true,
          pagination: {
            el: '.swiper-pagination_index',
          },

        });


    })
    </script>
</body>
    
</html>
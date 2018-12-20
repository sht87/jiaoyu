<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>
<!--main-->
    <!--位置-->
    <div class="lx_box">
        <div class="lx_title fw-b">您所在的位置：标签</div>
    </div>

    <ul class="news_lists">
        <?php $n=1;if(is_array($datas)) foreach($datas AS $r) { ?>
        <li class="clearfix" style="border-bottom:1px dashed #000;">
            <div class="fl rel news_tt">
                <div class="news_title tover"><a  target="_blank" href="<?php echo $r['url'];?>"><?php echo $r['title'];?></a></div>
                <div class="news_text tover2"><?php echo $r['description'];?></div>
                <div class="news_time"><?php echo date('Y-m-d H:i:s',$r[inputtime]);?></div>
            </div>
        </li>
        <?php $n++;}unset($n); ?>
    </ul>
    <!--分页-->
    <div class="page">
        <div class="M-box m-style"><?php echo $pages;?></div>
    </div>
<?php include template("content","footer"); ?>
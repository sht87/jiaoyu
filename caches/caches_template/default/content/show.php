<?php defined('IN_PHPCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>
	<!--新闻详情-->
	<div class="nd_wrap">
		<div class="clearfix">
			<img class="fl ndd_img" src="http://39.106.34.31/statics/images/mx_school.png">
			<div class="fl">
				<div class="nd_title f20 ndd_title "><?php echo $title;?></div>
				<div class="clearfix ndd_text">
					<div class="  fl ">所在国家：<?php echo $suoguojia;?></div>
					<div class="  fl">所在地区：<?php echo $chengshi;?></div>
					<div class="  fl">所在城市：<?php echo $diqu;?></div>
				</div>
				<div class="clearfix ndd_text">
					<div class="  fl">建立校年份：<?php echo $nianfen;?></div>
					<div class="  fl">在校学生：<?php echo $zaixiao;?></div>
					<div class="  fl">学校性质：<?php echo $zaixiao;?></div>
				</div>
			</div>

		</div>


		<div class="  ndd_jj">学校简介</div>
		<p class="ndd_jj_text"><?php echo $description;?></p>

	</div>
	<div class=" clearfix">
		<div class="fl ndd_con">
			<form id="form1">
				<div class="ncj_title">几率评估</div>
				<div class="ncj_r clearfix">
					<div class="ncj_name fl">您的姓名：</div>
					<input class="ncj_in ncj_in1 fl" type="text" value="" name="name">
				</div>
				<div class="ncj_r clearfix">
					<div class="ncj_name fl">您的电话：</div>
					<input class="ncj_in ncj_in2 fl" type="text" value="" name="mobile">
				</div>
				<div class="ncj_r clearfix">
					<div class="ncj_name fl">您的毕业学校：</div>
					<input class="ncj_in ncj_in3 fl" type="text" value="" name="school">
				</div>
				<div class="ncj_r clearfix">
					<div class="ncj_name fl">目标学校：</div>
					<input class="ncj_in ncj_in4 fl" type="text" value="" name="target_school">
				</div>
				<input class="ncj_btn" type="button" value="提 交">
			</form>
		</div>
		<div class="fr ndd_con">
			<div class="ncj_title">相关新闻</div>
			<div class="ncj_conl">
			<script language='javascript' src='<?php echo APP_PATH;?>index.php?m=formguide&c=index&a=show&formid=37&action=js&siteid=1'></script>
			<?php echo $content;?>

	        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=7c4fe28ac2f43e2ea0351a0f57aa8bb4&action=lists&catid=65&num=5\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = pc_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'65','limit'=>'5',));}?>
	        <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
	            <div class="clearfix ncj_conl_1">
	                <div class="fl "><a href="<?php echo $r['url'];?>"><?php echo $r['title'];?></a></div>
	            </div>
	        <?php $n++;}unset($n); ?>
	        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
	   		</div>

			
		</div>
	</div>
		<script>
		$(".ncj_btn").click(function(){
			var a1 = $(".ncj_in1").val();
			var a2 = $(".ncj_in2").val();
			var a3 = $(".ncj_in3").val();
			var a4 = $(".ncj_in4").val();
			if(a1==""){
				alert("姓名不能为空");
				return;
			}
			if(!$(".ncj_in2").val().match(/^1\d{10}$/)){
				alert("请输入正确的电话");
				return;
			}
			if(a3 ==""){
				alert("毕业学校不能为空");
				return;
			}
			if(a4 ==""){
				alert("目标学校不能为空");
				return;
			}
			console.log($('#form1').serialize());
			$.ajax({
	            type: "POST",
	            dataType: "json",
	            url: "" ,
	            data: $('#form1').serialize(),
	            success: function (result) {
	                alert("成功");
	            },
	        });
		})


		</script>
</div>
<?php include template("content","footer"); ?>
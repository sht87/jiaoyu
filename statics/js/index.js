var index = {
	init: function(){
		this.bindEvent();
	},
	bindEvent: function(){
		$('.nav_address_name').on('click', function(){
			$(".nav_address_pos").show();
		})
		$(".nav_address_pos span").on('click',function(){
			var city = $(this).text();
			$('.nav_address_name').text(city);
			$(".nav_address_pos").hide();
			$("#city").val(city);
			console.log($("#city").val());
		});

		//点赞
		$(".zan").on('click', function(){
			if($(this).hasClass('icon-shoucang')){
				$(this).removeClass('icon-shoucang').addClass('icon-xin');
			}else{
				$(this).removeClass('icon-xin').addClass('icon-shoucang');
			}
		})

		//返回顶部
		$(".backtop").on('click', function(){
			console.log(1);
			window.scrollTo(0,0);
		})

		//精品弹窗
		$(".collect_ck").on('click', function(){
			$(".collect_popbox").show();
		})
		$(".collect_close").on('click', function(){
			$(".collect_popbox").hide();
		})

		//厨师弹窗
		$(".chef_btn").on('click', function(){
			$(".chef_pop").show();
		})
		$(".collect_close").on('click', function(){
			$(".chef_pop").hide();
		})

		//生活详情弹窗
		$(".life_dck").on('click', function(){
			$(".life_dpop").show();
		})
		$(".collect_close").on('click', function(){
			$(".life_dpop").hide();
		})

		//注册弹窗
		$(".reg_close").on('click', function(){
			$(".register_box,.login_box").hide();
			
		})
		$(".res_btn").on('click', function(){
			$(".register_box").show();
			$(".login_box").hide();
		})
		$(".reg_back").on('click', function(){
			$(".register_box").hide();
			$(".login_box").show();
		})

		//获取验证码
		$(".getcode").on('click', function(){
			var id = $(this).attr("id");
			console.log(id)
			var mobile = $(this).parents('.reg_label').siblings().find('input[name=mobile]');
			// var mobileReg = new RegExp('^1[3|4|5|7|8][0-9]{9}$', 'g');
			if (!$(mobile).val().match(/^1[3|4|5|7|8]\d{9}$/)) {
	            $(mobile).siblings(".error").show();
	            return;
	        }else{
	        	index.getCode(id);
	        }
		})

		//注册
		$(".register_send").on('click',function(){
			if($(".reg_1").val() == ""){
				$(".reg_1").siblings(".error").show();
				return;
			}else if($(".reg_2").val() == ""){
				$(".reg_2").siblings(".error").show();
				return;
			}else if($(".reg_3").val() == ""){
				$(".reg_3").siblings(".error").show();
				return;
			}else if($(".reg_4").val() == ""){
				$(".reg_4").siblings(".error").show();
				return;
			}else if($(".reg_5").val() == ""){
				$(".reg_5").siblings(".error").show();
				return;
			}else if(!$('.reg_6').val().match(/^1[3|4|5|7|8]\d{9}$/)){
				$(".reg_6").siblings(".error").show();
				return;
			}else if($(".reg_7").val() == ""){
				$(".reg_7").siblings(".error").show();
				return;
			}
			$.ajax({
				type: "POST",
				url: "/pc/login/register",
				data:$('.register_form').serialize(),
				dataType: "json",
				success: function(data){
					if(!data.error) {      
						$(".register_box").hide();
						$(".login_box").show();
					} else { 
						alert(data.error);
					}
				}
			});  
		})
		//登录
		$(".login_send").on('click', function(){
			$.ajax({
				type: "POST",
				url: "/pc/login",
				data:$('.login_form').serialize(),
				dataType: "json",
				success: function(data){
					if(!data.error) {      
						window.location.reload();
					} else { 
						alert(data.error);
					}
				}
			});  
		})

		//修改
		$(".my_editbtn").on('click',function(){
			
			if($(".medit1").val() == ""){
				$(".medit1").siblings(".error").show();
				return;
			}else if($(".medit2").val() == ""){
				$(".medit2").siblings(".error").show();
				return;
			}else if($(".medit3").val() == ""){
				$(".medit3").siblings(".error").show();
				return;
			}else if($(".medit4").val() == ""){
				$(".medit4").siblings(".error").show();
				return;
			}else if(!$('.medit5').val().match(/^1[3|4|5|7|8]\d{9}$/)){
				$(".medit5").siblings(".error").show();
				return;
			}
			$.ajax({
				type: "POST",
				url: "/pc/login/edit",
				data:$('.edit_from').serialize(),
				dataType: "json",
				success: function(data){
					if(!data.error) {      
						window.location.reload();
					} else { 
						alert(data.error);
					}
				}
			});  
		})
	},
    getCode: function (id) {
        var wait = 60;
        function time() {
        	console.log
            if (wait == 0) {
                wait = 60;
                $("#"+id).val("获取验证码").attr('disabled',false);
            } else {
                $("#"+id).val(wait + "再次发送").attr('disabled',true);
                wait--;
                setTimeout(function () {
                    time()
                },1000)
            }
        }
        time();
        // $.ajax({
        //     url: "https://www.bg-iddi.com/api/login/code",
        //     data: {
        //         mobile: tel,
        //         piccode: imgCaptchas
        //     },
        //     method:'POST',
        //     header: {
        //         'Cookie': 'PHPSESSID=' + wx.getStorageSync('String'),
        //         'content-type':'application/json'
        //     },
        //     success: function (res) {
        //         var err = res.data.errcode
        //         var msg = res.data.errmsg
        //         if (err) {
        //             that.setData({
        //                 hint: msg,
        //                 disabled: ""
        //             })
        //             that.modalTap2();
        //         }
        //         else {
        //             time();
        //         }
        //     }
        // })
    },
}

index.init();

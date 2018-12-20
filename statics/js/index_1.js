var index = {
	init: function(){
		this.bindEvent();
	},
	bindEvent: function(){
		$(function(){
			$(".mx_title .mx_t").click(function(){
				if(!$(this).hasClass("active")){
					$(this).addClass("active");
					$(this).siblings(".mx_t").removeClass("active");
					$(".mx_schools .active").removeClass("active").siblings(".mx_school").addClass("active");;
					
				}
			})
		})
	}

}

index.init();

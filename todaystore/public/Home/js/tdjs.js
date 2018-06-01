$(document).ready(function(){
	$(".td_navlink").on('mouseover',function(){
		$(this).addClass("navlinkActive");
	})
	$(".td_navlink").on('mouseleave',function(){
		$(this).removeClass("navlinkActive");
	})
	var i=1;
	var interval=setInterval(function(){
		$('#loop'+i+'').fadeOut(500);
		if(i==6){
			i=1;
		}
		else{
			i++;
		}
		$('#loop'+i+'').fadeIn(1000);
		
	},4000);
	$(".selectloop").mouseover(function(){
		var loopstatus=$(this).index('input')+1;
		$("#loop"+loopstatus+"").show();
		$("#loop"+loopstatus+"").css('z-index','2');
		setTimeout('$("#loop'+loopstatus+'").fadeOut(3000)',1000);
		setTimeout('$("#loop'+loopstatus+'").css("z-index","1")',1000);
	})
	$("#tb_btn_dangji").mouseover(function(){
		if($(".tab_newfruit").is(":visible")){
			$(".tab_newfruit").css("display","none");
			$(".tab_dangji").css("display","block");
			$("#tb_btn_newfruit").removeClass("tb_btn_newfruit_hover");
			$("#tb_btn_dangji").removeClass("tb_btn_dangji");
			
		}
		
	})
	$("#tb_btn_newfruit").mouseover(function(){
		if($(".tab_dangji").is(":visible")){
			$(".tab_newfruit").css("display","block");
			$(".tab_dangji").css("display","none");
			$("#tb_btn_newfruit").addClass("tb_btn_newfruit_hover");
			$("#tb_btn_dangji").addClass("tb_btn_dangji");

		}

	})
	for(var month=1;month<13;month++){
		$(".center_information_month").append("<option value='"+month+"'>"+month+"</option>");
	}
	$(".center_information_day").click(function(){	
		$(".test").hide();
		var selectmonth= $(".center_information_month").val();
		if(selectmonth==2){
			for(var day=1;day<29;day++){
				$(".center_information_day").append("<option class='test' value='"+day+"'>"+day+"</option>");
			}
		}else if(selectmonth==1 || selectmonth==3 || selectmonth==5 || selectmonth==7 || selectmonth==8 || selectmonth==10 ||selectmonth==12){
			for(var day=1;day<32;day++){
				$(".center_information_day").append("<option class='test' value='"+day+"'>"+day+"</option>");
			}
		}
		else{
			for(var day=1;day<31;day++){
				$(".center_information_day").append("<option class='test' value='"+day+"'>"+day+"</option>");
			}
		}
	})
	$("#this_person").click(function(){
		$(".center_client").children(":not('.center_nav')").hide();
		$(".center_information").show();
		$("#this_person").parent().children().removeClass('center_nav_active');
  $("#this_person").addClass('center_nav_active');
	})
	// $("#this_car").click(function(){
	// 	$(".center_client").children(":not('.center_nav')").hide();
	// 	$(".center_car").show();
	// })
	// $("#this_doing_table").click(function(){
	// 	$(".center_client").children(":not('.center_nav')").hide();
	// 	$(".center_doing_table").show();
	// })
	// $("#this_finished_table").click(function(){
	// 	$(".center_client").children(":not('.center_nav')").hide();
	// 	$(".center_finished_table").show();
	// })
	// $("#this_tables").click(function(){
	// 	$(".center_client").children(":not('.center_nav')").hide();
	// 	$(".center_tables").show();
	// })
	$("#this_fankui").click(function(){
		$(".center_client").children(":not('.center_nav')").hide();
		$(".center_fankui").show();
		$("#this_fankui").parent().children().removeClass('center_nav_active');
  $("#this_fankui").addClass('center_nav_active');
	})
	$("#primary").click(function(){
		$(".center_information_client").show();
		$(".center_information_password").hide();
		$(".center_information_address").hide();
		$(".center_money").hide();
		if($("#primary").hasClass("center_information_map_active")){}
			else{
				$("#primary").addClass("center_information_map_active");
				$("#change_password").removeClass("center_information_map_active");
				$("#your_address").removeClass("center_information_map_active");
				$("#money").removeClass("center_information_map_active");
			}
		})
	$("#change_password").click(function(){
		$(".center_information_client").hide();
		$(".center_information_password").show();
		$(".center_information_address").hide();
		$(".center_money").hide();
		if($("#change_password").hasClass("center_information_map_active")){}
			else{
				$("#change_password").addClass("center_information_map_active");
				$("#primary").removeClass("center_information_map_active");
				$("#your_address").removeClass("center_information_map_active");
				$("#money").removeClass("center_information_map_active");
			}
		})
	$("#your_address").click(function(){
		$(".center_information_client").hide();
		$(".center_information_password").hide();
		$(".center_information_address").show();
		$(".center_money").hide();
		if($("#your_address").hasClass("center_information_map_active")){}
			else{
				$("#your_address").addClass("center_information_map_active");
				$("#primary").removeClass("center_information_map_active");
				$("#change_password").removeClass("center_information_map_active");
				$("#money").removeClass("center_information_map_active");
			}
		})
	$("#money").click(function(){
		$(".center_information_client").hide();
		$(".center_information_password").hide();
		$(".center_money").show();
		$(".center_information_address").hide();
		if($("#money").hasClass("center_information_map_active")){}
			else{
				$("#money").addClass("center_information_map_active");
				$("#primary").removeClass("center_information_map_active");
				$("#change_password").removeClass("center_information_map_active");
				$("#your_address").removeClass("center_information_map_active");
			}
		})
	var ss=0;  
	setInterval(function(){           
		if(ss>-120){
			$("#xiaoxilan").animate({top:''+(ss-10)+'px'});
			ss=ss-10;
		}
		else{
			$("#xiaoxilan").css('top','0px');
			ss=10;
		}
		$("#xiaoxilan li:eq(0)").insertAfter("#xiaoxilan li:eq(10)"); 
	},1500);
$("#toggle_add").click(function(){
	$("#toggle_new").toggleClass('add_new');
	$('.addme_div').toggleClass('hidden');
})
})

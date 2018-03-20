window.onload=function(){
	var btn1 = document.getElementById("graduate");
	var btn2 = document.getElementById("in_student");
	var blessing_message_large1 = document.getElementById("blessing_message_large1");
	var blessing_message_large2 = document.getElementById("blessing_message_large2");
	var air1 = document.getElementById("air");
	var cover1 = document.getElementById("cover");
	var large_one = null;
	var gift_list = null;//存放礼物页面的6种礼物
	var input1 = document.getElementById("input");
	var input2 = document.getElementById("input2");
	var input_bless = document.getElementById("input_bless");
	var blessing_glass1 = document.getElementById("blessing_glass");
	var go = document.getElementById("go");
	var birth_glass = document.getElementById("birth_glass");
	var sent_bless = document.getElementById("sent_bless");
	var gift_button = document.getElementById("gift_button");
	var pay = document.getElementById("pay");//支付按钮
	var heig =  document.body.clientHeight;
	document.getElementById("gif").style.height = heig+"px";

	$("#goon").click(function(){
		$("#gif").css("display","none");
		show();
		document.getElementById("blessing").style.display="block";
	});


	// document.getElementById("max_air3").style.display="none";
	// document.getElementById("max_air2").style.display="none";
	// document.getElementById("max_air").style.display="none";
	//礼物专区毕业生赠送礼物
	gift_button.onclick = function(){
		Area();
	}
	gift_button2.onclick = function(){
		Area();
	}
	function Area(){
		var gift_Arr = new Array();
		gift_list = document.getElementsByTagName("figure");

		for (var i = 0; i < gift_list.length; i++) {
			if (gift_list[i].className=='sative') {
				if (i<6) {
					gift_Arr[i] = gift_list[i].getAttribute("value");
				}else{
					gift_Arr[i] = gift_list[i].getAttribute("value")+2;
				};
			}else{
				gift_Arr[i] = -1;
			}
		};
		var birth="";
		axios.post('/admin/gift/getgift')
		.then(function (response) {
			var res = response.data.result;
			for (var i=0; i <8; i++) {
				if (res[i].id==gift_Arr[i]) {
					birth = birth + res[i].name + "(" + res[i].price + ")  "
				};
			};
			for (var i=8; i <16; i++) {
				if (res[i].id==gift_Arr[i]) {
					birth = birth + res[i].name + "(" + res[i].price + ")  "
				};
			};
			if (birth=="") {
				$(function(){
				    $.message({
						message:"您需要选择礼物哦",
						type:'warning'
					});
				})
				return 0;
			};
			birth_glass.style.display="block";
			document.getElementById("blessing").style.display="none";
			document.getElementById("input3").focus();
			show();
			$("#birth_list").val(birth);
		})
		.catch(function (error) {
		    console.log(error);
		});
	}


	//读取数据库中的所有礼物
	// var LW_bless=new Array();//存放从后台读取出来的礼物
	// bless_gift();
	// function bless_gift(){
 //    	axios.post('/admin/***/***')
	// 	.then(function (response) {
	// 		var data = response.data.result;
	// 		for (var i = 0; i < data.length; i++) {
				
	// 		};
	// 	})
	// 	.catch(function (error) {
	// 	    console.log(error);
	// 	});
	// }

	//读取数据库中的祝福语
	var Z_bless=new Array();//存放从后台读取出来的祝福语
	bless_air();
	function bless_air(){
    	axios.post('/admin/message/selectmsg')
		.then(function (response) {
			var data = response.data.result;
			for (var i = 0; i < data.length; i++) {
				Z_bless[i] = data[i].give_name + ":" + data[i].message;
			};
		})
		.catch(function (error) {
		    console.log(error);
		});
	}

	comment();
	function comment(){
		setTimeout(function(){
    		$("#p1").text("1");
    	},0);
    	setTimeout(function(){
    		$("#p2").text("2");
    	},1000);
    	setTimeout(function(){
    		$("#p3").text("3");
    	},1000);
    	setTimeout(function(){
    		
    	},4000);
	}
	//更新气泡内容
	var oer = 0;
	Interval();
	function Interval(){
		setTimeout(function(){
	    	setTimeout(function(){
	    		$("#p1").text(Z_bless[oer]);
	    	},0);
	    	setTimeout(function(){
	    		$("#p2").text(Z_bless[oer+1]);
	    	},2000);
	    	setTimeout(function(){
	    		$("#p3").text(Z_bless[oer+2]);
	    	},4000);
	    	
	    	if (oer+3>=Z_bless.length) {
	    		oer = 0;
	    	}else{
	    		oer = oer+3;
	    	};
	    	setTimeout(function(){
	    		Interval();
	    	},1000);
	    },5000);
	}


	//存放留言
	sent_bless.onclick = function(){
		var name = $("#input2").val();
		var message = $("#input_bless").val();
		var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
		axios.post('/admin/message/insert', {
		    name: name,
			message: message,
			_token:token
		})
		.then(function (response) {
			var res = response.data;
			if (res.code) {
				
				$(function(){
				    $.message({
						message:res.msg,
						type:'warning'
					});
				})
			}else{
				if (Z_bless.length<=oer+4) {
					Z_bless[4] = name + ":" + message;
				}else{
					Z_bless[oer+4] = name + ":" + message;
				};
				$(function(){
				    $.message(res.msg);
				})
				disapear();
			};
		    
		})
		.catch(function (error) {
		    console.log(error);
		});
	}

	
	var myArray=new Array();
	//点击赠送后弹出输入框填写赠送人和以选中的礼物
	go.onclick = function(){
		large_one = document.getElementsByClassName("message_large_one");
		// gift_list = document.getElementsByTagName("figure");
		for (var i = 0; i < large_one.length; i++) {
			if (large_one[i].className=='message_large_one sative') {
				myArray[i] = large_one[i].getAttribute("value");
			}else{
				myArray[i] = -1;
			}
		};
		
		var birth="";
		axios.post('/admin/gift/getgift')
		.then(function (response) {
			var res = response.data.result;
			for (var i=0; i <res.length; i++) {
				if (res[i].id==myArray[i]) {
					birth = birth + res[i].name + "(" + res[i].price + ")  "
				};
			};
			if (birth=="") {
				$(function(){
				    $.message({
						message:"您需要选择礼物哦",
						type:'warning'
					});
				})
				return 0;
			};
			birth_glass.style.display="block";
			document.getElementById("blessing").style.display="none";
			document.getElementById("input3").focus();
			show();
			$("#birth_list").val(birth);
		})
		.catch(function (error) {
		    console.log(error);
		});
	}


	
	
	//点击支付的时候存放赠送人及礼物，并完成支付
	pay.onclick = function(){
		var name = $("#input3").val();//赠送人姓名
		var list = myArray;//礼物ID
		var gift_arr = [];
		for(var i=0;i<list.length;i++) {
			if(list[i] == -1) continue;
			gift_arr.push(list[i]);
		}
		var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
		axios.post('/admin/gift/wxgive', {
			name: name,
			gifts: gift_arr,
			_token:token
		})
		.then(function (response) {
			var data = response.data;
			disapear();
			// gif_show();
			document.getElementById("goon").style.display="block";
			console.log(data.msg);
			if(data.code == 0) {	
				alert("dasda");
				window.location.href = data.msg + '/' +data.result.id+'/'+data.result.totle;
			}else {
				alert("dasda2");
				$(function(){
					$.message({
						message:data.msg,
						type:'warning'
					});
				})
				
			}
			
		})
		.catch(function (error) {
		    console.log(error);
		});
	}


	//输入框获得焦点是时，底部送祝福框出来
	input1.onfocus = function(){
		blessing_glass1.style.display="block";
		input2.focus();
		this.disabled=true;
		show();
	}

	//送礼物气泡淡入淡出效果
	$(function(){
		function show(){
		   $("#max_air").fadeToggle(1000);
		}
		setInterval(show,2000);
	});

	
	//标示礼物是否被选中
	function active(){
		large_one = document.getElementsByClassName("message_large_one");
		gift_list = document.getElementsByTagName("figure");
		for (var i = 0; i < large_one.length; i++) {
			large_one[i].onclick = function(){
				if (this.className=='message_large_one sative') {
					this.setAttribute("class", "message_large_one"); 
				}else{
					this.setAttribute("class", "message_large_one sative"); 
				}
			}
		};
		for (var i = 0; i < gift_list.length; i++) {
			gift_list[i].onclick = function(){
				if (this.className=='sative') {
					this.setAttribute("class", ""); 
				}else{
					this.setAttribute("class", "sative"); 
				}
			}
		};
	}

	//转换到毕业生送祝福页面
	btn1.onclick=function(){
		blessing_message_large1.style.left=0+"px";
		blessing_message_large2.style.left=0+"px";
		btn1.style.color="#e6e6e6";
		btn2.style.color="red";
	}

	//转换到在校生送祝福页面
	btn2.onclick=function(){
		var wid =  document.body.clientWidth;
		blessing_message_large1.style.left=-wid+"px";
		blessing_message_large2.style.left=-wid+"px";
		btn2.style.color="#e6e6e6";
		btn1.style.color="red";
	}

	//控制遮盖层控制自己和其他div的出现和消失
	air1.onclick=function(){
		show();
		document.getElementById("blessing").style.display="block";
	}
	cover1.onclick=function(){
		disapear();
		document.getElementById("blessing").style.display="none";
	}
	
	function show(){
		cover1.style.display="block";
		cover1.style.height=heig+"px";
	}
	function disapear(){
		cover1.style.display="none";
		blessing_glass1.style.display="none";
		birth_glass.style.display="none";
		input.disabled=false;
	}

	
	//从后台得到礼物
	great_bless();
	function great_bless(){
		var father  = $("#blessing_message_large1");
		var father2  = $("#blessing_message_large2");
		var gift_large = $("#gift");
		var gift_large2 = $("#gift2");
		axios.post('/admin/gift/getgift').then(function(response) {
			var data = response.data;
			if(data.code == 0) {
				var giftArr = data.result; 
				
				for (var i = 0; i<giftArr.length/2; i++) {
					father.append('<div class="message_large_one" value="'+giftArr[i].id+'"><img src="/'+ giftArr[i].image+'"><p>'+giftArr[i].name+'</p><span>¥'+giftArr[i].price +'</span></div>');
					if (i<6) {
						gift_large.append('<figure value="'+giftArr[i].id+'"><img src="/'+ giftArr[i].image+'"><figcaption>'+giftArr[i].name+'</figcaption><figcaption>¥'+giftArr[i].price +'</figcaption></figure>');
					};
				};
				for (var i = giftArr.length/2; i<giftArr.length; i++) {
					father2.append('<div class="message_large_one" value="'+giftArr[i].id+'"><img src="/'+ giftArr[i].image+'"><p>'+giftArr[i].name+'</p><span>¥'+giftArr[i].price +'</span></div>');
					if (i<14) {
						gift_large2.append('<figure value="'+giftArr[i].id+'"><img src="/'+ giftArr[i].image+'"><figcaption>'+giftArr[i].name+'</figcaption><figcaption>¥'+giftArr[i].price +'</figcaption></figure>');
					};
				};
				active();
			}
		})
	}
}

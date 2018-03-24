window.onload=function(){
	var btn1 = document.getElementById("graduate");
	var btn2 = document.getElementById("in_student");
	var blessing_message_large1 = document.getElementById("blessing_message_large1");
	var blessing_message_large2 = document.getElementById("blessing_message_large2");
	var air1 = document.getElementById("air");
	var air2 = document.getElementById("air2");
	var cover1 = document.getElementById("cover");
	var large_one = null;
	var gift_list = null;//存放礼物页面的6种礼物
	var json = [];//存放从后台读取出来的礼物
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
	// document.getElementById("gif").style.height = heig+"px";
	document.getElementById("pay_select").style.height = heig+"px";

	$("#goon").click(function(){
		$("#gif").css("display","none");
		show();
		document.getElementById("blessing").style.display="block";
	});

	//音乐
	var setConfig = {
		song : [
			{
				src : '/'+"img/love.mp3"
			}
		],
		error : function(meg){
			console.log(meg);
		}
	};
	var audioFn = audioPlay(setConfig);

	if(audioFn){
		//开始加载音频,true为播放,false不播放
		audioFn.loadFile(1);
	}
	if (document.getElementsByClassName('icon-play').style != undefined) {
		console.log(document.getElementsByClassName('icon-play'));
		document.getElementsByClassName('icon-play').style.transform="rotate(0deg)"
	};


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
		var beng2 = 0;
		for (var i = 0; i < gift_list.length; i++) {
			if (gift_list[i].className=='sative') {
				if (i<6) {
					gift_Arr[i] = gift_list[i].getAttribute("value");
				}else{
					gift_Arr[i] = gift_list[i].getAttribute("value")+2;
				};
				beng2=1;
			}else{
				gift_Arr[i] = -1;
			}
		};
		if (beng2==0) {
			layui.use(['layer', 'form'], function(){
				var layer = layui.layer,
				form = layui.form;
				layer.msg('您需要选择礼物哦');
			});
			return;
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


	var count = 0;
	comment2();
	function comment2(){
		setTimeout(function(){
    		// $("#gift_p").text("1");
    		// $("#bless").text("1");
    		// $("#imgchange").attr('src', "{{ asset('img/shu.jpg') }}");
    	},0);
    	setTimeout(function(){
    		
    	},3000);
	}


	//送礼物气泡淡入淡出效果
	function show2(){
		if (count<json.length-1) {
			count++;
    	}else{
    		count=0;
    	};
		setTimeout(function(){
			$("#max_air").fadeToggle(1000);
		},0);
		setTimeout(()=>{
			$("#gift_p").text(json[count].gift);
	    	$("#bless").text(json[count].bless);
	    	$("#imgchange").attr('src', '/'+json[count].imgs);
			$("#max_air").fadeToggle(1000);
		},2000);
		setTimeout(function(){
			show2();
		},3000);
	}


	// 读取数据库中的所有礼物
	bless_gift();
	function bless_gift(){
    	axios.post('/admin/order/getorder')
		.then(function (response) {
			var data = response.data.result;
			for (var i = 0; i < data.length; i++) {
				for (var k = 0; k < data[i].gifts_id.length; k++) {
					var j = {};
					j.gift = data[i].name+" 送了 "+data[i].gifts_id[k].name;
			        j.imgs = data[i].gifts_id[k].image;
			        j.bless = "生日快乐";
			        json.push(j);
				};
			};
			show2();
		})
		.catch(function (error) {
		    console.log(error);
		});
	}

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
			var ifshow = document.getElementById("air_box");
			// if (ifshow.style.display == "block") {
				Interval();
			// };
		})
		.catch(function (error) {
		    console.log(error);
		});
	}

	comment();
	function comment(){
		setTimeout(function(){
    		$("#p1").text("王琦1：三月生日快乐");
    	},0);
    	setTimeout(function(){
    		$("#p2").text("王琦2：三月生日快乐");
    	},1000);
    	setTimeout(function(){
    		$("#p3").text("王琦3：三月生日快乐");
    	},1000);
    	setTimeout(function(){
    		
    	},4000);
	}
	//更新气泡内容
	var oer = 0;
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
		if (name=="") {
			layui.use(['layer', 'form'], function(){
				var layer = layui.layer,
				form = layui.form;
				layer.msg('请输入名称');
			});
			return;
		};
		if (name.length>=10) {
			layui.use(['layer', 'form'], function(){
				var layer = layui.layer,
				form = layui.form;
				layer.msg('名字不能超过10个字符');
			});
			return;
		};
		if (message=="") {
			layui.use(['layer', 'form'], function(){
				var layer = layui.layer,
				form = layui.form;
				layer.msg('请填写您的祝福');
			});
			return;
		};
		if (message.length>=10) {
			layui.use(['layer', 'form'], function(){
				var layer = layui.layer,
				form = layui.form;
				layer.msg('留言内容不能超过10个字');
			});
			return;
		};
		var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
		axios.post('/admin/message/insert', {
		    name: name,
			message: message,
			_token:token
		})
		.then(function (response) {
			var res = response.data;
			if (res.code) {
				layui.use(['layer', 'form'], function(){
					var layer = layui.layer,
					form = layui.form;
					layer.msg(res.msg);
				});
			}else{
				if (Z_bless.length<=oer+4) {
					Z_bless[4] = name + ":" + message;
				}else{
					Z_bless[oer+4] = name + ":" + message;
				};
				layui.use(['layer', 'form'], function(){
					var layer = layui.layer,
					form = layui.form;
					layer.msg(res.msg);
				});
				disapear();
			};
		    
		})
		.catch(function (error) {
		    console.log(error);
		});
	}

	
	var myArray=new Array();
	var gifts_jilv = new Array();
	//点击赠送后弹出输入框填写赠送人和以选中的礼物
	go.onclick = function(){
		large_one = document.getElementsByClassName("message_large_one");
		var beng = 0;
		for (var i = 0; i < large_one.length; i++) {
			if (large_one[i].className=='message_large_one sative') {
				myArray[i] = large_one[i].getAttribute("value");
				beng = 1;
			}else{
				myArray[i] = -1;
			}
		};
		if (beng==0) {
			layui.use(['layer', 'form'], function(){
				var layer = layui.layer,
				form = layui.form;
				layer.msg("您需要选择礼物哦");
			});
			return 0;
		};
		var birth="";
		axios.post('/admin/gift/getgift')
		.then(function (response) {
			console.log(response);
			var res = response.data.result;
			gifts_jilv = [];
			for (var i=0; i <res.length; i++) {
				if (res[i].id==myArray[i]) {
					birth = birth + res[i].name + "(" + res[i].price + ")  ";
					var t = {};
					t.name = " 送了 "+res[i].name;
			        t.imgs = res[i].image;
			        t.bless = "生日快乐";
			        gifts_jilv.push(t);
				};
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

	var zfb = document.getElementById('zfb');
	var wx = document.getElementById('wx');
	zfb.onclick = function(){
		var name = $("#input3").val();//赠送人姓名
		var list = myArray;//礼物ID
		var gift_arr = [];
		for(var i=0;i<list.length;i++) {
			if(list[i] == -1) continue;
			gift_arr.push(list[i]);
		}
		// console.log(gift_arr);
		var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
		axios.post('/admin/gift/give', {
			name: name,
			gifts: gift_arr,
			_token:token
		})
		.then(function (response) {
			var data = response.data;
			// disapear();
			// gif_show();
			// document.getElementById("goon").style.display="block";
			console.log(data.msg);
			if(data.code == 0) {	
				window.location.href = data.msg + '/' +data.result.id+'/'+data.result.totle;
			}else {
				layui.use(['layer', 'form'], function(){
					var layer = layui.layer,
					form = layui.form;
					layer.msg(data.msg);
				});
				// return 0;
			}
			
		})
		.catch(function (error) {
		    console.log(error);
		});
	}
	wx.onclick = function(){
		wxtest();
	}
	function wxtest(){
		var name = $("#input3").val();//赠送人姓名
		var list = myArray;//礼物ID
		var gift_arr = [];
		for(var i=0;i<list.length;i++) {
			if(list[i] == -1) continue;
			gift_arr.push(list[i]);
		}
		var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
		axios.post('/wechat', {
			name: name,
			gifts: gift_arr,
			_token:token
		})
		.then(function (response) {
			if(response.data.code==1){
				callpay(response.data.result);
			}else{
				alert(response.data.msg);
			}
		})
		.catch(function (error) {
			console.log(error);
		});        
	}
	function updateOrder(id){
		var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
		axios.post('/updateOrder', {
			id : id,
			_token:token
		})
		.then(function (response) {
			alert(response.data.result);

		})
		.catch(function (error) {
			alert(error);
		});        
	}
	function callpay(result)
	{
		if (typeof WeixinJSBridge == "undefined"){
			if( document.addEventListener ){
				document.addEventListener('WeixinJSBridgeReady', onBridgeReady, false);
			}else if (document.attachEvent){
				document.attachEvent('WeixinJSBridgeReady', onBridgeReady); 
				document.attachEvent('onWeixinJSBridgeReady', onBridgeReady);
			}
		 }else{
			onBridgeReady(result);
		 }
	}
	function onBridgeReady(result){    
		WeixinJSBridge.invoke(
			'getBrandWCPayRequest',{
				"appId":result.appId,     //公众号名称，由商户传入     
				"timeStamp":result.timeStamp,         //时间戳，自1970年以来的秒数     
				"nonceStr":result.nonceStr, //随机串     
				"package":result.package,     
				"signType":"MD5",         //微信签名方式：     
				"paySign":result.paySign //微信签名 
			}  ,
			function(res){   
				if(res.err_msg == "get_brand_wcpay_request:ok" ) {
					updateOrder(result.payId);
					for (var i = 0; i < gifts_jilv.length; i++) {
						json[count+2+i].gift = gifts_jilv[i].name;
						json[count+2+i].imgs = gifts_jilv[i].img;
						json[count+2+i].bless = gifts_jilv[i].bless;
					};
					
				}     // 使用以上方式判断前端返回,微信团队郑重提示：res.err_msg将在用户支付成功后返回    ok，但并不保证它绝对可靠。 
			}
		); 
	}
	//点击支付的时候存放赠送人及礼物，并完成支付
	pay.onclick = function(){
		var name = $("#input3").val();
		if (name=="") {
			layui.use(['layer', 'form'], function(){
				var layer = layui.layer,
				form = layui.form;
				layer.msg("请留下您的名字");
			});
			return;
		};
		if (name.length>=10) {
			layui.use(['layer', 'form'], function(){
				var layer = layui.layer,
				form = layui.form;
				layer.msg("名称不能超过10个字");
			});
			return;
		};
		document.getElementById('pay_select').style.display = "block";
		document.getElementById('birth_glass').style.display = "none";
		for (var i = 0; i < gifts_jilv.length; i++) {
			gifts_jilv[i].name = name + gifts_jilv[i].name;
		};
		console.log(gifts_jilv);
	}


	//输入框获得焦点是时，底部送祝福框出来
	input1.onclick = function(){
		this.disabled=true;
		blessing_glass1.style.display="block";
		input2.focus();
		show();
	}

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
		btn1.style.color="red";
		btn2.style.color="#e6e6e6";
	}

	//转换到在校生送祝福页面
	btn2.onclick=function(){
		var wid =  document.body.clientWidth;
		blessing_message_large1.style.left=-wid+"px";
		blessing_message_large2.style.left=-wid+"px";
		btn2.style.color="red";
		btn1.style.color="#e6e6e6";
	}

	//控制遮盖层控制自己和其他div的出现和消失
	air2.onclick=function(){
		show();
		document.getElementById("blessing").style.display="block";
	}
	cover1.onclick=function(){
		disapear();
		document.getElementById("blessing").style.display="none";
		document.getElementById("pay_select").style.display="none";
	}
	
	function show(){
		cover1.style.display="block";
		cover1.style.height=heig+"px";
	}
	function disapear(){
		cover1.style.display="none";
		blessing_glass1.style.display="none";
		birth_glass.style.display="none";
		input1.disabled=false;
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


window.onload=function(){
	var btn1 = document.getElementById("graduate");
	var btn2 = document.getElementById("in_student");
	var blessing_message_large1 = document.getElementById("blessing_message_large1");
	var blessing_message_large2 = document.getElementById("blessing_message_large2");
	var air1 = document.getElementById("air");
	var cover1 = document.getElementById("cover");
	var large_one = document.getElementsByClassName("message_large_one");
	var input1 = document.getElementById("input");
	var input2 = document.getElementById("input2");
	var input_bless = document.getElementById("input_bless");
	var blessing_glass1 = document.getElementById("blessing_glass");
	var go = document.getElementById("go");
	var birth_glass = document.getElementById("birth_glass");
	var sent_bless = document.getElementById("sent_bless");
	var pay = document.getElementById("pay");//支付按钮


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
			console.log(res);
			if (res.code) {
				$(function(){
				    $.message({
						message:res.msg,
						type:'warning'
					});
				})
			}else{
				$(function(){
				    $.message(res.msg);
				})
			};
		    
		})
		.catch(function (error) {
		    console.log(error);
		});
	}

	

	//点击赠送后弹出输入框填写赠送人，以获得选中的礼物
	go.onfocus = function(){
		birth_glass.style.display="block";
		document.getElementById("blessing").style.display="none";
		document.getElementById("input3").focus();
		var myArray=new Array();
		for (var i = 0; i < large_one.length; i++) {
			if (this.className=='message_large_one sative') {
				myArray[i] = i;
			}
		};
		pay.onclick = function(){
			var name = $("#input3").val();//赠送人姓名
			var list = $("#birth_list").val();//礼物ID
			var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
			axios.post('/admin/gift/give', {
			    name: name,
				message: list,
				_token:token
			})
			.then(function (response) {
				var res = response.data;
				console.log(res);
				if (res.code) {
					$(function(){
					    $.message({
							message:res.msg,
							type:'warning'
						});
					})
				}else{
					$(function(){
					    $.message(res.msg);
					})
				};
			    
			})
			.catch(function (error) {
			    console.log(error);
			});
		}
		show();
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
	for (var i = 0; i < large_one.length; i++) {
		large_one[i].onclick = function(){
			if (this.className=='message_large_one sative') {
				this.setAttribute("class", "message_large_one"); 
			}else{
				this.setAttribute("class", "message_large_one sative"); 
			}
		}
	};

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
		var heig =  document.body.clientHeight;
		cover1.style.display="block";
		cover1.style.height=heig+"px";
	}
	function disapear(){
		cover1.style.display="none";
		blessing_glass1.style.display="none";
		birth_glass.style.display="none";
		input.disabled=false;
	}
}

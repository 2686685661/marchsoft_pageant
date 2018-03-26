<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>十二周年庆</title>
<link rel="stylesheet" href="{{ asset('css/onepage-scroll.css') }}" />
<link rel="stylesheet" href="{{ asset('css/main.css') }}">
<link rel="stylesheet" href="{{ asset('css/page-one.css') }}">
<link rel="stylesheet" href="{{ asset('css/page7.css') }}">
<link rel="stylesheet" href="{{ asset('css/blessing.css') }}">
<link rel="stylesheet" href="{{ asset('css/message.css') }}">
<link rel="stylesheet" href="{{ asset('css/Second-pages.css') }}">
<link rel="stylesheet" href="{{ asset('css/moveone.css') }}">
<link rel="stylesheet" href="{{ asset('layui/css/layui.css') }}">
<script type="text/javascript" src="{{ asset('js/jquery-1.9.0.min.js') }}"></script>
<style>
.page1 { background: url("{{ asset('img/bg-one.jpg') }}"); background-size: cover;}
.page2,.page3,.page4,.page5,.page6,.page8{ background: url("{{ asset('img/bg.png') }}"); background-size: cover;}
.page7 { background: url("{{ asset('img/list.jpg') }}"); background-size: cover;}
p.title { position: relative; top: 35%; font: 700 40px "Microsoft Yahei"; color: #fff; text-align: center;}
</style>
<!-- <script type="text/javascript" src="{{ URL::asset('js/jquery-1.11.1.min.js') }}"></script> -->
<script type="text/javascript" src="{{ asset('js/jquery.onepage-scroll.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/unslider.min.js') }}"></script>
<script src="{{ asset('js/axios.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('layui/layui.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/rall.js') }}"></script>
</head>
<body id="main_body">
<script type="text/javascript">
	// Todo 上线以后要打开检测
	// var userInfo = navigator.userAgent;
	// if ((userInfo.indexOf("Windows") != -1) || (userInfo.indexOf("Mac OS") != -1)) {
	// 	document.getElementById("main_body").style.display = "none";
	// 	alert("请在手机端打开！");
	// }
</script>
	<div class="main">
		<div class="page page1">
			<div class="animation-one">
				<div class="yan-one">
					<img src="{{ asset('img/yan.png') }}" alt="大雁">
				</div>
				<div class="yun-one">
					<img src="{{ asset('img/yun.png') }}" alt="云">
				</div>
				<div class="yun-two">
					<div class="yan-two">
						<img src="{{ asset('img/yan.png') }}" alt="大雁">
					</div>
					<div class="yun">
						<img src="{{ asset('img/yun.png') }}" alt="云">
					</div>
				</div>
				<div class="yun-three">
					<img src="{{ asset('img/yun.png') }}" alt="云">
				</div>
			</div>
			<div class="animation-two">
				<div class="time">
					<img src="{{ asset('img/time.png') }}" alt="时间">
				</div>
				<div class="age">
					<img src="{{ asset('img/age.png') }}" alt="年龄">
				</div>
			</div>
			<div class="animation-three">
				<div class="qiu-one">
					<img src="{{ asset('img/qiu-one.png') }}" alt="热气球">
				</div>
				<div class="qiu-two">
					<img src="{{ asset('img/qiu-two.png') }}" alt="热气球">
				</div>
				<div class="pao">
					<img src="{{ asset('img/pao.png') }}" alt="气泡">
				</div>
			</div>
		</div>
		<div class="page page2">
			<div class="page1-upper">
				<div class="img-one">
					<div class="Lballoon"></div>
					<div class="frame1" id="enlarge_one"><img src="{{ asset('img/birth1.png') }}"
                    ></div>
				</div>
				<div>
					<div class="text1" id="shake_one"><img src="{{ asset('img/text1.png') }}"></div>
					<!-- <div><img src="img/text2.png"></div> -->
				</div>
			</div>
			<div class="page1-center">
				<div class="text3" id="shake_three"><img src="{{ asset('img/text3.png') }}"></div>
				<div>
					<div class="stars"><img src="{{ asset('img/Stars.png') }}"></div>
					<div class="frame2" id="enlarge_two"><img src="{{ asset('img/birth2.png') }}"></div>
				</div>
			</div>
			<div class="page1-lower">
				<div>
					<div class="balloon"></div>
					<div class="baby" id="slide_one"></div>
				</div>
				<div>
					<div>
						<div class="cloud"><img src="{{ asset('img/yun.png') }}"></div>
						<div class="Map"><img src="{{ asset('img/Map.png') }}"></div>
					</div>
				</div>
			</div>						
		</div>
		<div class="page page3">
			<div class="page1-upper">
				<div class="Bird"><img src="{{ asset('img/Bird.png') }}"></div>
				<div class="text4" id="shake_four"><img src="{{ asset('img/text4.png') }}"></div>
				<div class="aircraft"><img src="{{ asset('img/aircraft.png') }}"></div>
			</div>
			<div class="page2-center">
				<div class="text5" id="shake_five"><img src="{{ asset('img/text5.png') }}"></div>
				<div>
					<div class="cloud2"><img src="{{ asset('img/yun.png') }}"></div>
					<div class="frame3" id="enlarge_three"><img src="{{ asset('img/th-p1.png') }}"></div>
				</div>
			</div>
			<div class="page2-lower">
				<div>
					<div class="frame4" id="enlarge_four"><img src="{{ asset('img/th_p2.png') }}"></div>
					<div class="glasses"><img src="{{ asset('img/glasses.png') }}"></div>
				</div>
				<div class="three" id="slide_two"><img src="{{ asset('img/three.png') }}"></div>
			</div>
		</div>
		<div class="page page4">
			<div class="page3-upper">
				<div>
					<div class="Bird2"><img src="{{ asset('img/Bird.png') }}"></div>
					<div class="frame5" id="enlarge_five"><img src="{{ asset('img/eight1.png') }}"></div>
				</div>
				<div>
					<div class="cloud3"><img src="{{ asset('img/yun.png') }}"></div>
					<div class="Bird3"><img src="{{ asset('img/Bird.png') }}"></div>
					<div class="text6" id="shake_six"><img src="{{ asset('img/text6.png') }}"></div>
				</div>
			</div>
			<div class="page3-center">
				<div class="text7" id="shake_seven"><img src="{{ asset('img/text7.png') }}"></div>
				<div>
					<div class="balloon3"></div>
					<div class="frame6" id="enlarge_six"><img src="{{ asset('img/eight2.png') }}"></div>
				</div>
			</div>
			<div class="page3-lower">
				<div>
					<div class="cloud4"><img src="{{ asset('img/yun.png') }}"></div>
					<div class="eight" id="slide_three"><img src="{{ asset('img/eight.png') }}"></div>
				</div>
				<div>
					<div class="text8" id="shake_eight"><img src="{{ asset('img/text8.png') }}"></div>
					<div class="Stars2"><img src="{{ asset('img/Stars.png') }}"></div>
				</div>
			</div>
		</div>
		<div class="page page5">
			<div class="page4-upper">
				<div>
					<div class="Bicycle"><img src="{{ asset('img/Bicycle.png') }}"></div>
					<div class="text9" id="shake_nine"><img src="{{ asset('img/text9.png') }}"></div>
				</div>
				<div>
					<div class="Bird4"><img src="{{ asset('img/Bird.png') }}"></div>
					<div class="frame7" id="enlarge_seven"><img src="{{ asset('img/ten1.png') }}"></div>
				</div>
			</div>
			<div class="page4-center">
				<div class="frame8" id="enlarge_eight"><img src="{{ asset('img/ten2.png') }}"></div>
				<div>
					<div class="tra"><img src="{{ asset('img/TRA.png') }}"></div>
					<div class="text10" id="shake_ten"><img src="{{ asset('img/text10.png') }}"></div>
					<div class="Stars3"><img src="{{ asset('img/Stars.png') }}"></div>
				</div>
			</div>
			<div class="page4-lower">
				<div>
					<div class="text11" id="shake_eleven"><img src="{{ asset('img/text11.png') }}"></div>
					<div class="car"><img src="{{ asset('img/car.png') }}"></div>
				</div>
				<div class="ten" id="slide_four"><img src="{{ asset('img/ten.png') }}"></div>
			</div>
		</div>
		<div class="page page6">
			<div class="page5-upper">
				<div>
					<div class="Bird5"><img src="{{ asset('img/Bird.png') }}"></div>
					<div class="frame9" id="enlarge_nine"><img src="{{ asset('img/twelve1.png') }}"></div>
				</div>
				<div>
					<div class="camera"><img src="{{ asset('img/camera.png') }}"></div>
					<div class="text12" id="shake_twelve"><img src="{{ asset('img/text12.png') }}"></div>
				</div>
			</div>
			<div class="page5-center">
				<div>
					<div class="balloon4"></div>
					<div class="text13" id="shake_thirteen"><img src="{{ asset('img/text13.png') }}"></div>
				</div>
				<div class="frame10" id="enlarge_ten"><img src="{{ asset('img/twelvwe2.png') }}"></div>
			</div>
			<div class="page5-lower">
				<div class="Twelve" id="slide_five"><img src="{{ asset('img/twelve.png') }}"></div>
				<div>
					<div class="text14" id="shake_fourteen"><img src="{{ asset('img/text14.png') }}"></div>
					<div class="book"><img src="{{ asset('img/book.png') }}"></div>	
				</div>
			</div>
		</div>
		<div class="page page7" >
			<div class="lists" id="list_div">
				<img src="{{ asset('img/list.png') }}" alt="列表">
			</div>
			<div class="pays" id="pays_div">
				<img src="{{ asset('img/pay.png') }}" alt="气泡" id="ClickMe">
		    </div>
		    <div class="thinks" id="thinks_div">
		    	<img src="{{ asset('img/think.png') }}">
		    </div>
		    <div id="goodcover"></div>
		    <div id="code" style="background-color:transparent;width:400px;height:640px;">
		        <div class="close1">
		        	<a href="javascript:void(0)" id="closebt"><img src="{{ asset('img/close.png') }}"></a>
		        </div>
		        <div class="banner b04" id="b04" style="width:500px;height:1020px;">
					<ul>
						<li class="slider-item">
							<div class="code-img">
			    				<img id="ewmsrc" src="{{ asset('img/1.png') }}">
			    			</div>
						</li>
						<li class="slider-item">
							<div class="code-img">
			    				<img id="ewmsrc" src="{{ asset('img/2.png') }}">
			    			</div>	
						</li>
						<li class="slider-item">
							<div class="code-img">
			    				<img id="ewmsrc" src="{{ asset('img/3.png') }}">
			    			</div>	
						</li>
					</ul>
  			 	</div>
		    </div>
		</div>
		<div class="page page8">
			<div class="title">
				<img src="{{ asset('img/title.png') }}" alt="标题">
			</div>
			<div class="banner-two b04" id="b04">
				<ul>
					<li class="slider-item">
						<div class="code-img" style="width:300px;">
		    				<div class="background" id="ewmsrc">
								<img src="{{ asset('img/back.png') }}" alt="" class="back">
								<div class="gift" id="gift">
									
								</div>
								<div class="give">
									<img src="{{ asset('img/bo.png') }}" alt="" id="gift_button">
								</div>
							</div>
		    			</div>
					</li>
					<li class="slider-item">
						<div class="code-img">
		    				<div class="background" id="ewmsrc">
								<img src="{{ asset('img/back-2.png') }}" alt="" class="back">
								<div class="gift-two"  id="gift2">
									
								</div>
								<div class="give2">
									<img src="{{ asset('img/bo.png') }}" alt="" id="gift_button2">
								</div>
							</div>
		    			</div>	
					</li>
				</ul>
		 	</div>	
		</div>
	</div>

	<div class="air_box" id="box">
		<div id="air_box"><!-- 气泡 层 -->
			<div id="air_minbox">
				<div class="air" id="air">
					<input type="text" placeholder="请留下您的祝福..." id="input">
					<button id="air2"></button>
				</div>
				<div class="air_min_box" id="air_min_box">
					<div class="air_min bub1">
						<p id="p1"><span>王琦1：</span>祝三月生日快乐乐乐乐乐</p>
					</div>
					<div class="air_min bub2">
						<p id="p2"><span>王琦2：</span>祝三月生日快乐</p>
					</div>
					<div class="air_min bub3">
						<p id="p3"><span>王琦3：</span>祝三月生日快乐</p>
					</div>
				</div>
				<div class="max_air" id="max_air">
					<img src="{{ asset('img/call.png') }}" alt="" id="imgchange">
					<div>
						<p id="gift_p">桑金超 送了 打call</p>
						<p id="bless">生日快乐</p>
					</div>
				</div>
			</div>
		</div>
			
	</div>
		<div id="cover"></div><!-- 遮盖层 -->
		<div class="pay_select" id="pay_select">
			<div class="select_box">
				<p>请选择支付方式：</p>
				<div>
					<div class="area" id="zfb">
						<button></button>
						<div>
							<p class="tit">支付宝支付</p>
							<p class="untit">（手续费为全额的0.6%）</p>
						</div>
					</div>
					<div class="area" id="wx">
						<button></button>
						<div>
							<p class="tit">微信支付</p>
							<p class="untit">（手续费为全额的1%）</p>
							<p class="untit">（微信支付请在微信浏览器打开）</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="blessing_glass" id="blessing_glass"><!-- 送祝福 -->
			<div class="blessing_input_box name">
				<div class="blessing_input">
					<span><strong>*</strong>名字：</span>
					<input type="text" placeholder="请输入您的姓名" id="input2">
				</div>
			</div>
			<div class="blessing_input_box">
				<div class="blessing_input blessing_input_sent">
					<span><strong>*</strong>祝福：</span>
					<input type="text" placeholder="生日快乐啊" id="input_bless">
				</div>
				<button id="sent_bless">发送</button>
			</div>
		</div>
		<div class="blessing_glass" id="birth_glass"><!-- 挑选礼物 -->
			<div class="blessing_input_box name">
				<div class="blessing_input blessing_input_sent">
					<span><strong>*</strong>赠送人：</span>
					<input type="text" id="input3">
				</div>
				<button id="pay">支付</button>
			</div>
			<div class="blessing_input_box">
				<div class="blessing_input">
					<span><strong>*</strong>礼物：</span>
					<input type="text" id="birth_list" disabled>
				</div>
			</div>
		</div>
		<div class="blessing" id="blessing"><!-- 赠送礼物 -->
			<div class="blessing_message">
				<div class="blessing_message_large" id="blessing_message_large1">
					
				</div>
				<div class="blessing_message_large" id="blessing_message_large2">
					
				</div>
			</div>
			<div class="button">
				<button id="graduate">毕业生</button>
				<button id="in_student">在校生</button>
			</div>
			<div class="message_button">
				<p><img src="{{ asset('img/smile.png') }}" alt="">大家放心送，礼物都会转入三月软件工作室哦！</p>
				<button id="go">赠送礼物</button>
			</div>
		</div>
	
	<!-- 感谢页面 -->
	<div class="student" id="student">
		<div class="happy">
			<img src="{{ asset('img/happy.png') }}">
		</div>
		<div class="bai">
			<img src="{{ asset('img/bai.png') }}">
		</div>
		<div class="stu">
			<img src="{{ asset('img/girl.png') }}">
		</div>
		<div class="return">
			<img src="{{ asset('img/return.png') }}" id="return">
		</div>
		<div class="share">
			<img src="{{ asset('img/share.png') }}" id="share">
		</div>
	</div>

  	<div class="audio-box music">
		<div class="audio-container">
			<div class="audio-view">
				<div class="audio-cover"></div>
				<div class="audio-body">
					<div class="audio-backs">
						<div class="audio-setbacks">
							<i class="audio-this-setbacks" style="width: 30.4741%;">
								<span class="audio-backs-btn"></span>
							</i>
							<span class="audio-cache-setbacks" style="width: 100%;">
							</span>
						</div>
					</div>
				</div>
				<div class="audio-btn">
					<div class="audio-select" background="#000";height="100px";>
						<img src="{{ asset('img/music.png') }}" action="play" data-on="icon-play" data-off="icon-pause" class="icon-pause kk" id="imgmusic"></div><!-- 点击暂停与播放 -->
						<div action="volume" class="icon-volume-up">
							<div class="audio-set-volume">
								<div class="volume-box">
									<i style="width: 100%;"><span class="audio-backs-btn"></span></i>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<style>
		.icon-pause{
			width: 30px;
			height: 30px;
			cursor: pointer;
			animation: music 2s linear infinite;
		}
		@keyframes music{
			0%{transform: rotate(0deg);}
			25%{transform: rotate(90deg);}
			50%{transform: rotate(180deg);}
			75%{transform: rotate(270deg);}
			100%{transform: rotate(360deg);}
		}
		.icon-play{
			width: 30px;
			height: 30px;
			cursor: pointer;
		}
	</style>

<script type="text/javascript" src="{{ URL::asset('js/page7.js') }}"></script>
<script type="text/javascript" src="{{URL::asset('js/audio.js.下载')}}"></script>
<script type="text/javascript">
var pagess = 1;
	var data04 = [];
	var len = $('.b04').length;
	for (var i = 0; i < len ; i++) {
		var unslider04 = $('.b04').eq(i).unslider({
			complete:function(index){//自己添加的，官方没有
				// progress.animate({"width":(100/li_width)*(index+1)+"%"});
			}
		})
		data04[i] = unslider04.data('unslider');
	};
    
	$('.unslider-arrow04').click(function() {
        var fn = this.className.split(' ')[1];
        for (var i = 0; i < len; i++) {
        	data04[i][fn]();
        };
    });

	var startx, starty;
    //获得角度
    function getAngle(angx, angy) {
        return Math.atan2(angy, angx) * 180 / Math.PI;
    };
 	
    //根据起点终点返回方向 1向上 2向下 3向左 4向右 0未滑动
    function getDirection(startx, starty, endx, endy) {
        var angx = endx - startx;
        var angy = endy - starty;
        var result = 0;
 
        //如果滑动距离太短
        if (Math.abs(angx) < 2 && Math.abs(angy) < 2) {
            return result;
        }
 
        var angle = getAngle(angx, angy);
        if (angle >= -135 && angle <= -45) {
            result = 1;
        } else if (angle > 45 && angle < 135) {
            result = 2;
        } else if ((angle >= 135 && angle <= 180) || (angle >= -180 && angle < -135)) {
            result = 3;
        } else if (angle >= -45 && angle <= 45) {
            result = 4;
        }
 
        return result;
    }
    //手指接触屏幕
    document.addEventListener("touchstart", function(e) {
        startx = e.touches[0].pageX;
        starty = e.touches[0].pageY;
    }, false);
    //手指离开屏幕
    //图片懒加载以下
    // var current_page = 2;
    // var seeHeight = document.documentElement.clientHeight;
    // var scrollTop = document.body.scrollTop || document.documentElement.scrollTop;
    // var temp = seeHeight + scrollTop;
    // function layload(current_page){
    // 	var aImg = $('.page'+current_page+" img"); 
    // 	var len = aImg.length;
    // 	var n = 0;//存储图片加载到的位置，避免每次都从第一张图片开始遍历	
    // 	// console.log('onscroll',len);
        
    //  //    console.log(seeHeight,"   ",scrollTop);
    //     for (var i = n; i < len; i++) {
    //         if (aImg[i].offsetTop < temp) {
    //             if (aImg[i].getAttribute('src') == '') {
    //                 aImg[i].src = aImg[i].getAttribute('guoyu-src');
    //             }
    //             // n = i + 1;
    //             // console.log('n = ' + n);
    //         }
    //     }
    // }
    //图片懒加载以上
    document.addEventListener("touchend", function(e) {
        var endx, endy;
        endx = e.changedTouches[0].pageX;
        endy = e.changedTouches[0].pageY;
        var direction = getDirection(startx, starty, endx, endy);
        switch (direction) {
            case 0:
                console.log("未滑动！");
                break;
            case 1:
            	if(pagess<8)
            		$(".page").moveTo(++pagess);
                console.log("向上！",pagess)
                break;
            case 2:
            	if(pagess>1)
                	$(".page").moveTo(--pagess);
                console.log("向下！",pagess)
                break;
            case 3:
            	left();
                break;
            case 4:
               right();
                break;
            default:
        }
    }, false);
    function down(){

    }
    function up(){

    }
    function right(){
    	// console.log("right");
    	for (var i = 0; i < len; i++) {
	    	data04[i].prev();
	    }
    }
    function left(){
    	// console.log("left");
    	for (var i = 0; i < len; i++) {
	    	data04[i].next();
	    }
    }

    var list_ele = document.getElementById("list_div");
    var pays_ele = document.getElementById("pays_div");
    var thinks_ele = document.getElementById("thinks_div");
    // page2-6动画监听部分
    //图片放大效果
    var large_one = document.getElementById("enlarge_one");
    var large_two = document.getElementById("enlarge_two");
    var large_three = document.getElementById("enlarge_three");
    var large_four = document.getElementById("enlarge_four");
    var large_five = document.getElementById("enlarge_five");
    var large_six = document.getElementById("enlarge_six");
    var large_seven = document.getElementById("enlarge_seven");
    var large_eight = document.getElementById("enlarge_eight");
    var large_nine = document.getElementById("enlarge_nine");
    var large_ten = document.getElementById("enlarge_ten");
    //文字抖动效果
    var Sha_one = document.getElementById("shake_one");
    var Sha_two = document.getElementById("shake_three");
    var Sha_three = document.getElementById("shake_four");
    var Sha_four = document.getElementById("shake_five");
    var Sha_five = document.getElementById("shake_six");
    var Sha_six = document.getElementById("shake_seven");
    var Sha_seven = document.getElementById("shake_eight");
    var Sha_eight = document.getElementById("shake_nine");
    var Sha_nine = document.getElementById("shake_ten");
    var Sha_ten = document.getElementById("shake_eleven");
    var Sha_eleven = document.getElementById("shake_twelve");
    var Sha_twelve = document.getElementById("shake_thirteen");
    var Sha_thirteen = document.getElementById("shake_fourteen");
    //小人滑出效果
    var Slide_one = document.getElementById("slide_one");
    var Slide_two = document.getElementById("slide_two");
    var Slide_three = document.getElementById("slide_three");
    var Slide_four = document.getElementById("slide_four");
    var Slide_five = document.getElementById("slide_five");

	$('.main').onepage_scroll({
		sectionContainer: '.page',
		pagination: false,
		direction:"vertical",
		keyboard: false,
		beforeMove: function(index,d) {
			if(pagess==8&&index==1) {
				$(".page").moveTo(8);
			} else if(pagess==1&&index==8){
				$(".page").moveTo(1);
			}
		},
		afterMove: function(index){
			if (index == 1) {
				document.getElementById("box").style.zIndex = 0;
			}
			if(index==2){
				 large_one.className = "frameone";
				 large_two.className = "frametwo";
				 Sha_one.className = "textone";
				 Sha_two.className = "textthree";
				 Slide_one.className = "marchbaby";
				 // layload(2);
				 document.getElementById("box").style.zIndex = 0;
			}

			else if(index==3){
				large_three.className = "framethree";
				large_four.className = "framefour";
				Sha_three.className = "textfour";
				Sha_four.className = "textfive";
				Slide_two.className = "marchthree";
				// layload(3);				
				pagetwomove();
				document.getElementById("box").style.zIndex = 0;
			}
			else if(index==4){
				large_five.className = "framefive";
				large_six.className = "framesix";
				Sha_five.className = "textsix";
				Sha_six.className = "textseven";
				Sha_seven.className = "texteight";				
				Slide_three.className = "marcheight";
				// layload(4);				
				pagethreemove();
				document.getElementById("box").style.zIndex = 0;
			}
			else if(index==5){
				large_seven.className = "frameseven";
				large_eight.className = "frameeight";
				Sha_eight.className = "textnine";
				Sha_nine.className = "textten";
				Sha_ten.className = "texteleven";
				Slide_four.className = "marchten";
				// layload(5);				
				pagefourmove();
				document.getElementById("box").style.zIndex = 0;
			}
			else if(index==6){
				large_nine.className = "framenine";
				large_ten.className = "frameten";
				Sha_eleven.className = "texttwelve";
				Sha_twelve.className = "textthirteen";
				Sha_thirteen.className = "textfourteen";
				Slide_five.className = "marchTwelve";
				// layload(6);				
				pagefivemove();
				document.getElementById("box").style.zIndex = 0;
			}
			if (index == 7) {	
				list_ele.className = "list";
				pays_ele.className = "pay";
				thinks_ele.className = "think";
				document.getElementById("box").style.zIndex = 0;
			};
			if (index == 8) {
				document.getElementById("box").style.zIndex = -1;
			};
		}
	});
</script>
<script type="text/javascript" src="{{ asset('js/message.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/slide.js') }}"></script>
</body>
</html>
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
<script type="text/javascript" src="{{ asset('js/jquery-1.9.0.min.js') }}"></script>

<style>
.page1 { background: url("{{ asset('img/bg-one.jpg') }}"); background-size: cover;}
.page2 { background: url("{{ asset('img/bg.png') }}"); background-size: cover;}
.page3 { background: url("{{ asset('img/bg.png') }}"); background-size: cover;}
.page4 { background: url("{{ asset('img/bg.png') }}"); background-size: cover;}
.page5 { background: url("{{ asset('img/bg.png') }}"); background-size: cover;}
.page6 { background: url("{{ asset('img/bg.png') }}"); background-size: cover;}
.page7 { background: url("{{ asset('img/list.jpg') }}"); background-size: cover;}
.page8 { background: url("{{ asset('img/bg.png') }}"); background-size: cover;}
p.title { position: relative; top: 35%; font: 700 40px "Microsoft Yahei"; color: #fff; text-align: center;}
</style>
<!-- <script src="http://cdn.staticfile.org/jqueryuer/1.9.0/jqy.min.js"></script> -->
<script type="text/javascript" src="{{ URL::asset('js/jquery-1.11.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.onepage-scroll.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/unslider.min.js') }}"></script>
<script src="{{ asset('js/axios.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/rall.js') }}"></script>
<!-- <script src="{{ asset('js/jquery-3.1.1.js') }}"></script> -->
</head>
<body id="main_body">
<script type="text/javascript">
	// Todo 上线以后要打开检测
	/*var userInfo = navigator.userAgent;
	if ((userInfo.indexOf("Windows") != -1) || (userInfo.indexOf("Mac OS") != -1)) {
		document.getElementById("main_body").style.display = "none";
		alert("请在手机端打开！");
	}*/
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
					<div class="frame1"><img src="{{ asset('img/birth1.png') }}"></div>
				</div>
				<div>
					<div class="text1"><img src="{{ asset('img/text1.png') }}"></div>
					<!-- <div><img src="img/text2.png"></div> -->
				</div>
			</div>
			<div class="page1-center">
				<div class="text3"><img src="{{ asset('img/text3.png') }}"></div>
				<div>
					<div class="stars"><img src="{{ asset('img/Stars.png') }}"></div>
					<div class="frame2"><img src="{{ asset('img/birth2.png') }}"></div>
				</div>
			</div>
			<div class="page1-lower">
				<div>
					<div class="balloon"></div>
					<div class="baby"></div>
				</div>
				<div>
					<div>
						<div class="cloud"><img src="{{ asset('img/cloud.png') }}"></div>
						<div class="Map"><img src="{{ asset('img/Map.png') }}"></div>
					</div>
				</div>
			</div>						
		</div>
		<div class="page page3">
			<div class="page1-upper">
				<div class="Bird"><img src="{{ asset('img/Bird.png') }}"></div>
				<div class="text4"><img src="{{ asset('img/text4.png') }}"></div>
				<div class="aircraft"><img src="{{ asset('img/aircraft.png') }}"></div>
			</div>
			<div class="page2-center">
				<div class="text5"><img src="{{ asset('img/text5.png') }}"></div>
				<div>
					<div class="cloud2"><img src="{{ asset('img/cloud.png') }}"></div>
					<div class="frame3"><img src="{{ asset('img/th-p1.png') }}"></div>
				</div>
			</div>
			<div class="page2-lower">
				<div>
					<div class="frame4"></div>
					<div class="glasses"><img src="{{ asset('img/glasses.png') }}"></div>
				</div>
				<div class="three"><img src="{{ asset('img/three.png') }}"></div>
			</div>
		</div>
		<div class="page page4">
			<div class="page3-upper">
				<div>
					<div class="Bird2"><img src="{{ asset('img/Bird.png') }}"></div>
					<div class="frame5"><img src="{{ asset('img/eight1.png') }}"></div>
				</div>
				<div>
					<div class="cloud3"><img src="{{ asset('img/cloud.png') }}"></div>
					<div class="Bird3"><img src="{{ asset('img/Bird.png') }}"></div>
					<div class="text6"><img src="{{ asset('img/text6.png') }}"></div>
				</div>
			</div>
			<div class="page3-center">
				<div class="text7"><img src="{{ asset('img/text7.png') }}"></div>
				<div>
					<div class="balloon3"></div>
					<div class="frame6"><img src="{{ asset('img/eight2.png') }}"></div>
				</div>
			</div>
			<div class="page3-lower">
				<div>
					<div class="cloud4"><img src="{{ asset('img/cloud.png') }}"></div>
					<div class="eight"><img src="{{ asset('img/eight.png') }}"></div>
				</div>
				<div>
					<div class="text8"><img src="{{ asset('img/text8.png') }}"></div>
					<div class="Stars2"><img src="{{ asset('img/Stars.png') }}"></div>
				</div>
			</div>
		</div>
		<div class="page page5">
			<div class="page4-upper">
				<div>
					<div class="Bicycle"><img src="{{ asset('img/Bicycle.png') }}"></div>
					<div class="text9"><img src="{{ asset('img/text9.png') }}"></div>
				</div>
				<div>
					<div class="Bird4"><img src="{{ asset('img/Bird.png') }}"></div>
					<div class="frame7"><img src="{{ asset('img/ten1.png') }}"></div>
				</div>
			</div>
			<div class="page4-center">
				<div class="frame8"><img src="{{ asset('img/ten2.png') }}"></div>
				<div>
					<div class="tra"><img src="{{ asset('img/TRA.png') }}"></div>
					<div class="text10"><img src="{{ asset('img/text10.png') }}"></div>
					<div class="Stars3"><img src="{{ asset('img/Stars.png') }}"></div>
				</div>
			</div>
			<div class="page4-lower">
				<div>
					<div class="text11"><img src="{{ asset('img/text11.png') }}"></div>
					<div class="car"><img src="{{ asset('img/car.png') }}"></div>
				</div>
				<div class="ten"><img src="{{ asset('img/ten.png') }}"></div>
			</div>
		</div>
		<div class="page page6">
			<div class="page5-upper">
				<div>
					<div class="Bird5"><img src="{{ asset('img/Bird.png') }}"></div>
					<div class="frame9"><img src="{{ asset('img/twelve1.png') }}"></div>
				</div>
				<div>
					<div class="camera"><img src="{{ asset('img/camera.png') }}"></div>
					<div class="text12"><img src="{{ asset('img/text12.png') }}"></div>
				</div>
			</div>
			<div class="page5-center">
				<div>
					<div class="balloon4"></div>
					<div class="text13"><img src="{{ asset('img/text13.png') }}"></div>
				</div>
				<div class="frame10"><img src="{{ asset('img/twelvwe2.png') }}"></div>
			</div>
			<div class="page5-lower">
				<div class="Twelve"><img src="{{ asset('img/twelve.png') }}"></div>
				<div>
					<div class="text14"><img src="{{ asset('img/text14.png') }}"></div>
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
		        <div class="banner" id="b04" style="width:500px;height:1020px;">
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
			<div class="banner-two" id="b04">
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


	<div class="air_box">
		<div id="air_minbox">
			<div class="air">
				<input type="text" placeholder="请留下您的祝福..." id="input">
				<button id="air"></button>
			</div>
			<div class="air_min_box">
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
			<div class="max_air">
				<img src="{{ asset('img/shu.jpg') }}" alt="">
				<div>
					<p>婚礼纪 送了 百合花</p>
					<p>百年好合</p>
				</div>
			</div>
		</div>
			
			<div id="cover"></div>
			<div class="blessing_glass" id="blessing_glass">
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
			<div class="blessing_glass" id="birth_glass">
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
						<input type="text" id="birth_list">
					</div>
				</div>
			</div>
			<div class="blessing" id="blessing">
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
	</div>


	<div class="music">
	    <img src="{{ asset('img/music.png') }}" id="imgmusic" onclick="aa()" class="kk">
	    <audio controls id="qq" loop>
	    	<source src="{{ asset('img/love.mp3') }}" type="audio/mpeg">
	    </audio>
  	</div>

<script type="text/javascript" src="{{ URL::asset('js/page7.js') }}"></script>
<a href="http://www.dowebok.com/" style="display: none;">dowebok</a>
<a href="http://www.dowebok.com/118.html" style="display: none;">onepage-scroll – jQuery单页/全屏滚动插件</a>
<script type="text/javascript">
	var progress = $(".progress"),li_width = $("#b04 li").length;
    var unslider04 = $('#b04').unslider({
		// dots: true,
		complete:function(index){//自己添加的，官方没有
			// progress.animate({"width":(100/li_width)*(index+1)+"%"});
		}
	}),

	data04 = unslider04.data('unslider');

	$('.unslider-arrow04').click(function() {
        var fn = this.className.split(' ')[1];
        data04[fn]();
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
                console.log("向上！")
                break;
            case 2:
                console.log("向下！")
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
		data04.prev();
    }
    function left(){
    	// console.log("left");
    	data04.next();
    
    }

    var list_ele = document.getElementById("list_div");
    var pays_ele = document.getElementById("pays_div");
    var thinks_ele = document.getElementById("thinks_div");
    var b = 2;

	$('.main').onepage_scroll({
		sectionContainer: '.page',
		pagination: false,
		direction:"vertical",
		afterMove: function(index){
			if(index==2&&b++==2){
				var frame1 = document.getElementsByClassName('frame1');
				frame1[0].className="frameone";
				var frames = document.getElementsByClassName('frame2');
				frames[0].className="frametwo";
				var text1 = document.getElementsByClassName('text1');
				text1[0].className="textone";
				var text3 = document.getElementsByClassName('text3');
				text3[0].className="textthree";
				var one = document.getElementsByClassName('baby');
				one[0].className="marchbaby";
				// pagetwomove();
				// $('.marchthree').animate({left:'50px'},3000);
			}

			else if(index==3&&b++==3){
				var frame3 = document.getElementsByClassName('frame3');
				frame3[0].className="framethree";
				var frames = document.getElementsByClassName('frame4');
				frames[0].className="framefour";
				var text = document.getElementsByClassName('text4');
				text[0].className="textfour";
				var texts = document.getElementsByClassName('text5');
				texts[0].className="textfive";
				var three = document.getElementsByClassName('three');
				three[0].className="marchthree";
				pagetwomove();
				// $('.marchthree').animate({left:'50px'},3000);
			}
			else if(index==4&&b++==4){
				var frame = document.getElementsByClassName('frame5');
				frame[0].className="framefive";
				var frames = document.getElementsByClassName('frame6');
				frames[0].className="framesix";
				var text = document.getElementsByClassName('text6');
				text[0].className="textsix";
				var texts = document.getElementsByClassName('text7');
				texts[0].className="textseven";
				var textss = document.getElementsByClassName('text8');
				textss[0].className="texteight";
				var eight = document.getElementsByClassName('eight');
				eight[0].className="marcheight";
				pagethreemove();
				// $('.marcheight').animate({right:'120px'},3000);
			}
			else if(index==5&&b++==5){
				var frame7 = document.getElementsByClassName('frame7');
				frame7[0].className="frameseven";
				var frames = document.getElementsByClassName('frame8');
				frames[0].className="frameeight";
				var text = document.getElementsByClassName('text9');
				text[0].className="textnine";
				var texts = document.getElementsByClassName('text10');
				texts[0].className="textten";
				var textss = document.getElementsByClassName('text11');
				textss[0].className="texteleven";
				var ten = document.getElementsByClassName('ten');
				ten[0].className="marchten";
				pagefourmove();
			}
			else if(index==6&&b++==6){
				var frame7 = document.getElementsByClassName('frame9');
				frame7[0].className="framenine";
				var frames = document.getElementsByClassName('frame10');
				frames[0].className="frameten";
				var text = document.getElementsByClassName('text12');
				text[0].className="texttwelve";
				var texts = document.getElementsByClassName('text13');
				texts[0].className="textthirteen";
				var textss = document.getElementsByClassName('text14');
				textss[0].className="textfourteen";
				var twelve = document.getElementsByClassName('Twelve');
				twelve[0].className="marchTwelve";
				pagefivemove();
			}
			if (index == 7) {	
				list_ele.className = "list";
				pays_ele.className = "pay";
				thinks_ele.className = "think";
			};
		},
		beforeMove: function(ele){
			
		}
	});

	// $(document).ready(function(e) {
	// var progress = $(".progress"),li_width = $("#b04 li").length;
 	//  var unslider04 = $('#b04').unslider({
	// 	dots: true,
	// 	complete:function(index){//自己添加的，官方没有
	// 		progress.animate({"width":(100/li_width)*(index+1)+"%"});
	// 	}
	// }),

	// data04 = unslider04.data('unslider');
	// $('.unslider-arrow04').click(function() {
 //        var fn = this.className.split(' ')[1];
 //        data04[fn]();
 //    });
// });
</script>
<script type="text/javascript">
	//背景音乐
   var audio1 = document.getElementById('qq');
   var img = document.getElementById('imgmusic');
   var flag = true;
   audio1.play();
   function aa(){
      if(flag){
        audio1.pause();
        flag = !flag;
        img.setAttribute("class","");
      }else{
        flag = !flag;
        audio1.play();
        img.setAttribute("class","kk");
      }   
   }
</script>
<script type="text/javascript" src="{{ asset('js/message.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/slide.js') }}"></script>
</body>
</html>
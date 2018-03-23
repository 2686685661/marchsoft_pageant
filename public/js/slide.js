// dealy=300;
// $(function(){
// 	console.log(123);
	function pagetwomove(){
		// setTimeout(function(){
			$('.marchthree').animate({left:'-108px'},2000);
			// $('.Lballoon').animate({left:'50px'},3000);
		// },dealy*1)
		// console.log(1);
	}
	function pagethreemove(){
		// setTimeout(function(){
			$('.marcheight').animate({right:'33px'},3000);
			// $('.Lballoon').animate({left:'50px'},3000);
		// },dealy*1)
		// console.log(1);
	}
	function pagefourmove(){
		// setTimeout(function(){
			$('.marchten').animate({right:'71px'},3000);  //360*640 page4-right:165
			// $('.Lballoon').animate({left:'50px'},3000);
		// },dealy*1)
		// console.log(1);
	}
	function pagefivemove(){
		// setTimeout(function(){
			$('.marchTwelve').animate({left:'-26px'},3000);
			// $('.Lballoon').animate({left:'50px'},3000);
		// },dealy*1)
		// console.log(1);
	}
// });
// function pagethreemove(){
// 	setTimeout(function(){
// 		$('.eight').animate({right:'120px'})
// 	},dealy*1)
// 	// console.log(1);
// }
// pagethreemove();

//获取页面最少高度+给页面设置最小高度
var min_hight = document.body.clientHeight;
var page = document.getElementsByClassName("page");
for (var i = 0; i < page.length; i++) {
	page[i].style.minHeight = min_hight+"px";
};


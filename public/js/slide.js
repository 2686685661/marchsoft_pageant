function pageonemove(){
	$('.marchbaby').find('img').animate({left:'5px'},2000);
}
function pagetwomove(){
	$('.marchthree').animate({left:'10px'},2000);
}
function pagethreemove(){
	$('.marcheight').animate({right:'-213px'},3000);
}
function pagefourmove(){
	$('.marchten').animate({left:'10px'},3000);  //360*640 page4-right:165
}
function pagefivemove(){
	// setTimeout(function(){
	$('.marchTwelve').animate({left:'190px'},3000);
		// $('.Lballoon').animate({left:'50px'},3000);
	// },dealy*1)
	// console.log(1);
}


//获取页面最少高度+给页面设置最小高度
var min_hight = document.body.offsetHeight;
var page = document.getElementsByClassName("page");
for (var i = 0; i < page.length; i++) {
	page[i].style.minHeight = min_hight+"px";
};


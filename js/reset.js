
 
//vpt-beloved22-theme- some configs
$(document).ready(function($) {



$('body').click(function(event) {

var xx = event.pageX;
var yy = event.pageY;



var width=$('.click-page').width();
	xx=xx-width/2+'px';
	yy=yy-width/2+'px';

		if(typeof(timeuot) != "undefined"){
		clearTimeout(timeOut);
		timeuot=undefined;
		$('.click-page').css({
		opacity: '0.8',
	    visibility: 'hidden',
	   	'transform':'scale(.8)',
		'-webkit-transform': 'scale(.8)'
	});

	}





	$('.click-page').css({

	   visibility: 'visible',
	   left: xx,
	   top: yy,
	   opacity: '0.1',
	   'transition-property': 'width,height,opacity,transform',
	   '-webkit-transition-property': 'width,height,opacity,-webkit-transform',
	   'transition-duration': '300ms,300ms,300ms,300ms',
	   '-webkit-transition-duration': '300ms,300ms,300ms,300ms',
	   'transition-timing-function': 'ease-in-out,ease-in-out,ease-in-out,ease-in-out',
	   '-webkit-transition-timing-function': 'ease-in-out,ease-in-out,ease-in-out,ease-in-out',
		'transform':'scale(1.0)',
		'-webkit-transform': 'scale(1.0)'

	});


	 timeOut =setTimeout(function(){

		$('.click-page').css({
		opacity: '.8',
	   visibility: 'hidden',
	   	'transform':'scale(.8)',
		'-webkit-transform': 'scale(.8)'
	});

	},300);




});


//-去除功能里的wordpress.org和rss
	$('#meta-2 ul li:gt(0)').remove();

//去掉搜索表单label的字
	$('.screen-reader-text').text('');

//改变默认的搜索字符
    $('#searchform input[type="text"]').attr('placeholder', '      serch...');

//手机：设置single-page的默认样式

	//修改head-info样式
	
   if ($('#single-page').length > 0){   
   	//使当前文章的分类名前加个小横线
   	$('.post-header li a')/*text('')*/.prepend(' - ');
}






//加载条

/*  $('.loader').addClass('loading');*/





});//ready1.end






$(document).ready(function($) {


//0.0小屏幕:切换主导航

$('.shift-nav').click(function(event) {

	var s = !$('.nav-main').hasClass('hidden');

//使nav的高度恢复初始值
	if(s){
			$('.nav-main').css('top','-100rem');
		}
		else{
			$('.nav-main').css('top','0');
		}

	if($(event.target).is('button')){
		$('.nav-main').toggleClass('hidden');
		$('.shift-nav').toggleClass('icon-times-outline');
		$('.shift-nav').toggleClass('icon-th-list-outline');
	}


});//0.0

//0.1小屏幕:使header.float-top||header.nav-main可以随着滚动条变换位置
 $(window).scroll(function(){

 	var s = $('header.nav-main').hasClass('hidden');
 	var scorllHeight = document.documentElement.scrollTop||document.body.scrollTop;
	if(!s){//如果主导航显示

		if(scorllHeight>=190){//如果滚动条>=190px

	$('header.nav-main').css('top',function(){
		return -(scorllHeight-120)+'px';
	});
	$('header.float-top').css('top',function(){
		return -(scorllHeight-120)+'px';
	});

	}
	else{//如果滚动条<190px
			$('header.nav-main').css('top','0');
			$('header.float-top').css('top','0');
		}

	} else{//如果主导航被隐藏

			if(scorllHeight>=190){

			$('header.float-top').css('top',function(){
					return -(scorllHeight-120)+'px';
				});
				}
			else{
				$('header.float-top').css('top','0');
			}

	}

 });
//0.1


//1.0手机：使footer展开
	$('.shift_aside-1').click(function(event) {
			if($(event.target).is('span')){

	$('.aside-box-1:eq(0)').toggleClass('hidden-aside2');
	$('.shift_aside-1').toggleClass('icon-circle-down');
	$('.shift_aside-1').toggleClass('icon-circle-up');
	//1.1手机：使footer展开的同时，滚动条依旧在最后
	$('body').scrollTop($('body')[0].scrollHeight);
}
});
//1.0





//2.0 给主导航.nav的每个a加上个p父元素，为了保证每行的下边框样式
	$('.nav li').each(function() {
		if($(this).children('a').length){
			var p ='<p class="list-p"></p>';
			$(this).prepend(p);
			$(this).children('p').append($(this).children('a'));
		}
	});



//2.0-end


//2.1使导航的二级导航呈现切换效果
	var span_shift ='<span class="icon-plus choose"></span>';

	$('.nav > li').each(function() {
	//.nav>li

		if($(this).has('ul').length){
//如果这个元素有一个ul的子元素
			$(this).find('>p>a').after(span_shift);
//那么这个元素加个+号的span元素
		}

		$(this).find('>ul>li>p').each(function() {
		//.nav>li>ul>li>p

			if($(this).closest('li').children('ul').hasClass('sub-menu')){
				//如果这个元素有下级目录则继续加个+号
				
				$(this).find('> a').after(span_shift);

			}

			$(this).parent('li').find('>ul >li').each(function() {
			//.nav>li>ul>li>ul>li
				if($(this).children('ul').hasClass('sub-menu')){
					//如果这个元素有第三级，则继续+
					$(this).find('>p > a').after(span_shift);
				}
			});



		});

	});


//2.1-end

//2.2 
//实现来回+-切换效果
		$('.icon-plus').closest('li').find('ul').css('display','none');
		$('.choose').click(function(event) {

			if($(this).hasClass('icon-plus')){

				$(this).closest('li').children('ul').css('display','block');

			}
	
	/*		$(this).removeClass('icon-plus').addClass('icon-minus');*/
			else if($(this).hasClass('icon-minus')){

				$(this).closest('li').children('ul').css('display','none');
				$(this).closest('li').find('ul li .icon-minus')//如果上级-号切回+号
				.toggleClass('icon-plus')//那么下级的-号全部切回+号
				.toggleClass('icon-minus')//且它们的导航display：none
				.closest('li').find('ul')
				.css('display','none');

			}
				$(this).toggleClass('icon-plus');
				$(this).toggleClass('icon-minus');
			

		});

/*		$('.icon-minus').click(function(event) {
			$(this).closest('li').children('ul').css('display','none');
			$(this).removeClass('icon-minus').addClass('icon-plus');
		});*/

//2.2-end


});//ready2.end

$('document').ready(function($){
//3.0post页音乐播放器

$('.mejs-audio').remove();

var controlsClassName='controls';

if($('audio').length>0){
var _duration;
var shiftClass_on='icon-play3';
var shiftClass_stop='icon-pause2';


}










$('.'+controlsClassName).click(function(event) {

if($(this).hasClass(shiftClass_on)||$(this).hasClass(shiftClass_stop)){


		if($(this).hasClass(shiftClass_on)){
			$('audio')[0].play();
		}
		else if($(this).hasClass(shiftClass_stop)){

		$('audio')[0].pause();
		}
		$(this).toggleClass(shiftClass_on);
		$(this).toggleClass(shiftClass_stop);

		}

		else{

			$('.music-hint').text('vpt :  ╮(╯▽╰)╭ 这篇文章还未设置音乐，可以提醒我加上哦~');
			setTimeout(function(){
				$('.music-hint').text('');
			},8000);

		}

});


//获得音乐时间长度
if($('audio').length>0){
	
$('audio')[0].addEventListener('loadedmetadata',function(){
		_duration=$('audio')[0].duration;
},false);

$('audio')[0].onloadedmetadata=function(){
_duration=$('audio')[0].duration;
};

//如果歌曲自动播放，将按钮默认样式修改
$('audio')[0].addEventListener('playing',function(){
		$('.'+controlsClassName).removeClass('icon-play3').addClass('icon-pause2');
},false);



//当音乐播放结束
if($('audio').loop!='loop'){

$('audio')[0].addEventListener("ended", function () { 

	$('.music-load').css('width','0');
	$('.'+controlsClassName).removeClass('icon-pause2').addClass('icon-play3');
}, false); 
}

//根据当前音乐播放时间改变进度条
$('audio')[0].addEventListener("timeupdate", function () { 
		_duration=$('audio')[0].duration;
		var _currentTime=$('audio')[0].currentTime;
	var _current_load=(_currentTime/_duration)*100 +'%';
	$('.music-load').css('width',_current_load);
}, false); 



}


});
//3.0post页音乐播放器-end

$(document).ready(function($) {

if($('.specsZan').hasClass('done')){
		$('.specsZan').removeClass('icon-heart5');
		$('.specsZan').addClass('icon-heart2');
}

$('.specsZan').mouseenter(function(){
	$('.specsZan').children('.count').css({
		visibility: 'visible',
		opacity:'.7',
	});
});

$('.specsZan').mouseleave(function(){
	$('.specsZan').children('.count').css({
		visibility: 'hidden',
		opacity:'1',
	});
});



//点赞
$.fn.postLike = function() {
	if ($(this).hasClass('done')) {
		alert('您已赞过啦。');
		return false;
	} else {
		$(this).addClass('done');

		$(this).toggleClass('icon-heart5');
		$(this).toggleClass('icon-heart2');

		var id = $(this).data("id"),
		action = $(this).data('action'),
		rateHolder = $(this).children('.count');
		var ajax_data = {
			action: "specs_zan",
			um_id: id,
			um_action: action
		};
		$.post("/wp-admin/admin-ajax.php", ajax_data,
		function(data) {
			$(rateHolder).html(' '+data);
		});
		return false;
	}
};

$(document).on("click", ".specsZan",
	function() {
		$(this).postLike();
});

});
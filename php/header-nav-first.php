<header class="hidden nav-main">
<nav class="nav-first">
<ul class="nav">
<li><a href="<?php echo home_url(); ?>">主页</a></li>
<li><a href="#">分类</a>
<?php
//如果有头导航
	if( has_nav_menu('header-menu')):
	$default=array(
	'menu'=>'name',
	'container' => 'li', 
	'theme_location'=>'header-menu',
	'depth' =>0,
	'echo'=>'true',
	);
	wp_nav_menu($default);
endif;
?>
</li>

<!-- <li><a href="#">留言</a></li>
<li><a href="#">媒体</a></li> -->
<li><a href="http://www.beloved22.com/friend-links">邻居</a></li>

<li><a href="<?php  $url = home_url('/about-vpt'); echo $url; ?>">关于</a></li>
<?php //搜索框
 include(TEMPLATEPATH . '/sidebar-2.php'); ?>

</ul>

</nav>
</header>
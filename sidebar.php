
	<?php //如果激活了侧栏-1
	 if(is_active_sidebar( 'sidebar-1' )):	?>

	<div class="aside-box-1 hidden-aside2">
		 	<span class="shift_aside-1 icon-circle-up"></span>

<!-- 		 <aside id="new-content"><?php //调用多说最新评论 ?>

<h2 class="widget-title">近期评论</h2>

<ul class="ds-recent-comments" ></ul> -->
		 </aside>	
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</div>
	<?php 
endif;?>
	
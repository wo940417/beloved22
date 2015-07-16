<?php //如果激活了侧栏-1
	 if(is_active_sidebar( 'sidebar-2' )):	?>
	<div class="serch">
	<?php dynamic_sidebar( 'sidebar-2' ); ?>
	</div>
	<?php 
endif;?>
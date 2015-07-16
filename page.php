<?php
	 if ( have_posts() ) : 

/*		if(is_page( 'about-vpt')){
			get_template_part( 'page', 'about' ); 
		}else{*/
	
		get_header();
	?>
		<div class="page">
		<?php
		if ( have_posts() ) {
			the_post();
		} 
		?>
		    <header class="page-header">
		<?php
		the_title( sprintf( '<h2 class="post-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
		
		?>
   			 </header>

   			 <main class="page-main">
        <?php
            /* translators: %s: Name of current post */
            the_content('more......');
            wp_link_pages( array(
                'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentyfifteen' ) . '</span>',
                'after'       => '</div>',
                'link_before' => '<span>',
                'link_after'  => '</span>',
                'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>%',
                'separator'   => '<span class="screen-reader-text">, </span>',
            ) );
        ?>

    <footer class="page-about-footer">
    <span class='post-time'><?php the_modified_date('F j, Y') ?></span> 
    <span class="icon-text-color"><?php echo count_words ($text); ?> </span> 
    <span class="icon-eye2"> <?php get_post_views($post -> ID); ?> </span>
    <span class="icon-location-outline"> <?php the_category(); ?></span>
    </footer>


			</main>

        <?php comments_template(); ?>

		</div>
	
<?php 
	get_footer(); 
	}
/*	endif;*/	?>	

	
		





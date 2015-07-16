<?php	if(is_home()):
				echo '<div class="post">';
			endif;
			?>
<article id="post-<?php the_ID(); ?>"  ?>
		
<?php // Post thumbnail.
dm_the_thumbnail();
?>  

	<header class="post-header">
	<?php the_category(); ?>

		<?php
			if ( is_single() ) :
				the_title( '<h1 class="post-title">', '</h1>' );
			else :
				the_title( sprintf( '<h2 class="post-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
			endif;
		?>
	</header><!-- .entry-header -->

	<div class="post-content">
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
	</div><!-- .entry-content -->

	<footer class="post-footer">
	<span class='post-time'><?php the_modified_date('F j, Y') ?></span> 
	<span class="icon-text-color"><?php echo count_words ($text); ?> </span> 
	<span class="icon-eye2"> <?php get_post_views($post -> ID); ?> </span>
	<span class="icon-location-outline"> <?php the_category(); ?></span>
	</footer>

	<?php
		// Author bio.
		if ( is_single() && get_the_author_meta( 'description' ) ) :
			get_template_part( 'author-bio' );
		endif;
		
		 if (is_single()  ) : 
		the_post_navigation();
		endif;
	?>

<!-- .entry-footer -->

<?php

/*$withcomments = "1";

comments_template(); // 调用wp-comments.php 模板*/

?>

<?php comments_template(); ?>


</article><!-- #post-## -->
<?php	if(is_home()):
				echo '</div>';
			endif;
			?>
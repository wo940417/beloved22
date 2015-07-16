<?php	if(is_home()):
			?>
			
				<div class="post <?php 
				if(is_sticky()) : echo 'sticky';endif;//如果文章置顶，加入类sticky?>">
<?php
			endif;
			?>
<article id="post-<?php the_ID(); ?>" class="post-item">






<div class="thumbnail">
<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" >
<?php if ( get_post_meta($post->ID, 'image', true) ) : ?>
<?php $image = get_post_meta($post->ID, 'image', true); ?>
<img width="509px" height="382px" src="<?php echo $image; ?>" alt="<?php the_title(); ?>"/>
<?php elseif( has_post_thumbnail() ): ?>
<?php the_post_thumbnail(array(509,382), array('alt' => '<?php the_title(); ?>','title'=>trim(strip_tags( $attachment->post_title )) ));?>
<?php else : ?>
<img src="<?php bloginfo('template_url'); ?>/imgs/default_thumbnail.jpg" width="509" height="382" alt="<?php the_title(); ?>" />
<?php endif;?></a></div>







<?php // Post thumbnail.
/*dm_the_thumbnail();*/
?>  

	<div class="else">
	<?php  if(is_sticky()): ?>
	<span class="sticky-span">TOP</span>
 <?php endif;?>
		<p class="post-time">
		<?php 
		//获取文章时间
		 the_modified_date('F j, Y');
		 ?>
		</p>


		<?php
			if ( is_single() ) :
				the_title( '<h1 class="post-title">', '</h1>' );
			else :
				the_title( sprintf( '<h2 class="post-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
			endif;
		?>

	<div class="content">
		<?php
		the_content('');
		//如果要更多the_content('more......');
			/* translators: %s: Name of current post */
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentyfifteen' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );
		?>
	</div>



	<footer class="post-footer">

	<span class="icon-text-color"><?php echo count_words ($text); ?> </span> 
	<span class="icon-eye2"> <?php get_post_views($post -> ID); ?> </span>
	<span class="icon-location-outline"> <?php the_category(); ?></span>
	</footer>


</div>
</article>
<?php	if(is_home()):
				echo '</div>';
			endif;
			?>
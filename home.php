<?php
get_header();
?>
<div class="wait-load"></div>
	<div id="primary">

		<main id="main"role="main">

		<?php if ( have_posts() ) : ?>
			
			<?php
			// 开始文章循环


			while ( have_posts() ) :

				 the_post();
				 get_template_part( 'post','home');


			endwhile;

			?>
		<?php?>  
		<?php
			// 分页 /*pagination($query_string);*/ 

			  the_posts_pagination( array(
     	     'prev_text'          =>'<span class="icon-chevron-left"></span>',
       		 'next_text'          =>'<span class="icon-chevron-right"></span>',
       		 'before_page_number' => '',
       		 'after_page_number'  => '',
    			) );

		// If no content, include the "No posts found" template.
		else :
			get_template_part( 'content', 'none' );
		endif;
		?>

		</main><!-- .site-main -->
	<?php get_sidebar();?>
	</div><!-- .content-area -->
<?php
get_footer();
?>
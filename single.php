<?php
/*
Template Name: single
*/
?>
<?php get_header();?>

	<header class="single-header">

 	    <?php include(TEMPLATEPATH.'/php/header-nav-first.php'); ?>

 		<div class="mini-box">
	  		<a href="http://www.beloved22.com" class="back-home">Vpt</a>
			<button class="shift-nav icon-th-list-outline"></button>
 			<?php //引入小音乐播放器 
 			include(TEMPLATEPATH.'/php/post-like.php'); 
 			include(TEMPLATEPATH.'/html/music-mini-1.html');
			?>
		</div>


    </header>

	<div id="primary">

    	<header class="post-header">

  		<?php 
  		the_title( '<h1 class="post-title">', '</h1>' );
  		the_category();
  		?>
        
   		</header>

		<main id="main"role="main">

		
		<?php if ( have_posts() ) : the_post(); endif; ?>

			<article id="post-<?php the_ID(); ?>"  ?>

			<?php // Post thumbnail.
			/*dm_the_thumbnail();*/
			?>  

				<div class="post-content">
				<?php
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


					<div  class="copyright"> 

   						 	<p>除非注明  <a href="<?php echo home_url( '/' ); ?>" title="<?php bloginfo(‘name’); ?>"> beloved22.com </a> 文章均为原创</p>
   							<p>转载请以链接形式标明本文标题和地址</p> 
							<p>本文标题 ：<?php the_title(); ?></p>
							<p>本文地址 : <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_permalink(); ?></a> </p>

					</div>
				</div>



			


				<footer class="post-footer">
					<span class='post-time'><?php the_modified_date('F j, Y') ?></span> 
					<span class="icon-text-color"><?php echo count_words ($text); ?> </span> 
					<span class="icon-eye2"> <?php get_post_views($post -> ID); ?> </span>
					<span class="icon-location-outline"><?php the_category(); ?></span>
					<span class="icon-user"><a class="author-link" href="<?php  $url = home_url('/about-vpt'); echo $url; ?>" rel="author">叶鑫浩</a></span>
				</footer>

				<div class="nav-links">

					<div class="nav-previous"><?php previous_post_link('%link') ?></div> 
					<div class="nav-next"><?php next_post_link('%link') ?></div>

				</div>
				<?php
					/*$withcomments = "1";
					comments_template(); // 调用wp-comments.php 模板*/
				?>

				<?php comments_template(); ?>


			</article>


		</main>
		<?php get_sidebar();?>
	</div>
<?php get_footer(); ?>
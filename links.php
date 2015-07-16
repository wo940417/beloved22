<?php
/*
Template Name:links
*/
?>
<?php get_header();?>

        <div class="page-links">
        <?php
        if ( have_posts() ) {
            the_post();
        } 
        ?>
<div class="mini-box">
 <?php //引入小音乐播放器 
 include(TEMPLATEPATH.'/html/music-mini-1.html'); ?>
</div>
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
    <span class="icon-location-outline">
    <ul><li><a href="<?php the_permalink();  ?>">
    <?php if( is_page() )  {        $content = $content . get_option('display_copyright_text');    $post_data = get_post($post->ID, ARRAY_A);    echo $slug = $post_data['post_name'];    } 
    ?></a></li></ul></span>
    </footer>

        </main>

        <?php comments_template(); ?>

     <?php //发邮件文件
     
/* include(TEMPLATEPATH.'/php/mail-send-model.php');*/ ?>

   


   </div>



    <?php get_sidebar();?>
<?php get_footer();?>


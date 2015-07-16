<?php
/**
 * User: vpt
 * Date: 2015/6/4
 * Time: 18:04
 */

?><!DOCTYPE html>
<head>
<html <?php language_attributes(); ?>>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="applicable-device"content="pc,mobile">

<?php if (is_home() || is_front_page())
    {
    $description = "眺望，波澜壮阔，雾茫茫";
    $keywords = "vpt,个人博客,文艺清新,简约,beloved22,inspiration, customization, rainmeter, design, web, 设计, icon";
    }
    elseif (is_category())
    {
    $description = strip_tags(trim(category_description()));
    $keywords = single_cat_title('', false);
    }
    elseif (is_tag())
    {
    $description = sprintf( __( '与标签 %s 相关联的文章列表'), single_tag_title('', false));
    $keywords = single_tag_title('', false);
    }
    elseif (is_single())
    {
     if ($post->post_excerpt) {$description = $post->post_excerpt;} 
     else {$description = mb_strimwidth(strip_tags($post->post_content),0,110,"");}
    $keywords = get_the_title();
    $tags = wp_get_post_tags($post->ID);
    foreach ($tags as $tag ) {$keywords = $keywords . $tag->name . ", ";}
    }
    elseif (is_page())
    {
    $keywords = get_post_meta($post->ID, "keywords", true);
    $description = get_post_meta($post->ID, "description", true);
    }
    ?>
<meta name="keywords" content="<?php echo $keywords ?>" />
<meta name="description" content="<?php echo $description?>" />


    <?php if( is_home() ) { ?><title><?php bloginfo('name'); ?> | beloved22.com</title><?php } ?>
    <?php if( is_search() ) { ?><title>搜索结果-Search Results-<?php bloginfo('name'); ?></title><?php } ?>
    <?php if( is_single() ) { ?><title><?php echo trim(wp_title('',0)); ?>-<?php bloginfo('name'); ?></title><?php } ?>
    <?php if( is_page() ) { ?><title><?php echo trim(wp_title('',0)); ?>-<?php bloginfo('name'); ?></title><?php } ?>
    <?php if( is_category() ) { ?><title><?php single_cat_title(); ?>-<?php bloginfo('name'); ?></title><?php } ?>
    <?php if( is_month() ) { ?><title><?php the_time('F'); ?>-<?php bloginfo('name'); ?></title><?php } ?>
    <?php if(function_exists('is_tag')) { if ( is_tag() ) { ?><title><?php single_tag_title("", true); ?>-<?php bloginfo('name'); ?></title><?php }?> <?php } ?>

<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri();?>/style.css">



    
<script>
//百度统计
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?4569efbfdfcbe3de5c8517d0fa367fd1";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>

<script src="<?php echo get_stylesheet_directory_uri();?>/js/jquery-1.11.3.min.js"></script>
<script src="<?php echo get_stylesheet_directory_uri();?>/js/reset.js"></script>


<?php wp_head(); ?>




</head>

<body <?php if(is_home()): echo 'id="home-page"';endif; ?>
    <?php if(is_page('about-vpt')):echo 'id="page-about"';endif; ?>
    <?php if(is_page()):echo 'id="page"';endif; ?>
<?php if(is_single()):echo 'id="single-page"';endif; ?>>

<script type="text/javascript">
//加载动画
         $.ajax({
                type: "POST",
                url: "",
                contentType: "application/json",
                beforeSend: function(XMLHttpRequest){
                    var load_page ='<div class="load-page"> <div class="spinner"><div class="double-bounce1"></div><div class="double-bounce2"></div></div></div>';
                    $("body").append(load_page);
                      },
                complete: function(XMLHttpRequest, textStatus) {
                        $('div.load-page').remove();
                 }
    });

</script>


<?php if(!is_single()):
    ?>
<div class="head-info">

    
    <?php if(is_home()): ?>

    <h1><a href="<?php echo site_url(); ?>" class="site_a"><?php echo get_bloginfo('name');?></a></h1>
    <h2><?php echo get_bloginfo('description');?></h2>

    <?php  endif; ?>

    <?php if(is_page()): ?>

     <?php

               the_title( '<h2 class="page-title">', '</h2>' );

        ?>

    <?php endif;?>

    <?php if(!is_home()) :?>

    <a href="<?php echo site_url(); ?>" class="icon-home3 back-home"></a>
  
    <?php endif;?>    

</div>
<?php endif;
    ?>





<?php if(!is_single()):?> 

<button class="shift-nav icon-th-list-outline"></button>

<?php include(TEMPLATEPATH.'/php/header-nav-first.php');
        endif; 
//not——single-end ?>
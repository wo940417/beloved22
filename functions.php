<?php
//初始化wp_head();
remove_action( 'wp_head', 'wp_enqueue_scripts', 1 ); //Javascript的调用
remove_action( 'wp_head', 'feed_links', 2 ); //移除feed
remove_action( 'wp_head', 'feed_links_extra', 3 ); //移除feed
remove_action( 'wp_head', 'rsd_link' ); //移除离线编辑器开放接口
remove_action( 'wp_head', 'wlwmanifest_link' );  //移除离线编辑器开放接口
remove_action( 'wp_head', 'index_rel_link' );//去除本页唯一链接信息
remove_action('wp_head', 'parent_post_rel_link', 10, 0 );//清除前后文信息
remove_action('wp_head', 'start_post_rel_link', 10, 0 );//清除前后文信息
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
remove_action( 'wp_head', 'locale_stylesheet' );
remove_action('publish_future_post','check_and_publish_future_post',10, 1 );
remove_action( 'wp_head', 'noindex', 1 );
remove_action( 'wp_head', 'wp_print_styles', 8 );//载入css
remove_action( 'wp_head', 'wp_print_head_scripts', 9 );
remove_action( 'wp_head', 'wp_generator' ); //移除WordPress版本
remove_action( 'wp_head', 'rel_canonical' );
remove_action( 'wp_footer', 'wp_print_footer_scripts' );
remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );
remove_action( 'template_redirect', 'wp_shortlink_header', 11, 0 );
add_action('widgets_init', 'my_remove_recent_comments_style');

function my_remove_recent_comments_style() {
global $wp_widget_factory;
remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'] ,'recent_comments_style'));
}
//禁止加载WP自带的jquery.js
//
/*if ( !is_admin()) { 
 
        function my_init_method() {
        wp_deregister_script( 'jquery' ); // 取消原有的 jquery 定义
        }
  add_action('init', 'my_init_method');

    
}
wp_deregister_script( 'l10n' );*/


//获得某主分类的所有子分类
if ( ! function_exists( 'post_is_in_descendant_category' ) ) {
    function post_is_in_descendant_category( $cats, $_post = null ) {
        foreach ( (array) $cats as $cat ) {
            // get_term_children() accepts integer ID only
            $descendants = get_term_children( (int) $cat, 'category' );
            if ( $descendants && in_category( $descendants, $_post ) )
                return true;
        }
        return false;
    }
}


//去掉谷歌字体
add_filter('gettext_with_context', 'disable_open_sans', 888, 4 );
function disable_open_sans( $translations, $text, $context, $domain )
{
if ( 'Open Sans font: on or off' == $context && 'on' == $text ) {
$translations = 'off';
}
return $translations;
}


//注册菜单
if(function_exists('register_nav_menus')){
register_nav_menus(
array(
'header-menu' => __( '导航菜单' ),
'footer-menu' => __( '页角菜单' ),
'sider-menu' => __('侧边栏菜单')
)
);
}

//注册小工具

function beloved22_widgets_init($id) {
	register_sidebar( array(
		'name'          => 'sidebar-'.$id,
		'id'            => 'sidebar-'.$id,
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'twentyfifteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}


if ( function_exists('register_sidebar') ){

beloved22_widgets_init(1);
beloved22_widgets_init(2);
beloved22_widgets_init(3);
}



//   缩略图 

add_theme_support( 'post-thumbnails', array( 'post' ) ); // 激活文章缩略图功能
add_theme_support( 'post-thumbnails', array( 'page' ) ); // 激活页面缩略图功能
add_theme_support('post-thumbnails');//激活特色图片


function dm_the_thumbnail() {  
    global $post;  
    // 判断该文章是否设置的缩略图，如果有则直接显示     
    if ( has_post_thumbnail() ) {  ?>
    <div class="thumbnail" href="<?php get_permalink(); ?>">
    <?php 
      /*  echo '<a class="thumbnail" href="'.get_permalink().'" title="阅读全文">';  */
/*        the_post_thumbnail('thumbnail');  */
/*        echo '</a>'; */ 
    echo '</div>';
    } else { //如果文章没有设置缩略图，
        // 如果文章内没有图片，则用默认的图片。  
               /* echo '<a class="thumbnail" href="'.get_permalink().'" title="阅读全文"><img src="'.get_bloginfo('template_url').'/imgs/default_thumbnail.jpg" alt="缩略图" /></a>';  */
        echo '<div class="thumbnail" href="'.get_permalink().'"><img src="'.get_bloginfo('template_url').'/imgs/default_thumbnail.jpg" alt="缩略图" /></div>';  
        }  
   
    
   
}  





function the_slug() {//获取当前文章的分类
    $post_data = get_post($post->ID, ARRAY_A);
    $slug = $post_data['post_name'];
    echo $slug;
}

//阅读更多的样式修改
function my_more_link($more_link, $more_link_text) {
return str_replace($more_link_text, '', $more_link);
}

add_filter('the_content_more_link', 'my_more_link', 10, 2);
//字数统计
function count_words ($text) {  
global $post;  
if ( '' == $text ) {  
   $text = $post->post_content;  
   if (mb_strlen($output, 'UTF-8') < mb_strlen($text, 'UTF-8')) $output .= '' . mb_strlen(preg_replace('/\s/','',html_entity_decode(strip_tags($post->post_content))),'UTF-8') . '';  
   return $output;  
}  
}

//postviews   
function get_post_views ($post_id) {   
  
    $count_key = 'views';   
    $count = get_post_meta($post_id, $count_key, true);   
  
    if ($count == '') {   
        delete_post_meta($post_id, $count_key);   
        add_post_meta($post_id, $count_key, '0');   
        $count = '0';   
    }   
  
    echo number_format_i18n($count);   
  
}   
  //显示文章阅读次数
function set_post_views () {   
  
    global $post;   
  
    $post_id = $post -> ID;   
    $count_key = 'views';   
    $count = get_post_meta($post_id, $count_key, true);   
  
    if (is_single() || is_page()) {   
  
        if ($count == '') {   
            delete_post_meta($post_id, $count_key);   
            add_post_meta($post_id, $count_key, '0');   
        } else {   
            update_post_meta($post_id, $count_key, $count + 1);   
        }   
  
    }   
  
}   
add_action('get_header', 'set_post_views');  


function Kavin_setup() {
}


//实现post奇偶class
function oddeven_post_class ( $classes ) {
global $current_class;
$classes[] = $current_class;
$current_class = ($current_class == 'odd') ? 'even' : 'odd';
return $classes;
}
add_filter ( 'post_class' , 'oddeven_post_class' );
global $current_class;
$current_class = 'odd';




//点赞功能
add_action('wp_ajax_nopriv_specs_zan', 'specs_zan');
add_action('wp_ajax_specs_zan', 'specs_zan');
function specs_zan(){
    global $wpdb,$post;
    $id = $_POST["um_id"];
    $action = $_POST["um_action"];
    if ( $action == 'ding'){
        $specs_raters = get_post_meta($id,'specs_zan',true);
        $expire = time() + 99999999;
        $domain = ($_SERVER['HTTP_HOST'] != 'localhost') ? $_SERVER['HTTP_HOST'] : false; // make cookies work with localhost
        setcookie('specs_zan_'.$id,$id,$expire,'/',$domain,false);
        if (!$specs_raters || !is_numeric($specs_raters)) {
            update_post_meta($id, 'specs_zan', 1);
        } 
        else {
            update_post_meta($id, 'specs_zan', ($specs_raters + 1));
        }
        echo get_post_meta($id,'specs_zan',true);
    } 
    die;
}




/**
 * 移除/修改标题前的“私密”和“密码保护”
 * 
 */
add_filter( 'private_title_format', 'wpdaxue_private_title_format' );
add_filter( 'protected_title_format', 'wpdaxue_private_title_format' );
 
function wpdaxue_private_title_format( $format ) {
    return '%s';
}


//媒体库分类标签功能
function ludou_add_categories_tags_to_attachments() {
   register_taxonomy_for_object_type( 'category', 'attachment' );
   register_taxonomy_for_object_type( 'post_tag', 'attachment' );
}
add_action( 'init' , 'ludou_add_categories_tags_to_attachments' );



//头像问题
function get_ssl_avatar($avatar) {
$avatar = preg_replace('/.*\/avatar\/(.*)\?s=([\d]+)&.*/','',$avatar);
return $avatar;
}
add_filter('get_avatar', 'get_ssl_avatar');















?>
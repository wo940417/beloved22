<?php get_header();?>



<?php
if(isset($_GET['author_name'])) :
$curauth = get_userdatabylogin($author_name);
else :
$curauth = get_userdata(intval($author));
endif;
?>

<div class="author-information">
<p class="name"><b>姓名：</b>叶鑫浩</p>
<?php if($curauth->display_name){ ?><p class="nickname"><b>昵称：</b><?php echo $curauth->display_name; ?></p><?php } ?>
<p class="university"><b>学校：</b>山东师范大学</p>
<p class="e-mail"><b>邮箱：</b>vpt94@foxmail.com</p>
<?php if($curauth->description){ ?><p class="introduce"><b>个人简介：</b><?php echo $curauth->description; ?></p><?php } ?>

</div>




        </main>

        <?php comments_template(); ?>
   </div>
    <?php get_sidebar();?>
<?php get_footer();?>













<?php
/*
作者页面创建完毕后，可以在模板的其他页面中添加对应作者的页面链接地址，大家使用如下代码即可实现调用：





the_author_posts_link(); 
 

二、常用的作者信息调用函数

the_author 显示文章的作者

the_author_description 显示文章作者的描述（作者个人资料中的描述）

the_author_login 显示文章作者的登录名

the_author_firstname 显示文章作者的firstname（名）

the_author_lastname 显示文章作者的lastname（姓）

the_author_nickname 显示文章作者的昵称

the_author_ID 显示文章作者的ID号

the_author_email 显示文章作者的电子邮箱

the_author_url 显示文章作者的网站地址

the_author_link  显示一个以文章作者名为链接名，链接地址为文章作者的网址的链接。

the_author_icq 显示文章作者的icq

the_author_aim 显示文章作者的aim

the_author_yim 显示文章作者的yim

the_author_msn (不推荐使用) 显示文章作者的msn

the_author_posts 显示文章作者已发表文章的篇数

the_author_posts_link 显示一个链接到文章作者已发表文章列表的链接

list_authors (不推荐使用) 显示blog所有作者和他们的相关信息。完整函数如下：

参数：

optioncount：是否显示各作者已发表文章的篇数，可选值为：TRUE 和 FALSE（默认值）

exclude_admin：是否不列出管理员，可选值为：TRUE（默认值） 和 FALSE

show_fullname ：是否显示各作者的全名，可选值为：TRUE 和 FALSE（默认值）

hide_empty：是否不显示发表文章数为0的作者，可选值为：TRUE（默认值） 和 FALSE

feed：链接到各个作者发表文章的RSS供稿种子链接名，默认为空，不显示RSS供稿种子

feed_image：供稿种子的图片地址，如果提供此项，则覆盖上面的feed，默认为空

代表不显示各个作者的发布文章数，列出管理员，显示各作者的全名，显示发布文章数为0的作者和不显示RSS供稿种子。

wp_list_authors 显示blog作者列表，如果作者发表过文章，则他的名字将链接到他发表的文章列表中。可定义是否显示其他信息。

参数：

optioncount：是否显示各个作者发表文章数，可选值：true 和 false（默认值）

exclude_admin：是否不显示“admin”用户，可选值：true（默认值） 和 false

show_fullname：是否显示各个作者的全名，如果不显示，将显示昵称。可选值：true 和 false（默认值）

hide_empty：是否不显示发表文章数为0的作者，可选值：true（默认值） 和 false

feed：链接到各个作者发表文章的RSS供稿种子链接名，默认为空，不显示RSS供稿种子

feed_image：供稿种子的图片地址，如果提供此项，则覆盖上面的feed，默认为空

 

三、增加用户信息字段

为了更加简便与安全的增加信息字段，建议将自定义字段添加到“联系信息”中。“联系信息”的字段添加方式非常简单，打开wp-includes/user.php文件，约在1539行可以找到：$user_contactmethods = array代码，在大括号中修改或增加字段。

字段增加的格式为 ‘数据库字段名’ => __(‘标题说明文字’) 修改后的完整代码演示：

function _wp_get_user_contactmethods( $user = null ) {
$user_contactmethods = array();
if ( get_site_option( ‘initial_db_version’ ) < 23588 ) {
$user_contactmethods = array(
‘aim’ => __( ‘支付宝收款地址’ ),
‘addres’ => __( ‘所在地’ ),
‘job’ => __( ‘职业’ ),
‘qq’ => __( ‘QQ’ ),
‘touxiang’ => __( ‘头像url’ )
);
}
return apply_filters( ‘user_contactmethods’, $user_contactmethods, $user );
}

可以根据需要删除默认的字段，添加自己需要的字段，以达到增加用户选项的目的。

修改此项后，在用户后台的个人资料中也会自动出现对应的输入框，无需再修改其他程序文件。如果需要在作者页面的前端调用显示自定义字段则只需要使用 “echo $curauth->xxx;”的PHP语句即可输出对应字段。
*/
?>
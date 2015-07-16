 <?php   
   
 $item_per_page = 9;  //每页显示数  
//默认是第一页   
 $page_number = isset($_GET['paged']) ? $_GET['paged'] : 1;   
    
//确保分页参数是数字  
if(!is_numeric($page_number)){    
    header('HTTP/1.1 500 Invalid page number!');    
    exit();    
}    
    
//得到分页的limit偏移区间  
$position = ($page_number * $item_per_page);    
  
  $id = $_GET['cat'];//得到当前栏目id  
  //查询出当前栏目下的文章，同下  
  if($id==2){$sql = "SELECT ID,post_title,post_content,post_date,post_name FROM wp_posts,wp_term_relationships,wp_term_taxonomy WHERE ID=object_id AND wp_term_relationships.term_taxonomy_id = wp_term_taxonomy.term_taxonomy_id AND post_type='post' AND post_status = 'publish' AND wp_term_relationships.term_taxonomy_id in(7,11,10,19,8,17,18) AND taxonomy = 'category' ORDER BY ID DESC LIMIT 0, $position ";}else{  
  //查询出当前栏目下的文章，同上  
$sql = "SELECT ID,post_title,post_date,post_content,post_name FROM wp_posts,wp_term_relationships,wp_term_taxonomy WHERE ID=object_id AND wp_term_relationships.term_taxonomy_id = wp_term_taxonomy.term_taxonomy_id AND post_type='post' AND post_status = 'publish' AND wp_term_relationships.term_taxonomy_id = $id AND taxonomy = 'category' ORDER BY ID DESC LIMIT 0, $position ";}  
  
global $wpdb;    
$rs = $wpdb->get_results($sql);   
   
foreach($rs as $cat)    
  
//循环输出该栏目下的文章，文章缩略图，文章链接和日期  
{?>  
   
  
        <div class="Case_list"> <a href="?p=<?php echo $cat->ID;?>" class="photo" ><img src="<?php $timthumb_src = wp_get_attachment_image_src( get_post_thumbnail_id($cat->ID),'full'); 
echo $timthumb_src[0] ; 
?>"  alt="<?php echo get_post($cat->ID)->post_title;?>" width="250"/></a> <strong>  
          <?php echo get_post($cat->ID)->post_title;?>  
          </strong> <span class="time">  
          <?php echo get_post($cat->ID)->post_date; ?>  
          </span> </div>  
            
<?php }?>  
  
      </div>  
      <!-- CaseList结束 -->   
      <span class="morecase">  
      <div id="results"></div>      
  
      <?php next_posts_link(__('+ 更多')); //wp内置分页让他自动出现下一页paged参数?>  
  <!--<a href="#">+ 更多</a></span>-->  
    
   </div>  
    <!-- neirong结束 -->   
    <span class="clear"></span>   
    <!-- 清除浮动 -->   
  </div>  
</div>  
  
  
<!-- container结束 -->  
  
  
<?php   
//jquery确保点击分页后浏览器窗口自动滚动到下一页  
if($page_number!=1){?>  
  
<script type="text/javascript">    
$(document).ready(function() {    
  
$("body").scrollTop($("body")[0].offsetHeight);  
  
});    
</script>    
<?php }?>
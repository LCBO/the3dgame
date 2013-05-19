<?php
include('header.php');
$get_name = isset($_GET['name'])?$_GET['name']:'';
if($get_name == '') {
    exit;
}
$cate_name = get_title($get_name);
$sortby = isset($_GET['sortby'])?$_GET['sortby']:'newest';
$page = isset($_GET['page'])?$_GET['page']:1;

$str_cate_adv300 = '<div class="cate_adv300">
              <div class="advborder"><img src="'.$setting['media_url'].'/templates/3dgame/images/advimages/img300250.jpg" /></div>

               <div class="topgame mb10">
                  <span class="span_top"></span>
                  <span class="span_footer"></span>
                  <a href="javascript:void(0);" class="left_scroll" id="left_scroll"></a>
                  <div class="carousel_ul">
                      <ul id="carousel_ul">
                        <li>
                            <a href="#"><img src="'.$setting['media_url'].'/templates/3dgame/images/advimages/img240180.jpg" class="game_img" /></a>
                            <p>1Mario Zone</p>
                        </li>
                        <li>
                            <a href="#"><img src="'.$setting['media_url'].'/templates/3dgame/images/advimages/img240180.jpg" class="game_img" /></a>
                            <p>2Mario Zone</p>
                        </li>
                        <li>
                            <a href="#"><img src="'.$setting['media_url'].'/templates/3dgame/images/advimages/img240180.jpg" class="game_img" /></a>
                            <p>3Mario Zone</p>
                        </li>
                        <li>
                            <a href="#"><img src="'.$setting['media_url'].'/templates/3dgame/images/advimages/img240180.jpg" class="game_img" /></a>
                            <p>4Mario Zone</p>
                        </li>
                      </ul>
                  </div>
                  <a href="javascript:void(0);" class="right_scroll" id="right_scroll"></a>
               </div>
            </div>';
$cat_numb = mysql_result(mysql_query("select count(*) num from ava_games a,ava_cats b where a.category_id = b.id and b.name = '".$cate_name."' "), 0);
$total_pages = ceil($cat_numb / $template['games_per_page']);
$from = (($page * $template['games_per_page']) - $template['games_per_page']);
$flag_total_pages = '';
if($total_pages != 1) {
    $flag_total_pages = '- '.$total_pages;
}
$str_page_select = '<span class="right">Games per page:<select onchange="change_page(this)">';
for($j = 1; $j <= $total_pages; $j++) {
    $str_page_select .= '<option value="'.get_url($get_name.'/'.$sortby.'/'.$j).'" '.is_selected($j == $page).'>'.$j.'</option>';
}
$str_page_select .= '</select></span>';

if($sortby == 'newest') {
    $sort = 'a.id DESC';
}else if($sortby == 'most') {
    $sort = 'hits DESC';
}else if($sortby == 'best') {
    $sort = 'rating DESC';
}
?>
<script type="text/javascript">
function change_page(p) {
    var t = p.options[p.selectedIndex].value;
    document.location = t;
}
</script>
<section class="main">
    <div class="mainbgtop"></div>
    <div class="content">

       <div class="box_b clearfix">
          <span class="box_b_r"></span>
          <span class="box_b_l"></span>
          <div class="box_b_c">
            <a href="<?php echo $setting['site_url'];?>">Home</a><span class="box_b_s"></span>
            <a href="javascript:void();"><?echo $cate_name;?></a>
          </div>
       </div>

       <div class="box_a mt10 clearfix">
           <span><h1><?echo $cate_name;?> Games</h1></span>
           <?if($cate_name != 'New') {?>
           <div class="right mr10">
              SORT GAMES BY:<a href="<?echo get_url($get_name.'/most/'.$page);?>" class="box_c <?echo iif($sortby == 'most', 'select')?>"><i class="box_c_t"></i>Most Played</a>
              <a href="<?echo get_url($get_name.'/best/'.$page);?>" class="box_c <?echo iif($sortby == 'best', 'select')?>"><i class="box_c_t"></i>Best Rated</a>
              <a href="<?echo get_url($get_name.'/newest/'.$page);?>" class="box_c <?echo iif($sortby == 'newest' || $sortby == '', 'select');?>"><i class="box_c_t"></i>Newest</a>
           </div>
           <?}?>
       </div>

       <div class="game_list cate_list">
          <div class="page_title clearfix">
            <span class="left">Displaying: 1 <?php echo $flag_total_pages;?> of <?php echo $cat_numb;?> games found</span>
            <?php echo $str_page_select;?>
          </div>

          <ul class="clearfix">
            <div class="cate_adv160">
             <img src="<?= $setting['media_url'];?>/templates/3dgame/images/advimages/img160600.jpg" />
            </div>
            <?php
            if($cate_name == 'New') {
                $sql = "select *,name g_name from ava_games order by date_added DESC limit {$from}, {$template['games_per_page']}";
            }else {
                $sql = "select *,a.name g_name,b.name c_name from ava_games a,ava_cats b where published=1 and a.category_id = b.id and b.name = '{$cate_name}' order by {$sort} limit {$from}, {$template['games_per_page']}";
            }
            $result = mysql_query($sql);
            $count = mysql_num_rows($result);
            $i = 1;
            while($row = mysql_fetch_array($result)) {
                $name = $row['g_name'];
                $img = $row['image'];
            ?>
            <li>
              <a href="#">
                <span class="play"></span>
                <img src="<?echo $img;?>" />
                <strong><?php echo $name;?></strong></a>
                <p>1</p>
                <p class="color_999">9.5 Point<i class="star_full"></i><i class="star_full"></i><i class="star_full"></i><i class="star_empty"></i><i class="votes">Votes</i></p>
            </li>
            <?php
                if($i == 12 || $i == ($count)) {
                    echo $str_cate_adv300;
                }
                $i++;
            }?>
          </ul>

          <div class="page_title clearfix">
            <span class="left">Displaying: 1 <?php echo $flag_total_pages;?> of <?php echo $cat_numb;?> games found</span>
            <?php include (  './includes/category/pages.inc.php'  ); // Include the links to other pages ?>
            <?php echo $str_page_select;?>
          </div>

          <div class="advborder" style="width:728px; margin:0 auto 10px;"><img src="<?= $setting['media_url'];?>/templates/3dgame/images/advimages/img72890.jpg" /></div>
       </div>


    </div>
    <div class="mainbgfooter"></div>
</section>
<!--------------------footer end-------------------->
    <!--<div class="content_right">
        <?php include('sidebar.php'); ?>
    </div>

--><!--    <br style="clear:both" />-->
    <?php include('footer.php'); ?>
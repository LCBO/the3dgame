<?php
$therow = 0;
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
$get_name = isset($_GET['q'])?$_GET['q']:'';
if($get_name == '') {
    exit;
}
$cate_name = get_title($get_name);
$sortby = isset($_GET['sortby'])?$_GET['sortby']:'newest';
if ($_GET['q'] && $_GET['q'] != 'Search...') {
	if (!isset($_GET['page'])) {
            $page = 1;
	}
	else {
            $page = $_GET['page'];
	}
	$from = (($page * $template['games_per_page']) - $template['games_per_page']);
	$trimmed = mysql_secure($_GET['q']);
	$cat_numb  = mysql_result(mysql_query("SELECT COUNT(*) as Num FROM ava_games WHERE description like \"%$trimmed%\" OR name like \"%$trimmed%\" AND published=1"),0);
        // Pages
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
}	
?>
<script type="text/javascript">
function change_page(p) {
    var t = p.options[p.selectedIndex].value;
    document.location = t;
}
</script>
       <div class="box_a mt10 clearfix">
           <span><h1><? echo $cate_name;?> Games</h1></span>   
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
            if ($trimmed == "" OR $trimmed == 'Search...') {
		echo '<div id="error_message">'.NOSEARCH.'</div>';
		include 'includes/forms/search_form.php';
            } 
            else if ($cat_numb == 0) {
  		echo '<div id="error_message">'.NORESULTS.'</div>';
  		include 'includes/forms/search_form.php';
            }else {
                $result = mysql_query("SELECT *, name g_name FROM ava_games WHERE description like \"%$trimmed%\" OR name like \"%$trimmed%\" AND published=1 ORDER BY id DESC LIMIT $from, $template[games_per_page]");
                $count = mysql_num_rows($result);
                $i = 1;
                while($row = mysql_fetch_array($result)) {
                    $name = $row['g_name'];
                    $img = $row['image']; 
                    $game = GameData($row, 'category');
            ?>
            <li>
              <a href="">
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
            }
          }?>
          </ul>
          <div class="page_title clearfix">
            <span class="left">Displaying: 1 <?php echo $flag_total_pages;?> of <?php echo $cat_numb;?> games found</span>
            <?php include (  './includes/category/pages.inc.php'  ); // Include the links to other pages ?>
            <?php echo $str_page_select;?>
          </div>
       </div>

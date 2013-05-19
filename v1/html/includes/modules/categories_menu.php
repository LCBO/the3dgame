<?php
$names = "'most-popular','top-rated','action','sports','more'";
$sql = mysql_query("SELECT * FROM ava_cats WHERE parent_id = 0 AND seo_url IN({$names}) ORDER BY cat_order");
$total_cats = mysql_result(mysql_query("SELECT COUNT(*) as Num FROM ava_cats WHERE parent_id = 0"), 0);
$total_cats2 = 0;

echo '<li><a href="'.CategoryUrl(0, '', 1, 'newest').'" class="home select">'.ALL_GAMES.'</a></li>';

while($row = mysql_fetch_array($sql)) {
    $total_cats2 = ($total_cats2 + 1);
    $name = $row['name'];
    $seo_name = seoname($name);
    $class = get_name($name);
    $url = CategoryUrl($row['id'], $row['seo_url'], 1, 'newest');
    if($name == 'More') {
        echo '<li><a href="'.$url.'" class="moremenu">'.$row['name'].'</a></li>';
    }else{
        echo '<li><a href="'.$url.'" class="'.$class.'">'.$row['name'].'</a></li>';
    }

}
?>
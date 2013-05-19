
<?
if($user['login_status'] == 0) {
    $vote_html = '<a onclick="javascript:boxShow(\'login\');" href="javascript:void(0);">Votes</a>';

    $rate_html = $p_game['rating_image'];
} else {
        $user_rated_yet = mysql_result(mysql_query("SELECT COUNT(*) as Num FROM ava_ratings WHERE user_id='$user[id]' AND game_id='$p_game[id]'"), 0);
        //echo $p_game['id'];exit;
        if ($user_rated_yet >= 1) {
                $ur = mysql_query("SELECT * FROM ava_ratings WHERE game_id={$p_game['id']} AND user_id='$user[id]'");
                $user_rating = mysql_fetch_array($ur);
                $p_game['new_rating_form'] = GenerateRating($user_rating['rating'], 'homepage');
               
        }
        else {
                $p_game['new_rating_form'] = '
                <i type="button" onclick="rateIt(this, '.$p_game['id'].')" id="_1" title="1" onmouseover="rating(this)" onmouseout="off(this)" class="star_empty"></i>
                <i type="button" onclick="rateIt(this, '.$p_game['id'].')" id="_2" title="2" onmouseover="rating(this)" onmouseout="off(this)" class="star_empty"></i>
                <i type="button" onclick="rateIt(this, '.$p_game['id'].')" id="_3" title="3" onmouseover="rating(this)" onmouseout="off(this)" class="star_empty"></i>
                <i type="button" onclick="rateIt(this, '.$p_game['id'].')" id="_4" title="4" onmouseover="rating(this)" onmouseout="off(this)" class="star_empty"></i>
                <i type="button" onclick="rateIt(this, '.$p_game['id'].')" id="_5" title="5" onmouseover="rating(this)" onmouseout="off(this)" class="star_empty"></i>
                ';
        }
        $rate_html = $p_game['new_rating_form'];
        $vote_html = 'Votes';
}

echo 
'
<li>
    <a href="'.$p_game['url'].'"><span class="play"></span><img src="'.$p_game['image_url'].'"/><strong>'.$p_game['name'].'</strong></a>
    <p>'.$p_game['hits'].' play games</p>
    <p class="color_999">'.$p_game['highscores'].' Point'.$rate_html.'<i class="votes">'.$vote_html.'</i></p>
</li>   
'
?>
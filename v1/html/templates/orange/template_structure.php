<?php
// Advanced page options can be modified below.
// Most templates will not need to modify anything below this line
if (isset($_GET['task'])) {
    switch($_GET['task']) {
        case 'view':
            $tpl = 'view_game';
            break;
        case 'category':
            $tpl = 'category';
            break;
        case 'profile':
            $tpl = 'profile';
            break;
        case 'news':
            $tpl = 'news';
            break;
        default:
            $tpl = 'misc';
            break;
    }
} else {
    $tpl = 'homepage';
}
include '.'.$setting['template_url'].'/'.$template[$tpl];

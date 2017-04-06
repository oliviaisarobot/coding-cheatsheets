<?php
switch ($_GET['filename']) {
    case 'news':
        require('dir/news.php'); // some script file
        include('tpl/news.tpl.php'); // some template
        break;
    case 'events':
        require('dir/events.php');
        include('tpl/events.tpl.php');
        break;
    case 'contact':
        require('dir/contact.php');
        include('tpl/contact.tpl.php');
        break;
    default:
        if ($_GET['filename'] == '') {
          include('tpl/home.tpl.php');
        } else {
          header('HTTP/1.0 404 Not Found');
          include('tpl/page_not_found.tpl.php');
        }
        break;
}
 ?>

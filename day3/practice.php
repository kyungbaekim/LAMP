<?php
include_once('simple_html_dom.php');
// phpinfo();
// $target_URL = "https://www.google.com/#q=coding+ninjas;
$target_URL = "https://search.yahoo.com/search;_ylt=A0LEVyI6MgVXY6YAuMhXNyoA?p=coding+ninjas&fr2=sb-top&fr=yfp-t-572&fp=1";
// $html = file_get_html($target_URL);
$html = new simple_html_dom();
$html->load_file($target_URL);
foreach($html->find('a') as $link){
  echo $link->href.'<br>';
}
?>

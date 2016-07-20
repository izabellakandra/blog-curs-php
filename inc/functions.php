<?php

function template($file, $args) {
    ob_start();
    extract($args);
    include __DIR__ . '/../templates/' . $file . '.php';
    return ob_get_clean();
}

function img($file, $alt = '', $width = '') {
    return '<img src="' . $file . '" alt="' . $alt . '" width="' . $width . '">';
}

function lnk($content, $url = '#') {
    return '<a href="' . $url . '">' . $content . '</a>';
}

function ellipsis($string, $length) {
    $string = strip_tags($string);
    return strlen($string) > $length ? substr($string, 0, $length) . "..." : $string;
}

function html_a($text, $href = '#')
{
    return template('articole/anchor_tpl', array(
        'continut' => $text,
        'href' => $href,
    ));
}


function detaliiArticol($arr) {
  if(!empty($arr)) {
    foreach($arr as $key => $val) {
      echo "<h3><a href='view.php?ID=" . $val['ID'] ."' id='link-titlu-articol'>" . $val['titlu'] . "</a></h3>";
      if(isset($val['caleImg']) && $val['caleImg'] != ''){
        $caleImgArticol = $val['caleImg'];
        echo "<img src=" . $caleImgArticol . ">";
      }
      if(strlen($val['continut']) > 500) {
        echo "<p>" . substr($val['continut'], 0, 500) . "...</p>";
      } 
      else {
        echo "<p>" . $val['continut'] . "</p>";
      }  
      echo "<h6>" . $val['data'] . "</h6>";
    }
  }
  else {
    echo "Niciun articol adaugat";
  }
}

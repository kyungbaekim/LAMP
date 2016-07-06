<?php
  function isPair($str){
    $temp = [];
    // if($str[0] == ')' || $str[0] == ']' || $str[0] == '}'){
    //   echo "the array starts with )<br>";
    //   return false;
    // }
    // elseif($str[0] == '(' || $str[0] == '[' || $str[0] == '{'){
    //   array_push($temp, $str[0]);
    // }
    for($i=0; $i<strlen($str); $i++){
      if($str[$i] == '(' || $str[$i] == '[' || $str[$i] == '{'){
        array_push($temp, $str[$i]);
      }
      elseif($str[$i] == ')' || $str[$i] == ']' || $str[$i] == '}'){
        array_pop($temp);
      }
    }
    if(empty($temp)){
      echo "the array is empty<br>";
      var_dump($temp);
      return true;
    }
    else{
      echo "the array is not empty<br>";
      var_dump($temp);
      echo "<br>";
      return false;
    }
  }

  $str = ')(';
  $str2 = ')()';
  $str3 = '((((()))))';
  $str4 = '(((()))';
  $str5 = '(){}[]()()';
  $str6 = 'y(3(p)p(3)r)s';
  $str7 = 'n(0(p)3';
  $str8 = 'n)0(t(0)k';
  $str9 = 'w(a(t)s[o(n{c}o)m]e)h[e(r)e]';
  // isPair($str);
  // isPair($str2);
  // isPair($str3);
  // isPair($str4);
  // isPair($str5);
  isPair($str6);
  isPair($str7);
  isPair($str8);
  isPair($str9);
?>

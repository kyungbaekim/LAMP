<?php
  session_start();
  date_default_timezone_set('America/Los_Angeles');

  $display = '';
  if($_POST['action'] == 'farm'){
    $earned = rand(10, 20);
    $display = 'You entered a farm and earned '.$earned.' gold.  '.date("F j Y, g:i a");
  }
  else if($_POST['action'] == 'cave'){
    $earned = rand(5, 10);
    $display = 'You entered a cave and earned '.$earned.' gold.  '.date("F j Y, g:i a");
  }
  else if($_POST['action'] == 'house'){
    $earned = rand(2, 5);
    $display = 'You entered a house and earned '.$earned.' gold.  '.date("F j Y, g:i a");
  }
  else if($_POST['action'] == 'casino'){
    $earn_lose = rand(1, 10);
    $earned = rand(0, 50);
    // Earning chance at Casino is 70%
    // Earn gold if $earn_lose < 8
    // Lose gold if $earn_lose > 7
    if($earn_lose > 7){
      $earned = $earned * -1;
      $display = 'You entered a casino and lost '.($earned * -1).' gold.  '.date("F j Y, g:i a");
    }
    else {
      $display = 'You entered a casino and earned '.$earned.' gold.  '.date("F j Y, g:i a");
    }
  }
  else{
    $_SESSION = array();
  }
  $_SESSION['gold'] += $earned;
  // array_push($_SESSION['activities'], $display);
  $_SESSION['activities'][] = $display;
  header("Location: index.php");
?>

s<?php
  $x = array(1,3,5,7);
  foreach($x as $key => $value)
  {
    echo $key . " - " . $value ."<br />";
  }

  /*
  This will print output as below
  1 - 1
  2 - 3
  3 - 5
  5 - 7
  */

  foreach($x as $value)
  {
    echo $value ."<br />";
  }


  /*
  This will print output as below
  1
  3
  5
  7
  */
  $x = array("hi" => "Dojo", "awesome" => "game");
  foreach($x as $key => $value)
  {
    echo $key . " - " . $value ."<br />";
  }

  /*
  This will print output as below
  hi - Dojo
  awesome - game
  */

  foreach($x as $key => $value)
  {
    echo $value ."<br />";
  }

  /*
  This will print output as below
  Dojo
  game
  */

  foreach($x as $key => $value)
  {
    echo $key ."<br />";
  }

  /*
  This will print output as below
  hi
  awesome
  */

  $x = array(array(1,3,5), array(2,4,6), array(3,6,9));
  foreach($x as $key => $value)
  {
    echo "Key is {$key}<br />";
    echo "var_dumping value";
    var_dump($value);
  }

  /*
  This will print output as below
  Key is 0
  var_dumping value
  0 => int 1
  1 => int 3
  2 => int 5
  Key is 1
  var_dumping value
  0 => int 2
  1 => int 4
  2 => int 6
  Key is 2
  var_dumping value
  0 => int 3
  1 => int 6
  2 => int 9
  */

  foreach($x as $value)
  {
    echo "var_dumping value";
    var_dump($value);
  }

  /*
  This will print output as below
  var_dumping value
  0 => int 1
  1 => int 3
  2 => int 5
  var_dumping value
  0 => int 2
  1 => int 4
  2 => int 6
  var_dumping value
  0 => int 3
  1 => int 6
  2 => int 9
  */

  $x = array( array("hi"=>"Dojo", "game"=>"awesome"), array("dude"=>"fun", "play"=>"what?"), array("no"=>"way", "i am"=>"confused?") );
  foreach($x as $key => $value)
  {
    echo "key is {$key}<br />";
    foreach($value as $key2=>$value2)
    {
      echo $key2 ." - " . $value2."<br />";
    }
  }

  /*
  This will print output as below
  Key is 0
  hi - Dojo
  game - awesome
  Key is 1
  dude - fun
  play - what?
  Key is 2
  no - way
  i am - confused?
  */

  foreach($x as $y)
  {
    foreach($y as $key=>$value)
    {
      echo $key ." - " . $value."<br />";
    }
  }

  /*
  This will print output as below
  hi - Dojo
  game - awesome
  dude - fun
  play - what?
  no - way
  i am - confused?
  */
?>

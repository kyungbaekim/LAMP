<?php
  // var_dump($notes);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
	<title>Ajax Notes</title>
</head>
<body>
	<?php
  foreach ($notes as $note) {
    echo "<div class='note'>";
    echo "<table>";
    echo "<tr><td width=300>".$note['title']."</td>";
    echo "<td align=right><a href='/delete/".$note['id']."' class='delete'>delete</a></td></tr>";
    echo "<tr><td colspan=2>";
    echo "<form action='/update' method='post'>";
    echo "<textarea class='description' name='description' cols=50 rows=10 placeholder='Enter a note description'>".$note['description']."</textarea>";
    echo "<input type='hidden' value='".$note['id']."' name='id'>";
    // echo "<input type='submit' value='Edit description'>";
    echo "</form></td></tr></table><hr>";
    echo "</div>";
  }
	?>
</body>
</html>

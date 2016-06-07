<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="author" content="Tomáš Ulej">
    <title>PRIDAJ KATEGORIU</title>
  </head>
  <body>

<?php  

    //ini_set('E_ERROR', E_ALL);
    //ini_set('display_errors', true);
 
  include "../../../databaza_nadavky.php";
  if ($_POST['h']=="h") {
    $parent_id=$_POST['parent_id'];
    $txt=$_POST['txt'];
    $qi=mysql_query("INSERT INTO kategoria (parent_id, txt) VALUES ($parent_id, '$txt');");
    echo "<font color='green'>Výsledok pridávania je <b>".$qi."</b></font>";
  }
?>

<H1>Pridaj kategóriu</H1>

<form action="pridaj_kategoria.php" method="post">
  Text: <input type="text" name="txt" size="40">
  Otec: 
  <select name="parent_id">
     <option value="0">(pankhart)</option>
     <?php
       $q=mysql_query("SELECT * FROM kategoria ORDER BY id, parent_id");
         while ($k=mysql_fetch_object($q)) {
           printf('<option value="%s">%s</option>', $k->id, $k->txt);
         }
     ?>
  </select>  
  <input type="hidden" name="h" value="h">
  <input type="submit" name="submit" value="ODOSLAŤ">
</form>

<H1>Strom</H1>

<?php

$nav_query = mysql_query("SELECT * FROM `kategoria` ORDER BY `id`");
$tree = "";					// Clear the directory tree
$depth = 2;					// Child level depth.
$top_level_on = 1;			// What top-level category are we on?
$exclude = array();			// Define the exclusion array
array_push($exclude, 0);	// Put a starting value in it

while ( $nav_row = mysql_fetch_array($nav_query) )
{
	$goOn = 1;			// Resets variable to allow us to continue building out the tree.
	for($x = 0; $x < count($exclude); $x++ )		// Check to see if the new item has been used
	{
		if ( $exclude[$x] == $nav_row['id'] )
		{
			$goOn = 0;
			break;				// Stop looking b/c we already found that it's in the exclusion list and we can't continue to process this node
		}
	}
	if ( $goOn == 1 )
	{
		$tree .= $nav_row['txt'] . "<br>";				// Process the main tree node
		array_push($exclude, $nav_row['id']);		// Add to the exclusion list
		if ( $nav_row['id'] < 6 )
		{ $top_level_on = $nav_row['id']; }
		
		$tree .= build_child($nav_row['id']);		// Start the recursive function of building the child tree
	}
}

function build_child($oldID)			// Recursive function to get all of the children...unlimited depth
{
	global $exclude, $depth;			// Refer to the global array defined at the top of this script
	$child_query = mysql_query("SELECT * FROM `kategoria` WHERE parent_id=" . $oldID);
	while ( $child = mysql_fetch_array($child_query) )
	{
		if ( $child['id'] != $child['parent_id'] )
		{
			for ( $c=0;$c<$depth;$c++ )			// Indent over so that there is distinction between levels
			{ $tempTree .= "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; }
			$tempTree .= "          -" . $child['txt'] . "<br>";
			$depth++;		// Incriment depth b/c we're building this child's child tree  (complicated yet???)
			$tempTree .= build_child($child['id']);		// Add to the temporary local tree
			$depth--;		// Decrement depth b/c we're done building the child's child tree.
			array_push($exclude, $child['id']);			// Add the item to the exclusion list
		}
	}
	
	return $tempTree;		// Return the entire child tree
}

echo $tree;

?>




</body>
</html>

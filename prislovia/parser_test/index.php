<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
  <meta http-equiv="content-type" content="text/html; charset=windows-1250">
  <meta name="generator" content="PSPad editor, www.pspad.com">
  <title>Pokusný parser</title>
  </head>
  <body>
<H1>Parser test</H1>
  <div style="background-color:silver">
<?
  if ($_POST['h']=='h') {
      $riadok=explode("\n", $_POST['txt']);
      echo "<OL>";
      foreach ($riadok as $value) {
      	 echo "<LI>$value</LI>";
      }
      echo "</OL>";
      //echo '<pre>'.$_POST['txt'].'</pre>';  
  }
?>
  </div>
  <form action="index.php" method="post">
    <textarea name="txt" rows="10" cols="50"><? echo $_POST['txt'] ?></textarea>
    <input type="hidden" name="h" value="h"><BR />
    <input type="submit" name="s" value="Odoslať">
  </form>
  </body>
</html>

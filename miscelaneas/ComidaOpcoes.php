<!DOCTYPE html>
<html>
<head><title>Construindo um formulario</title></head>
<body>
<?php
$food=$_GET["food"];
if(!empty($food))
 {
	echo"A comida escolhida é:<strong>";
	foreach($food as $foodstuff)
	{
	    echo '<ul><li></li>'.htmlentities($foodstuff).'</li></ul>';	
    }
    echo "</strong>";
  }
  else
  {
	  echo ('
	  <form action="'.htmlentities($_SERVER["PHP_SELF"]).'" method="GET">
	  <fieldset>
	  <label>Italiana: <input type="checkbox" name="food[]" value="Italiana"/> </label>
	  <label>Mexicana: <input type="checkbox" name="food[]" value="Mexicana"/> </label>
	  <label>Chinesa: <input type="checkbox" name="food[]" value="Chinesa" checked="checked"/> </label>
	  </fieldset>
	  <input type="submit" value="Vai!" />
	  </form>
	  
	  
	  ');
  }
?>
</body>
</html>

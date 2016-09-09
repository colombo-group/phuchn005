<!DOCTYPE html>
<html>
<head>
	<title>Bai 4</title>
	<meta charset="utf-8">
</head>
<body style="padding: 0 500px">
	<form method="post" action="">
		<input type="number" name="num" min="0" value="<?php echo $_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['num']) ? $_POST['num']:""; ?>">
		<input type="submit" name="run" value="Ve tam giac">
	</form>
	<?php
		if ($_SERVER['REQUEST_METHOD']=="POST"){
			for ($i=1; $i <= $_POST["num"]; $i++) { 
				# code...
				$dau = $i % 10;
				for ($j=1; $j<=$i; $j++){
					echo $dau . "&nbsp&nbsp";
					if ($dau == 0)
						$dau = 9;
					else
						$dau--;
				}
				echo "<br>";
			}
		}	
	?>
</body>
</html>
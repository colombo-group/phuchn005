<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body style="text-align:center">
	<form method="post" action="">
		<input type="number" name="num" min="0" value="<?php echo $_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['num']) ? $_POST['num']:""; ?>">
		<input type="submit" name="run" value="Ve tam giac">
	</form>
	<?php
		if ($_SERVER['REQUEST_METHOD']=="POST"){
			for ($i=1; $i<=$_POST["num"]; $i++){
				$dau = $i % 10;
				$r = ""; $s = "";
				if ($i % 2 == 1){
					for ($j=1; $j<=$i/2+1; $j++){
						$r .= $dau . " ";
						if ($dau==0)
							$dau = 9;
						else
							$dau--;
					}	
					$s = substr($r, 0, $i-1);
					$s = strrev($s);
					$r .= $s;
				}
				else {
					for ($j=1; $j<=$i/2; $j++){
						$r .= $dau . " ";
						if ($dau==0)
							$dau = 9;
						else
							$dau--;
					}	
					$s = substr($r, 0, $i);
					$s = strrev($s);
					$r .= $s;
				}
			echo $r . "<br>";	
			}
		}		
	?>
</body>
</html>
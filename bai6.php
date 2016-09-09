<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body style="text-align:center">
	<?php 
		if (isset($_POST["cong"])){
			$result = (float)$_POST["so1"] + (float)$_POST["so2"];
		}
		if (isset($_POST["tru"])){
			$result = (float)$_POST["so1"] - (float)$_POST["so2"];
		}
		if (isset($_POST["nhan"])){
			$result = (float)$_POST["so1"] * (float)$_POST["so2"];
		}
		if (isset($_POST["chia"])){
			$result = (float)$_POST["so1"] / (float)$_POST["so2"];
		}
		if (isset($_POST["mu"])){
			$result = pow((float)$_POST["so1"],(float)$_POST["so2"]);
		}
	?>
	<form method="post">
		<input type="text" name="so1" required style="width:100px" value="<?php echo $_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['so1']) ? $_POST['so1']:"" ?>">
		<input type="submit" name="cong" value="+">
		<input type="submit" name="tru" value="-">
		<input type="submit" name="nhan" value="*">
		<input type="submit" name="chia" value="/">
		<input type="submit" name="mu" value="^">
		<input type="text" name="so2" required style="width:100px" value="<?php echo $_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['so2']) ? $_POST['so2']:"" ?>">
		=
		<input type="text" name=""  disabled style="width:100px" value="<?php echo isset($result) ? $result : ''; ?>">
	</form>

</body>
</html>
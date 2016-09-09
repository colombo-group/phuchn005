<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
	session_start();
?>
<?php
	if ($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["sub"])){
			$_SESSION["number_element"] = $_POST["num"];
			$ok = 1;
	}
	else
		$ok = 0;
?>
	<form method="post" action="">
		<label>Nhập số lượng phần tử</label>
		<input type="number" name="num" min="0" required 
			   value="<?php echo isset($_SESSION["number_element"]) ? $_SESSION["number_element"]:''; ?>" 
		>
		<input type="submit" name="sub" value="Thiet lap">
	</form>
	<br>

<?php
	if (isset($_POST["name"]) && $_SESSION["number_element"]>0){
		$_SESSION["name"] = $_POST["name"];
	}
?>
<?php
	if (isset($_SESSION["number_element"])){
	echo "Nhập mảng các phần tử "."<br>";
	echo "<form method='post'>";
	for ($i=1; $i<=$_SESSION["number_element"]; $i++){
?>
		<input style="width:50px" disabled value="<?php echo $i;?>">
		<input type="text" name="name[]"
			   value="<?php echo isset($_SESSION['name'][$i-1])&&$ok==0 ? $_SESSION['name'][$i-1]:''; ?>"
				required
		>
		<br>
<?php
	}
	echo "&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp";
	echo "<input type='submit' name='create_table' value='Tạo bảng'>";
	echo "</form>";
	}
?>
	<br>


<?php
	 if (isset($_POST["ve"])){
	 	$v = $_POST["num"];
	 }
?>
<?php
	if (isset($_SESSION["name"]) && $ok==0){
		echo "<form method='post' action=''>";															
		foreach ($_SESSION["name"] as $key=>$value) {
			# code...
?>
			<input style="width:50px" disabled value="<?php echo $value;?>">
			<input type="number" name="num[]" required
					placeholder="Nhập giá trị phần trăm"
					value="<?php echo isset($v[$key]) ? $v[$key]:""; ?>"
			>
		<br>
<?php
		}
		echo "&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp";
		echo "<input type='submit' name='ve' value='Vẽ'>";
		echo "</form>";
	}
?>
<br>
<?php 
	if (isset($v)){	
		for ($i=1; $i<=$_SESSION["number_element"]; $i++){
?>
	<input style="width:50px" disabled value="<?php echo $_SESSION['name'][$i-1];?>">
	<div style="width:140px; border:1px solid black;margin-left:60px; margin-top:-20px">
		<div style="width:<?php echo $v[$i-1].'px'; ?>; background:red">
			<div style="margin-left:<?php echo $v[$i-1].'px'; ?>"><?php echo $v[$i-1]."%"; ?></div>
		</div>
	</div>	
	<br>
<?php 
		}
	} 
?>
</body>
</html>
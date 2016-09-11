<!DOCTYPE html>
<html>
<head>
	<title>Paginator</title>
	<meta charset="utf-8">
</head>
<body style="text-align:center">
	<?php
		session_start();
	?>
	<?php
		if ($_SERVER["REQUEST_METHOD"]=="POST"){
			$_SESSION["ok"] = 1;
			$_SESSION["b"] = $_POST["b"];
			$_SESSION["a"] = $_POST["a"];
			$_SESSION["c"] = $_POST["c"];
			$_SESSION["so_luong"] = ceil($_SESSION["a"]/$_SESSION["b"]);
			$_SESSION["max_trang"] = ceil($_SESSION["so_luong"]/$_SESSION["c"]);
			$arr = array();
			for ($i=1; $i<$_SESSION["so_luong"]; $i++)
				$arr[] = $i * $_SESSION["b"];
			$_SESSION["arr"] = $arr;
		}
	?>
	<fieldset style="width:260px; margin:0 auto">
		<legend>Nhập các số</legend>
		<form method="post" action="paginator.php?p=1">
			<table>
				<tr>
					<td>Nhập số a : </td>
					<td><input type="number" name="a" required
								value="<?php echo isset($_SESSION['a']) ? $_SESSION['a']:''; ?>" 
					></td>
				</tr>
				<tr>
					<td>Nhập số b : </td>
					<td><input type="number" name="b" required
								value="<?php echo isset($_SESSION['b']) ? $_SESSION['b']:''; ?>" 
					></td>
				</tr>
				<tr>
					<td>Nhập số c : </td>
					<td><input type="number" name="c" required
								value="<?php echo isset($_SESSION['c']) ? $_SESSION['c']:''; ?>" 
					></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="submit" value="Hiển thị"></td>
				</tr>
			</table>
		</form>
	</fieldset>
	<?php
		if (isset($_SESSION["ok"]) && $_SESSION["ok"]==1){
			$trang = isset($_GET["p"]) ? $_GET["p"]:1;
			$start = ($trang-1)*$_SESSION["c"];
			for ($i=$start; $i<$start+$_SESSION["c"] && $i<count($_SESSION["arr"]); $i++){
	?>
	<?php
				echo $_SESSION["arr"][$i]."<br>";
			}
		}
	?>
	<button><a style="color:black; text-decoration:none;" href="paginator.php?p=<?php echo $trang>1? $trang-1 : 1; ?>">Trang trước</a></button>
	<button><a style="color:black; text-decoration:none;" href="paginator.php?p=<?php echo $trang<$_SESSION["max_trang"] ? $trang+1:$trang; ?>">Trang sau</a></button>


	<!--Level 2-->
	<br>
	<a style="color:black; text-decoration:none;" href="paginator.php?p=<?php echo $trang>1? $trang-1 : 1; ?>">[Trang trước]</a>
	<?php 
		for ($j=1; isset($_SESSION["max_trang"]) && $j<=$_SESSION["max_trang"]; $j++)
			echo "<a style='color:black; text-decoration:none' href='paginator.php?p=$j'>[$j]</a>"." ";
	?>
	<a style="color:black; text-decoration:none;" href="paginator.php?p=<?php echo $trang<$_SESSION["max_trang"] ? $trang+1:$trang; ?>">[Trang sau]</a>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<title>String</title>
	<meta charset="utf-8">
</head>
<body style="text-align:center">
	<?php
		session_start();
	?>
	<?php 
		if ($_SERVER["REQUEST_METHOD"]=="POST"){
			$_SESSION["char"] = $_POST["char"];
			$_SESSION["van_ban"] = isset($_POST["van_ban"]) ? $_POST["van_ban"]:"";
			$ok=1;
		}
	?>

	<fieldset style="width:400px; margin:0 auto">
		<legend>Nhập các số</legend>
		<form method="post" action="">
			<table>
				<tr>
					<td style="width:100px">Đoạn văn bản : </td>
					<td><textarea style="width:300px; height:100px" name="van_ban"><?php echo isset($_SESSION['van_ban']) ? $_SESSION['van_ban']:'';?>
					</textarea></td>
				</tr>
					<td style="width:100px">Kí tự a : </td>
					<td><input type="text" name="char" required style="width:300px" maxlength="1"
								value="<?php echo isset($_SESSION['char']) ? $_SESSION['char']:''; ?>" 
					></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" name="submit" value="Phân tích"></td>
				</tr>
			</table>
		</form>
	</fieldset>
	<?php
	if ( isset($ok) && $ok==1){
		$so_lan_xuat_hien_char = substr_count($_SESSION["van_ban"],$_SESSION["char"]);
		$arr = explode(" ",$_SESSION["van_ban"]);
		$arr_result = array();
		foreach ($arr as $value)
			if ( substr_count($value,$_SESSION["char"]) > 0 )
				$arr_result[] = $value;		
	?>
	<br>
	<div>Số lần xuất hiện ký tự <?php echo "'".$_SESSION["char"]."'"; ?> trong văn bản <?php echo "'".$_SESSION["van_ban"]."'"; ?> là <?php echo $so_lan_xuat_hien_char; ?> </div>
	<div>Danh sách các từ chứa ký tự <?php echo "'".$_SESSION["char"]."'"; ?> là
		<?php
			foreach($arr_result as $value)
				echo $value.", ";
		?>
	</div>
	<?php } ?>
</body>
</html>
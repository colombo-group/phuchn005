<?php 
	$r = "";
	$r .="<div style='background:red;width:612px ;margin:0 auto;'>";
	for ($i=1; $i <= 10; $i++) { 
		# code...
		$r .= "<table style='width:100px; float:left; border:1px solid black; margin:3px'>";
		for ($j=1; $j <= 10 ; $j++) { 
			$r .= "<tr><td>" . $i . " * " . $j . " = " . ($i*$j) . "</td></tr>";
		}
		$r .= "</table>";
	}
	$r .= "</div>";
	echo $r;
?>
<?php
	$year = (int)date("Y");
	$m = ["January","February","March","April","May","June","July","August","September","October","November","December"];
	$month = (int)date("m");
	$d = [31,28,31,30,31,30,31,31,30,31,30,31];
	if ($year % 4 ==0)
		$d[1] = 29;
	$number_day = $d[$month-1];
	$n = (int)date("N"); //thu
	$date =  (int)date("d"); //ngay
	function mung1($n,$date){
		for ($i=$date; $i>1; $i--){
			if ($n==1)
				$n = 7;
			else
				$n--;
		}
		return $n;
	}
	$mung1 = mung1($n,$date);
	echo "<table style='border:1px solid black; text-align:center; margin:0 auto;'>";
	echo "<tr><td colspan='7' style='border:1px solid black;'>". $m[$month-1] . "&nbsp&nbsp" . $year ."</td></tr>";
	echo "<tr>"
		."<th style='border:1px solid black; width:40px'>Su</th>"
		."<th style='border:1px solid black; width:40px'>M</th>"
		."<th style='border:1px solid black; width:40px'>Tu</th>"
		."<th style='border:1px solid black; width:40px'>W</th>"
		."<th style='border:1px solid black; width:40px'>Th</th>"
		."<th style='border:1px solid black; width:40px'>F</th>"
		."<th style='border:1px solid black; width:40px'>Sa</th>"
		."</tr>";
	$ngay = 0;
	if ($mung1==7)
		$mung1 = 0;
	echo "<tr>";
	for ($i=1; $i<=7; $i++){
		if ($i>$mung1)
			echo "<td style='border:1px solid black; width:40px'>".++$ngay."</td>";
		else
			echo "<td></td>";
	}
	echo "</tr>";

	$a = $ngay;
	$r ="";
	for ($i=$ngay+1; $i<=$number_day; $i++){
		if (($i-$a)%7==1)
			$r .= "<tr>";
		if ($date==$i)
			$r .= "<td style='color:red; border:1px solid black; width:40px'>". $i ."</td>";
		else
			$r .= "<td style='border:1px solid black; width:40px'>". $i ."</td>";
		if (($i-$a)%7==0)
			$r.= "</tr>";
	}
	echo $r;
	echo "</table>";
?>
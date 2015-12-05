<?php
$input = "abcdef";
$i = 1;
// echo "øh";
// echo $i++;
while($i++){
	if(substr(md5($input),0,4) == "0000"){
		die($i);
	}
}
// echo "yo!";
?>
<?php
echo phpversion();
die();
function adventCoinHash($input, $zeros = 5){
	$i = 1;
	$compare = str_repeat("0",$zeros);
	while($i++){
		if(substr(md5($input.$i),0,5) === $compare){
			return $i.", ".md5($input.$i);
		}
	}
}
$input = "bgvyzdsv";
// echo adventCoinHash("pqrstuv");
// echo adventCoinHash($input);
echo adventCoinHash($input,6);
?>
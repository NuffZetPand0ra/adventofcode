<?php
function generateGrid($state = false){
	$grid = array();
	$numbers = range(0,99);
	foreach($numbers as $x){
		$grid[$x] = array();
		foreach($numbers as $y){
			$grid[$x][$y] = $state;
		}
	}
	return $grid;
}
function processInstructionsFromSanta($instruction, &$grid, $gradual = false){
	$matches = array();
	preg_match("/([turn on|turn off|toggle]+)? ([0-9]+\,[0-9]+) through ([0-9]+\,[0-9]+)/", $instruction, $matches);
	if(count($matches)>0){
		$mode = $matches[1];
		$start = explode(",",$matches[2]);
		$end = explode(",",$matches[3]);
		for($x = $start[0]; $x <= $end[0]; $x++){
			for($y = $start[1]; $y <= $end[1]; $y++){
				operateCell($mode,$grid[$x][$y],$gradual);
			}
		}
	}
}
function operateCell($command = 'toggle', &$cell, $gradual = false){
	if($gradual === false){
		switch($command){
			case 'turn on':
				$cell = true;
				break;
			case 'turn off':
				$cell = false;
				break;
			case 'toggle':
				$cell = $cell ? false : true;
				break;
		}
	}else{
		switch($command){
			case 'turn on':
				$cell = $cell + 1;
				break;
			case 'turn off':
				$cell = $cell - 1;
				if($cell < 0) $cell = 0;
				break;
			case 'toggle':
				$cell = $cell + 2;
				break;
		}
	}
}
function getInstructions($filename){
	$handle = fopen($filename, "r");
	$contents = fread($handle, filesize($filename));
	fclose($handle);
	return explode("\n",$contents);
}
function countLights($grid){
	$count = 0;
	foreach($grid as $row){
		foreach($row as $cell){
			if($cell) $count++;
		}
	}
	return $count;
}
function calculateLightStrength($grid){
	$strength = 0;
	foreach($grid as $row){
		foreach($row as $cell){
			$strength = $strength + $cell;
		}
	}
	return $strength;
}
$instructions = getInstructions("6input.txt");
$grid = generateGrid();
foreach($instructions as $instruction){
	processInstructionsFromSanta($instruction, $grid);
}
echo "Lights count: ".countLights($grid)."<br>";
$grid = generateGrid(0);
foreach($instructions as $instruction){
	processInstructionsFromSanta($instruction, $grid, true);
}
echo "Light strength: ".calculateLightStrength($grid);

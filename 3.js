var directions = document.body.textContent.split("")
  , coords = [0,0]
  , delivered = []
  , luckyHouses = []
  , evenDirections = []
  , oddDirections = []
  ;
for(var i=0;i<directions.length;i++){
	if((i+2)%2 == 0){
		evenDirections.push(directions[i])
	}else{
		oddDirections.push(directions[i])
	}
}
directions = oddDirections
function removeDuplicates(row){
	for(var i=0; i<luckyHouses.length; i++){
		if(row[0] == luckyHouses[i][0] && row[1] == luckyHouses[i][1]){
			return false
		}
	}
	luckyHouses.push(row.slice(0))
	return true
}
// directions = ["<","v","<",">"]
// directions = [">",">","^"]
// directions = "^v^v^v^v^v".split("")
for(var i=0; i<directions.length; i++){
	switch(directions[i]){
		case "^":
			coords[1]++
			break
		case ">":
			coords[0]++
			break
		case "v":
			coords[1]--
			break
		case "<":
			coords[0]--
			break
	}
	delivered.push(coords.slice(0))
}

delivered.filter(removeDuplicates)
console.log(luckyHouses.length)
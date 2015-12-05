Array.min = function( array ){
    return Math.min.apply( Math, array )
}
Array.max = function( array ){
    return Math.max.apply( Math, array )
}
var gaver = document.body.textContent.split("\n")
  , paper = 0
  , ribbon = 0
  ;
gaver.splice(gaver.length-1,1)
function getRibbon(sides){
	sides.splice(sides.indexOf(Array.max(sides)),1)
	
}
for(var i=0; i<gaver.length; i++){
	var dimensions = gaver[i].split("x")
	  , l = dimensions[0]
	  , w = dimensions[1]
	  , h = dimensions[2]
	  , sides = [l*w,l*h,w*h]
	  ;
	paper += 2*sides[0] + 2*sides[1] + 2*sides[2] + Array.min(sides)
	//the bow
	ribbon += l*w*h
	//rest of the ribbon
	console.log(dimensions, Array.max(dimensions), dimensions.indexOf(Array.max(dimensions).toString()))
	dimensions.splice(dimensions.indexOf(Array.max(dimensions).toString()),1)
	console.log(dimensions)
	ribbon += 2*dimensions[0] + 2*dimensions[1]
}
console.log("paper",paper)
console.log("ribbon",ribbon)
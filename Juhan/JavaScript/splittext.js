/**
 * 
 */
var reArrange=function(params){
	var ArrayOfOrigin=params.sona.split(" ");
	var ArrayOfResult=new Array();
	var tmp=params.reorder.split(",");
	var length=tmp.length;
	console.log("DEBUG:"+tmp);
for(var i=0;i<length;i++){
    ArrayOfResult.push(ArrayOfOrigin[tmp[i]]);
	}
	var tulemus=ArrayOfResult.join(" ");
	console.log(tulemus);
}

var s={"sona":"külmast tulest langes pime leek","reorder":"2,1,0,4,3"};
reArrange(s);

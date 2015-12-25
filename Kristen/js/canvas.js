// funktsioon kriipsujuku pea munaks tegemiseks
function drawEllipse(context, centerX, centerY, width, height) {

	context.beginPath();

	context.moveTo(centerX, centerY - height / 2); // A1

	context.bezierCurveTo(centerX + width / 2, centerY - height / 2, // C1
	centerX + width / 2, centerY + height / 2, // C2
	centerX, centerY + height / 2); // A2

	context.bezierCurveTo(centerX - width / 2, centerY + height / 2, // C3
	centerX - width / 2, centerY - height / 2, // C4
	centerX, centerY - height / 2); // A1

	context.stroke();
	context.closePath();

	return context;
}
var tabel = [ {
	pilt : "http://i.imgur.com/as8A7Dm.png"
}, {
	pilt : "http://i.imgur.com/Lby4iRd.png"
}, {
	pilt : "http://i.imgur.com/xQuldqr.png"
}, {
	pilt : "http://i.imgur.com/J856vW7.png"
} ];
var paaris = [ 2, 4, 6, 8, 10 ];
var paaritu = [ 1, 3, 5, 7, 9 ];
var summa = [ paaris[0] + paaritu[0], paaris[1] + paaritu[1],
		paaris[2] + paaritu[2], paaris[3] + paaritu[3], paaris[4] + paaritu[4] ];
var arv = 1;
var söök = arv + " kanaburger";
var jooksöök = "koola ja " + söök;
console.log(jooksöök);
console.log(summa);
for (property in tabel) {
	console.log("forin: " + property + ": " + tabel[property].pilt);
};
tabel.forEach(function(value, index, object) {
	console.log("forEach: " + object[index].pilt);
});
//kriipsujuku funktsioon
function getValues(){
	var c = document.getElementById("myCanvas");
	var ctx = c.getContext("2d");
	x = document.getElementById("xvaartus").value * 1;// xkoordinaat
	y = document.getElementById("yvaartus").value * 1;// ykoordinaat
	a = document.getElementById("laius").value * 1// laius
	b = document.getElementById("korgus").value * 1;// kõrgus
	ctx.clearRect(0,0,c.width,c.height);
	ctx.beginPath();
	ctx.rect(x, y, a, b);
	ctx.stroke();
	ctx.closePath();
	ctx.beginPath();
	ctx.moveTo(x + 0.5 * a, y + 0.65 * b);// move to croch
	ctx.lineTo(x + 0.5 * a, y + 0.27 * b);// body
	ctx.stroke();
	ctx.closePath();
	/*
	 * ctx.beginPath();
	 * ctx.arc(x+0.5*a,y+0.15*b,/*radius(0.13*a+0.065*b),0,2*Math.PI);//head
	 * ctx.stroke(); ctx.closePath();
	 */
	ctx = drawEllipse(ctx, x + 0.5 * a, y + 0.15 * b, 0.55 * a, 0.25 * b);
	ctx.beginPath();
	ctx.moveTo(x + 0.5 * a, y + 0.65 * b);// move to croch
	ctx.lineTo(x + 0.8 * a, y + 0.95 * b);// right leg
	ctx.moveTo(x + 0.5 * a, y + 0.65 * b);// move to croch
	ctx.lineTo(x + 0.2 * a, y + 0.95 * b);// left leg
	ctx.moveTo(x + 0.5 * a, y + 0.45 * b);// move to chest
	ctx.lineTo(x + 0.8 * a, y + 0.70 * b);// right arm
	ctx.moveTo(x + 0.5 * a, y + 0.45 * b);// move to chest
	ctx.lineTo(x + 0.1 * a, y + 0.25 * b);// left arm
	ctx.lineTo(x + 0.1 * a, y + 0.15 * b);// left hand
	ctx.moveTo(x + 0.4 * a, y + 0.15 * b);// move into head
	ctx.lineTo(x + 0.3 * a, y + 0.15 * b);// left eye
	ctx.moveTo(x + 0.6 * a, y + 0.15 * b);// move into head
	ctx.lineTo(x + 0.7 * a, y + 0.15 * b);// right eye
	ctx.moveTo(x + 0.4 * a, y + 0.20 * b);// move into head
	ctx.lineTo(x + 0.6 * a, y + 0.20 * b);// mouth
	ctx.moveTo(x + 0.8 * a, y + 0.95 * b);// move to lower right leg
	ctx.lineTo(x + 0.9 * a, y + 0.95 * b);// right foot
	ctx.moveTo(x + 0.2 * a, y + 0.95 * b);// lower left leg
	ctx.lineTo(x + 0.08 * a, y + 0.95 * b);// left foot
	ctx.stroke();
};
getValues();
var c = document.getElementById("myCanvas");
var ctx = c.getContext("2d");
function dlCanvas() {
	  var dt = c.toDataURL('image/png');
	  /* Change MIME type to trick the browser to downlaod the file instead of displaying it */
	  dt = dt.replace(/^data:image\/[^;]*/, 'data:application/octet-stream');
	  /* In addition to <a>'s "download" attribute, you can define HTTP-style headers */
	  dt = dt.replace(/^data:application\/octet-stream/, 'data:application/octet-stream;headers=Content-Disposition%3A%20attachment%3B%20filename=Canvas.png');
	  this.href = dt;
};
document.getElementById("dl").addEventListener('click', dlCanvas, false);

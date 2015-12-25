var a = 0.2;
var n = a.toFixed(20);
console.log(n);

var b = 0.3;
var m = b.toFixed(20);
console.log(m);

if (n + m === 0.5) {
    alert("true");
}
else {
    alert("using 20 decimals: false");
}

var c = 0.2;
var o = c.toFixed(1);
console.log(o);

var d = 0.3;
var p = d.toFixed(1);
console.log(p);

if (c + d === 0.5) {
    alert("using 1 decimal: true");
}
else {
    alert("false");
}
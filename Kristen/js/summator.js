var summator = {
	a: 0,
    b: 0,
    c: 0,
    run: function() {
    	this.a = document.getElementById("value1").value
        this.b = document.getElementById("value2").value
        this.c = parseFloat(this.a) + parseFloat(this.b)
        document.getElementById("answer").innerHTML=this.c
    },
}
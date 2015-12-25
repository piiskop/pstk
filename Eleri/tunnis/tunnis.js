var user = {
    name: "John"
};

user.name = "george";

delete user.name;

var menu = {
    width: 300,
    height: 200,
    title: "Menu"
};

//for(var key in menu) {
//    var val = menu[key];
//    
//    alert("Key: "+key+" value:"+val);
//}

var menu = {
    width: "200",
    height: "300",
    title: "My menu"
};

function isNumeric(n) {
    return !isNaN(parseFloat(n)) && isFinite(n);
}

function multiplyNumeric(n) {
    for (var key in n) {
        var val = n[key];
        if (isNumeric(val)) {
            n[key] = val * 2;
        }
    }
}

multiplyNumeric(menu);
console.log(menu);

var summator = {
    sum: function (a, b) {
        return a + b;
    },
    run: function () {
        var a = document.getElementById("firstValue").value;
        var b = document.getElementById("secondValue").value;
        console.log(this.sum(+a, +b));

        document.getElementById("samp").innerHTML = "";

        var n = document.createTextNode(this.sum(+a, +b));

        document.getElementById("samp").appendChild(n);
        
    }
};





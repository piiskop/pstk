var whileLoop = true;
if (whileLoop) {
    var i = 0;
    while (i < 3) {
        console.log(i);
        i++;
    }
}
;

var Loop = true;
if (Loop) {
    var i = 0;
    do {
        console.log(i);
        i++;
    }
    while (i < 3);
}
;

var looping = true;
if (looping) {
    for (var i = 0; i < 3; i++) {
        console.log(i);
    }
}
;

var forIn = true;
if (forIn) {
    var kristo = {
        age: 20,
        sex: "male"
    };
    for (property in kristo) {
        console.log(property + " " + kristo[property]);
    }
}
;

var forEach = false;
if (forEach) {
    var kristen = {
        age: 20,
        sex: "male",
        phoneNumbers: ['112', '110']
    };
    kristen.phoneNumbers.forEach(function (value, index, object) {
        object[index] = value + ",";

    });
    console.log(kristen.toSource());
}

var map = true;
if(map) {
    var kristen = {
        age: 20,
        sex: "male",
        phoneNumbers: ['112', '110']
    };
    var phoneNumbers = kristen.phoneNumbers.map(Math.sqrt);
    console.log(kristen.phoneNumbers + "," + phoneNumbers);
}
var elements = ["one", "two", "three", "four", "five", "six", "seven", "eight", "nine", "ten"];
for (var i = 0; i < elements.length; i++) {
    if (i % 2 !== 0) {
        console.log(elements[i]);
    }
}
;

while (i > -1) {
    if (i > elements.length - 1) {
        i--;
        continue;
    }
    if (i % 2 !== 0) {
        console.log(elements[i]);
    }
    i--;
}
;


do {
    if (i > 4) {
        break;
    }
    if (isset(elements[i])) {
        console.log(elements[i]);
    }

    i++;
}
while (i < elements.length)


i = elements.length;
do {
    console.log(elements[i]);
    i--;
}
while (i > (elements.length - 5));

var m = 0;
for (var variable in elements) {
    if (m % 2 !== 0) {
        console.log(elements[variable]);
    }

    m++;

}
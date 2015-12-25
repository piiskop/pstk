function sumOfPrimaryNumbers(intUntil) {
    var sum = 0,
            steps = 0, 
            numbers = [];
    for (var i = 2; i <= intUntil; i++) {
        var isPrimary = true;
        for (var j = 2; j <= Math.ceil(Math.sqrt(i)); j++) {
            steps++;
            if (j !== i) {
                if (i % j === 0) {
                    isPrimary = false;
                    break;
                }
            }
        }
        if (isPrimary) {
            sum += i;
            numbers.push(i);
        }
    }
    return {
        sum: sum,
        steps: steps,
        numbers: numbers
    };
}

var r = sumOfPrimaryNumbers(100);
console.log(r);
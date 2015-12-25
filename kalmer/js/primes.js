	var steps = 0;

/**
 * This function adds up primes up to the given integer.
 * 
 * @author kalmer:piiskop <pandeero@gmail.com>
 * @returns int the sum
 */
function sumPrimes(n) {
	// 1
	var numbers = [];
	steps++;
	for (var number = 2; number <= n; number++) {
		numbers.push(number);
		steps++;
	}
	console.log(" 13: "+numbers);
	// 2
	var p = 2;
	steps++;
	// 5
	for (var p = 2; p * p <= n; p++) {
		steps++;
		if (-1 < numbers.indexOf(p)) {
			steps++;
			for (var number = p; p * number <= n; number++) {
				delete numbers[numbers.indexOf(p * number)];
				steps++;
			}
		}
	}
	console.log(" 24: "+numbers);
	var sum = 0;
	steps++;
	for (var position = 0; position < numbers.length; position++) {
		if (undefined !== numbers[position]) {
			sum += numbers[position];
			steps++;
		}
		steps++;
	}
	steps++;
	return sum;
}
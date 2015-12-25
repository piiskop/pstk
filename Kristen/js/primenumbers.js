/**
 * @author kristen:sepp <seppkristen@gmail.com>
 */
function nrToArray(){
	N = document.getElementById("howmany").value;
	j = 0;
	i = 2;
	sum = 0;
	steps = 0;
	nrArray = [], primes = [];
	for (i = 2; i <= N; i++) {
		if(!nrArray[i]){
			primes.push(i);
			for(j = i << 1; j <= N; j += i){
				nrArray[j] = true;
				steps++;
			}
			steps++;
		}
		steps++;
	}
	console.log("Steps: "+steps);
	console.log(primes);
	alert(eval(primes.join('+')));
}
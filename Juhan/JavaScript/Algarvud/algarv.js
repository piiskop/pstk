/**
 * Primes by Sieve_of_Eratosthenes
 * Algorithm from wikipedia
 */

var algorithm=function(number){
	var sqrtInt=Math.floor(Math.sqrt(number));
	var integers=[];
	var isComposite=[];
	/*we have all elements true by default
	/*begin with 2
	 * 
	 */
	for(var i=2;i<number;i++){
		isComposite[i]=true;
}
	for(var i=2;i<=sqrtInt;i++){
		if(isComposite[i]==true){
		for(var j=i*i;j<number; j=j+i){
			isComposite[j]=false;
		}
	}
	}
	for(var k=0;k<number;k++)
		{
		if(isComposite[k]==true)
			{
			integers.push(k);
}
		}
	return integers;
}

var a=algorithm(200);
console.log(a);
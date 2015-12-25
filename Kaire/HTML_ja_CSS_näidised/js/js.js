/**
 * This function loads the contents of a HTML file into the target.
 * 
 * @author k
 * @param string
 *            parameters.nameOfFile the name of the file
 * @param string
 *            parameters.target the ID of the target element
 */
function load(parameters)
{
	var xhr = new XMLHttpRequest();
	xhr.open('GET', parameters.nameOfFile + '.html?' + Math.random(), true);
	console.log(" 14: " + parameters);
	xhr.onreadystatechange = function()
	{
		if (this.readyState !== 4)
		{
			return;
		}
		if (this.status !== 200)
		{
			return; // or whatever error handling you want
		}
		target = document.getElementById(parameters.target);
		target.innerHTML = this.responseText + target.innerHTML;
	};
	xhr.send();
}


/**
 * this function create an Array that contains the JS code of every
 * <script> tag in parameter then apply the eval() to execute the code in
 * every script collected
 * 
 * @param array options:
 * 		string code            : the code that may or may not contain the
 * 				Javascript
 * 		string idOfFieldForInfo: the ID of the info field
 */
function parseScript(options)
{
	var scripts = new Array(); // Array which will store the script's code
	var code = options.code;

	//Strip out tags
	while (code.toLowerCase().indexOf("<script") > -1 || code.toLowerCase().indexOf("</script") > -1)
	{
		var s = code.toLowerCase().indexOf("<script");
		var s_e = code.indexOf(">", s);
		var e = code.toLowerCase().indexOf("</script", s);
		var e_e = code.indexOf(">", e);

		// Add to scripts array
		scripts.push(code.substring(s_e+1, e));

		// Strip from options.code
		code = code.substring(0, s) + code.substring(e_e+1);
	}

	// Loop through every script collected and eval it
	for (var i = 0; i < scripts.length; i++)
	{
		eval.call(null, scripts[i]);
	}

}
//использование Math.round() даст неравномерное распределение!
function getRandomInt(min, max)
{
  return Math.floor(Math.random() * (max - min + 1)) + min;
}

function escapeHtml(str) {
    var div = document.createElement('div');
    div.appendChild(document.createTextNode(str));
    return div.innerHTML;
};

/**
 * This function writes a log into the info field.
 * 
 * @author Kalmer Piiskop
 * @param parameters.fieldForInfo the ID of the info field
 * @param parameters.log          the log
 * @param parameters.replace      Do we replace the content of the field for
 * 		information?
 */
function writeLog(parameters)
{

	var parametersToCheck =
	{
		fieldForInfo     : parameters.fieldForInfo,
		parametersToCheck:
		{
			log: parameters.log
		}
	};

	if (areParametersSet(parametersToCheck))
	{
		var target = document.getElementById(parameters.fieldForInfo);
		target.className += " viga";

		if (("" === target.innerHTML) || (parameters.replace))
		{
			target.innerHTML = parameters.log;
		}
		else
		{
			var br = document.createElement("br");

			target.appendChild(br);
			target.innerHTML += parameters.log;
		}
		target.style.display = "block";
	}

}

/**
 * This function checks if all the needed parameters are set.
 * 
 * @author Kalmer Piiskop
 * @param parameters the parameters
 * @returns {Boolean} Are they set?
 */
function areParametersSet(parameters)
{
console.log(" 740 ");
	if (!parameters.fieldForInfo)
	{
console.log(" 743 ");
		console.error(document.getElementById("missingInfoField").innerHTML);

		return false;
	}
	else if (!document.getElementById(parameters.fieldForInfo))
	{
		console.log(" 750: "+parameters.fieldForInfo);
		console.error(document.getElementById("missingInfoFieldElement").innerHTML);

		return false;
	}
console.log(" 753 ");
	for (parameter in parameters.parametersToCheck)
	{
console.log(" 701: "+parameter);
//console.log(" 703: "+parameters.parametersToCheck[parameter].fields);
		if (!parameters.parametersToCheck[parameter])
		{
			console.log(" 761: "+parameters.fieldForInfo);
			document.getElementById(parameters.fieldForInfo).innerHTML += (document.getElementById("missingParameter").innerHTML + ": \"" + parameter + "\"");

			return false;
		}
		else if (typeof parameters.parametersToCheck[parameter].fields != "undefined")
		{
console.log(" 711 ");
			for (field in parameters.parametersToCheck[parameter].fields)
			{

				if ((typeof parameters.parametersToCheck[parameter].fields[field] == 'object') && !document.getElementById(parameters.parametersToCheck[parameter].fields[field].id))
				{
					console.log(" 718: "+parameters.parametersToCheck[parameter].fields[field].id + ", " + parameters.fieldForInfo);
					var target = document.getElementById(parameters.fieldForInfo);
					target.className += " viga";

					if (("" === target.innerHTML))
					{
						target.innerHTML = (document.getElementById("missingField").innerHTML + ": \"" + parameters.parametersToCheck[parameter].fields[field].id + "\"");
					}
					else
					{
						var br = document.createElement("br");

						target.appendChild(br);
						target.innerHTML += (document.getElementById("missingField").innerHTML + ": \"" + parameters.parametersToCheck[parameter].fields[field].id + "\"");;
					}

					return false;
				}

			}

		}

	}

	return true;
}

/**
 * This function creates a new XML-HTTP-request.
 * 
 * @returns the request
 */
function GetXmlHttpObject() {
	var objXMLHttp = null
	if (window.XMLHttpRequest) {
		objXMLHttp = new XMLHttpRequest()
	} else if (window.ActiveXObject) {
		objXMLHttp = new ActiveXObject("Microsoft.XMLHttp")
	}
	return objXMLHttp
}

/**
 * This function gets the HTML part of something.
 * 
 * @author Kalmer Piiskop
 * @param boolean
 *            parameters.draggable Is the target draggable?
 * @param mixed
 *            parameters.types The types are the common button types.
 */
function load(parameters) {
	console.log(" 546 ");
	if (parameters.types) {
		var divs = document.getElementsByTagName("div");

		for (var index = 0; index < divs.length; index++) {

			if (parameters.types instanceof Array) {

				for ( var type in parameters.types) {
					closeOthers(divs, index, parameters.types[type]);
				}

			} else {
				closeOthers(divs, index, parameters.types);
			}

		}

	}
	console.log(" 571 ");
	var parametersToCheck = {
		fieldForInfo : parameters.fieldForInfo,
		parametersToCheck : {
			alias : parameters.alias,
			targets : {
			// fields: parameters.targets
			}
		}
	};
	console.log(" 584 ");
	if (areParametersSet(parametersToCheck)) {

		writeLog({
			fieldForInfo : parameters.fieldForInfo,
			log : document.getElementById("before").innerHTML
		});

		document.body.style.cursor = "progress";

		var xmlHttpForSomething = new Array();

		xmlHttpForSomething[parameters.targets[0].id] = GetXmlHttpObject()

		if (xmlHttpForSomething[parameters.targets[0].id] == null) {

			writeLog({
				fieldForInfo : parameters.fieldForInfo,
				log : document.getElementById("messageAboutBrowser").innerHTML
			});

			document.body.style.cursor = "not-allowed";

			return;
		}
console.log(" 195 ");
		xmlHttpForSomething[parameters.targets[0].id].onreadystatechange = function() {

			if (xmlHttpForSomething[parameters.targets[0].id].readyState == 4
					|| xmlHttpForSomething[parameters.targets[0].id].readyState == "complete") {

				var response = eval("("
						+ xmlHttpForSomething[parameters.targets[0].id].responseText
						+ ")");
				if (response.err) {
					console.log(" 205 ");
					if (!response.isLoggedIn) {
						if (response.facebookAccount) {

							buildNotLoggedInState({
								facebookAccount : response.facebookAccount,
								fieldForInfo : parameters.fieldForInfo,
								idOfWrapperOfLoginForm : parameters.targets[0].id,
								post : parameters.post + "&errorType=JSON"
							});
						} else {
							buildNotLoggedInState({
								draggable : parameters.draggable,
								fieldForInfo : parameters.fieldForInfo,
								idOfWrapperOfLoginForm : parameters.targets[0].id,
								toContent : parameters.toContent,
								post : parameters.post + "&errorType=JSON"
							});

						}

					}

					writeLog({
						fieldForInfo : parameters.targets[1].id,
						log : response.err
					});

					document.body.style.cursor = "auto";
				} else {
console.log(" 235 ");
					var parametersToCheck = {
						fieldForInfo : parameters.fieldForInfo,
						parametersToCheck : {
							rows : response.rows
						}
					};
					console.log(" 126 ");
					if (areParametersSet(parametersToCheck)) {

						for (var index = 0; index < parameters.targets.length; index++) {
							var target = document
									.getElementById(parameters.targets[index].id);

							if ((parameters.targets[index].onlyIfEmpty
									&& (parameters.targets[index].onlyIfEmpty == true) && (resultField.innerHTML
									.trim() == ""))
									|| !parameters.targets[index].onlyIfEmpty
									|| (parameters.targets[index].onlyIfEmpty == false)) {

								if (undefined != response.rows[parameters.targets[index].id]) {
									if (parameters.targets[index].toContent
											&& (parameters.targets[index].toContent == true)) {
										// var boxes =
										// document.getElementById(parameters.targets[index].id).getElementsByTagName();
										// boxes[0].innerHTML +=
										// response.rows[parameters.targets[index].id];
										target.innerHTML += response.rows[parameters.targets[index].id];
									} else if (parameters.draggable) {
										var box = document.createElement("div");
										box.setAttribute("class",
												"BoxInHighslide");
										box.innerHTML = response.rows[parameters.targets[index].id];

										target.appendChild(box);
									} else {
										target.innerHTML = response.rows[parameters.targets[index].id];
									}
									console.log(" 648 ");
									// var buttons =
									// document.getElementById(parameters.targets[index].id).getElementsByTagName("button");
									// console.log(" 555: "+typeof buttons[0] +
									// ", "+parameters.targets[index].id + ", "
									// + buttons[0]);
									// var unboundButtons = new Array();
									// var target =
									// document.getElementById(parameters.targets[index].id);
									//
									// if (buttons.length > 0)
									// {
									// for (button in buttons)
									// {
									// if ((typeof buttons[button] === "object")
									// &&
									// (document.getElementById(parameters.targets[index].id).firstChild
									// === buttons[button]))
									// {
									// unboundButtons[button] = buttons[button];
									// target.removeChild(buttons[button]);
									// }
									// }
									// }
									// var oldContent = target.innerHTML;
									//
									// var element =
									// document.implementation.createHTMLDocument("example");
									// element.documentElement.innerHTML =
									// response.rows[parameters.targets[index].id];
									// //var element =
									// parser.parseFromString(response.rows[parameters.targets[index].id],
									// "text/xml");
									// //var element =
									// document.createElement("div");
									// // element.innerHTML =
									// response.rows[parameters.targets[index].id];
									// console.log(" 562:
									// "+element.body.firstChild);
									// var buttonsOfResponse =
									// element.body.getElementsByTagName("button");
									// var unboundButtonsOfResponse = new
									// Array();
									// if (buttonsOfResponse.length > 0)
									// {
									// console.log(" 580: "+
									// element.body.firstChild.nodeName);
									// if (element.body.firstChild.nodeName ===
									// "BUTTON")
									// {
									// unboundButtonsOfResponse[0] =
									// buttonsOfResponse[0];
									// unboundButtonsOfResponse[1] =
									// buttonsOfResponse[1];
									// console.log(" 584:
									// "+unboundButtonsOfResponse[0]);
									// element.body.removeChild(element.body.firstChild);
									// element.body.removeChild(element.body.firstChild);
									// }
									// console.log(" 587:
									// "+unboundButtonsOfResponse[0] + ", " +
									// unboundButtonsOfResponse[1]);
									// }
									// var newContent = element.body.innerHTML;
									//
									// target.innerHTML = "";
									// console.log(" 673:
									// "+document.getElementById(parameters.targets[index].id).innerHTML);
									// if (unboundButtonsOfResponse[0])
									// {
									// console.log(" 596:
									// "+unboundButtonsOfResponse[0]);
									// target.appendChild(unboundButtonsOfResponse[0]);
									// console.log(" 597:
									// "+unboundButtonsOfResponse[1]);
									// target.appendChild(unboundButtonsOfResponse[1]);
									// }
									// else if (unboundButtons[0])
									// {
									// target.appendChild(unboundButtons[0]);
									// console.log(" 561 ");
									// target.appendChild(unboundButtons[1]);
									// }
									// console.log(" 687:
									// "+document.getElementById(parameters.targets[index].id).innerHTML);
									//
									// var box = document.createElement("div");
									// box.setAttribute("class",
									// "BoxInHighslide");
									//
									// if (parameters.targets[index].toContent
									// && (parameters.targets[index].toContent
									// == true))
									// {
									// console.log(" 566 ");
									// box.innerHTML += oldContent;
									// }
									// box.innerHTML += newContent;
									//
									// document.getElementById(parameters.targets[index].id).appendChild(box);
									if ("TD" === target.tagName) {
										target.style.display = "table-cell";
									} else {
										target.style.display = "block";
									}

									if (response.focus
											&& document
													.getElementById(response.focus)) {
										document.getElementById(response.focus)
												.focus();
									}
									console.log(" 723 ");
									parseScript({
										code : target.innerHTML,
										idOfFieldForInfo : parameters.fieldForInfo
									});
									console.log(" 730 ");
									var spans = target
											.getElementsByClassName("LabelOfButton");

									for ( var key in spans) {

										if (spans[key].tagName === "SPAN") {
											adjustFontSize(spans[key]);
										}

									}

								}
								console.log(" 744 ");
							}

						}
						console.log(" 748 ");
						document.getElementById(parameters.targets[1].id).className = document
								.getElementById(parameters.targets[1].id).className
								.replace(/(?:^|\s)viga(?!\S)/g, '');

						writeLog({
							fieldForInfo : parameters.fieldForInfo,
							log : document.getElementById("after").innerHTML
						});

						document.body.style.cursor = "auto";

						if (parameters.functionsToCall
								&& (parameters.functionsToCall.length > 0)) {
							// calling additional functions

							for ( var func in parameters.functionsToCall) {

								if (typeof parameters.functionsToCall[func] == 'string') {
									var replacedFunctionToCall = parameters.functionsToCall[func];

									if (response.id) {
										replacedFunctionToCall = replacedFunctionToCall
												.replace("[ID]", response.id);
									}

									eval(replacedFunctionToCall);
								}

							}

						}

					}

				}

			}
			;
		}

		xmlHttpForSomething[parameters.targets[0].id].open("POST", document
				.getElementById("beginningOfUrl").innerHTML
				+ parameters.alias, true);
		xmlHttpForSomething[parameters.targets[0].id].setRequestHeader(
				"Content-type", "application/x-www-form-urlencoded");

		if (parameters.draggable) {
			var parameterForDraggable = "&draggable=true";
		} else {
			var parameterForDraggable = "";
		}

		postParameters = "suffix="
				+ document.getElementById("suffix").innerHTML + "&width="
				+ document.getElementById("width").innerHTML
				+ parameterForDraggable;

		if (parameters.idOfParent) {
			postParameters += ("&idOfParent=" + parameters.idOfParent);
		}

		if (parameters.post) {
			postParameters += parameters.post;
		}
		console.log(" 879: " + postParameters);
		xmlHttpForSomething[parameters.targets[0].id].setRequestHeader(
				"Content-length", postParameters.length);
		xmlHttpForSomething[parameters.targets[0].id].setRequestHeader(
				"Connection", "close");
		xmlHttpForSomething[parameters.targets[0].id].send(postParameters);
	}

}

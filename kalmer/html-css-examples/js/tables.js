/**
 * This function creates a sample caption for the first table.
 * 
 * @author kalmer
 */
var buildCaption = function()
{
	document.getElementsByTagName("table")[0].createCaption().innerHTML = "Pealkiri";
}

/**
 * This function deletes the caption of the first table.
 * 
 * @author kalmer
 */
var deleteCaption = function()
{
	document.getElementsByTagName("table")[0].deleteCaption();
}

/**
 * This function creates a sample header for the first table.
 * 
 * @author kalmer
 */
var buildHeader = function()
{
	document.getElementsByTagName("table")[0].createTHead();
}

/**
 * This function deletes the header from the first table.
 * 
 * @author kalmer
 */
var deleteHeader = function()
{
	document.getElementsByTagName("table")[0].deleteTHead();
}

/**
 * This function creates a sample footer for the first table.
 * 
 * @author kalmer
 */
var buildFooter = function()
{
	document.getElementsByTagName("table")[0].createTFoot();
}

/**
 * This function deletes the footer from the first table.
 * 
 * @author kalmer
 */
var deleteFooter = function()
{
	document.getElementsByTagName("table")[0].deleteTFoot();
}

/**
 * This function creates a sample body for the first table. to the end of the
 * first table.
 * 
 * @author kalmer
 */
var buildRow = function()
{
	document.getElementsByTagName("table")[0].insertRow();
}

/**
 * This function deletes the last row from the first table.
 * 
 * @author kalmer
 */
var deleteRow = function()
{
	document.getElementsByTagName("table")[0].deleteRow(-1);
}

/**
 * This function creates a sample cell into the first row of the first table.
 * 
 * @author kalmer
 */
var buildCell = function()
{
	document.getElementsByTagName("tr")[0].insertCell();
}

/**
 * This function deletes the last cell from the first row of the first table.
 * 
 * @author kalmer
 */
var deleteCell = function()
{
	document.getElementsByTagName("tr")[0].deleteCell(-1);
}

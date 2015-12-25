function colourFunction() {
//console.log(this)
    var classNameSelect = document.getElementById("select1"),
            className = classNameSelect.value;
    //console.log(colour);
    var x = document.getElementById("container");
    x.className = className;
}
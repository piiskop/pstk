function draw() {
    
    var cForm = document.getElementById("canvasForm");
    var x = parseInt(cForm.elements["xaxis"].value);
    var y = parseInt(cForm.elements["yaxis"].value);
    var n = parseInt(cForm.elements["width"].value);
    var m = parseInt(cForm.elements["height"].value);
    
//    var x = 50;
//    var y = 60;
//    var n = 350;
//    var m = 50;
    var canvas = document.getElementById("canvas");
    var context = canvas.getContext("2d");
    context.fillStyle="#A9E2F3";
    context.clearRect(0, 0, canvas.width, canvas.height);
    context.beginPath();
    //context.rect(x, y, n, m);
    context.fillRect(x,y,n,m);
    context.stroke();

//E

    context.beginPath();
    context.moveTo(x + n * 0.13, y + m * 0.1);
    context.lineTo(x + n * 0.13, y + m * 0.9);
    context.stroke();

    context.moveTo(x + n * 0.13, y + m * 0.1);
    context.lineTo(x + n * 0.23, y + m * 0.1);
    context.stroke();

    context.moveTo(x + n * 0.13, y + m * 0.5);
    context.lineTo(x + n * 0.1923, y + m * 0.5);
    context.stroke();

    context.moveTo(x + n * 0.13, y + m * 0.9);
    context.lineTo(x + n * 0.23, y + m * 0.9);
    context.stroke();

//L 100 20

    context.beginPath();
    context.moveTo(x + n * 0.423, y + m * 0.1);
    context.lineTo(x + n * 0.423, y + m * 0.9);
    context.stroke();

    context.moveTo(x + n * 0.423, y + m * 0.9);
    context.lineTo(x + n * 0.577, y + m * 0.9);
    context.stroke();

//E

    context.beginPath();
    context.moveTo(x + n * 0.765, y + m * 0.1);
    context.lineTo(x + n * 0.765, y + m * 0.9);
    context.stroke();

    context.moveTo(x + n * 0.765, y + m * 0.1);
    context.lineTo(x + n * 0.923, y + m * 0.1);
    context.stroke();

    context.moveTo(x + n * 0.765, y + m * 0.5);
    context.lineTo(x + n * 0.885, y + m * 0.5);
    context.stroke();

    context.moveTo(x + n * 0.765, y + m * 0.9);
    context.lineTo(x + n * 0.923, y + m * 0.9);
    context.stroke();


    context.closePath();
}
function buttonOnclick() {
    alert("Letter has been sent");
}

function myFunctionHide(element) {
//    var id = element.id;
//    var x = document.getElementById(id);
//    if(id === 'name') {
//        if (x.value.length > 1) {
//            
//        }
//    } else if(id === 'name') {
//        
//    }
    var name = document.getElementById('name').value;
    var email = document.getElementById('email').value;
    var content = document.getElementById('content').value;
    
    if(name.length > 2 && email.length > 2) {
        document.getElementById('button').classList.remove('Hide');
    }
}

function validateForm(element) {
    var y = document.forms["myForm"].value;
    if (y !== null || y !== "") {
        var n = document.getElementById(this.classList);
        validateForm[n].classList.add("Show");
        validateForm[n].classList.remove("Hide");

    }
}

var div = document.getElementsByClassName('form');
var button = document.getElementsByTagName('button');
var p = document.getElementsByClassName('bolinha');
var form = document.getElementsByTagName('form')[0];
var btn_cadastra = document.getElementsByClassName('btn-cadastrar');
form.onsubmit =()=>{return false}

var current_div = 0;
div[current_div].style.display = "block";

if(current_div == 0){
    button[0].style.display = "none";
    p[0].style.backgroundColor = "#5661D9";
}

button[1].onclick = ()=>{
    current_div++;
    var back_div = current_div - 1;

    if ((current_div > 0) && (current_div < 2)){

        button[0].style.display = "block";
        div[current_div].style.display = "block";
        div[back_div].style.display = "none";
        p[current_div].style.backgroundColor = "#5661d9";
        p[back_div].style.backgroundColor = "#000";
        if (current_div == 1)
        {
           btn_cadastra.style.display = "block";
        }
    }
    else{
        if(current_div > 2){
            form.onsubmit =()=>{return true}
        }
    }
}

button[0].onclick =()=>{
    if(current_div > 0){
        current_div--;
        var back_div = current_div +1;
        
        div[current_div].style.display = "block";
        div[back_div].style.display = "none"
        p[current_div].style.backgroundColor = "#5661d9";
        p[back_div].style.backgroundColor = "#000";
        if(current_div < 2){
            button[1].innerHTML = "Próximo";
        }
    }
    if(current_div == 0){
        
        btn_cadastra.style.display = "none";
    }
}
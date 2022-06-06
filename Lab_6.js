console.clear();

var i = 0;
var getID = () => ++i;
var isEmpty = (str) => str.trim() === '';
var contStr = (str) => {
    if(str.length < 3){ return true;}
    return false;
}


function agregar(){
    var dni = document.getElementById('dni');
    var nombre = document.getElementById('nombre');
    var apellidos = document.getElementById('apellidos');
    var email = document.getElementById('email');
    var telefono = document.getElementById('telefono');

    dniVal=dni.value;
    nombreVal = nombre.value;
    apellidosVal = apellidos.value;
    emailVal = email.value;
    telefonoVal = telefono.value;

    tablaUsuarios = document.getElementById('tablaUsuarios');

    if( isEmpty( dniVal ) || isEmpty( nombreVal ) || isEmpty( apellidosVal ) || isEmpty( emailVal ) || isEmpty( telefonoVal ) ){
        alert('TODOS LOS CAMPOS SON OBLIGATORIOS');
        return;
    }

    /*if(contador(dniVal)<9 || (contador(dniVal)>9)  ){
        alert('EL NUMERO DE DNI NO TIENE  9 NUMEROS');
        return;
    }

    if(contador(nombreVal)<3){
        alert('EL NOMBRE TIENE MENOS DE 3 CARACTERES - VUELVA INTENTAR');
        return;
    }
    
    if(contador(apellidosVal)<3){
        alert('EL APELLIDO TIENE MENOS DE 3 CARACTERES - VUELVA INTENTAR');
        return;
    }

    if(emailVal.indexOf('@')!=-1 && (emailVal.indexOf('.')!=-1) ){
    }
    else{
        alert('EL EMAIL NO CUMPLE CON LOS REQUISITOS');
        return;
    }*/

    var contenido = document.getElementById("contenido");

    if(window.XMLHttpRequest){
        ajax= new XMLHttpRequest();
    }
    else{
        ajax= new ActiveXObject("Microsoft.XMLHTTP");
    }

    ajax.onreadystatechange = function(){
        if(ajax.readyState==4 && ajax.status==200){
            contenido.innerHTML = ajax.responseText;
        }
        else{
            contenido.innerHTML= "<img width='50' height='50' src='cargando.gif'>";
        }
    }
    
    ajax.open("POST","insertar_mostrar.php");
    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    ajax.send("dni="+dniVal+"&nombre="+nombreVal+"&apellidos="+apellidosVal+"&email="+emailVal+"&telefono="+telefonoVal);
};

function asignar(){
    btnAgregar=document.getElementById('btnAgregar');
    btnAgregar.addEventListener("click",agregar);
}

window.addEventListener("load",asignar);



// Funcion con expresion regular para validar que el usuario teclee un correo valido = ejemplo@ejemplo.com

    function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

// Funcion para registrar un usuario nuevo

function registrar(){
if($("#txtUsuario").val()==""){
alert("debes ingresar usuario");
}
else if($("#txtPassword").val()==""){
alert("debes indicar una contraseña ");
}
else if($("#txtNombre").val()==""){
alert("debes indicar un nombre");
}
else if(!validateEmail($("#txtCorreo").val())){
alert("debes indicar un correo valido");
}
else{
    $.ajax({
        type:"POST",
        url:"ajax/enviar.php",
        data:$("#formRegistro").serialize(),
        success: function(data){
            if(data=="OK"){
                alert("registro exitoso");
                $("#txtUsuario").val("");
                $("#txtPassword").val("");
                $("#txtNombre").val("");
                $("#txtCorreo").val("");
            }else{
                // alert("El mensaje no ha podido ser enviado. Puede ponerse en contacto con nosotros a través del correo kronospro10@gmail.com");
                alert("error1");
            }
        }
    });
}


}



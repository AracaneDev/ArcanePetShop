window.onload = function () {
    var Formulario = document.forms[1];
  
    Formulario.onsubmit = validar;
  
    var Elementos = Formulario.elements;
    for (var i = 0; i < Elementos.length; i++) {
      Elementos[i].onkeypress = restringir;
      console.log(Elementos[i]);
    }
  };
  
  function validar(evento) {
    var Elementos = this.elements;
  
    for (let i = 0; i < Elementos.length; i++) {
      if (Elementos[i].type == "text") {
        console.log(Elementos[i].type);
  
        if (Elementos[i].value == "" || Elementos[i].value == null) {
          console.log("Error: prueba 1", Elementos[i].type, Elementos[i].name, "Ingrese los datos");
          console.log( Elementos[i].type, Elementos[i].name)
          alert("Por favor ingrese un dato válido")
          return false;
        }
  
        // prueba 2
        if (Elementos[i].value.length < 3) {
          console.log("Error: prueba 2",Elementos[i].type,Elementos[i].name,"Ingrese más caracteres");
          alert("Dato demasiado corto")
          return false;
        }
      }
  
      if (Elementos[i].type == "number") {
        if(/^\s+$/.test(Elementos[i].value) || Elementos[i].value == "" || Elementos[i].value == null){
          console.log("Error: prueba 3", Elementos[i].type, Elementos[i].name, "Ingrese los datos válidos");
          alert("Por favor ingrese un dato válido")
        }
  
        if (Elementos[i].value.length < 3) {
          console.log(Elementos[i].value.length)
          console.log("Error: prueba 2",Elementos[i].type,Elementos[i].name,"Ingrese más caracteres");
          alert("Datos demasiado corto")
          return false;
        }
      }
    }
  }
  
  function restringir(evento) {
    var caracteresPermitidos = "";
    var letra = String.fromCharCode(evento.charCode);
    switch (this.name) {
      case "nombre":
      case "apellido":
        caracteresPermitidos =
          "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ ";
        break;
      case "direccion":
        caracteresPermitidos = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ1234567890-_#., ";
        break;
      case "telefono":
        caracteresPermitidos = "1234567890";
        break;
    }
    return caracteresPermitidos.indexOf(letra) != -1;
  }
  


(function() {
    'use strict';
    window.addEventListener('load', function() {
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.getElementsByClassName('needs-validation');
      // Loop over them and prevent submission
      var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
          if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
    }, false);
  })();
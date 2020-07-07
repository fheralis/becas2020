/*SOLO FLOTANTES*/
function filterFloat(evt,input){
    // Backspace = 8, Enter = 13, ‘0′ = 48, ‘9′ = 57, ‘.’ = 46, ‘-’ = 43
  var key = window.Event ? evt.which : evt.keyCode;    
  var chark = String.fromCharCode(key);
  var tempValue = input.value+chark;
  if(key >= 48 && key <= 57){
    if(filter(tempValue)=== false){
      return false;
    }else{       
      return true;
    }
  }else{
    if(key == 8 || key == 13 || key == 0) {     
      return true;              
    }else if(key == 46){
      if(filter(tempValue)=== false){
        return false;
      }else{       
        return true;
      }
    }else{
      return false;
    }
  }
}

function filter(__val__){
  var preg = /^([0-9]+\.?[0-9]{0,2})$/; 
  if(preg.test(__val__) === true){
    return true;
  }else{
   return false;
  }  
}


/*SOLO NUMEROS ENTEROS*/
function isNumberInt(evt){
  var charCode = (evt.which) ? evt.which : event.keyCode
  if(charCode > 31 && (charCode < 48 || charCode > 57)){
    return false;
  }
  return true;
}


/*VALIDAR FECHAS*/
function validarFechas(fecha1,fecha2){
  fecha1=fecha1.split('-');
  fecha2=fecha2.split('-');

  var f1 = new Date(fecha1);
  var f2 = new Date(fecha2);

  if(f1.getTime()==f2.getTime()){
    return 1; //IGUALES
  }
  else if(f1.getTime()>f2.getTime()){
    return 2; //MAYOR
  }
  else if(f1.getTime()<f2.getTime()){
    return 3; //MENOR
  }
  // else if(f1.getTime()>=f2.getTime()){
  //   return 4; //MAYOR O IGUAL
  // }
  // else if(f1.getTime()<=f2.getTime()){
  //   return 5; //MENOR E IGUAL
  // }
  
}

/*verificar password*/
function validarPassword(pass){
  var re = /^(?=.*[0-9])[a-zA-Z0-9.]{8,16}$/;
  var validado=pass.match(re);

  if(!validado){
    return false;
  }
  return true;
}

/*VALIDAR CURP*/
function curpValida(curp) {
  var re = /^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0\d|1[0-2])(?:[0-2]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$/,
  validado=curp.match(re);
    
  //Coincide con el formato general?
  if(!validado){
    return false;
  }

  if(validado[2]!=digitoVerificador(validado[1])){
    return false;
  }   
  return true; //Validado
}

//VALIDAR QUE COINCIDA EL DIGITO VERIFICADOR
function digitoVerificador(curp17){
  //Fuente https://consultas.curp.gob.mx/CurpSP/
  var diccionario  = "0123456789ABCDEFGHIJKLMNÑOPQRSTUVWXYZ",
      lngSuma      = 0.0,
      lngDigito    = 0.0;
  for(var i=0; i<17; i++){
    lngSuma= lngSuma + diccionario.indexOf(curp17.charAt(i)) * (18 - i);
  }
  lngDigito = 10 - lngSuma % 10;
  if(lngDigito == 10){
    return 0;
  }
  return lngDigito;
}

/*VALIDAR CORREO ELECTRONICO*/
function correoValido(email) {
  return /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(email); 
}
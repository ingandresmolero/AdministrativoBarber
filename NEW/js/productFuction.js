//------------------------------------------
            //Editar Stock View
//------------------------------------------

//Formula para calcular el costo promedio.

let costoP = document.getElementById('costoP_input');//Costo Promedio $:
let cantidad = document.getElementById('cantidad_input'); //existencia
let ingreso = document.getElementById('ingreso_input'); //Existencia Compra:
let montocompra = document.getElementById('costoPAnt_input'); //Costo Promedio Anterior $:
let precPvp = document.getElementById('precioPvp_input');  //pvp
let porcentUtilidad = document.getElementById('utilidad_input');  //Utilidad %

let precio2 = document.getElementById('precio2_input');
let precio3 = document.getElementById('precio3_input');

function costoPromedio() {

    let costoPromedio = Number(costoP.value);
    let cantidadStock = Number(cantidad.value);
    let ingresos = Number(ingreso.value);
    let montCompra = Number(montocompra.value);
    let prcntUtilidad = Number(porcentUtilidad.value);

    //Calculo de Costo Promedio
    let costoProm = ( (cantidadStock * costoPromedio) + (ingresos * montCompra) ) / (cantidadStock + ingresos) ;
    precPvp.value = costoProm;

    //Calculo de Utilidad en base al Precio
    let utilidadCal = 100 - ((costoProm * 100) / costoProm);
    precio2.value=utilidadCal;

    //calculo de precio en base a la utilidad
    let precioUtilidad = costoPromedio / ((100-(prcntUtilidad/100)));
    precio3.value = precioUtilidad;
  }
  
  costoP.addEventListener('input', costoPromedio);
  cantidad.addEventListener('input', costoPromedio);
  ingreso.addEventListener('input', costoPromedio);
  montocompra.addEventListener('input', costoPromedio);
  precPvp.addEventListener('input', costoPromedio);
  porcentUtilidad.addEventListener('input', costoPromedio);
//---------------------------------------------- End

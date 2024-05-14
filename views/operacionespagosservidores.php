<?php
 //SERVICIOS CLIENTES
 $queryServicios = "SELECT IFNULL(count(transacciones.invoice),0) as contador, IFNULL(SUM(cantidad),0) as cantidad , IFNULL(sum(cost),0) as monto, IFNULL(sum(propina),0) as propina, tblbarber.nombre, tblbarber.porcentaje FROM `tblassignedservice` 
 inner join tblservices on tblassignedservice.servicio = tblservices.ID 
 inner join tblbarber on tblbarber.idbarber = tblassignedservice.idbarbero 
 inner join transacciones on tblassignedservice.invoice = transacciones.invoice 
 WHERE tblbarber.nombre='$nombre' AND transacciones.estatus != 'pendiente'   AND (transacciones.fecha_creacion between '$fecha_desde' AND '$fecha_hasta')
 
 group by nombre,porcentaje;";
                 $sqlservicio = $conn->prepare($queryServicios);
                 $sqlservicio->execute();
                 $listadoservicio = $sqlservicio->fetch();
 
                 //CONSUMO PROPIO
                 $queryConsumo = "SELECT sum(saldo) as saldoconsumo FROM `consumo_interno` WHERE fecha_creacion BETWEEN '$fecha_desde' and '$fecha_hasta' and servidor='$id';";
 
                 $sqlconsumo = $conn->prepare($queryConsumo);
                 $sqlconsumo->execute();
                 $listadoconsumo = $sqlconsumo->fetch();
 
                 //VALES
                 $queryVales = "SELECT IFNULL(SUM(monto),0) as monto  FROM vales inner join tbladmin on tbladmin.ID = vales.idbarber WHERE tbladmin.AdminName='$nombre' and vales.fecha between '$fecha_desde' and '$fecha_hasta'";
                 $sqlvale = $conn->prepare($queryVales);
                 $sqlvale->execute();
                 $listadovale = $sqlvale->fetch();
 
                 //SERVICIOS ADICIONALES (SUMA A TOTAL)
                 $sumarservicio = "SELECT IFNULL(SUM(tblassignedservice_intern.monto),0) as monto_interno , IFNULL(SUM(tblassignedservice_intern.propina),0) as propina_interna FROM tblassignedservice_intern inner join consumo_interno on tblassignedservice_intern.intern = consumo_interno.intern inner join tblbarber on tblbarber.idbarber = tblassignedservice_intern.idbarbero where tblbarber.nombre = '$nombre' AND consumo_interno.fecha_creacion> '$fecha_desde' AND consumo_interno.fecha_creacion <='$fecha_hasta';";
                 $sqlserviciosadicional = $conn->prepare($sumarservicio);
                 $sqlserviciosadicional->execute();
                 $listadoservicioadicional = $sqlserviciosadicional->fetch();
 
 
 
                 $cantidad = $listadoservicio['cantidad'];
                 $monto = $listadoservicio['monto'];
                 $propinas = $listadoservicio['propina'];
                 $porcentaje = $listadoservicio['porcentaje'];
                 $saldo_consumo = $listadoconsumo['saldoconsumo'] + 0;
                 $monto_vale = $listadovale['monto'];
                 $monto_interno = $listadoservicioadicional['monto_interno'];
                 $propina_interna = $listadoservicioadicional['propina_interna'];
 

?>
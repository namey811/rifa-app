<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>


## RIFA-APP

Rifa app es una aplicacion web basada en laravel, la cual funciona para la creacion de rifas o eventos de sorteos, a continuacion un detalle de sus modulos o caracteristicas:

- Responsables: En este modulo se administra la creacion, edicion, listado y eliminacion de el reponsable de la rifa.
- Eventos: En este modulo se administra la creacion, edicion, listado y eliminacion de los eventos (Rifas) los cuales seran visibles y accesibles desde la pagina principal. Los eventos pueden definirse de 2 cifras o 3 cifras y el sistema automaticamente creara el numero correspondiente a las cifras. Por ejemplo 2 cifras (00-99), 3 cifras (000-999).
- Clientes: En este modulo administra la creacion, edicion, listado y eliminacion de los clientes que compran cada numero del evento o rifa.
- Ventas: En este modulo administra la creacion, edicion, listado y eliminacion de las ventas realizadas.
- Pagos: En este modulo administra la creacion, edicion, listado y eliminacion de los pagos recibidos.
  

## Sistema de notificacion

El sistema cuenta con un sistema de notificacion via correo electronico que utiliza la clase Maillable de Laravel, por lo tanto es necesario configurar los parametros en el archivo de ambiente. 

## Screenshots
<p><img src="/images/Home.png" width="400" alt="Pagina Principal" width="400" style="transition: transform 0.3s; cursor: pointer;" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'"></p>
<p><img src="/images/ListaNumero.png" width="400" alt="Listado de numeros disponibles" width="400" style="transition: transform 0.3s; cursor: pointer;" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'"></p>
<p><img src="/images/VentaOnline.png" width="400" alt="Venta de numero y registro de cliente" width="400" style="transition: transform 0.3s; cursor: pointer;" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'"></p>
<p><img src="/images/PostVenta.png" width="400" alt="Finalizacion de la venta" width="400" style="transition: transform 0.3s; cursor: pointer;" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'"></p>
<p><img src="/images/Notificacion.png" width="400" alt="Correo de notificacion de venta." width="400" style="transition: transform 0.3s; cursor: pointer;" onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'"></p>


## Documentacion


## Security Vulnerabilities

Si descubres una vulnerabilidad de seguridad asociada a la aplicacion, puedes enviarme un correo electronico a [inarvaez@itcloud.com.co](mailto:inarvaez@itcloud.com.co).

## Licencia

La aplicacion es de uso libre y puede ser catalogada bajo el licenciamiento [MIT license](https://opensource.org/licenses/MIT).

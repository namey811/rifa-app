<html>
    <head>
        <title>Notificacion de compra</title>
    </head>
    <body>
        <p>Estimado/a, Comprador!</p>
        <p>Le enviamos este correo electrónico para confirmar su compra en nuestro sitio web.</p>
        <p>Por favor, haga clic en el enlace de abajo para revisar su compra:</p>
        <a href="{{route('consultaventaclient', $idventa)}}">Consulta tus numeros</a>
        <h5>Puedes realizar tu pago por transferencia, lee el siguiente codigo QR: </h5>
        <a href="{{ asset('templates/niceadmin/assets/img/QR.jpg')}}" download="QR ITCloud">
            <img class="img-thumbnail" src="{{ asset('templates/niceadmin/assets/img/QR.jpg')}}" alt="QR Pagos">
        </a>
        <p>Si usted no realizó esta compra, por favor, ignore este correo electrónico y contactenos por la dirección de correo electrónico: 
            <a href="mailto:inarvaez@itcloud.com.co">inarvaez@itcloud.com.co</a>
        </p>
        <p>Atentamente,</p>
        <p>ITCloud S.A.S</p>
    </body> 
    </body>
</html>
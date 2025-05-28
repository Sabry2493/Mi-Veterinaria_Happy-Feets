<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>🐾Happy Feets Veterinaria</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        
    @import url('https://fonts.googleapis.com/css2?family=Londrina+Shadow&family=Luckiest+Guy&family=Lilita+One&family=Zain:wght@700&family=Festive&display=swap');
    
    body {
        margin:0;
        padding:0;    
        min-height: 100vh;
        background:linear-gradient(rgba(179, 35, 24, 0.94), rgba(46, 109, 44, 0.94),rgba(126, 126, 123, 0.94)); 
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
    }

    .main-wrapper {
    min-height: 100vh;
    /*Ocupa al menos el 100% de la altura de la pantalla */
    flex: 1;
    display: flex;
    flex-direction: column;
    justify-content: center;
    }
    
    .lista-mascotasfondo {
    background-image: url('<?= base_url('img/fondos/fondo2.png') ?>');
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    
    }
    .lista-amosfondo {
    background-image: url('<?= base_url('img/fondos/mascota-dueño4.png') ?>');
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
   
    }
    .lista-veterinariofondo{
    background-image: url('<?= base_url('img/fondos/dogvet.png') ?>');
    
    background-repeat: no-repeat;
    background-position: center; 
    }
    .letragral{
      font-family: "Zain", sans-serif;
      font-size: 1.6rem;
       
    }
    .btn{
       /*  background: linear-gradient(45deg,rgba(240, 238, 238, 0.64), transparent); */
        color:rgba(20, 20, 20, 0.88);
        font-size:1.1rem;
        
    }
   
    .fondocard{
      background: linear-gradient(45deg,rgba(163, 161, 161, 0.64), transparent);
      
    }
    legend{
        background: linear-gradient(45deg,rgba(134, 179, 130, 0.71), transparent);
    }
   
    #alta{
        background-image:url('<?= base_url('img/fondos/m-b.png') ?>');
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;  
        
    }
    #mostrar{
        background-image:url('<?= base_url('img/fondos/m-m.png') ?>');
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;    
    }
    #baja1{
        background-image:url('<?= base_url('img/fondos/m-a.png') ?>');
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;    
    }
    #modificar{
        background-image:url('<?= base_url('img/fondos/m-md.png') ?>');
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;  
        
    }
    #mostrarTarjetasBtn {
    background-color: rgb(163, 150, 72);
    color:white;
    font-size:1.4rem;
    cursor: pointer;
    }
    #mostrarTarjetasBtn:hover {
    background-color:rgb(54, 99, 70) !important; /* Gris oscuro */
    color: white !important; /* Cambia el texto a blanco */
    transition: 0.3s;
    }
    .botonescard{
    border: 2px grey;
    background: linear-gradient(45deg,rgb(53, 134, 46),rgb(100, 192, 13), transparent);
   
    }
    .botones2card{
    border: 2px grey;
    background: linear-gradient(45deg,rgb(202, 20, 20),rgb(221, 128, 115), transparent);
    }
    
    
    .tabla-superpuesta {
    margin-bottom: -95px; /* Subís la tabla */
    
    }
    .table {
        background-color: rgba(255, 255, 255, 0.6); /* blanco semi-transparente */
        box-shadow: 0 0 10px rgba(0,0,0,0.3);
        border-radius: 10px;
        overflow: hidden;
    }
    
    .table thead {
        background-color: rgba(0, 0, 0, 0.7) !important; /* oscuro semi-transparente */
        color: white;
    }

    .table tbody tr {
        background-color: rgba(255, 255, 255, 0.5); /* filas con fondo claro transparente */
    }

    .tablaencabezado{
         
    }
    #titulo{
            
            font-family: "Festive", cursive;
            font-weight: 400;
            font-size: 2.8rem;
            color: rgb(248, 250, 246);
            margin-left:-70px;
        }

    .navbar {
            
            background: linear-gradient(to top, rgb(131, 32, 26),rgb(231, 124, 108));
            background-image: url('<?= base_url('img/fondos/fondohuellasnav.png') ?>');
            box-shadow: 0 4px 10px rgba(0,0,0,0.2);
        }

    .navbar img {
            height: 50px;
            width: 120px;
            /* object-fit: contain; */
            margin-right: 10px;
        }

    .nav-link {
            font-family: "Lilita One", sans-serif;
            color: rgb(241, 178, 174) !important;
            font-weight: 250;
            font-size: 1.2rem;
            margin-right: -50px;
            box-shadow: 0 0px 15px rgba(97, 32, 32, 0.8);
        }

    .nav-link:hover {
            text-decoration: underline;
            text-decoration: none;
        }
    
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg"  >
       <div class="container d-flex justify-content-between align-items-center " >   
            
                <!-- Logo -->
                <a class="navbar-brand d-flex align-items-center" href="<?= base_url('/') ?>">
                    <img src="<?= base_url('img/fondos/home.png') ?>" alt="Logo" style="width: 115px;" >
                </a>        
                     
        
            <!-- Bienvenida centrada -->
            <div class="text-center flex-grow-1">
                    <span id="titulo">Bienvenidos</span>
            </div>
    
        <!-- Login que se implementara luego -->
            <div class="d-flex align-items-center">
                <!-- Botón colapsable -->
                <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarVet" >
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Enlaces -->
                <div class="collapse navbar-collapse justify-content-end" id="navbarVet">
                    <ul class="navbar-nav">
                        <?php if (session()->has('usuario_id')): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('logout') ?>">Logout</a>
                            </li>
                        <?php else: ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url('login') ?>">Login</a>
                                <!-- <a class="nav-link" href="#tarjetas">Login</a> -->
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
<div class="main-wrapper flex-fill"><!--  cambio 2:Nuevo contenedor -->

<?php
    @session_start();

    // if(@$session['nivel_usuario'] == null || @$session['nivel_usuario'] != 'administrador'){
    //     echo "<script>alert('Usuário não autenticado!')</script>";
    //     echo "<script>windonw.location='../index.php'</script>";
    // }
    $pag = @$_GET['pag'];
    $menu1 = "agenda";
   
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.3/css/dataTables.dataTables.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-MXe5EK5gyK+fbhwQy/dukwz9fw71HZcsM4KsyDBDTvMyjymkiO0M5qqU0lF4vqLI4VnKf1+DIKf1GM6RFkO8PA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/styles_calendar.css">

</head>

<body>
    <div>
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand" href="#">Sistema</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?pag=<?php echo $menu1; ?>">Agenda</a>
                </li>
                
            </ul>
            <div>
                <span class="text-light mr-3"><?php echo "Usuário: " . @$_SESSION['nome_usuario']; ?></span>
                <a class="text-danger" href="../logout.php">Sair</a>
            </div>
  </div>
</nav>
        </header>
        <section class="conteudo">
            <?php
                if($pag == null){
                    include_once("home.php");
                }else if($pag == $menu1){
                    include_once($menu1 . ".php");
                }else{
                    include_once("home.php");
                }
            ?>
        </section>
    </div>

    <script src="https://cdn.datatables.net/2.3.3/js/dataTables.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

    
    
    <script src="../js/scripts.js"></script>

    <script src="../js/mascara.js"></script>

    <script src="../fullcalendar/dist/index.global.min.js"></script>
    
    <script src="../fullcalendar/packages/core/locales/pt-br.global.js"></script>

    <script src="../js/scripts_calendar.js"></script>

</body>
</html>
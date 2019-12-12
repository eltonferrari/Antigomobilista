<?php 
    session_start();
    if (!isset($_SESSION['valid'])) {
        header('Location: ../../login_register/login.php');
    }
?>
<html lang="pt-BR">
    <head>
        <title>Início</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" 
              content="IE=edge">
        <meta name="viewport" 
              content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Lobster&display=swap" 
              rel="stylesheet"> 
        <link rel="stylesheet" 
              href="../../assets/css/style.css"> ​
        <link rel="stylesheet" 
              href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    </head>
    <body>
        <?php 
            include '../template/menu.php';        
        ?>
        <div class="col-md-12">
            <div class="col-md-4 tit">
                MINHAS IMAGENS
                <a href="../posts/add.php" 
                   title="Adicionar novas fotos">
                    <span class="glyphicon
                                 glyphicon-plus"></span>
                    Adicionar
                    <span class="glyphicon
                                 glyphicon-plus"></span>
                    <br />
                    <br />
                </a>
                <div id="carousel-example-generic" 
                     class="carousel slide" 
                     data-ride="carousel">
                    <?php
                        $activeControl = 2;
                        $iduser = $_SESSION['iduser']
                    ?>
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" 
                         role="listbox">
                        <?php
                            $activeControl = 2;
                            $result = "select * from posts where iduser=". $iduser . " order by created_at ASC";
                            $res = mysqli_query($conection, $result);
                            while ($row_carousel = mysqli_fetch_assoc($res)) {
                                if ($activeControl == 2) {
                        ?>
                                    <div class="item active">
                                        <div class="gallery">
                                            <a href="../posts/view_one.php?idpost=<?php 
                                                                             echo $row_carousel['idpost'];
                                                                         ?>">
                                                <img class="img-responsive" 
                                                     src="../../images/posts/<?php 
                                                                                 echo $row_carousel['image'];
                                                                             ?>">
                                            </a>
                                        </div>
                                    </div>
                        <?php
                                    $activeControl = 1;
                                } else {
                        ?>
                                    <div class="item">
                                        <div class="gallery">
                                            <a href="../posts/view_one.php?idpost=<?php 
                                                                             echo $row_carousel['idpost'];
                                                                         ?>">
                                                <img class="img-responsive" 
                                                     src="../../images/posts/<?php 
                                                                                 echo $row_carousel['image'];
                                                                             ?>">
                                            </a>
                                        </div>
                                    </div>
                        <?php
                                }
                            }
                        ?>					
                    </div>
                    <!-- Controls -->
                    <a class="left carousel-control" 
                       href="#carousel-example-generic" 
                       role="button" 
                       data-slide="prev">
                        <span class="glyphicon 
                                     glyphicon-chevron-left" 
                              aria-hidden="true"></span>
                        <span class="sr-only">
                            Previous
                        </span>
                    </a>
                    <a class="right carousel-control" 
                       href="#carousel-example-generic" 
                       role="button" 
                       data-slide="next">
                        <span class="glyphicon 
                                     glyphicon-chevron-right" 
                                     aria-hidden="true"></span>
                        <span class="sr-only">
                            Next
                        </span>
                    </a>
                </div>
            </div>
            <div class="col-md-4">
                <br />
                Eventos
                <br />
                <br />
                </div>
                <div id="carousel-example-generic-event" 
                     class="carousel slide" 
                     data-ride="carousel">
                    <?php
                        $actCont = 2;
                        $iduser = $_SESSION['iduser']
                    ?>
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" 
                         role="listbox">
                        <?php
                            $actCont = 2;
                            $result = "select * from events order by date ASC";
                            $resEvent = mysqli_query($conection, $result);
                            while ($row_carouselEvent = mysqli_fetch_assoc($resEvent)) {
                                if ($actCont == 2) {
                        ?>
                                    <div class="item active">
                                        <div class="gallery">
                                            <a href="../events/view.php?idevent=<?php 
                                                                             echo $row_carouselEvent['idevent'];
                                                                         ?>">
                                                <img class="img-responsive" 
                                                     src="../../images/events/<?php 
                                                                                 echo $row_carouselEvent['image'];
                                                                             ?>">
                                            </a>
                                        </div>
                                    </div>
                        <?php
                                    $actCont = 1;
                                } else {
                        ?>
                                    <div class="item">
                                        <div class="gallery">
                                            <a href="../events/view.php?idevent=<?php 
                                                                             echo $row_carouselEvent['idevent'];
                                                                                ?>">
                                                <img class="img-responsive" 
                                                     src="../../images/events/<?php 
                                                                                 echo $row_carouselEvent['image'];
                                                                              ?>">
                                            </a>
                                        </div>
                                    </div>
                        <?php
                                }
                            }
                        ?>					
                    </div>
                    <!-- Controls -->
                    <a class="left carousel-control" 
                       href="#carousel-example-generic-event" 
                       role="button" 
                       data-slide="prev">
                        <span class="glyphicon 
                                     glyphicon-chevron-left" 
                              aria-hidden="true"></span>
                        <span class="sr-only">
                            Anterior
                        </span>
                    </a>
                    <a class="right carousel-control" 
                       href="#carousel-example-generic-event" 
                       role="button" 
                       data-slide="next">
                        <span class="glyphicon 
                                     glyphicon-chevron-right" 
                                     aria-hidden="true"></span>
                        <span class="sr-only">
                            Próximo
                        </span>
                    </a>
                </div>
            </div>
            <div class="col-md-4">
                <br />
                Vendas
                <br />
                </div>
                <a href="../posts/add.php" 
                   title="Adicionar novas fotos">
                    <span class="glyphicon
                                 glyphicon-plus"></span>
                    Adicionar
                    <span class="glyphicon
                                 glyphicon-plus"></span>
                    <br />
                    <br />
                </a>
                <?php
                    $result = mysqli_query($conection, "select * from posts where sell=1 order by created_at ASC");
                    while ($res = mysqli_fetch_assoc($result)) {
                ?>
                        <div class="box-detail">
                            <div class="box-inner box-color">
                                <a href="../posts/view_one.php?idpost=<?php 
                                                                 echo $res['idpost'];
                                                             ?>">
                                    <img class="img-responsive" 
                                         src="../../images/posts/<?php 
                                                                     echo $res['image'];
                                                                 ?>">
                                </a>
                            </div>
                        </div>
                <?php
                    }
                ?>                
            </div>
        </div>
    </body>
</html>
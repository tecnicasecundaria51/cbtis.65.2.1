<div>
        <div class="col-12 text-center">
            <?php if ($_SESSION['rol'] == 1 || $_SESSION['rol'] == 1) { ?>
                <a class="btn btn-danger col-3" href="../logout.php">
                    <h1 class="">cerrar sesion</h1>
                </a>
            <?php } ?>
        </div>
        <div class="container col-12 text-center my-5">
            <!-- bg-success -->
            <div class="row m-auto w-100 bg-primary A-E">
                <!-- bg-danger -->
                <h1 class="h1 fs-1 cbtis">AVISOS</h1>
                <?php while ($row = mysqli_fetch_assoc($respuesta)) { ?>
                    <div class="col-sm-11 col-md-11 col-lg-3 my-3 p-2 m-auto">
                        <!-- bg-dark -->
                        <div class="card card-r bg-red w-100 m-auto">
                            <h5 class="card-header text-light fs-3"><?= $row['title'] ?></h5>
                            
                            <?php if($row['imgen']){ ?>
                                <a target="_blank" download="<?= $row['nombre_img']?>" href="data:<?= $row['tipo_img']; ?>;base64,<?php echo base64_encode($row['imgen']); ?>" target="_blank">
                                    
                                <img 
                                src="data:<?= $row['tipo_img']; ?>;base64,<?php echo base64_encode($row['imgen']); ?>" class="img img-fluid " alt="...">
                            </a>
                                
                                <?php }else{ ?>
                                    <p>
                                        <img   src="img/perrito2.webp" class="img" alt=".arc">
                                    </p>                          
                                    
                                <?php }?>
                            <hr>
                            <div class="card-body">
                                <p class="card-text text-light"><?= $row['contenido'] ?></p>
                                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                <div class="row my-5 m-auto">
                                    <a target="_blank" href="<?= $row['url'] ?>" class="btn btn-primary col-5 m-auto">Link</a>
                                <?php if($row['imgen']){ ?>
                                    <a target="_blank" download="<?= $row['nombre_img']?>" 
                                    href="data:<?= $row['tipo_img']; ?>;base64,<?php echo base64_encode($row['imgen']); ?>" 
                                     class="btn btn-success col-5 m-auto" target="_blank">
                                    Descargar
                                    </a>
                                <?php }?>
                                
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    
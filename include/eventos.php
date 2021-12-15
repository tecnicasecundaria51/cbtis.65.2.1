<div>
        <div class="container col-12 text-center my-5">
            <!-- bg-success -->
            <div class="row m-auto w-100 bg-primary A-E">
                <!-- bg-danger -->
                <h1 class="h1 fs-1 cbtis">EVENTOS</h1>
                <?php while ($row = mysqli_fetch_assoc($res)) { ?>
                    <div class="col-sm-11 col-md-11 col-lg-3 my-3 p-2 m-auto">
                        <!-- bg-dark -->
                        <div class="card card-r w-100 m-auto">
                            <h5 class="card-header text-light fs-3"><?= $row['title'] ?></h5>
                            <?php if($row['imgen']){ ?>
                                <a target="_blank" download="imagen.jpg" href="data:<?= $row['tipo_img']; ?>;base64,<?php echo base64_encode($row['imgen']); ?>" target="_blank">
                                    
                                <img 
                                src="data:<?= $row['tipo_img']; ?>;base64,<?php echo base64_encode($row['imgen']); ?>" class="img img-fluid" alt="...">
                            </a>
                                
                                <?php }else{ ?>
                                    <p>
                                        <img   src="img/perrito2.webp" class="img " alt=".arc">
                                    </p>                          
                                    
                                <?php }?>
                            <hr>
                            <div class="card-body">
                                <p class="card-text text-light"><?= $row['contenido'] ?></p>
                                <div class="row my-5 m-auto">
                                    <a target="_blank" href="<?= $row['url'] ?>" class="btn btn-outline-danger col-5 m-auto">Link</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
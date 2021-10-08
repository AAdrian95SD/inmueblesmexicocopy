<?php
require 'estilos.php';
require 'header.view.php';

?>
<!--  BEGIN CONTENT AREA  -->
<div id="content" class="main-content">
    <div class="layout-px-spacing">

        <div class="page-header">
            <div class="page-title">
                <h2>Agregar fotos</h2>
            </div>
            <a href="<?php echo RUTA ?>propiedades.php" class="btn btn-dark  mb-4 mr-2 btn-lg">Atrás</a>
        </div>

        <div class="container">
            <div clas="row">
                <form method="post" action="" autocomplete="off">
                    <div id="flFormsGrid" class="col-lg-12 layout-spacing">

                        <div class="statbox widget box box-shadow">
                            <div id="tituloForm">
                                <div class="row">
                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                        <h4 id="tituloFrom">Información básica</h4>
                                    </div>
                                </div>
                            </div>
                            <div id="fondoBlanco">
                                <div class="custom-file-container" data-upload-id="myFirstImage">
                                    <label>Subir foto (Un archivo) <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                                    <label class="custom-file-container__custom-file">
                                        <input type="file" name="fileUpload" class="custom-file-container__custom-file__custom-file-input" accept="image/*" id="chooseFile">
                                        <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                                        <span class="custom-file-container__custom-file__custom-file-control">Elegir foto</span>
                                    </label>
                                    <div class="custom-file-container__image-preview"></div>
                                </div>
                                <input type="submit" class="btn btn-dark mb-4 mr-2" name="submit" value="Agregar" />
                            </div>

                            <?php if (!empty($resMessage)) { ?>
                                <div class="alert <?php echo $resMessage['status'] ?>">
                                    <?php echo $resMessage['message'] ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    </form>
</div>
</div>
</div>

<!--  END CONTENT AREA  -->
</div>
</div>
<?php
require 'footer.view.php';
?>
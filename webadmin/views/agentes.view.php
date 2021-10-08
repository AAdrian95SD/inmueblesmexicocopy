<?php
require 'estilos.php';
require 'header.view.php';

?>
<!--  BEGIN CONTENT AREA  -->
<div id="content" class="main-content">
    <div class="layout-px-spacing">

        <div class="page-header">
            <div class="page-title">
                <h2>Lista de agentes</h2>
            </div>
        </div>
        <a href="<?php echo RUTA?>agregar-propiedad.php" class="btn btn-dark  mb-4 mr-2 btn-lg">Agregar agente</a>
        <div class="layout-px-spacing">

            <div class="row layout-top-spacing" id="cancel-row">

                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="widget-content widget-content-area br-6">
                        <div class="table-responsive mb-4 mt-4">
                            <table id="zero-config" class="table table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Correo electrónico</th>
                                        <th>Teléfono</th>
                                        <th>Recamaras</th>
                                        <th>Baños</th>
                                        <th class="no-content"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($respuesta as $elemento) : ?>
                                        <tr>
                                            <td><?php echo $elemento[1] ?></td>
                                            <td><?php echo $elemento[2] ?></td>
                                            <td><?php echo $elemento[4] ?></td>
                                            <td><?php echo $elemento[5] ?></td>
                                            <td><?php echo $elemento[12] ?></td>
                                            <td><?php echo $elemento[13] ?></td>
                                            <td><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle table-cancel">
                                                    <circle cx="12" cy="12" r="10"></circle>
                                                    <line x1="15" y1="9" x2="9" y2="15"></line>
                                                    <line x1="9" y1="9" x2="15" y2="15"></line>
                                                </svg></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!--  END CONTENT AREA  -->
    </div>
</div>
<?php
require 'footer.view.php';
?>
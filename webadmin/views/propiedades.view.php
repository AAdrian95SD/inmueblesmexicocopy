<?php
require 'estilos.php';
require 'header.view.php';

?>
<!--  BEGIN CONTENT AREA  -->
<div id="content" class="main-content">
    <div class="layout-px-spacing">

        <div class="page-header">
            <div class="page-title">
                <h2>Lista de propiedades</h2>
            </div>
        </div>
        <?php  if (isset($_SESSION['Error'])) { ?>
            <div class="alert alert-danger"> <?php echo $_SESSION['Error'] ?> </div>
        <?php  unset($_SESSION['Error']); } ?>
        <?php if (isset($_SESSION['success'])) { ?>
            <div class="alert alert-success"> <?php echo $_SESSION['success'] ?> </div>
        <?php unset($_SESSION['success']); } ?>
        <a href="<?php echo RUTA?>agregar-propiedad.php" class="btn btn-dark  mb-4 mr-2 btn-lg">Agregar propiedad</a>
        <div class="layout-px-spacing">

            <div class="row layout-top-spacing" id="cancel-row">

                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="widget-content widget-content-area br-6">
                        <div class="table-responsive mb-4 mt-4">
                            <table id="zero-config" class="table table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Titulo</th>
                                        <th>Venta/Renta</th>
                                        <th>Tipo</th>
                                        <th>Calle</th>
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
                                            <td><?php echo $elemento[3] ?></td>
                                            <td><?php echo $elemento[7] ?></td>
                                            <td><?php echo $elemento[12] ?></td>
                                            <td><?php echo $elemento[13] ?></td>
     
                                            <td class="text-center">
                                                        <ul class="table-controls">
                                                            <li><a href="agregar-fotos.php?<?php echo $elemento[0]?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-camera"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg></a></li>
                                                            <li><a href="editar-propiedad.php?Id=<?php echo $elemento[0]?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 text-success"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a></li>
                                                            <li><a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 text-danger"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></a></li>
                                                        </ul>
                                            </td>                                            
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
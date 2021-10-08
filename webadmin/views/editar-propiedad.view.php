<?php
require 'estilos.php';
require 'header.view.php';

?>
<!--  BEGIN CONTENT AREA  -->
<div id="content" class="main-content">
    <div class="layout-px-spacing">

        <div class="page-header">
            <div class="page-title">
                <h2>Editar propiedad</h2>
            </div>
            <a href="<?php echo RUTA ?>propiedades.php" class="btn btn-dark  mb-4 mr-2 btn-lg">Atrás</a>
        </div>

        <div class="container">
            <div clas="row">
                <form method="post" action="../utils.php" autocomplete="off">
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
                                <div class="form-group mb-4">
                                    <label for="inputAddress">Titulo de la propiedad</label>
                                    <input type="text" class="form-control" id="inputAddress" name="title">
                                </div>
                                <div class="form-row mb-4">
                                    <div class="form-group col-md-6">
                                        <label for="inputState">Estatus</label>
                                        <select id="inputState" class="form-control" name="estatus">
                                            <option selected>Elegir...</option>
                                            <option value="Venta">Venta</option>
                                            <option value="Renta">Renta</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputState">Tipo</label>
                                        <select id="inputState" class="form-control" name="tipo">
                                            <option selected>Elegir...</option>
                                            <option>Casa</option>
                                            <option>Comercial</option>
                                            <option>Terreno/Lote</option>
                                            <option>Oficina</option>
                                            <option>Casa en condominio</option>
                                            <option>Bodega</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-row mb-4">
                                    <div class="form-group col-md-4">
                                        <label for="inputEmail4">Precio</label>
                                        <input type="text" class="form-control" id="inputEmail4" data-unit="MXN" placeholder="00000 MXN" name="precio">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputEmail4">Superficie construcción</label>
                                        <input type="text" class="form-control" id="inputEmail4" placeholder="00000" name="superficie">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputEmail4">Superficie total</label>
                                        <input type="text" class="form-control" id="inputEmail4" placeholder="00000" name="superficie_total">
                                    </div>
                                </div>
                                <div class="form-row mb-4">
                                    <div class="form-group col-md-4">
                                        <label for="inputState">Garages</label>
                                        <select id="inputState" class="form-control"  name="cuartos">
                                            <option selected>Elegir...</option>
                                            <option>0</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                            <option>Mas de 5</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div id="flFormsGrid" class="col-lg-12 layout-spacing">
                <div class="statbox widget box box-shadow">

                    <div id="tituloForm">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4 id="tituloFrom">Ubicación</h4>
                            </div>
                        </div>
                    </div>

                    <div id="fondoBlanco">
                        <div class="form-row mb-4">
                            <div class="form-group col-md-6">
                                <label for="inputState">Estado</label>
                                <select id="inputState" class="form-control" name="estado">
                                    <option selected>Elegir...</option>
                                    <?php
                                    foreach ($estados as $estado) {
                                        print '<option value="' . $estado[0] . '">' . $estado[1] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Código postal</label>
                                <input type="text" class="form-control" id="inputEmail4" placeholder="00000" name="codigopostal">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Calle</label>
                                <input type="text" class="form-control" id="inputEmail4" placeholder="Dirección" name="calle">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputState">Municipio</label>
                                <select id="inputState" class="form-control" name="municipio">
                                    <option selected>Elegir...</option>
                                    <?php
                                    foreach ($municipios as $municipio) {
                                        print '<option value="' . $municipio[0] . '">' . $municipio[1] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Latitud</label>
                                <input type="text" class="form-control" id="inputEmail4" placeholder="Lat" name="lat">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Longitud</label>
                                <input type="text" class="form-control" id="inputEmail4" placeholder="Long" name="lang">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="flFormsGrid" class="col-lg-12 layout-spacing">
                <div class="statbox widget box box-shadow">

                    <div id="tituloForm">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4 id="tituloFrom">Información</h4>
                            </div>
                        </div>
                    </div>

                    <div id="fondoBlanco">
                        <div class="form-group mb-4">
                            <label for="exampleFormControlTextarea1">Descripción</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="descripcion" required></textarea>
                        </div>
                        <div class="form-row mb-4">
                            <div class="form-group col-md-6">
                                <label for="inputState">Recamaras</label>
                                <select id="inputState" class="form-control" name="recamaras">
                                    <option selected>Elegir...</option>
                                    <option>0</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputState">Baños</label>
                                <select id="inputState" class="form-control" name="banos">
                                    <option selected>Elegir...</option>
                                    <option>0</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="flFormsGrid" class="col-lg-12 layout-spacing">
                <div class="statbox widget box box-shadow">

                    <div id="tituloForm">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4 id="tituloFrom">Contacto</h4>
                            </div>
                        </div>
                    </div>

                    <div id="fondoBlanco">
                        <div class="form-row mb-4">
                            <div class="form-group col-md-6">
                                <label for="inputState">Agente</label>
                                <select id="inputState" class="form-control"  name="agente">
                                    <option selected>Elegir...</option>
                                    <?php
                                    foreach ($agentes as $field) {

                                        print '<option value="' . $field[0] . '">' . $field[1] . ' ' . $field[2] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputState">Inmobiliaria</label>
                                <select id="inputState" class="form-control" name="inmobiliaria">
                                    <option selected>Elegir...</option>
                                    <?php
                                    foreach ($inmobiliarias as $field) {
                                        if ($usuario[0][11] == $field[0]) {
                                            print '<option value="' . $field[0] . '">' . $field[1] . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>                       
                    </div>                    
                </div>               
            </div>
            <input type="submit" class="btn btn-dark btn-block mb-4 mr-2" name="submit" value="Crear"/>
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
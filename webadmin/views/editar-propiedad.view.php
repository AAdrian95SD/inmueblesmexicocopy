<?php
require 'estilos.php';
require 'header.view.php';

?>
<?php foreach ($usuario as $estado) { $idInmob = $estado[11]; $idUSer = $estado[12];} ?>
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
                                    <input type="hidden" class="form-control" id="inputAddress" value="<?php echo $DataPropiedad[0][0]; ?>" name="id">
                                    <input type="text" class="form-control" id="inputAddress" value="<?php echo $DataPropiedad[0][1]; ?>" name="title">
                                </div>
                                <div class="form-row mb-4">
                                    <div class="form-group col-md-6">
                                        <label for="inputState">Estatus</label>
                                        <select id="inputState" class="form-control" name="estatus">
                                            <option selected value="<?php echo $DataPropiedad[0][2]; ?>"><?php echo $DataPropiedad[0][2]; ?></option>
                                            <option value="Venta">Venta</option>
                                            <option value="Renta">Renta</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputState">Tipo</label>
                                        <select id="inputState" class="form-control" name="tipo">
                                            <option selected value="<?php echo $DataPropiedad[0][3]; ?>"><?php echo $DataPropiedad[0][3]; ?></option>
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
                                        <input type="text" class="form-control" value="<?php echo $DataPropiedad[0][4]; ?>" id="inputEmail4" data-unit="MXN" placeholder="00000 MXN" name="precio">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputEmail4">Superficie construcción</label>
                                        <input type="text" class="form-control" id="inputEmail4" value="<?php echo $DataPropiedad[0][5]; ?>" placeholder="00000" name="superficie">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputEmail4">Superficie total</label>
                                        <input type="text" class="form-control" id="inputEmail4" value="<?php echo $DataPropiedad[0][15]; ?>" placeholder="00000" name="superficie_total">
                                    </div>
                                </div>
                                <div class="form-row mb-4">
                                    <div class="form-group col-md-4">
                                        <label for="inputState">Garages</label>
                                        <select id="inputState" class="form-control"  name="cuartos">
                                            <option selected value="<?php echo $DataPropiedad[0][6]; ?>"><?php echo $DataPropiedad[0][6]; ?></option>
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
                                <select id="inputEstado" class="form-control" name="estado">
                                    <option selected value="<?php echo $estados[0][0]; ?> "><?php echo $estados[0][1]; ?></option>
                                    <?php
                                    foreach ($AllEstados as $estado) { 
                                        print '<option value="' . $estado[0] . '">' . $estado[1] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Código postal</label>
                                <input type="text" class="form-control" id="inputEmail4" placeholder="00000" value="<?php echo $DataPropiedad[0][10]; ?>" name="codigopostal">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Calle</label>
                                <input type="text" class="form-control" id="inputEmail4" value="<?php echo $DataPropiedad[0][7]; ?>" placeholder="Dirección" name="calle">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputState">Municipio</label>
                                <select id="inputMunicipio" class="form-control" name="municipio"> 
                                    <option selected value="<?php echo $estados[0][2]; ?> "><?php echo $estados[0][3]; ?></option>
                                    <?php
                                    foreach ($municipios as $municipio) {
                                        print '<option value="' . $municipio[0] . '">' . $municipio[1] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Latitud</label>
                                <input type="text" class="form-control" id="inputEmail4"value="<?php echo $DataPropiedad[0][18]; ?>" placeholder="Lat" name="lat">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Longitud</label>
                                <input type="text" class="form-control" id="inputEmail4" placeholder="Long" value="<?php echo $DataPropiedad[0][19]; ?>" name="lang">
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
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="descripcion"  required><?php echo $DataPropiedad[0][11]; ?></textarea>
                        </div>
                        <div class="form-row mb-4">
                            <div class="form-group col-md-6">
                                <label for="inputState">Recamaras</label>
                                <select id="inputState" class="form-control" name="recamaras">
                                    <option selected value="<?php echo $DataPropiedad[0][12]; ?>"><?php echo $DataPropiedad[0][12]; ?></option>
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
                                    <option selected value="<?php echo $DataPropiedad[0][13]; ?>"><?php echo $DataPropiedad[0][13]; ?></option>
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
            <div id="flFormsGridC" class="col-lg-12 layout-spacing" style="display: none;">
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
            <input type="submit" class="btn btn-dark btn-block mb-4 mr-2" name="submit" value="Actualizar"/>
            </form> 
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">  
    $(document).ready(function () {
        MostrarContactForm();
    }); 
    //alert("hola mundo");
    $('#inputEstado').change(function(){  
                     debugger 
        var  type_ = $("#inputEstado").val();  
            $('option', '#inputMunicipio').remove();
            $.ajax({
                type: "GET",
                url: "../GetMunicipio.php?Id="+type_, 
                success: function(data){ 
                    console.log(data);  var i;
                     debugger 
                    $('#inputMunicipio').append('<option value="0">Selecciona un municipio</option>');
                    var opts = $.parseJSON(data); 
                    $.each(opts, function(i, d) { 
                        $('#inputMunicipio').append('<option value="' + d.id + '">' + d.nombre + '</option>');
                    });  
                }
            }); 
    }); 

    function MostrarContactForm(){
        var  type = "<?php echo $idInmob; ?>"; 
        //alert(type)
        var element = document.getElementById("flFormsGridC");
        if (type == '0') {
            element.style.display='none';
        }else {  
            element.style.display='block'; 
        } 
    }
</script> 
<!--  END CONTENT AREA  -->
</div>
</div>
<?php
    require 'footer.view.php';
?>
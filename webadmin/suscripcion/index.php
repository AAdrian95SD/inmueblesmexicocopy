<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inmuebles en México</title>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script><!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
* {
  box-sizing: border-box;
}

.columns {
  float: left;
  width: 30.3%;
  padding: 12px;
}

.price {
  list-style-type: none;
  border: 1px solid #eee;
  margin: 0;
  padding: 0;
  -webkit-transition: 0.3s;
  transition: 0.3s;
}

.price:hover {
  box-shadow: 0 8px 12px 0 rgba(0,0,0,0.2)
}

.price .header {
  background-color: #00283a;
  color: white;
  font-size: 25px;
}

.price li {
  border-bottom: 1px solid #eee;
  padding: 20px;
  text-align: center;
}

.price .grey {
  background-color: #eee;
  font-size: 20px;
}

.button {
  background-color: #04AA6D;
  border: none;
  color: white;
  padding: 10px 25px;
  text-align: center;
  text-decoration: none;
  font-size: 18px;
}
#logo{
    background: none repeat scroll 0 0 #00283a;
    
     
}
@media only screen and (max-width: 600px) {
  .columns {
    width: 100%;
  }
}
</style>
</head>  
<body>
<div id="logo" > 
    <div class="row">
        <div class="col-4" style="text-align:right">    
            <img src="../img_dir/inmobiliarias/inmuebles_mexico_ico.png" alt="">
        </div>
        <div class="col-6" style="color: white">
        <br>
            <h1>INMUEBLES EN MÉXICO</h1>
            <p>ASEGURAMOS TU BIENESTAR CON NUESTRA EXPERIENCIA</p>
        </div>
        <div class="col-2">     
        </div> 
    </div>
</div>
<br>
<h1  style="text-align:center">Subcribete eligiendo un plan tu medida </h1>
<br>
<div class="container">
<?php
    $i =0;
    foreach ($Planes as $dato) { 
?> 
    <div class="columns">
        <ul class="price">
            <li class="header"> <?php echo $dato[1]; ?></li>
            <li class="grey">$ <?php echo  number_format($dato[3],2);?><?php if($dato[2] == 1 ){ echo " / Mes"; }else{ echo  "<br>".$dato[2]; } ?> </li>
            <li><b> <?php $da = substr($dato[4], 0, 1); if($da>0){ echo "Publica de ".$dato[4]." Propiedades"; }else{ echo $dato[4];}?> </b></li> 
            <li style="text-align: left;"> 
                <?php
                  if($dato[6] != ""){
                    echo "<li style='text-align: left;'>";
                    echo $dato[6];
                    echo "</li>";
                  }
                ?>   
            </li> 
            <li class="grey"> 
                <a href="<?php echo RUTA ?>suscripcion/checkout.php?code=<?php echo $dato[5]; ?>&id_=<?php echo $dato[0]; ?>" class="button">Subscribe</a>
            </li>
        </ul>
    </div>
<?php  
    }
?>  

</div> 
</body><!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>
                  
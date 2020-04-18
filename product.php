<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Details sur l'article</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="fancybox/jquery.fancybox.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> 
    <link rel="stylesheet" href="style2.css" />
    <link rel="icon" href="./assets/slogot.png">

    <style>
      
    </style>
    
  </head>
    <div class="black-head">YOUR ONLINE VINTAGE THRIFT STORE</div>

    <div class="header" style="
        background-color: #f5eace;

        display: flex;
        position: absolute;
        top: 5vh;
        left: 0vw;
        padding:0 5vw;
        margin: 0;
        width: 100%;
        justify-content: space-between;
        border-bottom:1px solid black;
        align-items: center;">
        <div><img id="menu" class="menu" src="assets/menu.png" alt="menu" /></div>  
        <div><a href="./index.php"><img id="logo" src="assets/logo.png" alt="logo" /></a></div>        
            <div>
                <a href="./cart.php"><img class="menu" src="assets/bag.png" alt="bag" id="bag"/></a>
            </div>   
    </div>
     <div>
        <ul class="menu-list" id="menu-list">
                <li>CONTACT</li>
                <li>THRIF</li>
                <li>NOUVEAUTE</li>
                <li>HOME</li>
        </ul>
    </div>
  <body>

    <div class="bod">
          <div class="gallery clearfix">
                <div class="pics clearfix">
                  <div class="thumbs">
                <?php
                    session_start();
                    $item_id = $_GET['id'];
                    $con = mysqli_connect("localhost","root","");
                    mysqli_select_db($con,"flippedshop");
                    $query = "SELECT `id`,`name`, `price`, `image`,`image1`,`image2`,`image3`,`image4`,`image5`,`description`,`brand`,`size`,`instock` FROM `store` where id='$item_id'";
	                $queryfire = mysqli_query($con, $query);
                    $num = mysqli_num_rows($queryfire);
                    
                    if($num > 0){
                        while($product = mysqli_fetch_array($queryfire)){
                  ?>
                
        
              <div class="preview"> <a href="" class="selected" data-full="<?php echo $product['image1'];  ?>" data-title="Title 1"> <img class="sml" src="<?php echo $product['image1'];  ?>"/> </a> </div>
              <div class="preview"> <a href="" class="selected" data-full="<?php echo $product['image2'];  ?>" data-title="Title 2"> <img class="sml" src="<?php echo $product['image2'];  ?>"/> </a> </div>
              <div class="preview"> <a href="" class="selected" data-full="<?php echo $product['image3'];  ?>" data-title="Title 3"> <img class="sml" src="<?php echo $product['image3'];  ?>"/> </a> </div>
              <div class="preview"> <a href="" class="selected" data-full="<?php echo $product['image4'];  ?>" data-title="Title 3"> <img class="sml" src="<?php echo $product['image4'];  ?>"/> </a> </div>
              <div class="preview"> <a href="" class="selected" data-full="<?php echo $product['image5'];  ?>" data-title="Title 3"> <img class="sml" src="<?php echo $product['image5'];  ?>"/> </a> </div>
            </div>
          <a href="<?php echo $product['image'];  ?>" class="full" title="Title 1"> 
          <img class="ful" src="<?php echo $product['image'];  ?>"> </a> 
        </div>
          
        </div>
        <div class="text_details">
                            <span class="d-p-name"><?php echo $product['name']; ?></span>
                            <span><?php echo $product['description'];  ?></span>
                            <span class="d-p-price"><b>Price: </b><?php echo $product['price'];  ?></span>
                            <span><b>Brand : </b><?php echo $product['brand'];  ?></span>
                            <span><b>Size : </b> <?php echo $product['size'];  ?></span>
                            <span><b>Couleur : </b> <?php echo $product['size'];  ?></span>
                            <span><b>Etat d'article : </b> <?php echo $product['size'];  ?></span>

                            <form method="post" id="frm">
                                <input type="submit" id="add-to-cart"  name="test" value="Ajouter au panier"></input>  
                                <a href="./cart.php"><img src="assets/bag.png" alt="bag" id="view-bag"/></a>
                            </form>
                            <a href="./index.php#store" class="continue"> <img id="back" src="./assets/icon.png" alt="back">  Continuer mon shopping</a>
                            <?php 
                                if (isset($_POST['test'])) {
                                     $namem=$product['name'];
                                     $price=$product['price'];
                                     $imagen=$product['image'];

                                     $sql = "INSERT INTO cart (nameu, price, photo) VALUES ('$namem', '$price', '$imagen')";
                                     if (mysqli_query($con, $sql)) {
                                         echo '<script type="text/javascript">
                                            document.getElementById("add-to-cart").disabled = true;
                                            document.getElementById("add-to-cart").style.color = "black";
                                            document.getElementById("add-to-cart").style.background = "#f5eace";
                                            document.getElementById("add-to-cart").style.border = "2px solid black";
                                            document.getElementById("add-to-cart").value="Article ajoutée"
                                         </script>';
                                        
                                     } else {
                                        echo "Error: " . $sql . "<br>" . mysqli_error($con);
                                     }
                                     $con->close();

                                }
                            ?>
                 
          </div>
           <?php		
                        }
                    }
                ?>
                <div class="ads">
                            <!-- <img src="assets/Pub.png" alt="ad"> -->
                        </div>
    </div>     

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="fancybox/jquery.fancybox.js"></script> 

    <script>
        $(document).ready(function(){

        $(".preview a").on("click", function(){
        $(".selected").removeClass("selected");
        $(this).addClass("selected");
        var picture = $(this).data();

        event.preventDefault(); //prevents page from reloading every time you click a thumbnail

        $(".full img").fadeOut( 100, function() { 
        $(".full img").attr("src", picture.full);
        $(".full").attr("href", picture.full);
        $(".full").attr("title", picture.title);

        }).fadeIn();

        });// end on click

        $(".full").fancybox({
        helpers : {
        title: {
        type: 'inside'
        }
        },
        closeBtn : true,
        });

        });//end doc ready


        const lista=document.getElementById("menu");
                lista.addEventListener("click",()=>{
                    const x=document.getElementById("menu-list");
                    if (x.style.visibility === "visible") {
                        x.style.visibility = "hidden";
                        lista.style.transform=" rotate(0deg)";
                        
                    } else {
                        x.style.visibility = "visible";
                        lista.style.transform=" rotate(90deg)";
                }
            });

    </script>
  </body>
</html>
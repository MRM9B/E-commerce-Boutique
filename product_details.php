<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleo.css" />
    <title>Product</title>
</head>
<body>
    <div class="black-head">YOUR ONLINE VINTAGE THRIFT STORE</div>

    <div class="header" style="

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
                    <div class="details_container">
                        <div class="other-imgs-gallery slider-nav">
                            <img id="i1" class="other-imgs" src="<?php echo $product['image1'];  ?>" alt="image">
                            <img id="i2" class="other-imgs" src="<?php echo $product['image2'];  ?>" alt="image">
                            <img id="i3" class="other-imgs" src="<?php echo $product['image3'];  ?>" alt="image">
                            <img id="i4" class="other-imgs" src="<?php echo $product['image4'];  ?>" alt="image">
                            <img id="i5" class="other-imgs" src="<?php echo $product['image5'];  ?>" alt="image">
                        </div>
                        <img id="bi" class="detail-image slider-for" src="<?php echo $product['image'];  ?>" alt="image" alt="photo">
                            
                        <div class="text_details">
                            <span class="d-p-name"><?php echo $product['name']; ?></span>
                            <span><?php echo $product['description'];  ?></span>
                            <span class="d-p-price"><b>Price: </b><?php echo $product['price'];  ?></span>
                            <span><b>Brand : </b><?php echo $product['brand'];  ?></span>
                            <span><b>Size: </b> <?php echo $product['size'];  ?></span>
                            <span><?php echo $product['instock'];  ?> </span>
                            
                           
                            <form method="post">
                                <input type="submit" id="add-to-cart" class="input" name="test" value="Ajouter au panier"></input>    
                            </form>
                            
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
                                            document.getElementById("add-to-cart").style.background = "#DCDCDC";
                                            document.getElementById("add-to-cart").style.border = "2px solid black";
                                            document.getElementById("add-to-cart").value="Article ajoutée"
                                         </script>';
                                        header("url=product_details.php");
                                        
                                     } else {
                                        echo "Error: " . $sql . "<br>" . mysqli_error($con);
                                     }
                                }
                            ?>

                        </div>

                        <div class="ads">
                            <img src="assets/Pub.png" alt="ad">
                        </div>
                    <?php		
                        }
                    }
                ?>
        <script>


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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="icon" href="./assets/slogot.png">
    <title>Mon panier</title>
</head>
<body>
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
                <img class="menu" src="assets/bag.png" alt="bag" id="bag"/>
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
    <div class="cart-container">
        <div class="cart-s1">
            <div class="remarques">
                <p class="rm">- PAYEMENT SUR PLACE.</p>
                <p class="rm">- LIVRAISON A OUJDA (MAROC) SEULEMENT.</p>
                <p class="rm">- TOUTE LES VENTES SONT FINALES.</p>
            </div>
            <div class="panier">
                <span class="titres-ctr">MON PANIER</span>

                <div class="choice">
                     <?php
                        $con = mysqli_connect("localhost","root","");
                        mysqli_select_db($con,"flippedshop");
                        $query = "SELECT  `id`, `photo`, `nameu`, `price` FROM `cart`";
                        $queryfire = mysqli_query($con, $query);
                        $num = mysqli_num_rows($queryfire);

                        if($num > 0){
                            while($product = mysqli_fetch_array($queryfire)){
                                //echo $idd;
                                $idd=$product['id'];

                    ?>

                    <div class="cart-item">
                        <img src="<?php echo $product['photo'];  ?>" alt="image" class="cart-img">
                        <div class="info-commande">
                            <div class="pee">
                                <p class="pd"><b><?php echo $product['nameu']; ?></b></p>
                                <p class="pdp"><?php echo $product['price'];  ?></p>
                            </div>
                            

                            <form method="post">
                                <?php 
                                    echo '<a href="cart.php?id='.$idd.'" id="delete" name="reset">Supprimer</a> ';
                                ?>
                            </form>

                            
                        </div>
                    </div>
                     <?php
                     
                    

                        if (isset($_GET['id'])) {
                            $idi = $_GET['id'];
                            $sql = "DELETE FROM cart WHERE id='$idi'";
                            if ($con->query($sql) === TRUE) {
                                header("Refresh:0; url=cart.php");
                            } else {
                                echo "Error deleting record: " . $con->error;
                            }

                       } 
                      }
                    }
                    
                ?>
            

                </div>
            </div>
        </div>
        <div class="cart-separator"></div>
        <div class="cart-s2">
            <span class="titres-ctr">SOMMAIRE DE COMMANDE</span>
            <div class="prices-div">
            <?php 
                    $querysum = "SELECT  SUM(price) FROM `cart`";
                    $queryfiresum = mysqli_query($con, $querysum);
                    while($row = mysqli_fetch_array($queryfiresum)){
                            
            ?>
                <p class="pd">Prix des articles : <b><?php echo $row['SUM(price)'] ?> DH</b></p>
                <p class="pd">Frais de livraison: <b>0 DH</b></p>
                <p class="pd">Total: <b id="total"><?php echo $row['SUM(price)'] ?> DH</b></p>
            </div>

           
            <button id="commander">COMMANDER</button>
        </div>
    </div>
    <div id="pop-up" class="w3-container w3-center w3-animate-top">
        <img src="./assets/close.png" id="close" alt="fermer">
        <P class="titres">FINALSER VOTRE COMMANDE</P>

        <form action="post" class="modal" >
            <div class="frm-cmd">
                <div class="area">
                    <p class="label">Prénom</p>
                    <input type="text" class="input" id="prenom" name="prenom"> 
                </div>
                <div class="area">
                    <p class="label">Nom</p>
                    <input type="text" class="input" id="nom" name="nom"> 
                </div>
                <div class="area">
                    <p class="label">Télehone</p>
                    <input type="text" class="input" id="tel" name="tel"> 
                </div>
                <div class="area">
                    <p class="label">Email</p>
                    <input type="email" class="input" id="mail" name="mail"> 
                </div>
                <div class="area">
                    <p class="label">Adresse</p>
                    <textarea name="" class="textarea" id="adresse" name="adresse"></textarea>
                </div>
            </div>
            <div class="col2">
                <div class="sec">
                    <p class="pd">Prix des articles : <b><?php echo $row['SUM(price)'] ?> DH</b></p>
                    <p class="pd">Frais de livraison: <b>0 DH</b></p>
                    <p class="pd">Total: <b id="total"><?php echo $row['SUM(price)'] ?> DH</b></p>
                </div>
                <div class="policies">
                    <div><input type="checkbox"> Je suis conscient que la livraison se fait à Oujda seulement.</div><br>
                    <div><input type="checkbox"> J'ai lu et j'accepte les conditions d'achats.</div>
                    <button id="finaliser">FINALISER MA COMMANDE</button>
                </div>
            </div>

             <?php 
              }
            $con->close();
            ?>
        </form>
    </div>

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
            })
            document.getElementById("commander").addEventListener("click",()=>{
                const pop=document.getElementById("pop-up");
                pop.style.visibility="visible";
            })
            
            document.getElementById("close").addEventListener("click",()=>{
                const pop=document.getElementById("pop-up");
                pop.style.visibility="hidden";
                
            })    
    </script>
    </body>
</html>
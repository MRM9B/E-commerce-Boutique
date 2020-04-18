<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="styleo.css" />
    <link rel="icon" href="./assets/slogot.png">

    <link href="https://fonts.googleapis.com/css?family=Dancing+Script|Lobster|Work+Sans:500|Zilla+Slab&display=swap" rel="stylesheet">    
    <title>Flipped</title>

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="./slick/slick-theme.css"/>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

</head>
  <body>
    <div class="black-head">YOUR ONLINE VINTAGE THRIFT STORE
</div>
    <div class="landing-page">
      <img id="woman" src="landingbg.png" alt="Landing" />
      <div id="particles-js" class="partic"></div>
      <div class="header">
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
        
        <div class="slogan">
            <h1 id="h1">DRESS</h2>   
            <h1 id="h2">EXPRESS</h2>      
            <h1 id="h3">IMPRESS</h2>
        </div>    
    </div>
    
    
    
        <div class="clothes" data-aos="fade-right">
            <div id="list">
                <p class="titres-ctr" id="store">THE STORE</p>
                <div class="ls">
                    <ul class="categories">
                        <li class="categ active" data-filter="*">ALL</li>
                        <li class="categ" data-filter=".tops">TOPS</li>
                        <li class="categ" data-filter=".bottoms">BOTTOMS</li>
                        <li class="categ" data-filter=".shoes">SHOES</li>
                    </ul>
                </div>
            </div>

            <hr class="hrr"><br>
                    <br>
            <div class="product-items">
                <?php
                    $con = mysqli_connect("localhost","root","");
                    mysqli_select_db($con,"flippedshop");
                    $query = "SELECT `id`,`image`, `name`, `price`,`instock` FROM `store`";
	                $queryfire = mysqli_query($con, $query);
                    $num = mysqli_num_rows($queryfire);

                    if($num > 0){
                        while($product = mysqli_fetch_array($queryfire)){
                    ?>           
                        <?php 
                         echo '<a class="center-a" href="product.php?id='.$product['id'].'">' ?>
                            <div class="circle"></div>
                            <img class="p-img" src="<?php echo $product['image'];  ?>" alt="p1" onClick="document.location.href='./product.php'">
                            <div class="flex">
                                <div class="norm">
                                    <p class="p-name"><?php echo $product['name']; ?></p>   
                                    <p class="p-price-start"><?php echo $product['price'];  ?></p>
                                </div>
                            <b><p class="p-stock"><?php echo $product['instock'];  ?></p></b></div>
                        </a>                    
                    <?php		
                        }
                    }
                ?>
               
            </div>
        </div>

        <!-- <div class="about" data-aos="fade-right">
            <img id="flip-img" src="assets/flip.png" alt="flip">
            <div class="about-txt">
                <p>WE FIND QUALITY CLOTHES</p>
                <p>WE STYLE THEM</p>
                <p>WE FLIP THEM TO YOU</p>
            </div>
        </div> -->
        
        <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script> 
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/core.js"></script>
        <script type="text/javascript">
        particlesJS("particles-js", {"particles":{"number":{"value":60,"density":{"enable":true,"value_area":800}},"color":{"value":"#ffffff"},"shape":{"type":"circle","stroke":{"width":0,"color":"#000000"},"polygon":{"nb_sides":5},"image":{"src":"img/github.svg","width":100,"height":100}},"opacity":{"value":0.25,"random":false,"anim":{"enable":false,"speed":1,"opacity_min":0.1,"sync":false}},"size":{"value":3,"random":true,"anim":{"enable":false,"speed":40,"size_min":0.1,"sync":false}},"line_linked":{"enable":true,"distance":150,"color":"#ffffff","opacity":0.3,"width":1},"move":{"enable":true,"speed":3,"direction":"none","random":false,"straight":false,"out_mode":"out","bounce":false,"attract":{"enable":false,"rotateX":600,"rotateY":1200}}},"interactivity":{"detect_on":"canvas","events":{"onhover":{"enable":true,"mode":"repulse"},"onclick":{"enable":true,"mode":"push"},"resize":true},"modes":{"grab":{"distance":400,"line_linked":{"opacity":1}},"bubble":{"distance":400,"size":40,"duration":2,"opacity":8,"speed":3},"repulse":{"distance":200,"duration":0.4},"push":{"particles_nb":4},"remove":{"particles_nb":2}}},"retina_detect":true});var count_particles, stats, update; stats = new Stats; stats.setMode(0); stats.domElement.style.position = 'absolute'; stats.domElement.style.left = '0px'; stats.domElement.style.top = '0px'; document.body.appendChild(stats.domElement); count_particles = document.querySelector('.js-count-particles'); update = function() { stats.begin(); stats.end(); if (window.pJSDom[0].pJS.particles && window.pJSDom[0].pJS.particles.array) { count_particles.innerText = window.pJSDom[0].pJS.particles.array.length; } requestAnimationFrame(update); }; requestAnimationFrame(update);;
        </script>
        <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script type="text/javascript" src="./slick/slick.min.js"></script>
        <script src="https://unpkg.com/aos@next/dist/aos.js"></script>

        
        <script>
            AOS.init();
        </script>
        <script>
            $(document).ready(function() {
                $(".wrapper").slick({
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    autoplay: true,
                    autoplaySpeed: 2000,
                });
            });

            $( window ).scroll(function() {
               $( "#flip-img" ).css( "transform", "rotate(180deg)" );
            });

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
           
           

           
        </script>

  </body>
</html>

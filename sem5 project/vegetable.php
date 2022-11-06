<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vegtable</title>

    <!-- Link Swiper's CSS -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"
    />
    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">
    
    <style type="text/css">

        
        *{
           font-family: 'Poppins', sans-serif;
           margin:0; padding:0;
           box-sizing: border-box;
           outline: none; border:none;
           text-decoration: none;
           text-transform: capitalize;
           transition: all .2s linear;
        }




        

        

        .img_box img{
            max-width: 80%;
            height: 18rem;

        }
        .slider_container .container{
            
            max-width: 1239px;
            margin: 0 auto;
            padding: 0 15px;
        }

        .product-slider{
            padding: 50px 0;
            
        }
        .swiper-slide{
            font-size: 1.2rem;
            color: blue;
            background: rgb(255, 255, 255);
            border-radius: .5rem;
            text-align: center;
            padding:3rem 2rem;
            outline-offset: -1rem;
            outline: var(--outline);
            box-shadow: var(--box-shadow);
            transition: .2s linear;
            outline-offset: 0rem;
            outline: var(--outline-hover);
        }
    </style>

    
    
</head>
<body>
    

    <!-- products section starts  -->

<section class="slider_container">

    <h1 class="heading"> our <span>Vegtable</span> </h1>
    <div class="container">
        <div class="swiper product-slider">
            <div class="swiper-wrapper">
                

                <div class="swiper-slide">
                    <div class="img_box">
                        <img src="Images/onion.jpg" alt="">
                        <h3>Onion - 1kg</h3>
                        <div class="price"> &#8377;31</div>
                        
                        <a href="#" class="btn">add to cart</a>
                    </div>

                </div>



                <div class="swiper-slide">
                    <div class="img_box">
                        <img src="Images/onion1.jpg" alt="">
                        <h3>Fresh Red Onion</h3>
                        
                        <form action="/action_page.php">

                            <label for="Onion"></label>
                            <select class="Onion" id="Onion">
                                <option value="250g - Rs 20">250g - Rs 20</option>
                                <option value="500g - Rs 30">500g - Rs 30</option>
                                <option value="1 kg - Rs 82">1 kg - Rs 82</option>
                               
                            </select>
                        </form>
  
                        <span class="Onion">
                            &#8377;
                            

                        </span>
                        
                        <a href="#" class="btn">add to cart</a>
                    </div>
                    
                </div>


                <div class="swiper-slide">
                    <div class="img_box">
                        <img src="Images/lsys 2.jpg" alt="">
                        <h3>Lay's</h3>
                        <div class="price">&#8377;56</div>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <a href="#" class="btn">add to cart</a>
                    </div>
                    
                </div>



                

                
                
                
                
                
                
                
                



                
 
                
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
            <div class="swiper-pagination"></div>
        </div>

    </div>


   


</section>


<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
<script type="text/javascript">
    var swiper = new Swiper(".product-slider", {
        spaceBetween: 50,
        loop:true,
        speed:1000,
        autoplay:{
            delay:2000,

        },
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },

        navigation: {
           nextEl: ".swiper-button-next",
           prevEl: ".swiper-button-prev",
        },
        breakpoints: {
          320: {
            slidesPerView: 1,
            
          },
          480: {
            slidesPerView: 2,
            
          },
          
          768: {
            slidesPerView: 3,
            
          },
          1400: {
            slidesPerView: 4,
            
          },
        },

    });
</script>





    
</body>
</html>
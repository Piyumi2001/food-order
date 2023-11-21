<?php
@include 'conection.php';
@include 'product.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">


    <title>Foodies Kitchen</title>

    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <!-- header -->

    <header class="header">

        <a href="#" class="logo" class="heading"><font color="white" size="5.5rem">
            <b>Foodies' </b></font> <span>Kitchen</span></a>

        <nav class="navbar">
            <a href="#home">home</a>
            <a href="#about">about</a>
            <a href="#gallery">gallery</a>
            <a href="#product">product</a>
            <a href="#order">order</a>
        </nav>

    </header>

    <!-- header end -->


    <!-- home -->

    <section class="home" id="home">

<div class="swiper-container home-slider">

        <div class="swiper-wrapper">

            <div class="swiper-slide">
                <div class="box" style="background: url(images/h333.jpg);">

                    <div class="content">

                        <h3>Taste the world's cuisine</h3>
						<h3><font color="lightseagreen">It will delight you!</h3></font>
                        <span>We are not afraid to experiment. Our Chef combines carefully selected ingredients
                          and serves them on your plate in an out-of-the-ordinary form.</span>	<br>
                        <a href="#order" class="btn">Order now</a>

                    </div>
                </div></div></div></div>

    </section>

    <!-- home section ends -->

    <!-- about us -->

    <section class="about" id="about">

        <h1 class="heading">about<span> us </span></h1>

        <div class="row">

            <div class="image">
                <img src="images/ga4.jpeg" alt="">
            </div>

            <div class="content">
                <h3>We provide good quality food with great service to our customers.<br> <span>Join With us!!</span></h3>
                <p>We are Best in the City. Restaurant is a place for simplicity. Good food, good beer, and good service.
                  Simple is the name of the game, and we're good at finding it in all the right places, even in your dining experience.<br>
                  We're a small group from sri lanka. we are who make simple food possible.</p>
                <p>		And worry not, our crewe will travel to your destination of choice – from hotel ballrooms to private kitchens – to entertain groups of all sizes.
                		We cook, we tell stories, we deliver informative culinary demonstrations and lectures,
                		 but most of all … we treat every event like you’re a guest at our dinner table.</p>

            </div>

        </div>

    </section>


    <!-- about us end-->


        <!-- gallery -->

        <section class="gallery" id="gallery">

            <h1 class="heading">our <span> gallery</span></h1>

            <div class="gallery-container">

                <a href="images/g12.jpeg" class="box">
                    <img src="images/g12.jpeg" alt="">

                </a>

                <a href="images/g5.jpeg" class="box">
                    <img src="images/g5.jpeg" alt="">

                </a>

                <a href="images/g7.jpeg" class="box">
                    <img src="images/g7.jpeg" alt="">

                </a>

                <a href="images/g16.jpeg" class="box">
                    <img src="images/g16.jpeg" alt="">

                </a>

                <a href="images/g19.jpeg" class="box">
                    <img src="images/g19.jpeg" alt="">

                </a>

                <a href="images/g6.jpeg" class="box">
                    <img src="images/g6.jpeg" alt="">

                </a>
              </a>

              <a href="images/g14.jpeg" class="box">
                  <img src="images/g14.jpeg" alt="">

              </a>
            </a>

            <a href="images/g33.jpeg" class="box">
                <img src="images/g33.jpeg" alt="">

            </a>
          </a>

          <a href="images/g19.jpeg" class="box">
              <img src="images/g19.jpeg" alt="">

          </a>
        </a>

        <a href="images/g8.jpeg" class="box">
            <img src="images/g8.jpeg" alt="">

        </a>

            </div>

        </section>

        <!-- gallery end -->

    <!-- product -->

    <section class="product" id="product">

        <h1 class="heading">Today <span> Special</span></h1>

        <div class="box-container">

          <?php

          $servername = "localhost";
          $username = "root";
          $password = "";
          $dbname = "web";

          // Create connection
          $mysqli = new mysqli($servername, $username, $password, $dbname);

          // Check connection
          if ($mysqli->connect_error){
          die("Connection failed: " . $mysqli->connect_error);

          }

          $sql = $mysqli->query("SELECT * FROM food");

          while ($data = $sql->fetch_assoc())
          {
          ?>

          <div class="box">
              <div class="image">
                  <img src="uploads/<?php echo $data['image']; ?>">
              </div>
              <div class="content">
                  <h3><?php echo $data['f_name']; ?></h3>
                  <span class="price"><?php echo"Rs."; echo $data['price']; ?></span>
                  <a href="#order" class="btn">Order Now</a>

              </div>
          </div>

          </body>

      <?php
      }
          ?>

      </body>
      </html>

        </div>

    </section>


    <!-- product end-->

    <!-- parallax -->

    <section class="parallax">

        <h1 class="heading"><br>range of <span>products</span></h1>

        <div class="box-container">

            <div class="box">
                <div class="image">
                    <img src="images/123.png" alt="">
                </div>
                <div class="content">
                    <h3>Fried Rices</h3>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea minus laudantium placeat suscipit.</p>
                </div>
            </div>

            <div class="box">
                <div class="image">
                    <img src="images/456.png" alt="">
                </div>
                <div class="content">
                    <h3>Burger & Sandwiches</h3>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea minus laudantium placeat suscipit.</p>
                </div>
            </div>

            <div class="box">
                <div class="image">
                    <img src="images/789.png" alt="">
                </div>
                <div class="content">
                    <h3>Pasta & Noodles</h3>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ea minus laudantium placeat suscipit.</p>
                </div>
            </div>

        </div>

    </section>

    <!-- parallax -->


    <!-- order -->

    <section class="order" id="order">



        <h1 class="heading"><span>order</span> now </h1>

        <div class="row">

            <div class="image">
                <img src="images/order.gif" alt="">
            </div>

            <form action="php/order.php" method="post">

                <div class="inputBox">
                    <input type="text" placeholder="first name" name="first_name">
                    <input type="text" placeholder="last name" name="last_name">
                </div>

                <div class="inputBox">
                    <input type="email" placeholder="email address" name="email">
                    <input type="number" placeholder="phone number" name="tel">
                </div>

                <div class="inputBox">
                    <input type="text" placeholder="food name" name="food">
                    <input type="number" placeholder="how much" name="quantity">
                </div>

                <textarea placeholder="your address" name="address" id="" cols="30" rows="10"></textarea>
                <input type="submit" value="submit" class="btn" name="submit">
            </form>

        </div>

    </section>

    <!-- order end -->

    <footer class="footer-distributed">

  			<div class="footer-left">

  				<h3>Foodies'<span> Kitchen</span></h3>

  				<p class="footer-links">
  					<a  href="#home" class="link-1">Home</a>

  					<a href="#gallery">Gallery</a>

  					<a href="#about">About</a>

  					<a href="#order">Order</a>

  					<a href="#">Contact</a>
  				</p>


  			</div>

  			<div class="footer-center">

          <div>
            <i class="fa fa-phone"></i>
            <p>Open Hours</p>
          </div>

          <div>
            <i class="fa fa-map-marker"></i>
            <p><span>Monday to Friday 9:00 AM - 8:00 PM</span> </p>
          </div>

          <div>
  					<i class="fa fa-map-marker"></i>
  					<p><span>Saturday 11:30 AM - 10:00 PM</span> </p>
  				</div>

          <div>
  					<i class="fa fa-map-marker"></i>
  					<p><span>Saturday 11:30 AM - 10:00 PM</span> </p>
  				</div>

  			</div>

  			<div class="footer-right">

  				<p class="footer-company-about">
  					<span>Location</span>
  					No.24,Kudawella, Poddala.<br>Tel:0742921585
  				</p>
<p class="footer-company-name">piyumibahagya2011@gmail.com</p>
  				<div class="footer-icons">

  					<a href="#"><i class="fa fa-facebook"></i></a>
  					<a href="#"><i class="fa fa-twitter"></i></a>
  					<a href="#"><i class="fa fa-linkedin"></i></a>
  					<a href="#"><i class="fa fa-github"></i></a>

  				</div>

  			</div>
  	<hr style="width:100%;height:3px;color:white;background-color:white;border-width:0;">
    <center><h1 style="color:white;"><br>Creted by Bhagya | All Right Reserved!</h1></center>

  		</footer>


    <!-- footer ends -->


</body>
</html>

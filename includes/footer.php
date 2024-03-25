<div class="mt-5 pt-5 pb-5 footer">
<div class="container">
  <div class="row">
    <div class="col-lg-5 col-xs-12 about-company">
      <h2>The Niche Candles</h2>
      <p class="pr-5 text-white-50">Discover Our Niche Candle Collection and More</p>

      <p><a href="#"><i class="fa fa-facebook-square mr-1"></i></a><a href="#"><i class="fa fa-linkedin-square"></i></a></p>
      <img src="./imgs/logo_tester2.png" alt="">
      <h2>@AdrianKotyra</h2>
    </div>
    <div class="col-lg-3 col-xs-12 links">
      <h4 class="mt-lg-0 mt-sm-3">Links</h4>
        <ul class="m-0 p-0">
      
          <li>- <a href="#">Scented Creations</a></li>
          <li>- <a href="#">Crafted Aromas</a></li>
          <li>- <a href="#">Unique Wick Designs</a></li>
          <li>- <a href="#">Artisanal Fragrances</a></li>
          <li>- <a href="#">Hand-Poured Illuminations</a></li>
          <li>- <a href="#">Luxe Candle Experiences</a></li>
        </ul>
    </div>
    <div class="col-lg-4 col-xs-12 location">
      <h4 class="mt-lg-0 mt-sm-4">Location</h4>
      <p> 24 Milton Rd E, Edinburgh EH15 2PQ </p>
     
      <p class="mb-0"><img class="icon" src="./svgs/solid/phone.svg" alt="" srcset=""> 0123456789</p>
  
      <p>     <img class="icon" src="./svgs/regular/envelope.svg" alt="" srcset="">info@hsdf.com</p>
    </div>
  </div>

</div>
</div>
      <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
      <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>
 
   
    <!-- <script src="./js/jquery.js"></script> -->
    <script src="./js/custom.js"></script>
    


<!-- display off and on all the class ".confidential" is user is not logged in  -->
<?php if($_SESSION["user_logged"] === false) {
    echo "<script>confidentialOff() </script>";
}

?>
<?php 
  if($_SESSION["user_logged"] ===true) {
  echo "<script>confidentialOn()</script>";
}
?>

<?php 
if(($_SESSION["user_logged"])===true ) {
    echo "<script>hideWhenLoggedin() </script>";
}
else {
  echo "<script>showWhenLoggedin()</script>";
}
?>

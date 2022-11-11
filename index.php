<?php
$page_title = "Home";
include_once "headerindex.php";
?>


<div id="home-details">
  <h1>This is House Marketplace</h1>
  <p>Where Buyers and Sellers meet for free</p>
  <hr>

  </section>

  <!-- About Section-->
  <section style="padding: 50px;">
    <div class="container">
      <div class="row">
        <div class="col-lg col-md-6 me-5">
          <img src="images/office3.jpeg" />
        </div>
        <div class="col-lg col-md-6">
          <h2 class="text-center">Who we are</h2>
          <p class="underline"></p>
          <p>
            House Marketplace is a property website in Nigeria with property listings for sale and rent. We offer Nigerian property seekers an easy way to find details of property in Nigerianto buy or rent. It is our firm believe that buying or renting a property should be easy and convenient without much hassles. We connect the property owners and buyers for free.
            We put effort in making sure that your next property search should be effortless and awesome experience.
          </p>

        </div>
      </div>
    </div>
  </section>





  <!--Latest Listing-->
  <section id="property-section" class="text-center">
    <div class="container-fluid">
      <div class="row">
        <div class="col">
          <h2>Latest Listings</h2>
          <p class="underline"></p>
          <p class="lead">Please check out some of our latest Listings below</p>
        </div>
      </div>
      <div class="row items g-0">
        <div class="col-lg col-md-6 item">
          <div class="property-image">
            <img src="images/office5.jpg" alt="property for sale" class="img-fluid" height="600" />
          </div>
          <div class="col item-text">
            <div class="col item-text-wrap">
              <h2>An office space for sale</h2>
              <p>Price: N100,000,000</p>
              <a href="latestproperties.php">Read More</a>
            </div>
          </div>
        </div>

        <div class="col-lg col-md-6 item">
          <div class="property-image">
            <img src="images/house5.jpg" alt="property for sale" class="img-fluid" height="600" />
          </div>
          <div class="col item-text">
            <div class="col item-text-wrap">
              <h2>A house for sale</h2>
              <p>Price: N20,000,000</p>
              <a href="latestproperties.php">Read More</a>
            </div>
          </div>
        </div>

        <div class="col-lg col-md-6  item">
          <div class="property-image">
            <img src="images/office7.jpeg" alt="property for rent" class="img-fluid" height="600" />
          </div>
          <div class="col item-text">
            <div class="col item-text-wrap">
              <h2>An office space for rent</h2>
              <p>Price: N50,000 per SQM</p>
              <a href="latestproperties.php">Read More</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>








  <?php
  include_once "footerindex.php";
  ?>
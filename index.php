<?php
$page_title = "Home";
include_once "headerindex.php";
?>

<div id="home-details">
  <h1>This is House Marketplace</h1>
  <p>Where Buyers and Sellers meet for free</p>
  <hr>

  <div class="container mt-5">
    <form class="d-flex" role="search">
      <input class="form-control me-2 pt-2" type="search" placeholder="Enter your location" aria-label="Search">
      <select class="form-select me-2">
        <option selected>Type</option>
        <option value="duplex">Duplex</option>
        <option value="flat">Flat</option>
        <option value="office">Office</option>
      </select>
      <select class="form-select me-2">
        <option selected>Bed</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
      </select>
      <select class="form-select me-2">
        <option selected>Min Price</option>
        <option value="50000">N50,000</option>
        <option value="100000">N100,000</option>
        <option value="200000">N200,000</option>
        <option value="300000">N300,000</option>
        <option value="400000">N400,000</option>
        <option value="500000">N500,000</option>
      </select>
      <select class="form-select me-2">
        <option selected>Max Price</option>
        <option value="500000">N500,000</option>
        <option value="1000000">N1,000,000</option>
        <option value="2000000">N2,000,000</option>
        <option value="10000000">N10,0000,000</option>
        <option value="40000000">N40,000,000</option>
        <option value="100000000">N100,000,000</option>
      </select>
      <button class="btn btn-primary" type="submit">Search</button>
    </form>
  </div>

</div>
</div>

</header>
</div>
</section>

<!-- About Section-->
<section style="padding: 100px;">
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
          <img src="images/office5.jpg" alt="property for rent" class="img-fluid" />
        </div>
        <div class="col item-text">
          <div class="col item-text-wrap">
            <h2>An office space for rent</h2>
            <p>Price: N100,000 per SQM</p>
            <a href="#">Read More</a>
          </div>
        </div>
      </div>

      <div class="col-lg col-md-6 item">
        <div class="property-image">
          <img src="images/house1.jpg" alt="property for sale" class="img-fluid" />
        </div>
        <div class="col item-text">
          <div class="col item-text-wrap">
            <h2>A house for sale</h2>
            <p>Price: N100,000,000</p>
            <a href="#">Read More</a>
          </div>
        </div>
      </div>

      <div class="col-lg col-md-6  item">
        <div class="property-image">
          <img src="images/office6.jpeg" alt="property for rent" class="img-fluid" />
        </div>
        <div class="col item-text">
          <div class="col item-text-wrap">
            <h2>An office space for rent</h2>
            <p>Price: N50,000 per SQM</p>
            <a href="#">Read More</a>
          </div>
        </div>
      </div>
    </div>
    <div class="row items g-0">
      <div class="col-lg col-md-6  item">
        <div class="property-image">
          <img src="images/house5.jpg" alt="property for sale" class="img-fluid" />
        </div>
        <div class="col item-text">
          <div class="col item-text-wrap">
            <h2>A 5 Bedrooom House for sale</h2>
            <p>Price:N40,000,000</p>
            <a href="#">Read More</a>
          </div>
        </div>
      </div>

      <div class="col-lg col-md-6  item">
        <div class="property-image">
          <img src="images/house6.jpg" alt="property for sale" class="img-fluid" />
        </div>
        <div class="col item-text">
          <div class="col item-text-wrap">
            <h2>A 6 Bedrooom House for sale</h2>
            <p>Price:N60,000,000</p>
            <a href="#">Read More</a>
          </div>
        </div>
      </div>

      <div class="col-lg col-md-6  item">
        <div class="property-image">
          <img src="images/house7.jpg" alt="	company website" class="img-fluid" />
        </div>
        <div class="col item-text">
          <div class="col item-text-wrap">
            <h2>A 5 Bedrooom Duplex for sale</h2>
            <p>Price:N35,000,000</p>
            <a href="#">Read More</a>
          </div>
        </div>
      </div>
    </div>
    <div class="row items g-0">
      <div class="col-lg col-md-6  item">
        <div class="property-image">
          <img src="images/house10.jpg" alt="property for rent" class="img-fluid" />
        </div>
        <div class="col item-text">
          <div class="col item-text-wrap">
            <h2>A 3 Bdroom Flat for rent</h2>
            <p>Price: N2,000,000 per annum</p>
            <a href="#">Read More</a>
          </div>
        </div>
      </div>

      <div class="col-lg col-md-6  item">
        <div class="property-image">
          <img src="images/house8.jpg" alt="property for rent" class="img-fluid" />
        </div>
        <div class="col item-text">
          <div class="col item-text-wrap">
            <h2>A 3 Bdroom Flat for rent</h2>
            <p>Price: N3,000,000 per annum</p>
            <a href="#">Read More</a>
          </div>
        </div>
      </div>

      <div class="col-lg col-md-6  item">
        <div class="property-image">
          <img src="images/house9.jpg" alt="property for rent" class="img-fluid" />
        </div>
        <div class="col item-text">
          <div class="col item-text-wrap">
            <h2>A 5 Bdroom Duplex for rent</h2>
            <p>Price: N5,000,000 per annum</p>
            <a href="#">Read More</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!--News Section-->
<section id="news" style="padding-top: 50px">
  <div class="container">
    <div class="row text-center">
      <div class="col">
        <h2 class="section-title">Latest Property News</h2>
        <p class="underline"></p>
      </div>
    </div>
    <div class="row" id="news">
      <div class="col news-item">
        <img src="images/house5.jpg" class="img-fluid" alt="property news">
        <p>Developer delivers N5.6bn residential estate for Exxonmobil, Shell Cooperatives.</p>
        <a href="https://www.vanguardngr.com/2022/08/developer-introduces-unique-joint-venture-mixed-use-devt-in-lagos/" target="_blank">
          <button class="btn btn-primary">Read More</button></a>
      </div>


      <div class="col news-item">
        <img src="images/govt.jpeg" class="img-fluid" alt="property news">
        <p>Building collapse:Stakeholders meet, discuss solutions</p>
        <a href="https://punchng.com/building-collapse-stakeholders-meet-discuss-solutions/" target="_blank">
          <button class="btn btn-primary">Read More</button></a>
      </div>

      <div class="col news-item">
        <img src="images/office6.jpeg" class="img-fluid" alt="property news">
        <p>Construction materials prices surge, threaten housing industry</p>
        <a href="https://guardian.ng/property/construction-materials-prices-surge-threaten-housing-industry/" target="_blank">
          <button class="btn btn-primary">Read More</button></a>
      </div>
    </div>
  </div>

</section>
















<?php
include_once "footer.php";
?>
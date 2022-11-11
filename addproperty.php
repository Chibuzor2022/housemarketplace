<?php include_once "portalheader.php";



if (isset($_REQUEST['submitbtn'])) {
  $errors = array();
  if (empty($_REQUEST['title'])) {
    $errors['errortitle'] = "Title field must be filled";
  }
  if (empty($_REQUEST['price'])) {
    $errors['errorprice'] = "Price field must be filled";
  }
  if (empty($_REQUEST['address'])) {
    $errors['erroraddress'] = "address field must be filled";
  }
  if (empty($_REQUEST['description'])) {
    $errors['errordescription'] = "Description field must be filled";
  }

  //if there is no validation error
  if (count($errors) == 0) {
    //include the property class
    include_once "shared/property.php";

    //create the object

    $obj = new Property;

    //call the insertProperty method



    $output = $obj->insertProperty($_SESSION['seller_id'], $_REQUEST['title'], $_REQUEST['price'], $_REQUEST['address'], $_REQUEST['description'], $_REQUEST['type'], $_REQUEST['status'], $_REQUEST['bedroom'], $_REQUEST['bathroom'], $_REQUEST['toilet'], $_REQUEST['state'], $_REQUEST['lga'], $_REQUEST['category']);

    //redirect to nanother page
    if ($output != 'success') {

      echo $output; //display the error message
    } else {
      header("Location: regstatus.php?msg=$output");
    }
  }
}


?>;

<main>
  <div class="container mt-4">
    <h2>Add Property</h2>
    <?php
    if (!empty($errors)) {
      echo "<ul>";
      foreach ($errors as $key => $value) {
        echo "<li class='text-danger'>$value</li>";
      }
      echo "</ul>";
    }


    ?>
    <form action="" method="post">
      <div class="row ">
        <div class="mb-3 col-6">
          <label for="title" class="form-label">Title</label>
          <input type="text" class="form-control" id="title" name="title">
        </div>
        <div class="col-6">
          <label for="marketstatus" class="form-label">Market Staus</label>
          <select name="status" id="status" class="form-select" aria-label="Market Status">
            <option selected>Choose One</option>
            <option value="available">Available</option>
            <option value="sold">Sold</option>
            <option value="rented">Rented</option>
          </select>
        </div>

      </div>
      <div class="row">
        <div class="col-6 mb-3">
          <label for="category" class="form-label">Category</label>
          <select name="category" class="form-select" aria-label="Category">
            <option selected>Choose One</option>
            <option value="rent">For Rent</option>
            <option value="sale">For Sale</option>

          </select>
        </div>
        <div class="col-6 mb-3">
          <label for="type" class="form-label">Type</label>
          <select name="type" class="form-select" aria-label="Type">
            <option selected>Choose One</option>
            <option value="flat">Flat/Apartment</option>
            <option value="house">House</option>
            <option value="duplex">Duplex</option>
            <option value="commercial">Commercial Property</option>
          </select>
        </div>
        <div class="row">
          <div class="col-3 mb-4">
            <label for="bedroom">Bedroom</label><br>
            <select name="bedroom" class="form-select" aria-label="Bedrooms">
              <option selected>Choose One</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
            </select>
          </div>
          <div class="col-3 mb-4">
            <label for="bathroom">Bathroom</label><br>
            <select name="bathroom" class="form-select" aria-label="Bathrooms">
              <option selected>Choose One</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
            </select>
          </div>
          <div class="mb-3 col-4">
            <label for="toilet">Toilet</label>
            <select name="toilet" class="form-select" aria-label="Toilets">
              <option selected>Choose One</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
            </select>
          </div>

        </div>
      </div>

      <div class="row">
        <div class="col-6">
          <label for="state" class="form-label">State</label>
          <select class="form-select" name="state">
            <option selected>Please choose your state</option>
            <option value='Abia'>Abia</option>
            <option value='Adamawa'>Adamawa</option>
            <option value='AkwaIbom'>AkwaIbom</option>
            <option value='Anambra'>Anambra</option>
            <option value='Bauchi'>Bauchi</option>
            <option value='Bayelsa'>Bayelsa</option>
            <option value='Benue'>Benue</option>
            <option value='Borno'>Borno</option>
            <option value='CrossRivers'>CrossRivers</option>
            <option value='Delta'>Delta</option>
            <option value='Ebonyi'>Ebonyi</option>
            <option value='Edo'>Edo</option>
            <option value='Ekiti'>Ekiti</option>
            <option value='Enugu'>Enugu</option>
            <option value='Gombe'>Gombe</option>
            <option value='Imo'>Imo</option>
            <option value='Jigawa'>Jigawa</option>
            <option value='Kaduna'>Kaduna</option>
            <option value='Kano'>Kano</option>
            <option value='Katsina'>Katsina</option>
            <option value='Kebbi'>Kebbi</option>
            <option value='Kogi'>Kogi</option>
            <option value='Kwara'>Kwara</option>
            <option value='Lagos'>Lagos</option>
            <option value='Nasarawa'>Nasarawa</option>
            <option value='Niger'>Niger</option>
            <option value='Ogun'>Ogun</option>
            <option value='Ondo'>Ondo</option>
            <option value='Osun'>Osun</option>
            <option value='Oyo'>Oyo</option>
            <option value='Plateau'>Plateau</option>
            <option value='Rivers'>Rivers</option>
            <option value='Sokoto'>Sokoto</option>
            <option value='Taraba'>Taraba</option>
            <option value='Yobe'>Yobe</option>
            <option value='Zamfara'>Zamafara</option>
          </select>
        </div>
        <div class="col-6 mb-3">
          <label for="lga" class="form-label">LGA</label>
          <input type="text" class="form-control" id="lga" name="lga">
        </div>
      </div>
      <div class="row">
        <div class="mb-3">
          <label for="address" class="form-label">Address</label>
          <textarea class="form-control" id="address" name="address" rows="2"></textarea>
        </div>
      </div>
      <div class="row">
        <div class="col-6 mb-3">
          <label for="price" class="form-label">Price</label>
          <input type="text" class="form-control" id="price" name="price">
        </div>



      </div>
      <div class="row">
        <div class="mb-3">
          <label for="description" class="form-label">Description</label>
          <textarea class="form-control" id="description" name="description" rows="3"></textarea>
        </div>
      </div>
      <div class="row">
        <button type="reset" class="btn btn-primary col-2 me-2">Reset</button>
        <input type="submit" class="btn btn-primary col-2" value="submit" name="submitbtn">
      </div>
    </form>
  </div>

</main>

<?php include_once "portalfooter.php" ?>
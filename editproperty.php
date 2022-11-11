<?php include_once "portalheader.php";
include_once "shared/constants.php";

include_once "shared/property.php";


$id = $_GET['propertyid'];
$obj = new Property();
$images = $obj->getAllimages($id);



if (isset($_REQUEST['propertyid'])) {
  #make reference to getProperty method
  $propertyobj = new Property();
  $property = $propertyobj->getProperty($_REQUEST['propertyid']);
}

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

    //sanitize inputs
    $propertyid = $_GET['propertyid'];
    $sellerid = $_SESSION['seller_id'];
    $title = sanitizeInput($property['title']);
    $price = sanitizeInput($_POST['price']);
    $address = sanitizeInput($_POST['address']);
    $description = sanitizeInput($_POST['description']);
    $type = $_POST['type'];
    $status = $_POST['status'];
    $bedroom = $_POST['bedroom'];
    $bathroom = $_POST['bathroom'];
    $toilet = $_POST['toilet'];
    $state = $_POST['state'];
    $lga = $_POST['lga'];
    $category = $_POST['category'];
    //include the property class
    include_once "shared/property.php";

    //create the object

    $obj = new Property;

    //call the insertProperty method

    $output = $obj->updateProperty($title, $price, $address, $description, $type, $status, $bedroom, $bathroom, $toilet, $state, $lga, $category, $propertyid);



    //redirect to another page
    if ($output != 'success') {

      echo $output; //display the error message
    } else {
      header("Location: updatelistings.php?msg=$output");
      exit;
    }
  }
}


?>;

<main>
  <div class="container mt-4">
    <h2>Edit Property</h2>
    <?php
    if (!empty($errors)) {
      echo "<ul>";
      foreach ($errors as $key => $value) {
        echo "<li class='text-danger'>$value</li>";
      }
      echo "</ul>";
    }


    ?>
    <form name="propertyform" id="propertyfrom" action='editproperty.php?propertyid=<?php if (isset($_REQUEST['propertyid'])) {
                                                                                      echo $_REQUEST['propertyid'];
                                                                                    } ?>' method="post" enctype="multipart/form-data">
      <div class="row ">
        <div class="mb-3 col-6">
          <label for="title" class="form-label">Title</label>
          <input type="text" class="form-control" id="title" name="title" value="<?php if (isset($property['title'])) {
                                                                                    echo $property['title'];
                                                                                  }


                                                                                  ?>">
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
          <div class="col-4 mb-3">
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
          <div class="col-4 mb-3">
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
          <div class="col-4 mb-3">
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
          <input type="text" name="state" id="state" class="form-control" value="<?php
                                                                                  if (isset($_POST['state'])) {
                                                                                    echo $_POST['state'];
                                                                                  }

                                                                                  ?>">
        </div>
        <div class="col-6">
          <label for="lga" class="form-label">LGA</label>
          <input type="text" name="lga" id="lga" class="form-control" value="<?php
                                                                              if (isset($_POST['lga'])) {
                                                                                echo $_POST['lga'];
                                                                              }

                                                                              ?>">
        </div>
      </div>

      <div class="row">
        <div class="mb-3">
          <label for="address" class="form-label">Address</label>
          <textarea class="form-control" id="address" name="address" rows="2"><?php if (isset($property['address'])) {
                                                                                echo $property['address'];
                                                                              }
                                                                              ?></textarea>
        </div>
      </div>
      <div class="row">
        <div class="col-6 mb-3">
          <label for="price" class="form-label">Price</label>
          <input type="text" class="form-control" id="price" name="price" value="<?php if (isset($property['price'])) {
                                                                                    echo $property['price'];
                                                                                  } ?>">
        </div>



      </div>
      <div class="row">
        <div class="mb-3">
          <label for="description" class="form-label">Description</label>
          <textarea class="form-control" id="description" name="description" rows="3"><?php if (isset($property['description'])) {
                                                                                        echo $property['description'];
                                                                                      }


                                                                                      ?></textarea>
        </div>
      </div>
      <div class="control-group form-group mb-3">
        <div class="controls">
          <label>Upload Image</label>
          <input type="file" class="form-control" id="image" name="image[]" multiple>
        </div>
      </div>

      <div class="row">
        <input type="hidden" name="sellerid" value="<?php if (isset($_REQUEST['sellerid'])) {
                                                      echo $_REQUEST['sellerid'];
                                                    } ?>">
        <input type="submit" class="btn btn-primary col-2" value="Save Changes" name="submitbtn">
      </div>
    </form>
  </div>
</main>



<?php include_once "portalfooter.php" ?>
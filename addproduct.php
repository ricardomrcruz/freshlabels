<?php

include 'inc/connect.inc.php'; //connetion to database
include 'inc/functions.inc.php'; //functions
include 'controller/manage_product.php';



// PRODUCT REGISTRATION
    

//display 
include 'inc/header.inc.php'; //html header

?>

<div class="return">
            <a href="user.php"><i class="fa-solid fa-arrow-rotate-left"></i></a>
        </div>
<div class="addproductbox">
    <h1>New Product</h1>
    <?php echo $msg; ?>
    
    <form method="POST" class="addproductform" action="" enctype="multipart/form-data">
        <div class="txtfield">
            <input type="text" name="name_product" id="name_product" required autocomplete="off">
            <span></span>
            <label for="name_user">Name of the product</label>
        </div>
        <div class="selectfield">
            <label for="category">Category:</label> 
            <br><br>
            <select name="id_category" id="id_category">
               <?php echo $options; ?>
            </select>
            <br><br>
        </div>
        <div class="selectfield">
            <label for="time_defrost">Defrost time:</label>
            <br><br>
            <select name="time_defrost" id="time_defrost">
                <option value="01:00:00">1 hour</option>
                <option value="02:00:00">2 hour</option>
                <option value="03:00:00">3 hour</option>
                <option value="04:00:00">4 hour</option>
                <option value="05:00:00">5 hour</option>
                <option value="06:00:00">6 hour</option>
                <option value="09:00:00">9 hour</option>
                <option value="12:00:00">12 hour</option>
                <option value="16:00:00">16 hour</option>
                <option value="24:00:00">1 day</option>
                <option value="48:00:00">2 days</option>
                <option value="72:00:00">3 days</option>
                <option value="168:00:00">1 week</option>
            </select>
        </div>
        <div class="selectfield" id="dlc">
            <label for="time_limit">Expiration Time:</label>
            <br><br>
            <select name="time_limit" id="time_limit">
                <option value="01:00:00">1 hour</option>
                <option value="02:00:00">2 hour</option>
                <option value="03:00:00">3 hour</option>
                <option value="04:00:00">4 hour</option>
                <option value="05:00:00">5 hour</option>
                <option value="06:00:00">6 hour</option>
                <option value="09:00:00">9 hour</option>
                <option value="12:00:00">12 hour</option>
                <option value="16:00:00">16 hour</option>
                <option value="24:00:00">1 day</option>
                <option value="48:00:00">2 days</option>
                <option value="72:00:00">3 days</option>
                <option value="168:00:00">1 week</option>
            </select>
        </div>
        <div class="imageupload">
        <label for="img_product">Image Product (optional)</label>
        <br>
        <input type="file" name="img_product" class="choosefile" placeholder="hhh">
        </div>
        <button type="submit" name="submit">add new product</button>
    </form>
</div>


<?php
include 'inc/footer.inc.php';
?>
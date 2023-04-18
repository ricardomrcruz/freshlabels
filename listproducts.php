<?php

include 'inc/connect.inc.php'; //connetion to database
include 'inc/functions.inc.php'; //functions
include 'inc/cookie.php'; //cookie status
include 'controller/product_list.php';


if( ! user_is_admin() ){
    header('location: home.php');
    exit(); //on bloque l'execution du code qui suit cette ligne
}

//display 

include 'inc/header.inc.php'; //html header


?>
<div class="return">
    <a href="user.php"><i class="fa-solid fa-arrow-rotate-left"></i></a>
</div>
<div class="listcontainer"> <!-- main.table--->
    
    <h1>List of Products</h1>
    <section class="table__body"> 
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Category</th>
                    <th scope="col">Image</th>
                    <th scope="col"></th>
                </tr>
            </thead>
    
            <tbody>
                
                    <?php echo $list; ?>
                
            </tbody>

    </section>       

        </table>
    
    
</div>   
</section>

<?php

include 'inc/footer.inc.php';
?>
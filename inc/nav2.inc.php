<nav>



    <a href="home.php"><img src="./assets/img/restaurant-icon-png-4887.png" alt=""></a>
    <ul>
        <li><a class="navlinks" href="home.php"> Dashboard</a></li>
        <?php
        if ($_SESSION['user']['status'] = 2) {
            echo '<li><a class="navlinks" href="listproducts.php"> List Products</a></li>
        <li><a class="navlinks" href="addproduct.php"> Add Product</a></li>
        <li><a class="navlinks" href="userregister.php">Register User</a></li>';
        } else {
            echo '';
        } ?>
        <li class="logout"><a class="navlinks" href="logout.php"><i class="fa-solid fa-right-from-bracket"></i> Change Account</a></li>

    </ul>

</nav>

<section class="secondhalf">
    <div id="searchnav" class="flex">
        <div id="search" class="flex">
            <form action="" class="search-bar">   
            <input id="input" type="text" placeholder="search product" name="q">
            <button type="submit" class="searchbutton"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>
        <div class="links">
            <a href="#"><i class="fa-solid fa-gear"></i></a>
        </div>
    </div>
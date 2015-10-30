<?php
    include 'header.php';
    require 'connection.php';
?>
 

<?php
    $param = $_GET["name"]; //get the parameter from url in this page after "?"
    $sellername = str_replace('%20',' ',$param);
    $sql = "SELECT * FROM info where name='".$sellername ."'"; 
    $result1 = $mysqli->query($sql); // error detection
    if(!$result1){
        echo $mysqli->error;
    }   
?>

<?php
    $sql = "SELECT * FROM seller where name='".$sellername ."'"; 
    $result2 = $mysqli->query($sql); // error detection
    if(!$result2){
        echo $mysqli->error;
    }
?>
    <div id='mainbody'>

        <!-- left side of mainbody, showing categories -->
        <div id="categoryleft">  
            <h2>House</h2>
                <p><img src="img/category_1.jpg" width="30" height="30"><a href="list.php?category=HC">House Cleaning</a></p>
                <p><img src="img/category_1.jpg" width="30" height="30"><a href="list.php?category=GD">Gardening</a></p>
                <p><img src="img/category_1.jpg" width="30" height="30"><a href="list.php?category=PB">Plumbing</a></p>
                <p><img src="img/category_1.jpg" width="30" height="30"><a href="list.php?category=RP">Repairing</a></p>

            <h2>Service</h2>
                <p><img src="img/category_2.jpg"  width="30" height="30"><a href="list.php?category=WD">Walking Dog</a></p>
                <p><img src="img/category_2.jpg"  width="30" height="30"><a href="list.php?category=CD">Chauffeur Drive</a></p>
                <p><img src="img/category_2.jpg"  width="30" height="30"><a href="list.php?category=GP">Grocery Purchase</a></p>
                <p><img src="img/category_2.jpg"  width="30" height="30"><a href="list.php?category=MM">Move in &#124; out</a></p>
            
            <h2>Cooking</h2>
                <p><img src="img/category_3.jpg"  width="30" height="30"><a href="list.php?category=FR">French</a></p>
                <p><img src="img/category_3.jpg"  width="30" height="30"><a href="list.php?category=JA">Japanese</a></p>
                <p><img src="img/category_3.jpg"  width="30" height="30"><a href="list.php?category=CH">Chinese</a></p>
                <p><img src="img/category_3.jpg"  width="30" height="30"><a href="list.php?category=IN">Indian</a></p>
            
            <h2>Tutor</h2>
                <p><img src="img/category_4.jpg"  width="30" height="30"><a href="list.php?category=SP">Spanish</a></p>
                <p><img src="img/category_4.jpg"  width="30" height="30"><a href="list.php?category=SW">Swim</a></p>
                <p><img src="img/category_4.jpg"  width="30" height="30"><a href="list.php?category=DR">Drive</a></p>
                <p><img src="img/category_4.jpg"  width="30" height="30"><a href="list.php?category=CO">Computer</a></p>
        </div>
        
        
        
        
        
         
        <!-- right of mainbody showing seller information -->
        <div id="categoryright">   
            
            
            
            
            
        
    <?php
        while(list($category,$name,$description,$img) = $result2->fetch_row()) {   
    ?>
            
                <img class='sellerprofileimg' src="<?= $img ?>"alt='sellers' width='300' height='300'></a>
                <h1><?= $name ?></h1>
        
    <?php 
        while(list($id,$name,$hour,$price) = $result1->fetch_row()) {  
    ?>
                <p><?= $id?> <?=$hour?> <?=$price ?> Add to Cart</p>  
    <?php 
            }
    ?>      
                <div  class="sellerprofiledescription">
                    <p><?= $description ?></p>
                </div>

    <?php  
    }
    ?>







        </div><!-- end of categoryright div -->

        
        
        
        
    </div> <!-- end of mainbody div -->
<?php
    include 'foot.php';
    require 'close.php';
?>
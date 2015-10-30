<?php
    include 'header.php';
    require 'connection.php';
?>


<?php
    $param = $_GET["category"]; //get the parameter from url in this page after "?"
    $sql = "SELECT * FROM seller where category='".$param."'"; // sql = from table "seller" and category = $param
    $result = $mysqli->query($sql); // error detection
    if(!$result){
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
        
        
        
        <!-- right of mainbody showing seller list in one category -->
        <div id="categoryright">
            <img src="img/<?=$param ?>.jpg" width="830" height="150"/>
             <p>You are browsing category: <?=$param ?></p>

<?php
        while(list($category,$name,$description,$img) = $result->fetch_row()) { //fetch seller's information from sql "seller"
?>
         <!-- right of mainbody showing seller list in one category, one div has one seller-->       
        <div class='listseller'>
            <a href = "profile.php?name=<?=$name?>"><img class='logo' src="<?= $img ?>" alt='sellers' width='180' height='130'></a>
            <p><a href = "profile.php?name=<?=$name?>"><?= $name ?></a></p>
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

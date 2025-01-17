<?php
    include 'header.php';
    require 'connection.php';
?>
<?php
    $param = $_GET["search"]; //get the parameter from url in this page after "?"
    if ($param) {
        $name = str_replace('+',' ',$param);
        $sql = "SELECT category, name, description, img FROM product where name LIKE '%".$name."%' and in_stock > 0";
        $result = $mysqli->query($sql);
        if(!$result){  // error detection
            echo $mysqli->error;
        }
    }
?>
<div id="searchdiv" >
    <h1>Please Enter your Search</h1>
    <form action="search.php">
        <input type="text" name="search" class="searchform"> <input type="submit" value="Search" class="searchsubmit">
    </form>

    <!-- if no result, do not show below -->
    <?php
    if($param){
    ?>
        <p>Result for"<?= $param ?>":</p>
    <?php
    }
    ?>

    <!-- show result as ol list ,  right now we support fuzzy search "seller name" such as clean, garden etc  -->
    <ol>
    <?php
        if ($param){
        while(list($category,$name,$description,$img) = $result->fetch_row()) {
    ?>
        <li><p><a href = "profile.php?name=<?=$name?>"><?= $name ?></a></p>
        <p><?= $description ?></p></li>
    <?php
        }}
    ?>
    </ol>
</div>
<?php
    require 'foot.php';
?>

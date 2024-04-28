<?php
require("../includes/database_connect.php");
  $ratting = $_POST['ratting'];
  $order_id = $_POST['order_id'];
 // echo($ratting);
  //echo($order_id);

 $sql = "UPDATE orders SET rating = $ratting WHERE shope_id =  $order_id";
 $result = mysqli_query($conn, $sql);
 if (!$result) {
     echo ("SQL went wrong");
     return;
 }
?>
<?php

 if($ratting == 1){
 // echo($ratting);
 ?>
<div id="s1" onclick="s1ha(this)" style="color: red; cursor: pointer">
    <i class="fa-solid fa-2x fa-star"></i>
</div>

<div id="s2" onclick="s2ha(this)" style="color: orange; cursor: pointer">
    <i class="fa-regular fa-2x fa-star"></i>
</div>

<div id="s3" onclick="s3ha(this)" style="color: yellow; cursor: pointer">
    <i class="fa-regular fa-2x fa-star"></i>
</div>

<div  id="s4" onclick="s4ha(this)" style="color: green; cursor: pointer">    
    <i class="fa-regular fa-2x fa-star"></i>
</div>

<div  id="s5" onclick="s5ha(this)" style="color: green; cursor: pointer">    
    <i class="fa-regular fa-2x fa-star"></i>
</div>
 <?php
 }
 elseif($ratting == 2){
    //echo($ratting);
?>
<div id="s1" onclick="s1ha(this)" style="color: red; cursor: pointer">
    <i class="fa-solid fa-2x fa-star"></i>
</div>

<div id="s2" onclick="s2ha(this)" style="color: orange; cursor: pointer">
    <i class="fa-solid fa-2x fa-star"></i>
</div>

<div id="s3" onclick="s3ha(this)" style="color: yellow; cursor: pointer">
    <i class="fa-regular fa-2x fa-star"></i>
</div>

<div  id="s4" onclick="s4ha(this)" style="color: green; cursor: pointer">    
    <i class="fa-regular fa-2x fa-star"></i>
</div>

<div  id="s5" onclick="s5ha(this)" style="color: green; cursor: pointer">    
    <i class="fa-regular fa-2x fa-star"></i>
</div>
<?php
 }
 elseif($ratting == 3){
    //echo($ratting);
    ?>
    <div id="s1" onclick="s1ha(this)" style="color: red; cursor: pointer">
        <i class="fa-solid fa-2x fa-star"></i>
    </div>

    <div id="s2" onclick="s2ha(this)" style="color: orange; cursor: pointer">
        <i class="fa-solid fa-2x fa-star"></i>
    </div>

    <div id="s3" onclick="s3ha(this)" style="color: yellow; cursor: pointer">
        <i class="fa-solid fa-2x fa-star"></i>
    </div>

    <div  id="s4" onclick="s4ha(this)" style="color: green; cursor: pointer">    
        <i class="fa-regular fa-2x fa-star"></i>
    </div>

    <div  id="s5" onclick="s5ha(this)" style="color: green; cursor: pointer">    
        <i class="fa-regular fa-2x fa-star"></i>
    </div>  
     <?php
 }
 elseif($ratting == 4){
    //echo($ratting);
    ?>
    <div id="s1" onclick="s1ha(this)" style="color: red; cursor: pointer">
        <i class="fa-solid fa-2x fa-star"></i>
    </div>

    <div id="s2" onclick="s2ha(this)" style="color: orange; cursor: pointer">
        <i class="fa-solid fa-2x fa-star"></i>
    </div>

    <div id="s3" onclick="s3ha(this)" style="color: yellow; cursor: pointer">
        <i class="fa-solid fa-2x fa-star"></i>
    </div>

    <div  id="s4" onclick="s4ha(this)" style="color: green; cursor: pointer">    
        <i class="fa-solid fa-2x fa-star"></i>
    </div>

    <div  id="s5" onclick="s5ha(this)" style="color: green; cursor: pointer">    
        <i class="fa-regular fa-2x fa-star"></i>
    </div>  
            <?php
 }
 elseif($ratting == 5){
    //echo($ratting);
    ?>
    <div id="s1" onclick="s1ha(this)" style="color: red; cursor: pointer">
        <i class="fa-solid fa-2x fa-star"></i>
    </div>

    <div id="s2" onclick="s2ha(this)" style="color: orange; cursor: pointer">
        <i class="fa-solid fa-2x fa-star"></i>
    </div>

    <div id="s3" onclick="s3ha(this)" style="color: yellow; cursor: pointer">
        <i class="fa-solid fa-2x fa-star"></i>
    </div>

    <div  id="s4" onclick="s4ha(this)" style="color: green; cursor: pointer">    
        <i class="fa-solid fa-2x fa-star"></i>
    </div>

    <div  id="s5" onclick="s5ha(this)" style="color: green; cursor: pointer">    
        <i class="fa-solid fa-2x fa-star"></i>
    </div>  
            <?php
 }
 ?>


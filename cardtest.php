<?php
?>
<!DOCTYPE html>
<html lang="en">


  <header>    
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Modal</title>
        <script defer src="modal.js"></script>
        <link rel="stylesheet" href="css/styles.css">
     </header>

    <!-- Gives the 4x4 layout of vehicles -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


               <!-- **********************************Code for slider**************************** -->
               <!-- youtube tutorial: https://www.youtube.com/watch?v=G4Af38gWl_Y -->
        <!-- <link rel="stylesheet" href="css/jquery.bxslider.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="/jquery.bxslider.js"></script>

<style type="text/css">
.slider{
    height: 300px;
    border: 1px solid red;
    margin-top: 5px;
}
</style>
<script>
  $(document).ready(function(){
    $('.slider').bxSlider();
  });
</script> -->

    <!-- ***********************  HEADER  *********************** -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Test -->
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script type="text/javascript" src="xhr.js"></script>
    <script type="text/javascript" src="admin.js"> </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=PT+Serif&family=Poppins:wght@500&display=swap" rel="stylesheet">
    <meta name="google-signin-client_id" content="773304142493-8agont039ue3v46c7qv8fll90c8d95vt.apps.googleusercontent.com">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css"  rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="css/catalogue-styles.css">
    <header>

      <script src="signout.js"></script>
      <script src="https://apis.google.com/js/platform.js" async defer></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
       integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

      <title>UniCars</title>
      <a href="index.html">
        <img class="logo"src="images\UniCars2.png" >
      </a>
          <div class="g-signin2" data-onsuccess="onSignIn"></div>
          <div class="data">
            <p id="name"></p>
            <img id="image" class="rounded-circle" width="50" height="50" />
            <button type="button" class="btn btn-danger" onclick="signOut();">Sign Out</button>
          </div>
          <button onclick="location.href='register.html'" class="btn-group">Sign-up</button>
          <button onclick="location.href='login.html'" class="btn-group login-btn">Login</button>
    </header>
  </head>
    <body onload="getData('admincatalogue.php', 'content' , bsearch.values());">

    <main>
      <!-- ***********************  NAVIGATION BAR  *********************** -->
      <div class="topnav">
        <a href="index.html">Home</a>
        <a class="active" href="catalogue.html">Catalogue</a>
        <a href="contact.html">Contact</a>
        <a href="about.html">About</a>
      </div>
  
          
      <!-- ********************  ABOUT BODY  ********************* -->
      <!--  -->
      
      <div class="container">
        <div class="box">
            <section class = "welcome"> <!-- using class welcome as placeholder while css file isnt made-->
                  
                    <h1>CATALOGUE</h1>
                    <br>
                    <form style = "width:700px";>
                    
                    <!-- <label>Please Type in a keyword for a specific vehicle  <input type="text" name="bsearch"> </label>
                    <input name="sbutton" type = "button" onClick = "getData('admincatalogue.php', 'content' , bsearch.value)" value = "Search"> 
                    <br> -->
                                    
                    <?php  include ("Dbconn.php");
                    $query = "SELECT * FROM catalogue";
                    $result = mysqli_query($conn,$query);

  
                    if(mysqli_num_rows($result)>0){
                    while ($row = mysqli_fetch_array($result))
                    { 
                        $images = '<img src="data:image;base64,'.base64_encode($row['images']).'" style="width:250px; height:170px;" alt="" /><br />';
                        $images2 = '<img src="data:image;base64,'.base64_encode($row['images2']).'" style="width:250px; height:170px;" alt="" /><br />';
                        $images3 = '<img src="data:image;base64,'.base64_encode($row['images3']).'" style="width:250px; height:170px;" alt="" /><br />';?>

                        <div class="col-md-4" style = "width:325px;"> <br> 

                        <form method="post" action="cardtest.php?action=add&id=<?php echo $row["catalogid"]?>">
                        <div style= "height: 350px; border: 1px solid #333; background-color:#f1f1f11; border-radius:5px; padding: 5px 10px 15px 20px; font-family: 'Poppins', sans-serif; ?>">
                        
                        <!-- Slider not working, other images are commented out -->
                        <br> <div class="slider">
                        <div><?php echo $images ?>
                        <!-- <div><?php echo $images2 ?></div>
                        <div><?php echo $images3 ?></div> -->
                        <!-- </div> -->
                        
                        <br>
                        <h3 class ="text-info"><?php echo $row['myear'];?>
                        <?php echo" ";
                        echo $row['make'];
                        echo" ";
                        echo $row['vname'];
                        
                        ?><br><?php
                        echo" $";
                        echo $row['price'];
                        echo"<br>";?>
                        <!-- Description, size needs fixing and placement is way off -->
                        <h2 class ="text-info"> <?php echo $row['descrip'];?>  </div>

                        <body>
                        <button data-modal-target="#modal">Full Listing</button>
                        <div class="modal" id="modal">
                        <div class="modal-header">
                        <div class="title"> Full Listing </div>
                        <button data-close-button class="close-button">&times;</button>
                        </div>
    
                        <div class="modal-body">
                        aaaaaaaaaa
                        </div>
                        </div>
                        <div id="overlay"></div>
                        </body>
                        
                      </div>                    
                </form>     
            </div>
         <br>          
    </div>
<?php 
                    }
}
?>
              </section>
      </div>  
</div>
   
      
      <!-- *****************  FOOTER  ***************** -->
      <footer>
        <div class="content-wrap">
          <h1>SOCIAL MEDIA</h1>
          <!-- Social media and contact links. Add or remove any networks. -->
            <span>
              <a href="https://twitter.com/home">
                <img class = "links"  src="images\twitter.png">
                <a href="https://www.linkedin.com/in/william-quinn-03694a218/">
                <img class = "links"  src="images\linkedin.png">
                <a href="https://www.facebook.com">
                <img class = "links"  src="images\facebook.png">
            </span>
        </div>
      </footer>
    </main>
  </body>
</html>

</body>
</html>
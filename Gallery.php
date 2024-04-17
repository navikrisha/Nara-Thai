<?php
// Connect to your database
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "nara thai";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch image paths from the database
$sql = "SELECT image FROM gallery";
$result = $conn->query($sql);

// Create an array to store image paths
$imagePaths = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Assuming your images are stored in the 'uploaded_img' folder
        $imagePaths[] = './Images/Gallery/' . $row["image"];
    }
}

$conn->close();
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Gallery</title>
    <link rel="stylesheet" href="Gallery.css" />
    <script src="script.js" defer></script>
    
  </head>
  <body>
    <header>
      <div class="navigation">
        <!--navigation bar-->
        <div class="logo">
          <img src="Images/narathailogo.jpg" alt="" />
        </div>
        <ul class="links">
          <li><a href="Home.php">Home</a></li>
          <li><a href="About.html">About</a></li>
          <li><a href="./proj/menu.php">Menu</a></li>
          <li><a id="active-link" href="">Gallery</a></li>
          <li><a href="Reservation.html">Reservation</a></li>
          <li><a href="feedback/Contact.php">Contact</a></li>
          <button class="login-btn">Signup</button>
        </ul>
      </div>
    </header>
    <!-- login /Register-->
    <div class="blur-bg-overlay"></div>
    <div class="form-popup">
        <span class="close-btn material-symbols-rounded">close</span>
        <div class="form-box login">
            <div class="form-details">
               <!-- <h2>Welcome Back</h2>
                <p>Please log in using your personal information to stay connected with us.</p>-->
            </div>
            <div class="form-content">
              
              
                <h2>LOGIN</h2>
                <form action="userlogin.php" method = "Post">
                    <div class="input-field">
                        <input type="email" name="email" required>
                        <label>Email</label>
                    </div>
                    <div class="input-field">
                        <input type="password" name="password" required>
                        <label>Password</label>
                    </div>
                  
                    <a href="#" class="forgot-pass-link">Forgot password?</a>
                    <button class="login-button" type="submit">Sign up</button>
                </form>
                <div class="bottom-link">
                    Don't have an account?
                    <a href="#" id="signup-link">Signup</a>
                </div>
            </div>
        </div>
        <div class="form-box signup">
            <div class="form-details">
                <!--<h2>Create Account</h2>
                <p>To become a part of our community, please sign up using your personal information.</p>-->
            </div>
            <div class="form-content">
                <h2>SIGNUP</h2>
                <form action="userregister.php" method = "Post">
                    <div class="input-field">
                        <input type="email" name="email" required>
                        <label>Enter your email</label>
                    </div>
                    <div class="input-field">
                        <input type="password" name="password" required>
                        <label>Create password</label>
                    </div> 
                     <div class="input-field">
                        <input type="text" name="Phone" required>
                        <label>Contact Number</label>
                    </div>
                    <div class="policy-text">
                        <input type="checkbox" id="policy">
                        <label for="policy">
                            I agree the
                            <a href="#" class="option">Terms & Conditions</a>
                        </label>
                    </div>
                    <button class="login-button" type="submit">Sign Up</button>
                </form>
                <div class="bottom-link">
                    Already have an account? 
                    <a href="#" id="login-link">Login</a>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    
      <section id="gallery">
        <!-- Gallery Section Content -->
        <div class="gallery">
          <h2>Photo Gallery</h2>
          <div class="gallery-images">
          <?php
// Loop through the image paths and generate image tags
 foreach ($imagePaths as $path) {
    echo '<img src="' . $path . '" alt="Gallery Image">';
}
?>
           <!-- <img src="Images/Gallery/PIC1.jpg" alt="Gallery Image 1">
            <img src="Images/Gallery/PIC2.jpg" alt="Gallery Image 2">
            <img src="Images/Gallery/PIC3.jpeg" alt="Gallery Image 3">
            <img src="Images/Gallery/PIC4.jpg" alt="Gallery Image 4">   
            <br>
            <br>
            <img src="Images/Gallery/PIC5.jpg" alt="Gallery Image 5">
            <img src="Images/Gallery/PIC6.jpg" alt="Gallery Image 6">
            <img src="Images/Gallery/PIC7.jpg" alt="Gallery Image 7">
            <img src="Images/Gallery/PIC8.png" alt="Gallery Image 8">   
            <br>
            <br>
            <img src="Images/Gallery/PIC9.jpg" alt="Gallery Image 9">
            <img src="Images/Gallery/PIC10.jpg" alt="Gallery Image 10">
            <img src="Images/Gallery/PIC11.jpg" alt="Gallery Image 11">
            <img src="Images/Gallery/PIC12.jpg" alt="Gallery Image 12">   
            <br>
            <br>
            <img src="Images/Gallery/PIC13.jpg" alt="Gallery Image 1">
            <img src="Images/Gallery/PIC14.jpg" alt="Gallery Image 1">
            <img src="Images/Gallery/PIC15.jpg" alt="Gallery Image 1">
            <img src="Images/Gallery/PIC16.jpg" alt="Gallery Image 1">   
            <br>
            <br>
            <img src="Images/Gallery/PIC17.jpg" alt="Gallery Image 1">
            <img src="Images/Gallery/PIC18.jpg" alt="Gallery Image 1">
            <img src="Images/Gallery/PIC19.jpg" alt="Gallery Image 1">
            <img src="Images/Gallery/PIC20.jpg" alt="Gallery Image 1">   
            <br>
            <br>
            <img src="Images/Gallery/PIC21.jpg" alt="Gallery Image 1">
            <img src="Images/Gallery/PIC22.jpg" alt="Gallery Image 1">
            <img src="Images/Gallery/PIC23.jpg" alt="Gallery Image 1">
            <img src="Images/Gallery/PIC24.jpg" alt="Gallery Image 1">   
            <br>
            <br>
            <img src="Images/Gallery/PIC25.jpg" alt="Gallery Image 1">
            <img src="Images/Gallery/PIC26.webp" alt="Gallery Image 1">
            <img src="Images/Gallery/PIC27.jpg" alt="Gallery Image 1">
            <img src="Images/Gallery/PIC28.jpg" alt="Gallery Image 1">   
            <br>
            <br>
            <img src="Images/Gallery/PIC29.jpg" alt="Gallery Image 1">
            <img src="Images/Gallery/PIC30.jpg" alt="Gallery Image 1">
            <img src="Images/Gallery/PIC31.webp" alt="Gallery Image 1">
            <img src="Images/Gallery/PIC32.png" alt="Gallery Image 1">   -->
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <footer>
      <!--footer-->
      <div class="footer-details">

        <div class="logo-footer">
            <img src="Images/narathailogo.jpg" alt="">
        </div>

        <div class="links-footer">
            <ul>
                <li id="titles">Quick Links</li>
                <li><a href="Gallery.html">Gallery</a></li>
                <li><a href="Reservation.html">Reservation</a></li>
                <li><a href="Contact.html">Contact</a></li>
            </ul>
        </div>
        <div class="hours-footer">
            <ul>
                <li id="titles" >Opening Hours</li>
                <li>MONDAY – THURSDAY</li>
                <li>12.00 – 3.30 PM & 6.30 -10.30 PM</li>
                <li>FRIDAY – SUNDAY</li>
                <li>12.00 – 3.30 PM & 6.30 -10.30 PM</li>
            </ul>
        </div>
      </div>
   
    </footer>

          
        </div>
        </div>
      </section>
   </body>
   </html>
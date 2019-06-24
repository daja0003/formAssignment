<!--PHP Code to configure the form error messages and feedback-->
<?php
    // configure the variables error that will be filled in the appearing errors messages and success that will be used as a flag to empty the fields
    $error = NULL;
    $success = false;
    if (isset($_GET["enter"])) {
        if (!empty($_GET["fname"])) {
            $name = $_GET["fname"];
        } else {
            $error .= "<p class=\"error\">Your Name?</p>";
        }

        if (!empty($_GET["email"])) {
            $em = $_GET["email"];
        } else {
            $error .= "<p class=\"error\">E-Mail?</p>";
        }
        
        if (!empty($_GET["message"])) {
            $msg = $_GET["message"];
        } else {
            $error .= "<p class=\"error\">Message?</p>";
        }
        
        //create the feedback
        if (!empty($name) && !empty($em) && !empty($msg)) {
            $success = true;
            $feedback = "<p class=\"feedback\">Hello {$name}. Thank you for your message:<br><em>{$msg}</em></p><p class=\"feedback\">We are going to e-mail you at {$em} if any change happens in your program</p>";
        }
    }
?>

<!doctype html>
<html>
	<head>
		<title>Assignment Form</title>
		<?php include "./server-side-script/links.php" ?>
	</head>
<!-- Start the page body -->
	<body>
<!------------------------------------------------------------------------------------------------------------->
<!--start header area  -->
	<header>
        <?php include "./server-side-script/navigation.php" ?>
<!-- To add a background image and the form name on it	-->
			<div class="masthead-bg">
                    <div class="tagbox">
                        <h1 id="tag-line">Handle Form</h1>
                    </div>
                </div>
		</header>
<!-- end header -->
<!-------------------------------------------------------------------------------------------------------->
<!-- start section -->
		<main>
            <form class="formContent">
                    <fieldset>
                        <legend>Form Assignment</legend>
                        <div class="arrangeBox">
                        <div class="box">
                            <label for="fullname">Full Name</label>
                            <input type="text" value="<?php if(isset($name) && $success === false) {echo $name;}?>" placeholder="Enter Your Full Name" name="fname" id="fullname">
                        </div>
                        <div class="box2">
                            <label for="email">Email</label>
                            <input type="text" value="<?php if(isset($em) && $success === false) {echo $em;}?>" placeholder="ex: name@mail.com" name="email" id="email">
                        </div>
                        </div>
                        <div class="box3">
                            <label for="message">Messages</label>
                            <textarea type="text" value="<?php if(isset($msg) && $success === false) {echo $msg;}?>" placeholder="Enter Your Comments" name="message" id="message"><?php if(isset($msg) && $success === false) {echo $msg;}?></textarea>
                        </div>
                        <div class="button">
                            <input type="submit" value="Submit" id="submit" name="enter">
                        </div>
                    </fieldset>
                </form>

                <?php 
        if (isset($error)) {
            echo $error;
        }
        
        if (isset($feedback)) {
            echo $feedback;
        }
           ?>
        
		</main>

		<footer>
                <?php include "./server-side-script/media.php" ?>
                <div class="companyDetails">
                    <h2>The Developers Company</h2>
                    <h4>Address:</h4>
                    <p>125 Spring Avenue</p>
                    <h4>Telephone:</h4>
                    <p>(613)555-5555</p>
                </div>



		</footer>
<!-- start script area -->
<!-- script that makes the humburger menu open and close -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
	<script>
//Configure two variables (hamburger with the value of class hamburger that exists in the button div & toggle that is linked to the header nav ul)
	  var $hamburger = $(".hamburger");
	  var $toggle = $("header nav ul");
// When clicking on the hamburger icon, activate the icon (make it open) and show the links in the class toggle 
	  $hamburger.on("click", function(e) {
	    $hamburger.toggleClass("is-active");
	    $toggle.toggleClass("toggle");
	  });
	</script>
<!-- end hamburger script -->
</body>
</html>
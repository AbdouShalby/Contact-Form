<?php
// Check If User Coming From A Request
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Assign Variables
    $user           = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
    $email          = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $mobile         = filter_var($_POST["mobile"], FILTER_SANITIZE_NUMBER_INT);
    $message        = filter_var($_POST["message"], FILTER_SANITIZE_STRING);

    // Array Of Errors
    $formErrors = array();
    if (strlen($user) <= 3) {
        $formErrors[] = "Your Full Name Must Be Larger Than <strong>3</strong> Characters";
    }
    if (strlen($message) <= 10) {
        $formErrors[] = "Message Can't Be Less Than <strong>10</strong> Characters";
    }

    // If No Errors Send The Email [ mail(To, Subject, Message, Headers, Parameters) ]
    $myEmail = "abdoushalby@gmail.com";
    $subject = "Contact Form";
    $headers = "From: " . $email . "\r\n";
    if (empty($formErrors)) {
        mail($myEmail, $subject, $message, $headers);
        $user       = "";
        $email      = "";
        $mobile     = "";
        $message    = "";

        $success = "<div class='alert alert-success custom-alert'>We Have Received Your Message</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact Form</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respind/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<!-- Start Form -->
<div class="container">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans:400,700" rel="stylesheet">

    <div class="container">
        <div class="box">
            <div class="animation">
                <div class="one spin-one"></div>
                <div class="two spin-two"></div>
                <div class="three spin-one"></div>
            </div>
            <h1>Under maintenance</h1>
            <p>Update in progress.  Please run installer to finish update.</p>
        </div>
        <hr>
        <h2 class="text-center">Contact Us</h2>
        <form class="contact-form" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            <div class="form-group">
                <input
                        class="username form-control"
                        type="text"
                        name="username"
                        placeholder="Full Name"
                        value="<?php if (isset($user)) { echo $user; }?>"
                />
                <i class="fa fa-user fa-fw"></i>
                <span class="asterisk">*</span>
                <div class="alert alert-danger custom-alert">Your Full Name Must Be Larger Than <strong>3</strong> Characters</div>
            </div>
            <div class="form-group">
                <input
                        class="email form-control"
                        type="email"
                        name="email"
                        placeholder="Example@Email.com"
                        value="<?php if (isset($email)) { echo $email; }?>"
                />
                <i class="fa fa-envelope fa-fw"></i>
                <span class="asterisk">*</span>
                <div class="alert alert-danger custom-alert">Email Can't Be <strong>Empty</strong></div>
            </div>
            <input
                    class="form-control"
                    type="text"
                    name="mobile"
                    placeholder="Mobile Number"
                    value="<?php if (isset($mobile)) { echo $mobile; }?>"
            />
            <i class="fa fa-phone fa-fw"></i>
            <div class="form-group">
                <textarea
                        class="message form-control"
                        name="message"
                        placeholder="Your Message!"><?php if (isset($message)) { echo $message; }?></textarea>
                <span class="asterisk">*</span>
                <div class="alert alert-danger custom-alert">Message Can't Be Less Than <strong>10</strong> Characters</div>
            </div>
            <input
                    class="btn btn-success custom-button"
                    type="submit"
                    value="Send Message"
            />
            <i class="fa fa-send fa-fw send-icon"></i>
            <?php if (!empty($formErrors)) { ?>
                <div class="alert alert-danger alert-dismissible" role="start">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <?php
                    foreach ($formErrors as $error) {
                        echo $error . "<br>";
                    }
                    ?>
                </div>
            <?php } ?>
            <?php if (isset($success)) {echo $success;} ?>
        </form>
    </div>
</div>
<!-- End Form -->

<script src="js/jquery-1.12.4.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/custom.js"></script>
</body>
</html>
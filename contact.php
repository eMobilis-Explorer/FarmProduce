<?php

// using PHPMailer to handle mails

require __DIR__ . '/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
// require 'path/to/composer/vendor/autoload.php';


// PHP Validation

$errors = [];
$errorMessage = '';

if (!empty($_POST)) {
    $fname = $_POST['first_name'];
    $lname = $_POST['last_name'];
    $email = $_POST['email'];
    $message = $_POST['comments'];

    if (empty($fname)) {
        $errors[] = 'First Name is empty';
    }
    if (empty($lname)) {
        $errors[] = 'Last Name is empty';
    }

    if (empty($email)) {
        $errors[] = 'Email is empty';
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Email is invalid';
    }

    if (empty($message)) {
        $errors[] = 'Message is empty';
    }

    // if (!empty($errors)) {
    //     $allErrors = join('<br/>', $errors);
    //     $errorMessage = "<p style='color: red;'>{$allErrors}</p>";

    // }


    // PHP Send Message

    if (empty($errors)) {
        $toEmail = 'leskimuti@gmail.com';
        $emailSubject = 'New email from your contact form';
        $headers = ['From' => $email, 'Reply-To' => $email, 'Content-type' => 'text/html; charset=iso-8859-1'];

        $bodyParagraphs = ["First Name: {$fname}", "Last Name: {$lname}",  "Email: {$email}", "Message:", $message];
        $body = join(PHP_EOL, $bodyParagraphs);

        if (mail($toEmail, $emailSubject, $body, $headers)) {
            header('Location: contact.php');
        } else {
            $errorMessage = 'Oops, something went wrong. Please try again later';
        }
    } else {
        $allErrors = join('<br/>', $errors);
        $errorMessage = "<p style='color: red;'>{$allErrors}</p>";
    }
}




// } else {
//     $mail = new PHPMailer();

//     // specify SMTP credentials
//     $mail->isSMTP();
//     $mail->Host = 'smtp.sendgrid.net';
//     $mail->SMTPAuth = true;
//     $mail->Username = 'apikey';
//     $mail->Password = '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';
//     $mail->SMTPSecure = 'tls';
//     $mail->Port = 25;

//     $mail->setFrom($email, 'Mailtrap Website');
//     $mail->addAddress('piotr@mailtrap.io', 'Me');
//     $mail->Subject = 'New message from your website';

//     // Enable HTML if needed
//     $mail->isHTML(true);

// $bodyParagraphs = ["First Name: {$fname}", "Last Name: {$lname}",  "Email: {$email}", "Message:", $message];

// $to = "leskimuti@gmail.com"; // this is your Email address
// $from = $email;
// $subject = 'New message from your website';
// // $subject2 = 'Copy of your submission';

// $bodyParagraphs = ["First Name: {$fname}", "Last Name: {$lname}", "Email: {$email}", "Message:", nl2br($message)];
// $body = join('<br />', $bodyParagraphs);


// // $mail->Body = $body;

// mail($to, $subject, $$body, $headers);
// // mail($from,$subject2,$message2,$headers2); //copy of message to sender

// echo $body;

// if ($mail->send()){

// if (mail()) {

//     header('Location: thank-you.html'); // redirect to 'thank you' page
// } else {
//     // $errorMessage = 'Oops, something went wrong. Mailer Error: ' . $mail->ErrorInfo;
//     $errorMessage = 'Oops, something went wrong. Mailer Error: ' . mail(error_log());
// }
//     }
// }






// PHP Validation







// PHP Send Message




// Include header file

include './php/header.php';

?>

<title>Contact us</title>
<link rel="stylesheet" href="css/contact.css">
</head>

<body>

    <!-- Add the shopping cart count + Navbar header -->
    <?php

    include './php/navbarhead.php';

    include './php/navbarfooter.php';

    ?>

    <!-- Add the shopping cart count + Navbar header -->


    <div class="container_contact">
        <div class="row_contact header">
            <h1>CONTACT US &nbsp;</h1>
            <h3>Fill out the form below to learn more!</h3>
        </div>
        <div class="row_contact body">
            <form action="mailto:leskimuti@gmail.com" method="POST" id="contact-form">
                <ul>

                    <li>
                        <p class="left">
                            <label for="first_name">first name</label>
                            <input type="text" name="first_name" placeholder="First Name" />
                        </p>
                    </li>
                    <li>
                        <p class="pull-right">
                            <label for="last_name">last name</label>
                            <input type="text" name="last_name" placeholder="Last Name" />
                        </p>
                    </li>

                    <li>
                        <p>
                            <label for="email">email <span class="req">*</span></label>
                            <input type="email" name="email" placeholder="Your Email" />
                        </p>
                    </li>
                    <li>
                        <div class="divider"></div>
                    </li>
                    <li>
                        <label for="comments">comments</label>
                        <textarea cols="46" rows="3" name="comments"></textarea>
                    </li>

                    <li>
                        <a href="">
                            <button class="btn btn-submit" type="submit">Submit</button>
                            <!-- <input class="btn btn-submit" type="submit" value="Submit" /> -->
                            <small>or press <strong>enter</strong></small>
                        </a>

                    </li>

                </ul>

                <?php
                if (!empty($errors)) {
                    $allErrors = join('<br/>', $errors);
                    $errorMessage = "<p style='color: red;'>{$allErrors}</p>";
                }
                ?>
            </form>
        </div>
    </div>







    <footer class="footer_cart">
        <?php



        // Include footer file
        include './php/footerall.php';

        ?>

        <script src="//cdnjs.cloudflare.com/ajax/libs/validate.js/0.13.1/validate.min.js"></script>

        <?php

        include './php/footer.php';

        ?>
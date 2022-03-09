<?php

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
            <form action="#">
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
                        <a href="mailto:leskimuti@gmail.com">
                            <button class="btn btn-submit" type="submit">Submit</button>
                            <!-- <input class="btn btn-submit" type="submit" value="Submit" /> -->
                            <small>or press <strong>enter</strong></small>
                        </a>

                    </li>

                </ul>
            </form>
        </div>
    </div>







    <footer class="footer_cart">
        <?php

        // Include footer file
        include './php/footerall.php';

        include './php/footer.php';

        ?>
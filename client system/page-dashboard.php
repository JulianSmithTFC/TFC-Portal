<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Title</title>

    <?php

    session_start();
    $uid = $_SESSION["uid"];

    include '../business system/config.php';

    // Get Current Users Info From Database
    $result = $conn->query("SELECT * FROM clients WHERE uid='$uid'");
    $user = $result->fetch_assoc();

    $conn->close();

    $fname = $user['fname'];
    $lname = $user['lname'];

    $uid = $user['uid'];

    $initials = ($fname[0] . $lname[0]);
    ?>



    <!-- Google Firebase Auth -->
    <script src="https://www.gstatic.com/firebasejs/6.0.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/6.0.1/firebase-auth.js"></script>
    <script type="text/javascript" src="../js/login client portal/config.js"></script>
    <script type="text/javascript" src="../js/login client portal/enforcer.js"></script>

    <!-- JS Progress Bar -->
    <script type="text/javascript" src="../libraries/progressbar-master/dist/progressbar.min.js"></script>



    <?php
    include '../libraries/includes-header.php';
    ?>

    <style>
        .progressBar {
            margin: 20px;
            width: 200px;
            height: 200px;
            position: relative;
        }
    </style>

</head>

<body class="white lighten-3">

<?php
include '../templet parts/cp-mainNavigation.php';
?>


<!--Main layout-->
<main class="pt-5 mx-lg-5">
    <div class="container-fluid mt-5">

        <!-- Main Content Goes Here -->
        <div style="padding-top: 50px">
            <h1>Hi <?php echo $fname . ' ' . $lname; ?>!</h1>

            <div class="container">
                <div class="row">

                    <?php
                    include '../business system/config.php';

                    // Checks to see if the user has any website tickets
                    $result_web = $conn->query("SELECT * FROM newWebsiteTicket WHERE clinetuid='$uid'");

                    if ($result_web->num_rows != 0){

                        $webTickets = mysqli_fetch_all( $result_web, MYSQLI_ASSOC);

                        include 'functions/functions-trello.php';

                        foreach ($webTickets as $keys){
                            $copiedBoardID = $keys['trelloID'];
                            $id = $keys['websiteTicketID'];

                            $progressArray = getBoardProgress($copiedBoardID);

                            $toDo = $progressArray['0']['percentage'];
                            $doing = $progressArray['1']['percentage'];
                            $done = $progressArray['2']['percentage'];

                            ?>


                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div id="toDo<?php echo $id ?>" class="progressBar"></div>
                                <script>
                                    // progressbar.js@1.0.0 version is used
                                    // Docs: http://progressbarjs.readthedocs.org/en/1.0.0/

                                    var bar = new ProgressBar.Circle(<?php echo('toDo' . $id) ?>, {
                                        color: '#aaa',
                                        // This has to be the same size as the maximum width to
                                        // prevent clipping
                                        strokeWidth: 4,
                                        trailWidth: 1,
                                        easing: 'easeInOut',
                                        duration: 1400,
                                        text: {
                                            autoStyleContainer: false
                                        },
                                        from: { color: '#aaa', width: 1 },
                                        to: { color: '#333', width: 4 },
                                        // Set default step function for all animate calls
                                        step: function(state, circle) {
                                            circle.path.setAttribute('stroke', state.color);
                                            circle.path.setAttribute('stroke-width', state.width);

                                            var value = Math.round(circle.value() * <?php echo $toDo ?>);
                                            if (value === 0) {
                                                circle.setText('');
                                            } else {
                                                circle.setText(value);
                                            }

                                        }
                                    });
                                    bar.text.style.fontFamily = '"Raleway", Helvetica, sans-serif';
                                    bar.text.style.fontSize = '2rem';

                                    bar.animate(1.0);  // Number from 0.0 to 1.0
                                </script>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div id="doing<?php echo $id ?>" class="progressBar"></div>
                                <script>
                                    // progressbar.js@1.0.0 version is used
                                    // Docs: http://progressbarjs.readthedocs.org/en/1.0.0/

                                    var bar = new ProgressBar.Circle(<?php echo('doing' . $id) ?>, {
                                        color: '#aaa',
                                        // This has to be the same size as the maximum width to
                                        // prevent clipping
                                        strokeWidth: 4,
                                        trailWidth: 1,
                                        easing: 'easeInOut',
                                        duration: 1400,
                                        text: {
                                            autoStyleContainer: false
                                        },
                                        from: { color: '#aaa', width: 1 },
                                        to: { color: '#333', width: 4 },
                                        // Set default step function for all animate calls
                                        step: function(state, circle) {
                                            circle.path.setAttribute('stroke', state.color);
                                            circle.path.setAttribute('stroke-width', state.width);

                                            var value = Math.round(circle.value() * <?php echo $doing ?>);
                                            if (value === 0) {
                                                circle.setText('');
                                            } else {
                                                circle.setText(value);
                                            }

                                        }
                                    });
                                    bar.text.style.fontFamily = '"Raleway", Helvetica, sans-serif';
                                    bar.text.style.fontSize = '2rem';

                                    bar.animate(1.0);  // Number from 0.0 to 1.0
                                </script>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                <div id="done<?php echo $id ?>" class="progressBar"></div>
                                <script>
                                    // progressbar.js@1.0.0 version is used
                                    // Docs: http://progressbarjs.readthedocs.org/en/1.0.0/

                                    var bar = new ProgressBar.Circle(<?php echo('done' . $id) ?>, {
                                        color: '#aaa',
                                        // This has to be the same size as the maximum width to
                                        // prevent clipping
                                        strokeWidth: 4,
                                        trailWidth: 1,
                                        easing: 'easeInOut',
                                        duration: 1400,
                                        text: {
                                            autoStyleContainer: false
                                        },
                                        from: { color: '#aaa', width: 1 },
                                        to: { color: '#333', width: 4 },
                                        // Set default step function for all animate calls
                                        step: function(state, circle) {
                                            circle.path.setAttribute('stroke', state.color);
                                            circle.path.setAttribute('stroke-width', state.width);

                                            var value = Math.round(circle.value() * <?php echo $done ?>);
                                            if (value === 0) {
                                                circle.setText('');
                                            } else {
                                                circle.setText(value);
                                            }

                                        }
                                    });
                                    bar.text.style.fontFamily = '"Raleway", Helvetica, sans-serif';
                                    bar.text.style.fontSize = '2rem';

                                    bar.animate(1.0);  // Number from 0.0 to 1.0
                                </script>
                            </div>


                            <?php


                        }



                    }
                    else{
                        echo 'The value does not exist';
                    }


                    $conn->close();
                    ?>
                </div>
            </div>
            <div id="container"></div>

            <div>

            </div>
        </div>

    </div>
</main>
<!--Main layout-->

<!--Footer-->
<footer class="page-footer fixed-bottom text-center font-small primary-color-dark darken-2 mt-4 wow fadeIn">

    <!--Call to action-->
    <div class="pt-4">

    </div>
    <!--/.Call to action-->

    <!--Copyright-->
    <div class="footer-copyright py-3">
        © 2019 Copyright:
        <a href="https://techfusionconsulting.com/" target="_blank"> Tech Fusion LLC </a>
    </div>
    <!--/.Copyright-->

</footer>
<!--/.Footer-->

</body>

<?php
require '../libraries/includes-footer.php';
?>

<!--<script>
    // progressbar.js@1.0.0 version is used
    // Docs: http://progressbarjs.readthedocs.org/en/1.0.0/

    var bar = new ProgressBar.Circle(container, {
        color: '#aaa',
        // This has to be the same size as the maximum width to
        // prevent clipping
        strokeWidth: 4,
        trailWidth: 1,
        easing: 'easeInOut',
        duration: 1400,
        text: {
            autoStyleContainer: false
        },
        from: { color: '#aaa', width: 1 },
        to: { color: '#333', width: 4 },
        // Set default step function for all animate calls
        step: function(state, circle) {
            circle.path.setAttribute('stroke', state.color);
            circle.path.setAttribute('stroke-width', state.width);

            var value = Math.round(circle.value() * percentage);
            if (value === 0) {
                circle.setText('');
            } else {
                circle.setText(value);
            }

        }
    });
    bar.text.style.fontFamily = '"Raleway", Helvetica, sans-serif';
    bar.text.style.fontSize = '2rem';

    bar.animate(1.0);  // Number from 0.0 to 1.0
</script>-->

</html>



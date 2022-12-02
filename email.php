<?php
session_start();
// check if on localhost or on server
if($_SERVER['REMOTE_ADDR'] == '127.0.0.1'){
    $link = "";
} else {
    $_SERVER['DOCUMENT_ROOT'] = 'https://webdev.iyaclasses.com/~hansonle/acad276/the-kitchen';
    $link = $_SERVER['DOCUMENT_ROOT'];
}
include $_SERVER['DOCUMENT_ROOT'] . '/logic/db-connect.php';
include $_SERVER['DOCUMENT_ROOT'] . '/includes/header.php';
include $_SERVER['DOCUMENT_ROOT'] . '/logic/index_logic.php';
include $_SERVER['DOCUMENT_ROOT'] . '/logic/profile_logic.php';
?>

<html>
<!-- begin header -->
<?php
?>
    <!-- additional stylesheets -->
    <link rel="stylesheet" href="<?php echo $link ?>/stylesheets/home.css"/>

<body>
    <div  class="root">
    <!-- insert navbar -->
        <?php
           include $_SERVER['DOCUMENT_ROOT'] . '/includes/navbar.php';
           echo $alert;
        ?>

    <div class="main-container" style="grid-gap: 3rem;">

        <?php

        echo $email;
        echo $recipe;
        if(empty($_REQUEST["userfeedback"])) {
            ?>

            <form action="" method="get">
                To:<br>
                <input type="text" name="destinationemail" value="<?php $email; ?>">
                <br/><br>
                Subject:<br>
                <input type="text" name="usersubject"/>
                <br/><br>
                Feedback:<br>
                <textarea name="userfeedback"></textarea>
                <br/><br>
                <input type="submit" value="Send Email"/>
            </form>
            <?php
            // END of form... now close "if" branch...
        } else {
            // form was submitted so email results

            $to = $email; // populated by form
// this would be the permanent address  you want all feedback to go to.
            $subject = $recipe . " Ingredients" ; // from the form
            $message = "ingre"; // from the form
            $from = "thekitchenbot@gmail.com"; // from the form
            $headers = "From: $from"; // create a header entry for "FROM" field of email
            $headers = "From:$from"; // create a header entry for "FROM" field of email
            $headers = "FROM: The Kitchen < thekitchenbot@gmail.com>";
// More complicated "FROM" field that has name <email> syntax
            $test = mail($to,$subject,$message,$headers);

            if ($test == 1) {
                echo "Thank  You. Your email was sent.";
                echo "<br><br><em>(Server response: " . $test . ")</em> ";
                echo "<hr>Email string:" . "mail($to,$subject,$message,$headers)";
            } else {
                echo "ERROR. |" , $test . "| Your email was not sent.";
                // probably should send email to webmaster that there was a problem.
            }
            exit();
        }
        ?>
    </div>

</body>
</html>

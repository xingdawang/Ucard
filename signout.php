<?php
    // Destroy session, even broser is open
    session_start();   //  Must start a session before destroying it

    if (isset($_SESSION))
    {
        unset($_SESSION);
        session_unset();
        session_destroy();
    }
    echo '<meta content="0;/signin-rename.php" http-equiv="Refresh" />';
?>
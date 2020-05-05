<?php
    /* 
     * session_start();
     * Starting a new session before clearing it
     * assures you all $_SESSION vars are cleared 
     * correctly, but it's not strictly necessary.
     */
    if ( !session_id() ) {
        session_start();
    }
    unset ($_SESSION['egi_user_sub']);
    unset ($_SESSION['egi_user_name']);
    session_destroy();
    //session_unset();
    header('Location: https://www.eosc-synergy.eu/'); 
    /* Or whatever document you want to show afterwards */
?>

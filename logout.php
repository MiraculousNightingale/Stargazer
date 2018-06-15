<?php

/**
 * Log Out Redirection.
 */

require 'src/general.php';

if (session_destroy()) {
    header("location: index.php");
}
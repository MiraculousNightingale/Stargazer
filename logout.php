<?php

/**
 * Log Out Redirection.
 */

require 'src/common/general.php';

if (session_destroy()) {
    header("location: index.php");
}
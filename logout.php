<?php
//logout page
session_start();
session_destroy();
echo 'You have been logged out. <a href="index5.html">Log Back in?</a>';

?>
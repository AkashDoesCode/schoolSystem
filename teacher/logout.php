<!--

teacher log out

-->

<?php
session_unset();
session_destroy();

header('Location:../home.html');


?>
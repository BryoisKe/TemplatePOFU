<?php

session_start();
function logoutBannerTest(){
if ($_SESSION['role'] == 'administrateur') {
    $BannerLogout = '  <li>
                <a href="logout.php">logout</a>
            </li>';
    return $BannerLogout;
}
}
?>
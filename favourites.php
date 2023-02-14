<?php
$title = 'User favourites';
include'template\header.php';

echo '<div style="padding:10%" >
        <h1> Hotels</h1>';
    include'user_fav_hotels.php';
echo '<br><hr><br><h1> Restaurants</h1><br><br>';
    include'user_fav_restaurants.php';
echo '<br><hr><br><h1> Gates</h1><br>';
    include'user_fav_gates.php';

    echo '</div>';
include'template\footer.php' ;

?>


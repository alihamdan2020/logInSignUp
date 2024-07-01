<?php
function display($user){
    echo "<div>";
        echo "<p> $user[id] - $user[name] - $user[email] </p>";
    echo "</div>";
}
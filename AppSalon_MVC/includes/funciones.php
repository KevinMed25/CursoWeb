<?php

function debug($variable) : string {
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}

// Escapa / Sanitizar el HTML
function healt($html) : string {
    $s = htmlspecialchars($html);
    return $s;
}
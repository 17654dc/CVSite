<?php
function displayTitle() : string
{
    $titre = "Site CV de David Claassen - ";
    $page = isset($_GET['page']) ? $_GET['page'] : "accueil";
    $titre .= ucfirst($page);
    return $titre;
}
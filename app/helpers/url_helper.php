<?php

// Simple page redirect
function redirect($page): void
{
    header('location: ' . URL_ROOT . $page);
}
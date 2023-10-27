<?php

$routes = [
  '/404' => [
    'view' => '404.php',
    'title' => 'Not Found',
    'nav' => false,
    'footer' => false,
  ],
  '/' => [
    'view' => 'index.php',
    'title' => 'Home',
    'nav' => true,
    'footer' => true,
  ],
  '/about' => [
    'view' => 'about.php',
    'title' => 'About',
    'nav' => true,
    'footer' => true,
  ],
  '/account/login' => [
    'view' => '/account/login.php',
    'title' => 'About',
    'nav' => true,
    'footer' => false,
  ],
  '/account/register' => [
    'view' => '/account/register.php',
    'title' => 'About',
    'nav' => true,
    'footer' => false,
  ],
  '/account/registreren' => [
    'view' => '/account/registreren.php',
    'title' => 'About',
    'nav' => true,
    'footer' => true,
  ],
  '/account/logout' => [
    'view' => '/account/logout.php',
    'title' => 'About',
    'nav' => false,
    'footer' => false,
  ],
  
];

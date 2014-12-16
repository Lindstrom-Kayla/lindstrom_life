<?php


function GetNavigationItems() {
    
    $nav = array('home' => 'Home', 'family' => 'Family Tree', 'nils' => 'Nils', 'brita' => 'Brita', 'alina' => 'Alina', 'lars'=> 'Lars', 'erik' => 'Erik', 'myra' => 'Myra', 'recipes' => 'Recipes', 'login' => 'Login');
    
  
    return $nav;
    
    if (CheckSession())
    {
        $nav['menu'] = 'Menu';
        $nav['logout'] = 'Log Out';
    }
    else
    {
        $nav['login'] = 'Log In';
    }
    
    return $nav;
}

function GetFootNavItems() {
    
    $fnav = array('siteplan' => 'Site Plan', 'about' => 'About Us', 'contact' => 'Contact Us');
    
  
    return $fnav;
    
}
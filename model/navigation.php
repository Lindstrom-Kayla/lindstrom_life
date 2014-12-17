<?php

function GetNavigationItems() {

    $nav = array('home' => 'Home', 'family' => 'Family Tree', 'nils' => 'Nils', 'brita' => 'Brita', 'alina' => 'Alina', 'lars' => 'Lars', 'erik' => 'Erik', 'myra' => 'Myra', 'comment' => 'Comments');

    if (CheckSession()) {
        $nav['menu'] = 'Menu';
        $nav['logout'] = 'Log Out';
    } else {
        $nav['login'] = 'Log In';
    }

    return $nav;
}

function GetFootNavItems() {

    $fnav = array('siteplan' => 'Site Plan', 'about' => 'About', 'contact' => 'Contact Us');


    return $fnav;
}

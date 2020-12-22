<?php

function checkUser($username, $isAdmin=false){
    // check if user existed
}
function checkSlide($username){
    // check if slide existed
}
function checkProduct($username){
    // check if product existed
}
function checkContact($username){
    // check if contact existed
}
//////////////////////////////
// Return [<result>, <reason>]
//////////////////////////////

function getUser($username){
    if(!$username)
    {
        // Do query all user
        return [True, user];
    }
    if (!checkUser($username)) {
        return [false, "Username does not exist!"];
    }
    // Do query user here
}

function createUser($username, $hash, $other){
    if (checkUser($username)) {
        return [false, "Username existed!"];
    }
    // Do insert new user
}

function updateUser($username, $other){
    if (checkUser($username)) {
        return [false, "Username does not exist!"];
    }
    // Do update SQL
}

// Can change password here

////////////////////////////////
// Slider
////////////////////////////////

function getSlide($slideID){
    if (!checkSlide($username)) {
        return [false, "Slide does not exist!"];
    }
    // Do query slide here
}

function createSlide($username, $hash, $other){
    if (checkSlide($username)) {
        return [false, "Slide existed!"];
    }
    // Do insert new slide
}

function updateSlide($username, $other){
    if (checkSlide($username)) {
        return [false, "Slide does not exist!"];
    }
    // Do update SQL
}

////////////////////////////////
// Product
////////////////////////////////

function getProduct($pid){
    if (!checkProduct($pid)) {
        return [false, "Product does not exist!"];
    }
    // Do query slide here
}

function createProduct($pid, $thumbnailLink, $other){
    if (checkProduct($pid)) {
        return [false, "Product existed!"];
    }
    // Do insert new user
}

function updateProduct($pid, $other){
    if (checkProduct($username)) {
        return [false, "Product does not exist!"];
    }
    // Do update SQL
}

////////////////////////////////
// Contact
////////////////////////////////
function getContact($pid){
    if (!checkContact($pid)) {
        return [false, "Contact does not exist!"];
    }
    // Do query slide here
}

function createContact($pid, $thumbnailLink, $other){
    if (checkContact($pid)) {
        return [false, "Contact existed!"];
    }
    // Do insert new user
}

function updateContact($pid, $other){
    if (checkContact($username)) {
        return [false, "Contact does not exist!"];
    }
    // Do update SQL
}

?>
<?php

// Store sessions, remove expired sessions
// session contain sid, role of user, expired date.
// retrieve $sid from user's cookies
// role of user: member poweruser
function checkSession($sid)
{
    // if session is active
}

function setSession($sessionData)
{
    $type = $sessionData["type"];// check if user is member or poweruser
    do {
        $rand = $type . random_bytes(128);
    } while (!checkSession($rand));
}
function delSession($sid)
{
    if (checkSession($sid)) {
        
    }
    else {
        throw new Exception("Not a valid SID");
    }
}
?>
<?php
    function cookie_check()
    {
        if (!isset($_COOKIE[1])) {
            setcookie(1,0, time() + 3600, '/');
            setcookie(2,0, time() + 3600, '/');
            setcookie(3,0, time() + 3600, '/');
            setcookie(4,0, time() + 3600, '/');
            setcookie(5,0, time() + 3600, '/');
        }
    }

    function add_quantity($prodID, $quant)
    {
        setcookie($prodID, $_COOKIE[$prodID] + $quant, time() + 3600, '/');
    }

    function remove_quantity($prodID, $quant)
    {
        setcookie($prodID,$_COOKIE[$prodID] - $quant, time() + 3600, '/');
        if ($_COOKIE[$prodID] < 0) {
            setcookie($prodID, 0, time() + 3600, '/');
        }
    }

    function clear()
    {
        setcookie(1,0, time() + 3600, '/');
        setcookie(2,0, time() + 3600, '/');
        setcookie(3,0, time() + 3600, '/');
        setcookie(4,0, time() + 3600, '/');
        setcookie(5,0, time() + 3600, '/');
    }
?>
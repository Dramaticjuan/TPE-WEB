<?php

class AuthHelper
{

    function __construct()
    {
    }

    function checkLoggedIn()
    {
        session_start();

        if (!isset($_SESSION["email"])) {

            header("Location: " . BASE_URL . "home");
        }
    }

    function checkloggedInAdmin()
    {
        $this->checkLoggedIn();

        if (!isset($_SESSION['admin'])) {

            header("Location: " . BASE_URL . "home");
        } else {

            if ($_SESSION['admin'] != true) {

                header("Location: " . BASE_URL . "home");
            }
        }
    }

    function logout()
    {
        session_start();
        session_destroy();
    }
}

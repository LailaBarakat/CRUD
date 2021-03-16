<?php


class HomepageController
{
//render function with both $_GET and $_POST vars available if it would be needed.
    public function render(array $GET, array $POST): void
    {
        //this is just example code, you can remove the line below
        $user = 'John Smith';

        //you should not echo anything inside your controller - only assign vars here
        // then the view will actually display them.

        //load the view
        require 'View/homepage.php';
    }
}
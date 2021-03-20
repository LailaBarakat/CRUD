<?php

class SearchController
{

    public function render(array $GET, array $POST): void
    {
        $type = "search";
        $overviewTag = "Student/Teacher";

        $pdo = new SearchLoader();
        $group = $pdo->getSearchAll($_POST['target']);

        require 'View/Overview.php';
    }
}
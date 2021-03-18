<?php

class SearchController
{

    public function render(array $GET, array $POST): void
    {

        $pdo = new SearchLoader();
        $targets = $pdo->getSearchAll($_POST['target']);

        require 'View/SearchOverview.php';
    }
}
<?php
class csvLoader {

    public function export ($exportArray, $fileName) {
        $fp = fopen($fileName, 'w');

        foreach ($exportArray as $fields) {
            fputcsv($fp, $fields);
        }

        fclose($fp);
    }
}

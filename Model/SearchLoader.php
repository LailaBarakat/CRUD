<?php


class SearchLoader
{
    private array $searchArray =[];

    public function getSearchAll(string $target): array
    {

        try {
            $DB = new DataBase();
            $conn = $DB->connect();

            $sql = "SELECT CONCAT_WS(' ', s.first_name, s.last_name) as name , 'student' AS type, id FROM Student s WHERE s.first_name LIKE '%$target%' OR s.last_name LIKE '%$target%'
                    UNION SELECT CONCAT_WS(' ', t.first_name, t.last_name) as name, 'teacher' AS type, id
                    FROM Teacher t
                    WHERE t.first_name LIKE '%$target%' OR t.last_name LIKE '%$target%'
                    ORDER BY name";

            $stmt = $conn->query($sql);
            $stmt->execute();

            // set the resulting array to associative

            $results = $stmt->fetchAll();

            foreach ($results as $row) {
                $res = new SearchModel($row['name'], $row['type'], ($row['id']));
                $this->searchArray[] = $res;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        $conn = null;

        return $this->searchArray;

    }
}
<?php
class OscarTableRenderer {
    public static function renderOverviewTable($data) {
        echo '<table class="table table-bordered">';
        echo '<thead><tr><th>Year</th><th>Women</th><th>Men</th></tr></thead><tbody>';
        foreach ($data as $year => $winners) {
            echo "<tr>
                    <td>{$year}</td>
                    <td>{$winners['female']['name']} ({$winners['female']['age']})<br>{$winners['female']['movie']}</td>
                    <td>{$winners['male']['name']} ({$winners['male']['age']})<br>{$winners['male']['movie']}</td>
                  </tr>";
        }
        echo '</tbody></table>';
    }

    public static function renderMoviesWithBothAwardsTable($data) {
        echo '<table class="table table-bordered">';
        echo '<thead><tr><th>Movie</th><th>Year</th><th>Actress</th><th>Actor</th></tr></thead><tbody>';
        foreach ($data as $movie) {
            echo "<tr>
                    <td>{$movie['movie']}</td>
                    <td>{$movie['year']}</td>
                    <td>{$movie['female']}</td>
                    <td>{$movie['male']}</td>
                  </tr>";
        }
        echo '</tbody></table>';
    }
}
?>

<?php
class OscarData {
    private $maleData;
    private $femaleData;

    public function __construct($maleData, $femaleData) {
        $this->maleData = $maleData;
        $this->femaleData = $femaleData;
    }

    public function getOscarOverviewByYear() {
        $result = [];
        foreach ($this->femaleData as $female) {
            $year = $female[1];
            $result[$year]['female'] = [
                'name' => $female[3],
                'age' => $female[2],
                'movie' => $female[4]
            ];
        }
        foreach ($this->maleData as $male) {
            $year = $male[1];
            $result[$year]['male'] = [
                'name' => $male[3],
                'age' => $male[2],
                'movie' => $male[4]
            ];
        }
        ksort($result);
        return $result;
    }

    public function getMoviesWithBothAwards() {
        $result = [];
        foreach ($this->femaleData as $female) {
            foreach ($this->maleData as $male) {
                if ($female[4] == $male[4] && $female[1] == $male[1]) {
                    $result[] = [
                        'movie' => $female[4],
                        'year' => $female[1],
                        'female' => $female[3],
                        'male' => $male[3]
                    ];
                }
            }
        }
        usort($result, function ($a, $b) {
            return strcmp($a['movie'], $b['movie']);
        });
        return $result;
    }
}
?>

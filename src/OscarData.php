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
            if (isset($female[1], $female[3], $female[2], $female[4])) {
                $year = $female[1];
                $result[$year]['female'] = [
                    'name' => $female[3],
                    'age' => $female[2],
                    'movie' => $female[4]
                ];
            }
        }
        foreach ($this->maleData as $male) {
            if (isset($male[1], $male[3], $male[2], $male[4])) {
                $year = $male[1];
                $result[$year]['male'] = [
                    'name' => $male[3],
                    'age' => $male[2],
                    'movie' => $male[4]
                ];
            }
        }
        ksort($result);
        return $result;
    }

    public function getMoviesWithBothAwards() {
        $result = [];
        foreach ($this->femaleData as $female) {
            foreach ($this->maleData as $male) {
                if (isset($female[4], $male[4], $female[1], $male[1], $female[3], $male[3]) &&
                    $female[4] === $male[4] && $female[1] === $male[1]) {
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
            $movieA = isset($a['movie']) ? $a['movie'] : '';
            $movieB = isset($b['movie']) ? $b['movie'] : '';
            return strcmp($movieA, $movieB);
        });
        return $result;
    }
}
?>

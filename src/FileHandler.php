<?php
class FileHandler {
    public static function uploadFile($file, $targetDir) {
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        $targetFile = $targetDir . basename($file["name"]);
        if (move_uploaded_file($file["tmp_name"], $targetFile)) {
            return $targetFile;
        } else {
            return false;
        }
    }

    public static function parseCsv($filePath) {
        if (file_exists($filePath)) {
            $data = array_map('str_getcsv', file($filePath));
            if (count($data) > 0) {
                array_shift($data); 
                return $data;
            }
        }
        return false; 
    }
}

?>

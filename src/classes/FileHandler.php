<?php
class FileHandler {
    public static function uploadFile($file, $targetDir) {
        $targetFile = $targetDir . basename($file["name"]);
        if (move_uploaded_file($file["tmp_name"], $targetFile)) {
            return $targetFile;
        } else {
            return false;
        }
    }

    public static function parseCsv($filePath) {
        $data = array_map('str_getcsv', file($filePath));
        array_shift($data);
        return $data;
    }
}
?>

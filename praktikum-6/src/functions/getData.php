<?php 
    function getJsonData($filename)
    {
        $fileData = fopen($filename, 'r');
        $data = json_decode(fread($fileData, filesize($filename)), true);
        fclose($fileData);

        return $data;
    }

?>
<?php 
    function getJsonData($filename)
    {
        $fileData = fopen($filename, 'r');
        $data = json_decode(fread($fileData, filesize($filename)), true);
        fclose($fileData);

        return $data;
    }

    function storeJsonData($newData, $oldData)
    {
        $data = $oldData;
        $lastId = end($data)['id'];
        $new = $newData;
        $new['id'] = $lastId + 1;
        array_push($data, $new);
        $dataJson = json_encode($data);
        $fileData = fopen("../data/data.json", 'w');

        fwrite($fileData, $dataJson);
        fclose($fileData);
    }

?>
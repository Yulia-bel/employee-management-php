<?php

class AvatarModel extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function callAPI ($url){
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'X-API-KEY: 4B25747F-51664BE8-97A405EA-4437BFA2',
            'Accept: application/json',
            'Cache-Control: no-cache'
        ));
        $result = curl_exec($curl);
        curl_close($curl);
        return json_decode($result);
    }
}


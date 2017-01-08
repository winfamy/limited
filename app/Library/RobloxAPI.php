<?php

namespace App\Library;

use GuzzleHttp\Client;

class RobloxAPI {

    private $client, $root;

    public function __construct() {
        $this->client = new Client();
        $this->root   = 'http://localhost:8080';
    }

    public function getInventory($user_id) {
        $resp = $this->client->request('GET', $this->root . '/inventory/' . (string)$user_id);
        $json = json_decode($resp->getBody(), true);
        return $json;
    }

    public function getUserId($username) {
        $resp = $this->client->request('GET', "http://api.roblox.com/users/get-by-username?username=$username");
        $json = json_decode($resp->getBody(), true);
        return (!isset($json['success']))
               ? $json['Id']
               : null;
    }

}

 ?>
<?php

namespace App\Service;

use Symfony\Component\HttpClient\HttpClient;

class Foursquare
{
    const API_URL = 'https://api.foursquare.com/v2/';
    const API_VERSION = '20161010';
    const CLIENT_ID = ''; // add your client id
    const CLIENT_SECRET = ''; // add your client secret

    /**
     * @param string $url
     * @return array|null
     */
    public function get(string $url)
    {
        $client = HttpClient::create();

        try {
            return $client->request('GET', $this->setUrl($url))->toArray();
        } catch (\Exception $exception) {
            return null;
        }
    }

    /**
     * @param string $url
     * @return string
     */
    public function setUrl(string $url)
    {
        return self::API_URL . $url
            . 'client_id='. self::CLIENT_ID
            .'&client_secret=' . self::CLIENT_SECRET
            . '&v=' . self::API_VERSION;
    }
}

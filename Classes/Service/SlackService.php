<?php
namespace NeosRulez\Flow\SlackClient\Service;

/*
 * This file is part of the NeosRulez.Flow.SlackClient package.
 */

use Neos\Flow\Annotations as Flow;
use Neos\Flow\Security\RequestPatternInterface;

class SlackService {

    /**
     * @var array
     */
    protected $settings;

    /**
     * @param array $settings
     * @return void
     */
    public function injectSettings(array $settings) {
        $this->settings = $settings;
    }

    /**
     * @param string $text
     * @return bool
     */
    public function send(string $text):bool
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->settings['webhookUrl'],
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{"text":"' . $text . '"}',
            CURLOPT_HTTPHEADER => array(
                'Content-type: application/json'
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        return $response == 'ok';
    }

}

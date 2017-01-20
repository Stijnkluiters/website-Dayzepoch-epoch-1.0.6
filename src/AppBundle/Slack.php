<?php
/**
 * Created by PhpStorm.
 * User: stijn
 * Date: 20-1-2017
 * Time: 08:13
 */

namespace AppBundle\Handler;

use Maknz\Slack\Client;

/**
 * @property Client client
 */
class Slack
{

    private $client;

    public function __construct()
    {
        $settings = [
            'username' => 'Error bot',
            'channel' => '#errors',
            'link_names' => true
        ];
        $this->client = new Client("https://hooks.slack.com/services/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",$settings);
    }

    public function Exception($message)
    {
        $this->client->sendMessage($message);
    }

}
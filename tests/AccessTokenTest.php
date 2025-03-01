<?php

use PHPUnit\Framework\TestCase;
use zhengqi\dingtalk\robot\DingTalkRobot;

class AccessTokenTest extends TestCase
{
    public function testAccessToken()
    {
        $dingTalkRobot = new DingTalkRobot([
            'agent_id' => '31244001',
            'app_key' => 'dingcjc63iitbqjfmfqs',
            'app_secret' => 'BzSiXO4XcTHcnQb-aa9WpNRK57UCerof5ZB3CmYa7Q7qxITXf5_erIZ2gg_tNxUC',
        ]);

        $accessToken = $dingTalkRobot->getAccessToken();
        var_dump($accessToken);
    }
}

<?php

namespace zhengqi\dingtalk\robot\entity\message\sender\query;

use zhengqi\dingtalk\robot\entity\AbstractEntity;

class QuerySignEntity extends AbstractEntity
{
    private string $accessToken;

    private int $timeMillis;

    private string $sign;

    /**
     * @param string $accessToken
     * @return QuerySignEntity
     */
    public function setAccessToken(string $accessToken): QuerySignEntity
    {
        $this->accessToken = $accessToken;
        return $this;
    }

    /**
     * @param string $sign
     * @return QuerySignEntity
     */
    public function setSign(string $sign): QuerySignEntity
    {
        $this->sign = $sign;
        return $this;
    }

    /**
     * @param int $timeMillis
     * @return QuerySignEntity
     */
    public function setTimeMillis(int $timeMillis): QuerySignEntity
    {
        $this->timeMillis = $timeMillis;
        return $this;
    }

    /**
     * @return string
     */
    public function getAccessToken(): string
    {
        return $this->accessToken;
    }

    /**
     * @return string
     */
    public function getSign(): string
    {
        return $this->sign;
    }

    /**
     * @return int
     */
    public function getTimeMillis(): int
    {
        return $this->timeMillis;
    }

    public function toArray(): array
    {
        return [
            'access_token' => $this->accessToken,
            'timestamp' => $this->timeMillis,
            'sign' => $this->sign,
        ];
    }

}
<?php

namespace zhengqi\dingtalk\robot\entity;

/**
 * AccessTokenEntity
 */
class AccessTokenEntity extends AbstractEntity
{
    private string $accessToken = '';

    private string $expireIn = '0';

    /**
     * @param string $accessToken
     * @return AccessTokenEntity
     */
    public function setAccessToken(string $accessToken): AccessTokenEntity
    {
        $this->accessToken = $accessToken;
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
     * @param string $expireIn
     * @return AccessTokenEntity
     */
    public function setExpireIn(string $expireIn): AccessTokenEntity
    {
        $this->expireIn = $expireIn;
        return $this;
    }

    /**
     * @return string
     */
    public function getExpireIn(): string
    {
        return $this->expireIn;
    }

    public function toArray(): array
    {
        return [
            'accessToken' => $this->accessToken,
            'expireIn' => $this->expireIn,
        ];
    }
}
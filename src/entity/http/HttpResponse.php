<?php
namespace zhengqi\dingtalk\robot\entity\http;

class HttpResponse
{
    private string $statusCode;

    private array $body;

    /**
     * @param string $statusCode
     * @return HttpResponse
     */
    public function setStatusCode(string $statusCode): HttpResponse
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatusCode(): string
    {
        return $this->statusCode;
    }

    /**
     * @param array $body
     * @return HttpResponse
     */
    public function setBody(array $body): HttpResponse
    {
        $this->body = $body;
        return $this;
    }

    /**
     * @return array
     */
    public function getBody(): array
    {
        return $this->body;
    }

    public function toArray(): array
    {
        return [
            'status_code' => $this->statusCode,
            'body' => $this->body,
        ];
    }
}

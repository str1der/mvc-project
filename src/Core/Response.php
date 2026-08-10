<?php

declare(strict_types=1);

namespace Core;

final class Response
{
    private string $body;
    private int $status;

    public function __construct(string $body, int $status)
    {
        $this->body = $body;
        $this->status = $status;
    }

    public function send(): void
    {
        http_response_code($this->status);

        echo $this->body;
    }
}
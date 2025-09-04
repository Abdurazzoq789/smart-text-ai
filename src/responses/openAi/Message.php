<?php

namespace SmartTextAi\responses\openAi;

class Message
{
    public string $role;
    public ?string $content;
    public ?string $refusal;

    public function __construct(array $data)
    {
        $this->role = $data['role'];
        $this->content = $data['content'] ?? $data['refusal'];
        $this->refusal = $data['refusal'] ?? null;
    }
}
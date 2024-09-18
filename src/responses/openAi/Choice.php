<?php

namespace SmartTextAi\responses\openAi;

class Choice
{
    public int $index;
    public Message $message;
    public ?string $finish_reason;

    public function __construct(array $data)
    {
        $this->index = $data['index'];
        $this->message = new Message($data['message']);
        $this->finish_reason = $data['finish_reason'];
    }
}
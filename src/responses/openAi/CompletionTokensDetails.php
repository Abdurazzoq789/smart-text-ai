<?php

namespace SmartTextAi\responses\openAi;

class CompletionTokensDetails
{
    public int $reasoning_tokens;

    public function __construct(array $data)
    {
        $this->reasoning_tokens = $data['reasoning_tokens'];
    }
}
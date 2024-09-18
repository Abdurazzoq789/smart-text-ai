<?php

namespace SmartTextAi\responses\openAi;

class Usage
{
    public int $prompt_tokens;
    public int $completion_tokens;
    public int $total_tokens;
    public ?CompletionTokensDetails $completion_tokens_details;

    public function __construct(array $data)
    {
        $this->prompt_tokens = $data['prompt_tokens'];
        $this->completion_tokens = $data['completion_tokens'];
        $this->total_tokens = $data['total_tokens'];

        // Check if 'completion_tokens_details' exists
        if (isset($data['completion_tokens_details'])) {
            $this->completion_tokens_details = new CompletionTokensDetails($data['completion_tokens_details']);
        } else {
            $this->completion_tokens_details = null;
        }
    }
}
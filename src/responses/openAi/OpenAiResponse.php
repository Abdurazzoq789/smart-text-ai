<?php

namespace SmartTextAi\responses\openAi;

use SmartTextAi\interfaces\AiResponseInterface;

class OpenAiResponse implements AiResponseInterface
{
    public string $id;
    public string $object;
    public int $created;
    public string $model;
    public array $choices;
    public Usage $usage;

    public function __construct(array $data)
    {
        $this->id = $data['id'];
        $this->object = $data['object'];
        $this->created = $data['created'];
        $this->model = $data['model'];

        // Map choices data
        $this->choices = array_map(fn($choice) => new Choice($choice), $data['choices']);

        // Map usage data
        $this->usage = new Usage($data['usage']);
    }

    public function getText(): string
    {
        $data = [];
        foreach ($this->choices as $choice) {
            $data[] = $choice->message->content;
        }

        return join(PHP_EOL, $data);
    }

    public function getTotalTokenCount(): int
    {
        return (int)$this->usage->total_tokens;
    }
}
<?php

namespace SmartTextAi\interfaces;

interface AiResponseInterface
{
    /**
     * Get the text response from the AI provider.
     *
     * @return string
     */
    public function getText(): string;

    public function getTotalTokenCount(): int;
}
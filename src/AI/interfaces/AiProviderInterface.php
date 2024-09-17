<?php

namespace Abdurazzoq\AI\interfaces;

interface AiProviderInterface
{
    /**
     * Send a prompt to the AI tool and return the response.
     *
     * @param string $text
     * @return array
     */
    public function sendRequest(string $text): array;
}

<?php

namespace SmartTextAi\interfaces;

interface AiProviderInterface
{
    /**
     * Send a prompt to the AI tool and return the response.
     *
     * @param array $body
     * @return array
     */
    public function sendRequest(array $body): array;
}

<?php

namespace SmartTextAi\interfaces;

interface AiProviderInterface
{
    /**
     * Send a prompt to the AI tool and return the response.
     *
     * @param array $body
     */
    public function sendRequest(array $body, string $url): AiResponseInterface;

    public function checkText(array $body): AiResponseInterface;

    public function uploadFile(array $body);
}

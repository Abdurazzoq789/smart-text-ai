<?php

namespace SmartTextAi\interfaces;

interface AiProviderInterface
{
    /**
     * Send a prompt to the AI tool and return the response.
     *
     * @param array $body
     */
    public function sendRequest(array $body, string $url);

    public function checkText(array $body);

    public function uploadFile(array $body);
}

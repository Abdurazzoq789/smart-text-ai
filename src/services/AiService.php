<?php

namespace SmartTextAi\services;

use SmartTextAi\interfaces\AiProviderInterface;

class AiService
{
    private AiProviderInterface $aiProvider;

    public function __construct(AiProviderInterface $aiProvider)
    {
        $this->aiProvider = $aiProvider;
    }

    /**
     * Check text using the selected AI provider.
     *
     * @param string $text
     * @return array
     */
    public function checkText(string $text): array
    {
        return $this->aiProvider->sendRequest($text);
    }
}

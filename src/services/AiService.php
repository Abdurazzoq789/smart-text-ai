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
     * @param array $array
     * @return array
     */
    public function checkText(array $array): array
    {
        return $this->aiProvider->sendRequest($array);
    }
}

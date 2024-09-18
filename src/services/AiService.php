<?php

namespace SmartTextAi\services;

use SmartTextAi\interfaces\AiProviderInterface;
use SmartTextAi\interfaces\AiResponseInterface;

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
     * @param array $body
     * @return array
     */
    public function checkText(array $body): AiResponseInterface
    {
        return $this->aiProvider->checkText($body);
    }

    public function uploadFile(array $body)
    {
        return $this->aiProvider->uploadFile($body);
    }
}

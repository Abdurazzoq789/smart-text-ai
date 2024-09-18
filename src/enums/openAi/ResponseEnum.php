<?php

namespace SmartTextAi\enums\openAi;

use SmartTextAi\responses\openAi\BatchResponse;
use SmartTextAi\responses\openAi\OpenAiFileResponse;
use SmartTextAi\responses\openAi\OpenAiResponse;
use SmartTextAi\url\OpenAiUrl;

interface ResponseEnum
{
    public const MapResponse = [
        OpenAiUrl::BATCHES => BatchResponse::class,
        OpenAiUrl::FILES => OpenAiFileResponse::class,
        OpenAiUrl::COMPLETIONS => OpenAiResponse::class,
        OpenAiUrl::CHAT => OpenAiResponse::class,
    ];

}
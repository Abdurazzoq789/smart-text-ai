<?php

namespace Abdurazzoq\AI;

class ResponseFormatter
{
    /**
     * Formats the AI response for output.
     *
     * @param array $response
     * @return string
     */
    public function formatResponse(array $response): string
    {
        if (isset($response['error'])) {
            return 'Error: ' . $response['error'];
        }

        // Process AI's response
        return 'AI Response: ' . json_encode($response['data']);
    }
}

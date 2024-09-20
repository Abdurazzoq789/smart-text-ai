<?php

namespace SmartTextAi\responses\openAi;

class FileContentResponse
{
    public string $id;
    public string $custom_id;
    public OpenAiResponse $response;
    public $error;

    public function __construct(array $data)
    {
        $this->id = $data['id'];
        $this->custom_id = $data['custom_id'];
        $this->response = new OpenAiResponse($data['response']['body']);
        $this->error = $data['error'];
    }

    public function getId()
    {
        return $this->id;
    }
}
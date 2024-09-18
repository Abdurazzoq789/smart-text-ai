<?php

namespace SmartTextAi\responses\openAi;

use SmartTextAi\interfaces\AiResponseInterface;

class OpenAiFileResponse implements AiResponseInterface
{
    public string $object;
    public string $id;
    public string $purpose;
    public string $filename;
    public int $bytes;
    public int $created_at;
    public string $status;
    public ?string $status_details;

    public function __construct(array $data)
    {
        $this->object = $data['object'];
        $this->id = $data['id'];
        $this->purpose = $data['purpose'];
        $this->filename = $data['filename'];
        $this->bytes = $data['bytes'];
        $this->created_at = $data['created_at'];
        $this->status = $data['status'];
        $this->status_details = $data['status_details'] ?? null;
    }

    /**
     * Get the purpose of the file
     *
     * @return string
     */
    public function getPurpose(): string
    {
        return $this->purpose;
    }

    /**
     * Get the filename
     *
     * @return string
     */
    public function getFilename(): string
    {
        return $this->filename;
    }

    /**
     * Get the file size in bytes
     *
     * @return int
     */
    public function getBytes(): int
    {
        return $this->bytes;
    }

    /**
     * Get the file creation timestamp
     *
     * @return int
     */
    public function getCreatedAt(): int
    {
        return $this->created_at;
    }

    /**
     * Get the status of the file
     *
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * Get the status details, if any
     *
     * @return ?string
     */
    public function getStatusDetails(): ?string
    {
        return $this->status_details;
    }

    public function getText(): string
    {
        return "";
    }

    public function getTotalTokenCount(): int
    {
        return 0;
    }
}
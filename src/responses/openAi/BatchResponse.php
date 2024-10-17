<?php

namespace SmartTextAi\responses\openAi;

use SmartTextAi\enums\openAi\BatchStatusEnum;

class BatchResponse
{
    private ?string $id;
    private ?string $object;
    private ?string $endpoint;
    private ?string $inputFileId;
    private ?string $completionWindow;
    private ?string $status;
    private ?string $outputFileId;
    private ?string $errorFileId;
    private ?int $createdAt;
    private ?int $inProgressAt;
    private ?int $expiresAt;
    private ?int $finalizingAt;
    private ?int $completedAt;
    private ?int $failedAt;
    private ?int $expiredAt;
    private ?int $cancellingAt;
    private ?int $cancelledAt;
    private ?array $requestCounts;
    private ?array $metadata;

    public function __construct(array $data)
    {
        $this->id = $data['id'] ?? null;
        $this->object = $data['object'] ?? null;
        $this->endpoint = $data['endpoint'] ?? null;
        $this->inputFileId = $data['input_file_id'] ?? null;
        $this->completionWindow = $data['completion_window'] ?? null;
        $this->status = $data['status'] ?? null;
        $this->outputFileId = $data['output_file_id'] ?? null;
        $this->errorFileId = $data['error_file_id'] ?? null;
        $this->createdAt = $data['created_at'] ?? null;
        $this->inProgressAt = $data['in_progress_at'] ?? null;
        $this->expiresAt = $data['expires_at'] ?? null;
        $this->finalizingAt = $data['finalizing_at'] ?? null;
        $this->completedAt = $data['completed_at'] ?? null;
        $this->failedAt = $data['failed_at'] ?? null;
        $this->expiredAt = $data['expired_at'] ?? null;
        $this->cancellingAt = $data['cancelling_at'] ?? null;
        $this->cancelledAt = $data['cancelled_at'] ?? null;
        $this->requestCounts = $data['request_counts'] ?? null;
        $this->metadata = $data['metadata'] ?? [];
    }

    // Getters for each property
    public function getId(): string
    {
        return $this->id;
    }

    public function getObject(): string
    {
        return $this->object;
    }

    public function getEndpoint(): string
    {
        return $this->endpoint;
    }

    public function getInputFileId(): ?string
    {
        return $this->inputFileId;
    }

    public function getCompletionWindow(): string
    {
        return $this->completionWindow;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getOutputFileId(): ?string
    {
        return $this->outputFileId;
    }

    public function getErrorFileId(): ?string
    {
        return $this->errorFileId;
    }

    public function getCreatedAt(): int
    {
        return $this->createdAt;
    }

    public function getInProgressAt(): int
    {
        return $this->inProgressAt;
    }

    public function getExpiresAt(): int
    {
        return $this->expiresAt;
    }

    public function getFinalizingAt(): ?int
    {
        return $this->finalizingAt;
    }

    public function getCompletedAt(): ?int
    {
        return $this->completedAt;
    }

    public function getFailedAt(): ?int
    {
        return $this->failedAt;
    }

    public function getExpiredAt(): ?int
    {
        return $this->expiredAt;
    }

    public function getCancellingAt(): ?int
    {
        return $this->cancellingAt;
    }

    public function getCancelledAt(): ?int
    {
        return $this->cancelledAt;
    }

    public function getRequestCounts(): array
    {
        return $this->requestCounts;
    }

    public function getMetadata(): array
    {
        return $this->metadata;
    }

    public function inProgress(): bool
    {
        return in_array($this->status, BatchStatusEnum::IN_PROGRESS_STATUSES);
    }

    public function mustRetry(): bool
    {
        return in_array($this->status, BatchStatusEnum::MUST_RETRY_STATUSES);
    }
}

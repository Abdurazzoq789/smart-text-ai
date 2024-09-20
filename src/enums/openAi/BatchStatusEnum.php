<?php

namespace SmartTextAi\enums\openAi;

interface BatchStatusEnum
{
    /**
     * the input file is being validated before the batch can begin
     */
    public const STATUS_VALIDATING = 'validating';

    /**
     * the input file has failed the validation process
     */
    public const STATUS_FILED = 'failed';

    /**
     * the input file was successfully validated and the batch is currently being run
     */
    public const STATUS_IN_PROGRESS = 'in_progress';

    /**
     * the batch has completed and the results are being prepared
     */
    public const STATUS_FINALIZING = 'finalizing';

    /**
     * the batch has been completed and the results are ready
     */
    public const STATUS_COMPLEATED = 'completed';

    /**
     * the batch was not able to be completed within the 24-hour time window
     */
    public const STATUS_EXPIRED = 'expired';

    /**
     * the batch is being cancelled (may take up to 10 minutes)
     */
    public const STATUS_CANCELLING = 'cancelling';

    /**
     *	the batch was cancelled
     */
    public const STATUS_CANCELED = 'cancelled';

    public const MUST_RETRY_STATUSES = [
        self::STATUS_EXPIRED,
        self::STATUS_CANCELED,
        self::STATUS_CANCELLING,
    ];

}
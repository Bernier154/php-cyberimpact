<?php

namespace bernier154\PhpCyberimpact\Objects;


/**
 * BatchUnsubscribe
 */
class BatchUnsubscribe
{
    public $id;
    public $batchType;
    public $batchJson;
    public $createdOn;
    public $status;
    public $result;
    public $successes;

    /**
     * Create an instance of BatchUnsubscribe
     *
     * @param  int $id the id of the batch
     * @param  string $batchType The type of the batch
     * @param  object $batchJson The original batch data
     * @param  string $createdOn    The date where the batch was created
     * @param  string $status The status of the batch
     * @param  object $result An array of details about the result of the batch
     * @param  array $successes an array of id of succesful addition
     * @return void
     */
    public function __construct(int $id, string $batchType, object $batchJson, string $createdOn, string $status, object $result, array $successes)
    {
        $this->id = $id;
        $this->batchType = $batchType;
        $this->batchJson = $batchJson;
        $this->createdOn = $createdOn;
        $this->status = $status;
        $this->result = $result;
        $this->successes = $successes;
    }


    static function fromJSON($json)
    {
        return new self(
            $json->id,
            $json->batchType,
            $json->batchJson,
            $json->createdOn,
            $json->status,
            $json->result,
            $json->successes
        );
    }
}

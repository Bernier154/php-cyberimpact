<?php

namespace bernier154\PhpCyberimpact\Objects;

/**
 * ConsentDetails
 */
class ConsentDetails
{
    public $consentType;
    public $relationType;
    public $consentDate;
    public $consentExpiration;
    public $consentProof;

    public function __construct($consentType,  $relationType,  $consentDate,  $consentExpiration,  $consentProof)
    {
        $this->consentType = $consentType;
        $this->relationType = $relationType;
        $this->consentDate = $consentDate;
        $this->consentExpiration = $consentExpiration;
        $this->consentProof = $consentProof;
    }

    /**
     * Create a ConsentDetails from the return value of the API.
     *
     * @param  object $json
     * @return ConsentDetails
     */
    static function fromJSON($json)
    {
        return new self(
            $json->consentType,
            $json->relationType,
            $json->consentDate,
            $json->consentExpiration,
            $json->consentProof
        );
    }
}

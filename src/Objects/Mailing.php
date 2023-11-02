<?php

namespace bernier154\PhpCyberimpact\Objects;

/**
 * Mailing
 */
class Mailing
{
    public $id;
    public $subject;
    public $language;
    /**
     * Return an instance of Mailing
     *
     * @param  int $id
     * @param  string $subject
     * @param  string $language
     * @return void
     */
    public function __construct($id = null, $subject = "", $language = "", $startedOn = "")
    {
        $this->id = $id;
        $this->subject = $subject;
        $this->language = $language;
    }

    /**
     * Create a Mailing from the return value of the API.
     *
     * @param  object $json
     * @return Mailing
     */
    static function fromJSON($json)
    {
        return new self(
            $json->id,
            $json->subject,
            $json->language
        );
    }
}

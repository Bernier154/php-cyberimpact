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
    public $startedOn;
    public $sentOn;
    public $opened;
    public $openedOn;

    /**
     * Return an instance of Mailing
     *
     * @param  int $id
     * @param  string $subject
     * @param  string $language
     * @param  string $startedOn
     * @param  string $sentOn
     * @param  bool $opened
     * @param  string $openedOn
     * @return void
     */
    public function __construct(int $id = null, string $subject = "", string $language = "", string $startedOn = "", string $sentOn = "", bool $opened = false, string $openedOn = "")
    {
        $this->id = $id;
        $this->subject = $subject;
        $this->language = $language;
        $this->startedOn = $startedOn;
        $this->sentOn = $sentOn;
        $this->opened = $opened;
        $this->openedOn = $openedOn;
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
            $json->language,
            $json->startedOn,
            $json->sentOn,
            $json->opened,
            $json->openedOn
        );
    }
}

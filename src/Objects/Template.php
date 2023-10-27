<?php

namespace bernier154\PhpCyberimpact\Objects;

/**
 * Template
 */
class Template
{
    public $id;
    public $title;
    public $createdOn;
    public $updatedOn;
    public $bodyHtml;
    public $bodyText;


    /**
     * Return an instance of Template
     *   
     * @param  int $id
     * @param  string $title
     * @param  string $createdOn
     * @param  string $updatedOn
     * @param  string $bodyHtml
     * @param  string $bodyText
     * @return void
     */
    public function __construct(int $id = null, string $title = "", string $createdOn = "", string $updatedOn = "", string $bodyHtml = "", string $bodyText = "")
    {
        $this->id = $id;
        $this->title = $title;
        $this->createdOn = $createdOn;
        $this->updatedOn = $updatedOn;
        $this->bodyHtml = $bodyHtml;
        $this->bodyText = $bodyText;
    }

    /**
     * Create a Template from the return value of the API.
     *
     * @param  object $json
     * @return Template
     */
    static function fromJSON($json)
    {
        return new self(
            $json->id,
            $json->title,
            $json->createdOn,
            $json->updatedOn,
            $json->bodyHtml ?? "",
            $json->bodyText ?? "",
        );
    }
}

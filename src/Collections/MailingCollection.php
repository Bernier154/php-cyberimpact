<?php

namespace bernier154\PhpCyberimpact\Collections;

use bernier154\PhpCyberimpact\Objects\Mailing;

/**
 * Paginated list of maillings.
 */
class MailingCollection
{
    public $mailings;
    public $totalCount;
    public $page;
    public $limit;
    public $sort;

    /**
     * Returns a paginated list of maillings.
     *
     * @param  Mailling[] $maillings Array of mailling
     * @param  int $totalCount Total count of mailings
     * @param  int $page The page of results to view
     * @param  int $limit The amount of results per page (max: 10 000)
     * @param  string $sort $sort In which order should the results be returned.
     *                      Possible values: date_sent_asc , date_sent_desc , date_opened_asc , date_opened_desc .  
     * @return void
     */
    public function __construct($mailings,  $totalCount,  $page,  $limit,  $sort)
    {
        $this->mailings = $mailings;
        $this->totalCount = $totalCount;
        $this->page = $page;
        $this->limit = $limit;
        $this->sort = $sort;
    }

    /**
     * Create a MailingCollection from the return value of the API.
     *
     * @param  object $json
     * @return MailingCollection
     */
    static function fromJSON(object $json)
    {
        return new self(
            array_map(Mailing::class . '::fromJSON', $json->mailings),
            $json->totalCount,
            $json->page,
            $json->limit,
            $json->sort,
        );
    }
}

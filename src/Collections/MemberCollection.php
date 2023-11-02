<?php

namespace bernier154\PhpCyberimpact\Collections;

use bernier154\PhpCyberimpact\Objects\Member;

/**
 * Paginated list of groups.
 */
class MemberCollection
{
    public $members;
    public $totalCount;
    public $page;
    public $limit;
    public $sort;

    /**
     * Returns a paginated list of members.
     *
     * @param  Member[] $members Array of members
     * @param  int $totalCount Total count of members
     * @param  int $page The page of results to view
     * @param  int $limit The amount of results per page (max: 10 000)
     * @param  string $sort $sort In which order should the results be returned.
     *                      Possible values: group_asc , group_desc , nbmember_asc , nbmember_desc , type_asc , type_desc , nbnewsletter_asc , nbnewsletter_desc , date_asc , date_desc . 
     * @return void
     */
    public function __construct($members,  $totalCount,  $page,  $limit,  $sort)
    {
        $this->members = $members;
        $this->totalCount = $totalCount;
        $this->page = $page;
        $this->limit = $limit;
        $this->sort = $sort;
    }


    /**
     * Create a MemberCollection from the return value of the API.
     *
     * @param  object $json
     * @return MemberCollection
     */
    static function fromJSON(object $json)
    {
        return new self(
            array_map(Member::class . '::fromJSON', $json->members),
            $json->totalCount,
            $json->page,
            $json->limit,
            $json->sort,
        );
    }
}

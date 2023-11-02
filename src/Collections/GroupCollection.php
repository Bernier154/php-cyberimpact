<?php

namespace bernier154\PhpCyberimpact\Collections;

use bernier154\PhpCyberimpact\Objects\Group;

/**
 * Paginated list of groups.
 */
class GroupCollection
{
    public $groups;
    public $totalCount;
    public $page;
    public $limit;
    public $sort;

    /**
     * Returns a paginated list of groups.
     *
     * @param  Group[] $groups Array of groups
     * @param  int $totalCount Total count of groups
     * @param  int $page The page of results to view
     * @param  int $limit The amount of results per page (max: 10 000)
     * @param  string $sort $sort In which order should the results be returned.
     *                      Possible values: group_asc , group_desc , nbmember_asc , nbmember_desc , type_asc , type_desc , nbnewsletter_asc , nbnewsletter_desc , date_asc , date_desc . 
     * @return void
     */
    public function __construct($groups,  $totalCount,  $page,  $limit,  $sort)
    {
        $this->groups = $groups;
        $this->totalCount = $totalCount;
        $this->page = $page;
        $this->limit = $limit;
        $this->sort = $sort;
    }

    /**
     * Create a GroupCollection from the return value of the API.
     *
     * @param  object $json
     * @return GroupCollection
     */
    static function fromJSON(object $json)
    {
        return new self(
            array_map(Group::class . '::fromJSON', $json->groups),
            $json->totalCount ?? count($json->groups),
            $json->page ?? 0,
            $json->limit ?? 0,
            $json->sort ?? ''
        );
    }
}

<?php

namespace bernier154\PhpCyberimpact\Objects;


/**
 * Groups are collection of member. Members can have multiple groups.
 */
class Group
{
    public $id;
    public $title;
    public $isPublic;
    public $membersCount;
    public $mailingsCount;
    public $createdOn;
    public $isDynamic;

    /**
     * Return an instance of Group
     *
     * @param  int $id The id of the group
     * @param  string $title The title of the group
     * @param  bool $isPublic Should the group be a public group or not. See our documentation for the difference between the two types: http://support.cyberimpact.com/articles/63?l=en_ca#publicvsprivategroup
     * @param  int $membersCount The number of member in the group.
     * @param  int $mailingsCount The number of mailing related to that group
     * @param  string $createdOn The date of creation of the group
     * @param  bool $isDynamic if the group is dynamic
     * @return void
     */
    public function __construct(int $id = null, string $title = "", bool $isPublic = true, int $membersCount = 0, int $mailingsCount = 0, string $createdOn = "", bool $isDynamic = false)
    {
        $this->id = $id;
        $this->title = $title;
        $this->isPublic = $isPublic;
        $this->membersCount = $membersCount;
        $this->mailingsCount = $mailingsCount;
        $this->createdOn = $createdOn;
        $this->isDynamic = $isDynamic;
    }

    /**
     * Create a Group from the return value of the API.
     *
     * @param  object $json
     * @return Group
     */
    static function fromJSON($json)
    {
        return new self(
            $json->id,
            $json->title,
            $json->isPublic,
            $json->membersCount,
            $json->mailingsCount,
            $json->createdOn,
            $json->isDynamic
        );
    }
}

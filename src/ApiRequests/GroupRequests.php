<?php

namespace bernier154\PhpCyberimpact\ApiRequests;

use bernier154\PhpCyberimpact\Collections\GroupCollection;
use bernier154\PhpCyberimpact\Collections\MemberCollection;
use bernier154\PhpCyberimpact\Exceptions\ApiException;
use bernier154\PhpCyberimpact\Objects\Group;

trait GroupRequests
{
    /**
     * retrieveGroups
     *
     * @param  int $page The page of results to view
     * @param  int $limit The amount of results per page (max: 10 000)
     * @param  string $sort In which order should the results be returned.
     *                      Possible values: group_asc , group_desc , nbmember_asc , nbmember_desc , type_asc , type_desc , nbnewsletter_asc , nbnewsletter_desc , date_asc , date_desc . 
     * @return void
     */
    public function retrieveGroups(int $page = 1, int $limit = 20, string $sort = "")
    {
        $apiResponse = $this->_request('GET', 'groups', [
            'page' => $page,
            'limit' => $limit,
            'sort' => $sort,
        ]);
        return GroupCollection::fromJSON($apiResponse);
    }

    /**
     * Retrieve a specific group based on its id.
     *
     * @param  int $id The group numerical id
     * @return ?Group null if not found
     */
    public function retrieveGroup(int $id)
    {
        try {
            $apiResponse = $this->_request('GET', "groups/$id");
            return Group::fromJSON($apiResponse);
        } catch (ApiException $e) {
            if ($e->getCode() == 404) {
                return null;
            }
            throw ($e);
        }
    }

    /**
     * retrieveGroupMembers
     *
     * @param  int $id The group's numerical Id
     * @param  int $page The page of results to view.
     * @param  int $limit he amount of results per page (max: 10 000)
     * @param  string $sort In which order should the results be returned.
     *                      Possible values: email_asc , email_desc , language_asc , language_desc , fullname_asc , fullname_desc , date_asc , date_desc , consent_type_asc , consent_type_desc , consent_date_asc , consent_date_desc , updated_asc , updated_desc . 
     * @param  string $joinedOnFrom Date (start of the day) from which members have been added in the account (format: yyyy-mm-dd)
     * @param  string $joinedOnTo Date (end of the day) to which members have been added in the account (format: yyyy-mm-dd)
     * @param  string $updatedOnFrom Date (start of the day) from which members have been last updated in the account (format: yyyy-mm-dd)
     * @param  string $updatedOnTo Date (end of the day) to which members have been last updated in the account (format: yyyy-mm-dd)
     * @return void
     */
    public function retrieveGroupMembers(int $id, int $page = 1, int $limit = 20, string $sort = "", string $joinedOnFrom = "", string $joinedOnTo = "", string $updatedOnFrom = "", string $updatedOnTo = "")
    {
        $apiResponse = $this->_request('GET', "groups/$id/members", [
            'page' => $page,
            'limit' => $limit,
            'sort' => $sort,
            'joinedOnFrom' => $joinedOnFrom,
            'joinedOnTo' => $joinedOnTo,
            'updatedOnFrom' => $updatedOnFrom,
            'updatedOnTo' => $updatedOnTo
        ]);
        return MemberCollection::fromJSON($apiResponse);
    }

    /**
     * Remove all members from a specific group.
     *
     * @param  int $id The group's numerical id
     * @return object An object containing a prop [members] contiaining ids 
     */
    public function removeAllGroupMembers(int $id)
    {
        $apiResponse = $this->_request('DELETE', "groups/$id/members");
        return $apiResponse;
    }

    /**
     * Add a new static group in your account.
     *
     * @param  string $title The title of the new group
     * @param  bool $isPublic Should the new group be a public group or not. See our documentation for the difference between the two types: http://support.cyberimpact.com/articles/63?l=en_ca#publicvsprivategroup
     * @return Group The newly created group
     */
    public function addGroup(string $title, bool $isPublic = true)
    {
        $apiResponse = $this->_request('POST', "groups", [
            "title" => $title,
            "isPublic" => $isPublic,
        ]);
        return Group::fromJSON($apiResponse);
    }

    /**
     * Modify the representation of a group so that it become completely like specified. Unspecified attributes will be resetted to their default empty values. Note that replacing a dynamic group is not possible from the API.
     *
     * @param  string $title The title of the group
     * @param  bool $isPublic Should the group be a public group or not. See our documentation for the difference between the two types: http://support.cyberimpact.com/articles/63?l=en_ca#publicvsprivategroup
     * @return Group The modified group
     */
    public function replaceGroup(int $id, string $title, bool $isPublic = true)
    {
        $apiResponse = $this->_request('PUT', "groups/$id", [
            "title" => $title,
            "isPublic" => $isPublic,
        ]);
        return Group::fromJSON($apiResponse);
    }

    /**
     * Modify the representation of a group by changing only the specified attributes. Unspecified attributes are left untouched. Note that editing a dynamic group is not possible from the API.
     *
     * @param  string $title The title of the group
     * @param  bool $isPublic Should the group be a public group or not. See our documentation for the difference between the two types: http://support.cyberimpact.com/articles/63?l=en_ca#publicvsprivategroup
     * @return Group The modified group
     */
    public function editGroup(int $id, string $title, bool $isPublic = true)
    {
        $apiResponse = $this->_request('PATCH', "groups/$id", [
            "title" => $title,
            "isPublic" => $isPublic,
        ]);
        return Group::fromJSON($apiResponse);
    }

    /**
     * Delete a specific group based on its id.
     *
     * @param  int $id The group's numerical id
     * @return object The id of the group and it's status.
     */
    public function deleteGroup(int $id)
    {
        try {
            $apiResponse = $this->_request('DELETE', "groups/$id");
            return $apiResponse;
        } catch (ApiException $e) {
            if ($e->getCode() == 404) {
                return json_decode(json_encode([$id => 'not-found']));
            }
            throw ($e);
        }
    }
}

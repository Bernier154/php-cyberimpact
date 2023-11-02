<?php

namespace bernier154\PhpCyberimpact\ApiRequests;

use bernier154\PhpCyberimpact\Collections\GroupCollection;
use bernier154\PhpCyberimpact\Collections\MailingCollection;
use bernier154\PhpCyberimpact\Collections\MemberCollection;
use bernier154\PhpCyberimpact\Exceptions\ApiException;
use bernier154\PhpCyberimpact\Objects\ConsentDetails;
use bernier154\PhpCyberimpact\Objects\Member;

trait MemberRequests
{

    /**
     * Retrieve a paginated list of your members,
     * Active members are subscribed members that are part of group(s),
     * Orphan members are subscribed members that are not part of a group.
     *     
     * @param  int $page The page of results to view.
     * @param  int $limit The amount of results per page (max: 10 000)
     * @param  string $status The status of the member in your account.
     *                         Possible values: active , orphans , all . 
     * @param  string $sort In which order should the results be returned.
     *                      Possible values: email_asc , email_desc , language_asc , language_desc , fullname_asc , fullname_desc , date_asc , date_desc , consent_type_asc , consent_type_desc , consent_date_asc , consent_date_desc , updated_asc , updated_desc . 
     * @param  string $joinedOnFrom Date (start of the day) from which members have been added in the account (format: yyyy-mm-dd)
     * @param  string $joinedOnTo Date (end of the day) to which members have been added in the account (format: yyyy-mm-dd)
     * @param  string $updatedOnFrom Date (start of the day) from which members have been last updated in the account (format: yyyy-mm-dd)
     * @param  string $updatedOnTo Date (end of the day) to which members have been last updated in the account (format: yyyy-mm-dd)
     * @return MemberCollection
     */
    public function retrieveMembers(int $page = 1, int $limit = 20, string $status = "active", string $sort = "", string $joinedOnFrom = "", string $joinedOnTo = "", string $updatedOnFrom = "", string $updatedOnTo = "")
    {
        $apiResponse = $this->_request('GET', "members", [
            'page' => $page,
            'limit' => $limit,
            'status' => $status,
            'sort' => $sort,
            'joinedOnFrom' => $joinedOnFrom,
            'joinedOnTo' => $joinedOnTo,
            'updatedOnFrom' => $updatedOnFrom,
            'updatedOnTo' => $updatedOnTo
        ]);

        return MemberCollection::fromJSON($apiResponse);
    }

    /**
     * Retrieve a specific member based on its key.
     *
     * @param  string|int $key Can be either the member's email address or its numerical Id
     * @return ?Member
     */
    public function retrieveMember($key)
    {
        try {
            $apiResponse = $this->_request('GET', "members/$key");
            return Member::fromJSON($apiResponse);
        } catch (ApiException $e) {
            if ($e->getCode() == 404) {
                return null;
            }
            throw ($e);
        }
    }

    /**
     * Retrieve a paginated list of members for which we received a hard bounce for the last mailing we sent to them.
     *
     * @param  int $page The page of results to view.
     * @param  int $limit The amount of results per page (max: 10 000)
     * @param  string $sort In which order should the results be returned.
     *                      Possible values: email_asc , email_desc , language_asc , language_desc , fullname_asc , fullname_desc , date_asc , date_desc , consent_type_asc , consent_type_desc , consent_date_asc , consent_date_desc , updated_asc , updated_desc . 
     * @param  string $joinedOnFrom Date (start of the day) from which members have been added in the account (format: yyyy-mm-dd)
     * @param  string $bouncedOnFrom Date (start of the day) from which members have bounced (format: yyyy-mm-dd)
     * @param  string $bouncedOnTo Date (end of the day) to which members have bounced (format: yyyy-mm-dd)
     * @param  string $updatedOnFrom Date (start of the day) from which members have been last updated in the account (format: yyyy-mm-dd)
     * @param  string $updatedOnTo Date (end of the day) to which members have been last updated in the account (format: yyyy-mm-dd)
     * @return MemberCollection
     */
    public function retrieveBouncedMembers($page = 1,  $limit = 20,  $sort = "",  $bouncedOnFrom = "",  $bouncedOnTo = "",  $updatedOnFrom = "",  $updatedOnTo = "")
    {
        $apiResponse = $this->_request('GET', "members/bounced", [
            'page' => $page,
            'limit' => $limit,
            'sort' => $sort,
            'bouncedOnFrom' => $bouncedOnFrom,
            'bouncedOnTo' => $bouncedOnTo,
            'updatedOnFrom' => $updatedOnFrom,
            'updatedOnTo' => $updatedOnTo
        ]);

        return MemberCollection::fromJSON($apiResponse);
    }

    /**
     * Retrieve a paginated list of members for which we received a hard bounce for the last mailing we sent to them.
     *
     * @param  int $page The page of results to view.
     * @param  int $limit The amount of results per page (max: 10 000)
     * @param  string $sort In which order should the results be returned.
     *                      Possible values: email_asc , email_desc , language_asc , language_desc , fullname_asc , fullname_desc , date_asc , date_desc , consent_type_asc , consent_type_desc , consent_date_asc , consent_date_desc , updated_asc , updated_desc . 
     * @param  string $joinedOnFrom Date (start of the day) from which members have been added in the account (format: yyyy-mm-dd)
     * @param  string $unsubscribedOnFrom Date (start of the day) from which members have unsubscribed (format: yyyy-mm-dd)
     * @param  string $unsubscribedOnTo Date (end of the day) to which members have unsubscribed (format: yyyy-mm-dd)
     * @param  string $updatedOnFrom Date (start of the day) from which members have been last updated in the account (format: yyyy-mm-dd)
     * @param  string $updatedOnTo Date (end of the day) to which members have been last updated in the account (format: yyyy-mm-dd)
     * @return MemberCollection
     */
    public function retrieveUnsubscribedMembers($page = 1,  $limit = 20,  $sort = "",  $unsubscribedOnFrom = "",  $unsubscribedOnTo = "",  $updatedOnFrom = "",  $updatedOnTo = "")
    {
        $apiResponse = $this->_request('GET', "members/unsubscribed", [
            'page' => $page,
            'limit' => $limit,
            'sort' => $sort,
            'unsubscribedOnFrom' => $unsubscribedOnFrom,
            'unsubscribedOnTo' => $unsubscribedOnTo,
            'updatedOnFrom' => $updatedOnFrom,
            'updatedOnTo' => $updatedOnTo
        ]);

        return MemberCollection::fromJSON($apiResponse);
    }

    /**
     * Retrieve a specific unsubscribed member based on its email.
     *
     * @param  string $email The unsubscribed member's email address
     * @return ?Member
     */
    public function retrieveUnsubscribedMember($email)
    {
        try {
            $apiResponse = $this->_request('GET', "members/unsubscribed/$email");
            return Member::fromJSON($apiResponse);
        } catch (ApiException $e) {
            if ($e->getCode() == 404) {
                return null;
            }
            throw ($e);
        }
    }

    /**
     * Unsubscribe a member based on its key.
     *
     * @param  string|int $key Can be either the member's email address or its numerical Id
     * @return Member
     */
    public function unsubscribeMember($key)
    {
        $apiResponse = $this->_request('POST', "members/unsubscribed/$key");
        return Member::fromJSON($apiResponse);
    }

    /**
     * Add a new member in your account. If you need the member to confirm its subscription, it is recommended that you use optins,
     * If you use this method in an online form, it is strongly recommended to add a CAPTCHA to it in order to avoid abuse,
     * Warning: This method is throttled. If you wish to use it for synchronization purposes between two systems, please contact us to know how you can avoid being throttled. If you need to add multiple members at once, it is recommended that you use batches.
     *
     * @param  string $email The member's email address
     * @param  string $gender The member's gender (m, f or o)
     * @param  string $groups A csv list of the groups to which this new member should be subscribed
     * @param  string $firstname The member's firstname
     * @param  string $lastname The member's lastname
     * @param  string $company The member's company
     * @param  string $language The language to use for communication with this member (en_ca or fr_ca)
     * @param  string $birthdate The member's birthdate in format Y-m-d
     * @param  string $postalCode The member's postal code
     * @param  string $country The member's ISO 3166-1 alpha-2 country code
     * @param  string $note A note
     * @param  array $customFields Any non-confidential data can be stored here. The key is a string containing the ID of the field
     * @return Member
     */
    public function addMember($email,  $gender = "",  $groups = "",  $firstname = "",  $lastname = "",  $company = "",  $language = "",  $birthdate = "",  $postalCode = "",  $country = "",  $note = "",  $customFields = [])
    {
        $apiResponse = $this->_request('POST', "members", [
            'email' => $email,
            'gender' => $gender,
            'groups' => $groups,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'company' => $company,
            'language' => $language,
            'birthdate' => $birthdate,
            'postalCode' => $postalCode,
            'country' => $country,
            'note' => $note,
            'customFields' => $customFields
        ]);
        return Member::fromJSON($apiResponse);
    }

    /**
     * Modifiy the representation of a member so that it become completely like specified. Unspecified attributes will be resetted to their default empty values.
     *
     * @param  string|int $key Can be either the member's email address or its numerical Id
     * @param  string $email The member's email address
     * @param  string $gender The member's gender (m, f or o)
     * @param  string $groups A csv list of the groups to which this new member should be subscribed
     * @param  string $firstname The member's firstname
     * @param  string $lastname The member's lastname
     * @param  string $company The member's company
     * @param  string $language The language to use for communication with this member (en_ca or fr_ca)
     * @param  string $birthdate The member's birthdate in format Y-m-d
     * @param  string $postalCode The member's postal code
     * @param  string $country The member's ISO 3166-1 alpha-2 country code
     * @param  string $note A note
     * @param  array $customFields Any non-confidential data can be stored here. The key is a string containing the ID of the field
     * @return Member
     */
    public function replaceMember($key,  $email,  $gender = "",  $groups = "",  $firstname = "",  $lastname = "",  $company = "",  $language = "",  $birthdate = "",  $postalCode = "",  $country = "",  $note = "",  $customFields = [])
    {
        $apiResponse = $this->_request('PUT', "members/$key", [
            'email' => $email,
            'gender' => $gender,
            'groups' => $groups,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'company' => $company,
            'language' => $language,
            'birthdate' => $birthdate,
            'postalCode' => $postalCode,
            'country' => $country,
            'note' => $note,
            'customFields' => $customFields
        ]);
        return Member::fromJSON($apiResponse);
    }

    /**
     * Modifiy the representation of a member by changing only the specified attributes. Unspecified attributes are left untouched.
     *
     * @param  string|int $key Can be either the member's email address or its numerical Id
     * @param  string $email The member's email address
     * @param  string $gender The member's gender (m, f or o)
     * @param  string $groups A csv list of the groups to which this new member should be subscribed
     * @param  string $firstname The member's firstname
     * @param  string $lastname The member's lastname
     * @param  string $company The member's company
     * @param  string $language The language to use for communication with this member (en_ca or fr_ca)
     * @param  string $birthdate The member's birthdate in format Y-m-d
     * @param  string $postalCode The member's postal code
     * @param  string $country The member's ISO 3166-1 alpha-2 country code
     * @param  string $note A note
     * @param  array $customFields Any non-confidential data can be stored here. The key is a string containing the ID of the field
     * @return Member
     */
    public function editMember($key,  $email,  $gender = "",  $groups = "",  $firstname = "",  $lastname = "",  $company = "",  $language = "",  $birthdate = "",  $postalCode = "",  $country = "", string $note = "", array $customFields = [])
    {
        $apiResponse = $this->_request('PATCH', "members/$key", [
            'email' => $email,
            'gender' => $gender,
            'groups' => $groups,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'company' => $company,
            'language' => $language,
            'birthdate' => $birthdate,
            'postalCode' => $postalCode,
            'country' => $country,
            'note' => $note,
            'customFields' => $customFields
        ]);
        return Member::fromJSON($apiResponse);
    }

    /**
     * Delete a specific member based on its key.
     *
     * @param  string|int $key Can be either the member's email address or its numerical Id
     * @return void
     */
    public function deleteMember($key)
    {
        try {
            $apiResponse = $this->_request('DELETE', "members/$key");
            return $apiResponse;
        } catch (ApiException $e) {
            if ($e->getCode() == 404) {
                return json_decode(json_encode([$key => 'not-found']));
            }
            throw ($e);
        }
    }

    /**
     * Retrieve a paginated list of the groups that the specified member is part of.
     *
     * @param  int|string $key Can be either the member's email address or its numerical Id
     * @param  int $page The page of results to view
     * @param  int $limit The amount of results per page (max: 10 000)
     * @param  string $sort In which order should the results be returned. 
     *                      Possible values: title_asc , title_desc , created_asc , created_desc . 
     * @return GroupCollection
     */
    public function retrieveMemberGroups($key,  $page = 1,  $limit = 20,  $sort = "")
    {
        $apiResponse = $this->_request('GET', "members/$key/groups", [
            'page' => $page,
            'limit' => $limit,
            'sort' => $sort,
        ]);
        return GroupCollection::fromJSON($apiResponse);
    }

    /**
     * Retrieve a paginated list of the member's received mailings.
     * 
     * @param  int|string $key Can be either the member's email address or its numerical Id
     * @param  int $page The page of results to view
     * @param  int $limit The amount of results per page (max: 10 000)
     * @param  string $sort In which order should the results be returned. 
     *                      Possible values: date_sent_asc , date_sent_desc , date_opened_asc , date_opened_desc . 
     * @return MailingCollection
     */
    public function retrieveMemberMailings($key,  $page = 1,  $limit = 20,  $sort = "")
    {
        $apiResponse = $this->_request('GET', "members/$key/mailings", [
            'page' => $page,
            'limit' => $limit,
            'sort' => $sort,
        ]);
        return MailingCollection::fromJSON($apiResponse);
    }

    /**
     * Make the specified member part of the specified groups.
     *
     * @param  string|int $key Can be either the member's email address or its numerical Id
     * @param  string $groups A csv list of the groups that the member will become part of
     * @return GroupCollection List of the member's subscriptions
     */
    public function addGroupsToMember($key,  $groups)
    {
        $apiResponse = $this->_request('POST', "members/$key/groups", [
            'groups' => $groups
        ]);
        return GroupCollection::fromJSON($apiResponse);
    }

    /**
     * Replace completely the list of groups that a member is part of by the ones specified.
     *
     * @param  string|int $key Can be either the member's email address or its numerical Id
     * @param  string $groups A csv list of the groups that the member will become part of
     * @return GroupCollection List of the member's groups
     */
    public function replaceMemberGroups($key,  $groups)
    {
        $apiResponse = $this->_request('PUT', "members/$key/groups", [
            'groups' => $groups
        ]);
        return GroupCollection::fromJSON($apiResponse);
    }

    /**
     * Remove the specified member from the specified group.
     *
     * @param  string|int $key Can be either the member's email address or its numerical Id
     * @param  int $groupId Numerical Id of the group to remove from the member's groups list
     * @return object Status of the subscription to the specified group.
     */
    public function removeGroupMember($key,  $groupId)
    {
        try {
            $apiResponse = $this->_request('DELETE', "members/$key/groups/$groupId");
            return $apiResponse;
        } catch (ApiException $e) {
            if ($e->getCode() == 404) {
                return json_decode(json_encode([$key => 'not-found']));
            }
            throw ($e);
        }
    }

    /**
     * Send an opt-in email to the specified email address, creating the member if not already existing and adding it to the specified list of groups,
     * Warning: This method is throttled. If you wish to use it for synchronization purposes between two systems, please contact us to know how you can avoid being throttled,
     * If you use this method in an online form, it is strongly recommended to add a CAPTCHA to it in order to avoid abuse.
     * 
     * @param  string $email The member's email address
     * @param  string $gender The member's gender (m, f or o)
     * @param  string $groups A csv list of the groups to which this new member should be subscribed
     * @param  string $firstname The member's firstname
     * @param  string $lastname The member's lastname
     * @param  string $company The member's company
     * @param  string $language The language to use for communication with this member (en_ca or fr_ca)
     * @param  string $birthdate The member's birthdate in format Y-m-d
     * @param  string $postalCode The member's postal code
     * @param  string $country The member's ISO 3166-1 alpha-2 country code
     * @param  string $note A note
     * @param  string $optinConfirmUrl URL that will be used as the opt-in confirmation page (format: http://www.example.com)
     * @param  array $customFields Any non-confidential data can be stored here. The key is a string containing the ID of the field
     * @return object The id of the Opt-in request and it's status.
     */
    public function optInMember($email,  $gender = "",  $groups = "",  $firstname = "",  $lastname = "",  $company = "",  $language = "",  $birthdate = "",  $postalCode = "",  $country = "",  $note = "",  $optinConfirmUrl = "",  $customFields = [])
    {
        $apiResponse = $this->_request('POST', "members/optins", [
            'email' => $email,
            'gender' => $gender,
            'groups' => $groups,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'company' => $company,
            'language' => $language,
            'birthdate' => $birthdate,
            'postalCode' => $postalCode,
            'country' => $country,
            'note' => $note,
            'customFields' => $customFields,
            'optinConfirmUrl' => $optinConfirmUrl
        ]);
        return $apiResponse;
    }

    /**
     * Retrieve more consent information for a specific member based on its key.
     *
     * @param  string|int $key Can be either the member's email address or its numerical Id
     * @return ConsentDetails
     */
    public function retrieveMemberConsentDetails($key)
    {
        $apiResponse = $this->_request('GET', "members/$key/consent");
        return ConsentDetails::fromJSON($apiResponse);
    }

    /**
     * Set consent for a specific member based on its key. Be advised that some consent cannot be overridden, this method will return a 422 status code with a message when that happen.
     *
     * @param  string|int $key Can be either the member's email address or its numerical Id
     * @param  string $relationType The relation type for the consent. 
     *                              Accepted values: express-consent, active-clients, information-request, business-card, web-contacts, purchased-list, contest-participants, mixed-list, association-members, employees, partners, inactive-clients
     * @param  string $consentDate Date the consent was obtained in format Y-m-d (can also be null)
     * @param  string $consentProof The consent proof description
     * @return ConsentDetails
     */
    public function setMemberConsent($key,  $relationType,  $consentDate,  $consentProof)
    {
        $apiResponse = $this->_request('PUT', "members/$key/consent", [
            'relationType' => $relationType,
            'consentDate' => $consentDate,
            'consentProof' => $consentProof
        ]);
        return ConsentDetails::fromJSON($apiResponse);
    }
}

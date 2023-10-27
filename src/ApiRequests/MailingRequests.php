<?php

namespace bernier154\PhpCyberimpact\ApiRequests;

use bernier154\PhpCyberimpact\Collections\MailingCollection;
use bernier154\PhpCyberimpact\Collections\MemberCollection;
use bernier154\PhpCyberimpact\Exceptions\ApiException;
use bernier154\PhpCyberimpact\Objects\Mailing;

trait MailingRequests
{

    /**
     * Retrieve a paginated list of all sent mailings.
     *
     * @param  int $page The page of results to view 
     * @param  int $limit The amount of results per page (max: 10 000)
     * @param  string $sort In which order should the results be returned.
     *                      Possible values: language_asc , language_desc , subject_asc , subject_desc , recipients_asc , recipients_desc , date_asc , date_desc . 
     * @return MailingCollection
     */
    public function retrieveSentMailings(int $page = 1, int $limit = 20, string $sort = "")
    {
        $apiResponse = $this->_request('GET', "mailings/sent", [
            'page' => $page,
            'limit' => $limit,
            'sort' => $sort
        ]);

        return MailingCollection::fromJSON($apiResponse);
    }

    /**
     * Retrieve a paginated list of a mailing's hard bounces.
     *
     * @param  int $id The mailing's numerical id
     * @param  int $page The page of results to view
     * @param  int $limit The amount of results per page (max: 10 000)
     * @param  string $sort In which order should the results be returned
     *                      Possible values: email_asc, email_desc, language_asc, language_desc, fullname_asc, fullname_desc, date_asc, date_desc

     * @return MemberCollection
     */
    public function retrieveMailingHardBounces(int $id, int $page = 1, int $limit = 20, string $sort = "")
    {
        $apiResponse = $this->_request('GET', "mailings/$id/hard-bounces", [
            'page' => $page,
            'limit' => $limit,
            'sort' => $sort
        ]);
        return MemberCollection::fromJSON($apiResponse);
    }

    /**
     * Retrieve a paginated list of all scheduled mailings.
     *
     * @param  int $page The page of results to view 
     * @param  int $limit The amount of results per page (max: 10 000)
     * @param  string $sort In which order should the results be returned.
     *                      Possible values: language_asc , language_desc , subject_asc , subject_desc , recipients_asc , recipients_desc , date_asc , date_desc . 
     * @return MailingCollection
     */
    public function retrieveScheduledMailings(int $page = 1, int $limit = 20, string $sort = "")
    {
        $apiResponse = $this->_request('GET', "mailings/scheduled", [
            'page' => $page,
            'limit' => $limit,
            'sort' => $sort
        ]);

        return MailingCollection::fromJSON($apiResponse);
    }

    /**
     * Retrieve a specific mailing based on its id.
     *
     * @param  int $id The mailing's numerical id
     * @return Mailing
     */
    public function retrieveMailing(int $id)
    {
        try {
            $apiResponse = $this->_request('GET', "mailings/$id");
            return Mailing::fromJSON($apiResponse);
        } catch (ApiException $e) {
            if ($e->getCode() == 404) {
                return null;
            }
            throw ($e);
        }
    }

    /**
     * Create a new mailing scheduled to be sent.
     *
     * @param  string $subject The subject of the mailing
     * @param  string $language The language of the mailing (en_ca or fr_ca)
     * @param  string $groups A csv list of the groups to which the mailing should be sent
     * @param  string $sendAt The date and time at which the mailing should start to be sent. format: yyyy-mm-dd HH:mm:ss
     * @param  string $replyTo The email address to set as a reply-to address
     * @param  string $fromName The name to put as From: for the mailing
     * @param  string $mailFrom The email address to put as From: for the mailing. This must be a validated sender email address in your account.
     * @param  string $bodyHtml The html body of the mailing. It is required that a mailing has at least either a html or a text body. Having both is recommended
     * @param  string $bodyText The text body of the mailing. It is required that a mailing has at least either a html or a text body. Having both is recommended
     * @param  bool $googleAnalytics Boolean to tell if Google Analytics tracking is added to the links in the mailing
     * @param  string $googleAnalyticsCampaign If Google Analytics is used, this field is used as the campaign name
     * @param  int $updateProfileForm The update profile form ID used at the bottom of the mailing
     * @return Mailing
     */
    public function createMailing(string $subject, string $language, string $groups, string $sendAt, string $replyTo = "", string $fromName = "", string $mailFrom = "", string $bodyHtml = "", string $bodyText = "", bool $googleAnalytics = false, string $googleAnalyticsCampaign = "", int $updateProfileForm = null)
    {
        $apiResponse = $this->_request('POST', "mailings", [
            'subject' => $subject,
            'language' => $language,
            'groups' => $groups,
            'sendAt' => $sendAt,
            'replyTo' => $replyTo,
            'fromName' => $fromName,
            'mailFrom' => $mailFrom,
            'bodyHtml' => $bodyHtml,
            'bodyText' => $bodyText,
            'googleAnalytics' => $googleAnalytics,
            'googleAnalyticsCampaign' => $googleAnalyticsCampaign,
            'updateProfileForm' => $updateProfileForm
        ]);

        return Mailing::fromJSON($apiResponse);
    }

    /**
     * Delete a specific mailing based on its id (If it's not already sent).
     *
     * @param  int $id The mailing's numerical id
     * @return object The id of the mailing and it's status.
     */
    public function DeleteMailing($id)
    {
        try {
            $apiResponse = $this->_request('DELETE', "mailings/$id");
            return $apiResponse;
        } catch (ApiException $e) {
            if ($e->getCode() == 404) {
                return json_decode(json_encode([$id => 'not-found']));
            }
            throw ($e);
        }
    }
}

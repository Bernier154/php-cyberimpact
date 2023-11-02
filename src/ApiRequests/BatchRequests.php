<?php

namespace bernier154\PhpCyberimpact\ApiRequests;

use bernier154\PhpCyberimpact\Exceptions\ApiException;
use bernier154\PhpCyberimpact\Objects\BatchAddMember;
use bernier154\PhpCyberimpact\Objects\BatchDeleteMember;
use bernier154\PhpCyberimpact\Objects\BatchUnsubscribe;

trait BatchRequests
{
    public function retrieveBatch($id, $showErrorDetails = false)
    {
        try {
            $apiResponse = $this->_request('GET', "batches/$id", [
                'showErrorDetails' => $showErrorDetails
            ]);
            switch ($apiResponse->batchType) {
                case 'addMembers':
                    return BatchAddMember::fromJSON($apiResponse);
                    break;
                case 'deleteMembers':
                    return BatchDeleteMember::fromJSON($apiResponse);
                    break;
                case 'unsubscribe':
                    return BatchUnsubscribe::fromJSON($apiResponse);
                    break;
            }
        } catch (ApiException $e) {
            if ($e->getCode() == 404) {
                return null;
            }
            throw ($e);
        }
    }

    /**
     * Add members in batch 
     * If a member already exists, it is updated with the new information provided in the batch.
     * If a field is empty in the batch and there is already data present for that field for a member in your account, we keep the data you already have for that member.
     * If you specifically want to empty a field, provide the special string `__EMPTY__` in your batch to clear that field
     * All submitted members will be added to the groups specified in the batch (if they are not already in). If they were already in other groups, they will stay in their previous groups in addition to being added to the new ones.
     *
     * @param  array $members
     * @param  string $relationType Values : express-consent, active-clients, information-request, business-card, web-contacts, purchased-list, contest-participants, mixed-list, inactive-clients, association-members, employees, partners

     * @param  string $defaultConsentDate
     * @param  string $defaultConsentProof
     * @return BatchAddMember
     */
    public function createAddMemberBatch($members, $relationType, $defaultConsentDate, $defaultConsentProof)
    {
        $apiResponse = $this->_request('POST', "batches", [
            'batchType' => 'addMembers',
            'members' => $members,
            'relationType' => $relationType,
            'defaultConsentDate' => $defaultConsentDate,
            'defaultConsentProof' => $defaultConsentProof
        ]);
        return BatchAddMember::fromJSON($apiResponse);
    }

    /**
     * Delete members in batch
     *
     * @param  array $ids ids or email of the members to unsubscribe
     * @return BatchDeleteMember
     */
    public function createDeleteMemberBatch($ids)
    {
        $apiResponse = $this->_request('POST', "batches", [
            'batchType' => 'deleteMembers',
            'ids' => $ids,
        ]);
        return BatchDeleteMember::fromJSON($apiResponse);
    }

    /**
     * Unsubscribe members in batch 
     *
     * @param  array $ids ids or email of the members to unsubscribe
     * @return BatchUnsubscribe
     */
    public function createUnsubscribeBatch($ids)
    {
        $apiResponse = $this->_request('POST', "batches", [
            'batchType' => 'unsubscribe',
            'ids' => $ids,
        ]);
        return BatchUnsubscribe::fromJSON($apiResponse);
    }
}

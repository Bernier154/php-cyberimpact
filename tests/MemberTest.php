<?php

namespace bernier154\PhpCyberimpact\tests;


use bernier154\PhpCyberimpact\CyberimpactClient;
use PHPUnit\Framework\TestCase;

final class GroupsTest extends TestCase
{

    /**
     * 
     */
    function testCreateEditDeleteMember()
    {
        $client = new CyberimpactClient(['apiToken' => $_ENV['api_key']]);

        $member = 
    }
}

// retrieveMembers
// retrieveMember
// retrieveBouncedMembers
// retrieveUnsubscribedMembers
// retrieveUnsubscribedMember
// unsubscribeMember
// addMember
// replaceMember
// editMember
// deleteMember
// retrieveMemberGroups
// retrieveMemberMailings
// addGroupsToMember
// replaceMemberGroups
// removeGroupMember
// optInMember
// retrieveMemberConsentDetails
// setMemberConsent
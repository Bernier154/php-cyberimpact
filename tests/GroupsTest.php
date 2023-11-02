<?php

namespace bernier154\PhpCyberimpact\tests;

use bernier154\PhpCyberimpact\Collections\GroupCollection;
use bernier154\PhpCyberimpact\CyberimpactClient;
use bernier154\PhpCyberimpact\Objects\Group;
use PHPUnit\Framework\TestCase;

final class GroupsTest extends TestCase
{

    /**
     * @covers GroupRequests::addGroup
     * @covers GroupRequests::retrieveGroup
     * @covers GroupRequests::deleteGroup
     * @covers GroupRequests::replaceGroup
     * @covers GroupRequests::editGroup
     */
    function testCreateEditDeleteGroup()
    {
        $client = new CyberimpactClient(['apiToken' => $_ENV['api_key']]);

        $group = $client->addGroup(['title' => 'PHP Unit Test',]);
        $this->assertInstanceOf(Group::class, $group);
        $this->assertEquals('PHP Unit Test', $group->title);

        $group = $client->retrieveGroup($group->id);
        $this->assertInstanceOf(Group::class, $group);
        $this->assertEquals('PHP Unit Test', $group->title);

        $group = $client->editGroup($group->id, ['title' => 'PHP Unit Test Edit']);
        $this->assertInstanceOf(Group::class, $group);
        $this->assertEquals('PHP Unit Test Edit', $group->title);

        $group = $client->replaceGroup($group->id, ['title' => 'PHP Unit Test Replace']);
        $this->assertInstanceOf(Group::class, $group);
        $this->assertEquals('PHP Unit Test Replace', $group->title);

        $groupCollection = $client->retrieveGroups();
        $this->assertInstanceOf(GroupCollection::class, $groupCollection);
        $this->assertGreaterThanOrEqual(1, count($groupCollection->groups));

        $deleteResult = $client->deleteGroup($group->id);
        $this->assertObjectHasProperty($group->id, $deleteResult);
    }
}

// retrieveGroupMembers
// removeAllGroupMembers
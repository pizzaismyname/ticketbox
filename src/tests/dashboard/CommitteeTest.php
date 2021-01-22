<?php

use Its\Example\Dashboard\Core\Domain\Model\Committee\Password;
use Its\Example\Dashboard\Core\Domain\Model\Committee\Committee;
use Its\Example\Dashboard\Core\Domain\Model\Committee\CommitteeID;
use Its\Example\Dashboard\Core\Domain\Model\Committee\Username;
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;

class CommitteeTest extends TestCase
{
    public function testCommitteeCanBeCreated()
    {
        $committee = Committee::create("testusername", "testpassword");

        $this->assertInstanceOf(Committee::class, $committee);
    }

    public function testCommitteeCanBeInstantiated()
    {
        $committee = new Committee(
            new CommitteeID(Uuid::uuid4()->toString()),
            new Username("testusername"),
            Password::createFromString("anypassword")
        );

        $this->assertInstanceOf(Committee::class, $committee);
    }

    public function testCommitteePasswordCanBeChanged()
    {
        $committee = new Committee(
            CommitteeID::generate(),
            new Username("testusername"),
            Password::createFromString("anypassword")
        );
        $committee->changePassword("anypassword", Password::createFromString("anotherpassword"));

        $this->assertEquals(true, $committee->password->testAgainst("anotherpassword"));
    }
}

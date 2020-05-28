<?php

use Its\Example\Dashboard\Core\Domain\Exception\NotFoundException;
use Its\Example\Dashboard\Core\Domain\Interfaces\ICommitteeRepository;
use Its\Example\Dashboard\Core\Domain\Model\Committee\Password;
use Its\Example\Dashboard\Core\Domain\Model\Committee\Committee;
use Its\Example\Dashboard\Core\Domain\Model\Committee\CommitteeID;
use Its\Example\Dashboard\Core\Domain\Model\Committee\Username;
use Phalcon\Di;
use PHPUnit\Framework\TestCase;

class CommitteeRepositoryTest extends TestCase
{
    public static $repo;

    public static function setUpBeforeClass(): void
    {
        $di = Di::getDefault();
        /** @var ICommitteeRepository */
        self::$repo = $di->get('committeeRepository');
    }

    public function testCanBePersisted()
    {
        $committee = new Committee(new CommitteeID('e9d235aa-a7c0-4887-9e16-45af0d213cf4'), new Username("validusername"), Password::createFromString("anypassword"));
        $committee_2 = new Committee(new CommitteeID('03e72c50-d385-4625-ac4d-f8ba9741e337'), new Username("validusername2"), Password::createFromString("anypassword"));

        self::$repo->persist($committee);
        self::$repo->persist($committee_2);
    }

    public function testCanBeDeleted()
    {
        $this->expectException(NotFoundException::class);

        $committee = self::$repo->find(new CommitteeID('e9d235aa-a7c0-4887-9e16-45af0d213cf4'));
        self::$repo->delete($committee);
        $committee2 = self::$repo->find(new CommitteeID('03e72c50-d385-4625-ac4d-f8ba9741e337'));
        self::$repo->delete($committee2);
        $committee = self::$repo->find(new CommitteeID('e9d235aa-a7c0-4887-9e16-45af0d213cf4'));
        $committee2 = self::$repo->find(new CommitteeID('03e72c50-d385-4625-ac4d-f8ba9741e337'));
    }
}
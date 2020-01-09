<?php


namespace App\Tests\Entity;

use App\Entity\Result;
use App\Entity\User;
use Faker\Generator as FakerGeneratorAlias;
use Faker\Factory as FakerFactoryAlias;
use Exception;
use PHPUnit\Framework\TestCase;

/**
 * Class ResultTest
 *
 * @package App\Tests\Entity
 *
 * @coversDefaultClass \App\Entity\Result
 */
class ResultTest extends TestCase
{

    /**
     * @var Result
     */
    protected static $resultado;

    /** @var FakerGeneratorAlias $faker */
    private static $faker;

    /**
     * Sets up the fixture.
     * This method is called before a test is executed.
     */
    public static function setUpBeforeClass()
    {
        self::$resultado = new Result(0, new User('', ''), new \DateTime());
        self::$faker = FakerFactoryAlias::create('es_ES');
    }

    /**
     * Implement testConstructor().
     *
     * @covers ::__construct()
     * @return void
     */
    public function testConstructor(): void
    {
        $result = self::$faker->randomDigitNotNull;
        self::$resultado = new Result();
        self::$resultado->setResult($result);
        self::assertEquals(0, self::$resultado->getId());
        self::assertEquals($result, self::$resultado->getResult());
    }

    /**
     * Implement testGetId().
     *
     * @covers ::getId
     * @return void
     */
    public function testGetId(): void
    {
        self::assertEmpty(self::$resultado->getId());
    }

    /**
     * Implements testGetSetEmail().
     *
     * @covers ::getResult()
     * @covers ::setResult()
     * @throws Exception
     * @return void
     */
    public function testGetSetResult(): void
    {
        $result = self::$faker->randomDigitNotNull;
        self::$resultado->setResult($result);
        static::assertEquals(
            $result,
            self::$resultado->getResult()
        );
    }

    /**
     * Implements testGetSetUser().
     *
     * @covers ::getUser()
     * @covers ::setUser()
     * @throws Exception
     * @return void
     */
    public function testGetSetUser(): void
    {
        $user = new User('ejemplo@ejemplo.com', '1234');
        self::$resultado->setUser($user);
        static::assertEquals(
            $user,
            self::$resultado->getUser()
        );
    }

    /**
     * Implements testGetSetTime().
     *
     * @covers ::getTime()
     * @covers ::setTime()
     * @throws Exception
     * @return void
     */
    public function testGetSetTime(): void
    {
        $time = self::$faker->dateTime;
        self::$resultado->setTime($time);
        static::assertEquals(
            $time,
            self::$resultado->getTime()
        );
    }
}
<?php


namespace Devcapu\Arquitetura;


use Devcapu\Arquitetura\Academic\Domain\Student\Phone;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class PhoneTest extends TestCase
{

    /**
     * @test
     * @dataProvider invalidArguments
     * @param string $ddd
     * @param string $number
     */
    public function testInvalidPhoneCannotBeAccepted(string $ddd, string $number): void
    {
        $this->expectException(InvalidArgumentException::class);
        new Phone($ddd, $number);
    }

    public function testValidPhoneShouldBeAccepted(): void
    {
        $phone = new Phone('11', '40028922');
        self::assertEquals('1140028922', (string)$phone);
    }

    public static function invalidArguments(): array
    {
        return [
            ['1d', '40028922'],
            ['11', '4002892c'],
        ];
    }


}
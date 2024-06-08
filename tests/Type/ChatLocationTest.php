<?php

declare(strict_types=1);

namespace Type;

use PHPUnit\Framework\TestCase;
use Vjik\TelegramBot\Api\Type\ChatLocation;
use Vjik\TelegramBot\Api\Type\Location;

final class ChatLocationTest extends TestCase
{
    public function testBase(): void
    {
        $location = new Location(1.1, 2.2);
        $chatLocation = new ChatLocation($location, 'Test');

        $this->assertSame($location, $chatLocation->location);
        $this->assertSame('Test', $chatLocation->address);
    }

    public function testFromTelegramResult(): void
    {
        $result = [
            'location' => [
                'latitude' => 1.1,
                'longitude' => 2.2,
            ],
            'address' => 'Test',
        ];

        $chatLocation = ChatLocation::fromTelegramResult($result);

        $this->assertSame(1.1, $chatLocation->location->latitude);
        $this->assertSame('Test', $chatLocation->address);
    }
}
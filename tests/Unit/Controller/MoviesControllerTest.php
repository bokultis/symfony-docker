<?php

namespace App\Tests\Unit\Controller;

use App\Controller\MoviesController;
use App\Service\MessageGenerator;
use http\Message;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;

/**
 * @covers \App\Controller\MoviesController
 */
class MoviesControllerTest extends TestCase
{
    /**
     * @var MoviesController
     */
    private $subject;
    protected function setUp(): void
    {
        $this->subject = new MoviesController();
    }


    /**
     * @return void
     *
     *
     * id < 518090408 and id > 518190408
     */
    public function testIndex(): void
    {
        $response = $this->subject->index();
        $this->assertTrue($response->getContent() == 'Movies');
    }

    public function testOldMethod(): void
    {
        $messageGeneratorMock = $this->createMock(MessageGenerator::class);
        $loggerMock = $this->createMock(LoggerInterface::class);

        $loggerMock->expects($this->once())
            ->method('error');



        $response = $this->subject->oldMethod($loggerMock, $messageGeneratorMock);
        $this->assertTrue(true);
    }
}

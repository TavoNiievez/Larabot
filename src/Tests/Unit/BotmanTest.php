<?php declare(strict_types=1);

namespace Tests\Unit;

use BotMan\BotMan\BotMan;
use BotMan\BotMan\Drivers\DriverManager;
use BotMan\BotMan\Drivers\Tests\FakeDriver;
use BotMan\BotMan\Drivers\Tests\ProxyDriver;
use BotMan\Studio\Testing\BotManTester;
use Illuminate\Contracts\Console\Kernel;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Testing\TestCase;

class BotmanTest extends TestCase
{
    protected BotMan $botman;

    protected BotManTester $bot;

    public function createApplication(): Application
    {
        $app = require('bootstrap/app.php');

        DriverManager::loadDriver(ProxyDriver::class);
        $fakeDriver = new FakeDriver();
        ProxyDriver::setInstance($fakeDriver);

        $app->make(Kernel::class)->bootstrap();

        $this->botman = $app->make('botman');
        $this->bot = new BotManTester($this->botman, $fakeDriver);

        return $app;
    }

    public function testBasicTest(): void
    {
        $this->bot
            ->receives('Hi')
            ->assertReply('Hello!');
    }

    public function testConversationBasicTest(): void
    {
        $this->bot
            ->receives('Iniciar chat')
            ->assertQuestion('¡Hola! Elige una opción')
            ->receivesInteractiveMessage('info')
            ->assertQuestion('¿Qué quieres saber?')
            ->receivesInteractiveMessage('day')
            ->assertReplyIn(['Hoy es : '.date('d/m/Y')]);
    }
}

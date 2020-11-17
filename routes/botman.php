<?php

use BotMan\BotMan\BotMan;
use Larabot\Conversations\ExampleConversation;

/** @var BotMan $botman */
$botman = app('botman');

$botman->hears('Hi', fn (Botman $bot) =>
$bot->reply('Hello!')
);

$botman->hears('Iniciar chat', fn (Botman $bot) =>
$bot->startConversation(new ExampleConversation())
);

$botman->fallback(fn (BotMan $bot) =>
$bot->reply('Lo siento, no reconozco ese comando, intenta utilizar "Iniciar chat"')
);

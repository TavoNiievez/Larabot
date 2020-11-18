<?php

use BotMan\BotMan\BotMan;
use Larabot\Middleware\DialogFlowV2;

/** @var BotMan $botman */
$botman = app('botman');

$dialogflow = DialogFlowV2::create('es')->listenForAction();

$botman->middleware->received($dialogflow);

$botman->hears('CrearPrueba', function (BotMan $bot) {
    $bot->reply('Te hablo desde Google Dialogflow.');
})->middleware($dialogflow);

$botman->fallback(fn (BotMan $bot) =>
$bot->reply('Lo siento, no reconozco ese comando, intenta utilizar "Iniciar chat"')
);

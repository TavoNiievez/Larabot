<?php

declare(strict_types=1);

namespace Larabot\Conversations;

use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

final class ExampleConversation extends Conversation
{
    public function run()
    {
        $this->hello();
    }

    public function hello()
    {
        $question = Question::create('¡Hola! Elige una opción')
            ->fallback('Unable to ask question')
            ->callbackId('ask_reason')
            ->addButtons([
                Button::create('Dime un chiste')->value('joke'),
                Button::create('¿Qué puedes decirme?')->value('info'),
            ]);

        return $this->ask($question, function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                if ($answer->getValue() === 'joke') {
                    $joke = json_decode(file_get_contents('http://api.icndb.com/jokes/random'));
                    $this->say($joke->value->joke);
                } else if ($answer->getValue() === 'info'){
                    $this->options();
                }
            }
        });
    }

    public function options()
    {
        $question = Question::create('¿Qué quieres saber?')
            ->fallback('Unable to ask question')
            ->callbackId('ask_reason')
            ->addButtons([
                Button::create('¿Qué hora es?')->value('hour'),
                Button::create('¿Qué día es hoy?')->value('day'),
            ]);

        return $this->ask($question, function (Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                if ($answer->getValue() === 'hour') {
                    $hour = date('H:i');
                    $this->say('Son las '.$hour);
                }else if ($answer->getValue() === 'day'){
                    $today = date('d/m/Y');
                    $this->say('Hoy es : '.$today);
                }
            }
        });
    }
}

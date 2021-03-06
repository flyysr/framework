<?php

namespace Kraken\_Unit\Console\Client\Command\Thread;

use Kraken\_Unit\Console\Client\_T\TCommand;
use Kraken\Console\Client\Command\Thread\ThreadStopCommand;
use Symfony\Component\Console\Input\InputArgument;

class ThreadStopCommandTest extends TCommand
{
    /**
     * @var string
     */
    protected $class = ThreadStopCommand::class;

    /**
     *
     */
    public function testApiConfig_ConfiguresCommand()
    {
        $command = $this->createCommand();

        $args = [];
        $args[] = [ 'parent', InputArgument::REQUIRED ];
        $args[] = [ 'alias',  InputArgument::REQUIRED ];

        $opts = [];

        $this->assertCommand($command, 'thread:stop', '#^(.*?)$#si', $args, $opts);
    }

    /**
     *
     */
    public function testApiCommand_ReturnsCommandData()
    {
        $command  = $this->createCommand([ 'informServer' ]);
        $command
            ->expects($this->once())
            ->method('informServer')
            ->with(
                'parent',
                'thread:stop',
                [
                    'alias' => 'alias'
                ]
            );

        $input  = $this->createInputMock();
        $output = $this->createOutputMock();

        $this->callProtectedMethod($command, 'command', [ $input, $output ]);
    }
}

<?php

namespace RickLuke\PluginExport;

use RickLuke\PluginExport\Traits\CLIValidator;
use RickLuke\PluginExport\Contracts\ValidatorContract;

class CLI implements ValidatorContract
{
    use CLIValidator;

    /**
     * The command executed by the user.
     *
     * @var string
     */
    protected $command;

    /**
     * The provided arguments by the user.
     *
     * @var array
     */
    protected $arguments;

    /**
     * The name of the executed command. Typically ends with 'Command'.
     *
     * @var string|null
     */
    protected $commandClass;

    /**
     * The desired folder.
     *
     * @var string
     */
    protected $folder;

    /**
     * Execute the CLI command.
     *
     * @param array $arguments
     *
     * @return void
     */
    public function execute(array $arguments)
    {
        $this->readCommand($arguments);

        return $this->init();
    }

    /**
     * Initiate the script.
     *
     * @return void
     */
    protected function init()
    {
        if ($this->validate()) {
            $class = '\RickLuke\PluginExport\Commands\\' . $this->commandClass;
            return $class::execute($this->arguments);
        }
    }

    public function readCommand(array $arguments)
    {
        $this->command = $arguments[1] ?? 'help';
        $this->commandClass = ucfirst(strtolower($this->command)) . 'Command';

        unset($arguments[0]);
        unset($arguments[1]);

        $this->arguments = array_values($arguments);
    }

    /**
     * Print an error message and kill the script.
     *
     * @param string $message
     *
     * @return void
     */
    public static function error($message)
    {
        die("\e[1;37;41mERROR:\e[0m " . $message . "\n");
    }

    /**
     * Print a success message.
     *
     * @param string $message
     *
     * @return void
     */
    public static function success($message)
    {
        echo "\e[40mSUCCESS:\e[0m " . $message . "\n";
    }
}

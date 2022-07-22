<?php

namespace RickLuke\PluginExport;

use RickLuke\PluginExport\Commands\HelpCommand;

/**
 * Validate the command that is provided by the user.
 */
class Validate
{
    /**
     * The arguments provided by the user.
     *
     * @var array
     */
    protected $arguments;

    /**
     * Create a new validation instance.
     *
     * @param array $arguments
     */
    public function __construct(array $arguments)
    {
        $this->arguments = $arguments;
    }

    /**
     * Validate the command that is provided by the user.
     *
     * @param array $arguments
     *
     * @return void
     */
    public static function execute(array $arguments)
    {
        $validate = new Validate($arguments);

        return $validate->start();
    }

    /**
     * Start the validation.
     *
     * @return void
     */
    public function start()
    {
        $this->checkFoldernameIsProvided();
        $this->checkConfigurationFileExists();
    }

    /**
     * Make sure the desired foldername is provided.
     *
     * @return void
     */
    protected function checkFoldernameIsProvided()
    {
        if (!isset($this->arguments['1'])) {
            HelpCommand::execute();
            die();
        }
    }

    /**
     * Make sure that the .wp-export file exists.
     *
     * This file contains the folders and files that need to be
     * exported.
     *
     * @return void
     */
    protected function checkConfigurationFileExists()
    {
        if (!file_exists('.wp-export')) {
            CLI::Error('The .wp-export-file does not exist.');
        }
    }
}

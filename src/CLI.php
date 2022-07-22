<?php

namespace RickLuke\PluginExport;

class CLI
{
    /**
     * The provided arguments by the user.
     *
     * @var array
     */
    protected $arguments;

    /**
     * The desired folder.
     *
     * @var string
     */
    protected $folder;

    public function execute(array $arguments)
    {
        $this->arguments = $arguments;

        return $this->init();
    }

    /**
     * Initiate the script.
     *
     * @return void
     */
    protected function init()
    {
        Validate::execute($this->arguments);

        $this->readCommand();
    }

    public function readCommand()
    {
        $this->setFolder();

        $export = new Export();
    }

    /**
     * Set the folder.
     *
     * @return void
     */
    protected function setFolder()
    {
        $this->folder = 'export/'.$this->arguments[1].'/';
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
        die("\e[1;37;41mERROR:\e[0m ".$message."\n");
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
        echo "\e[40mSUCCESS:\e[0m ".$message."\n";
    }
}

<?php

namespace RickLuke\PluginExport\Commands;

use RickLuke\PluginExport\Contracts\CommandContract;

/**
 * The Help command prints the help instructions.
 */
class HelpCommand implements CommandContract
{
    /**
     * Execute the help command.
     *
     * @param string $arguments
     */
    public function __construct($arguments)
    {
        $this->arguments = $arguments;
    }

    /**
     * Execute the Help command.
     *
     * @param string $arguments
     *
     * @return void
     */
    public static function execute($arguments = null)
    {
        $command = new HelpCommand($arguments);

        return $command->handle();
    }

    /**
     * Print the help instructions.
     *
     * @return void
     */
    protected function handle()
    {
        echo "\nWP Plugin Export\n\n";

        echo "Using this tool, you can easily export selected files and folders\n";
        echo "to an export directory. Ideal for exporting a plugin without all\n";
        echo "the messy files which are not required for the plugin to work.\n\n";

        echo "\e[33mMain usage:\e[0m\n";
        echo "  export <desired_folder_name>\n\n";

        echo "\e[33mArguments:\e[0m\n";
        echo "  \e[92mdesired_folder_name\e[0m\tThe desired folder name to which the files will be exported. Should not exist yet.\n\n";

        echo "\e[33mOther commands:\e[0m\n";
        echo "  \e[92minstall\e[0m\t        Create the .wp-export-file.\n\n";

        echo "\e[33mRequirements:\e[0m\n\n";

        echo "  The project's main folder needs to contain a .wp-export-file. In\n";
        echo "  this file, all folders and files that need to be exported can be\n";
        echo "  added, each one on a new line.\n\n";

        return;
    }
}

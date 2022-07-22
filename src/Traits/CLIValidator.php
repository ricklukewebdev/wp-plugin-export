<?php

namespace RickLuke\PluginExport\Traits;

trait CLIValidator
{
    public function validate(): bool
    {
        if (!$this->checkIfCommandExists()) {
            return self::error('The provided command does not exist.');
        }
        return true;
    }

    protected function checkIfCommandExists()
    {
        $commandFile = dirname(dirname(__FILE__)) . '/Commands/' . $this->commandClass . '.php';

        if (file_exists($commandFile)) {
            require_once($commandFile);
            return true;
        }

        return false;
    }
}

<?php

namespace RickLuke\PluginExport\Contracts;

interface ValidatorContract
{
    /**
     * Validate the request.
     *
     * @return bool
     */
    public function validate(): bool;
}

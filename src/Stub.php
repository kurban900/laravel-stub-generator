<?php

namespace Kurban900\LaravelStubGenerator;

interface Stub
{
    public function getSaveFullPath(): string;

    public function getStubName(): string;
}

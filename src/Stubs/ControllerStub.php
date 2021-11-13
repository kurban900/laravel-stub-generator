<?php

namespace Kurban900\LaravelStubGenerator\Stubs;

use Kurban900\LaravelStubGenerator\Stub;

class ControllerStub implements Stub
{
    public function getSaveFullPath(): string
    {
        return app_path("Http/Controllers/Admin/{{ CONTROLLER_NAME }}.php");
    }

    public function getStubName(): string
    {
        return 'controller';
    }
}

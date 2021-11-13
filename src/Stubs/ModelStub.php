<?php

namespace Kurban900\LaravelStubGenerator\Stubs;

use Kurban900\LaravelStubGenerator\Stub;

class ModelStub implements Stub
{
    public function getSaveFullPath(): string
    {
        return app_path('/Models/{{ MODEL_NAME }}.php');
    }

    public function getStubName(): string
    {
        return 'model';
    }
}

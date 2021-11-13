<?php

namespace Kurban900\LaravelStubGenerator\Stubs;

use Kurban900\LaravelStubGenerator\Stub;

class ViewCreateStub implements Stub
{
    public function getSaveFullPath(): string
    {
        return resource_path('views/admin/{{ VIEW_PATH_NAME }}/create.blade.php');
    }

    public function getStubName(): string
    {
        return 'view.create';
    }
}

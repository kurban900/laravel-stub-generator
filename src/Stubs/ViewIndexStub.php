<?php

namespace Kurban900\LaravelStubGenerator\Stubs;

use Kurban900\LaravelStubGenerator\Stub;

class ViewIndexStub implements Stub
{
    public function getSaveFullPath(): string
    {
        return resource_path('views/admin/{{ VIEW_PATH_NAME }}/index.blade.php');
    }

    public function getStubName(): string
    {
        return 'view.index';
    }
}

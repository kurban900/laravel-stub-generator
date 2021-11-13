<?php

namespace Kurban900\LaravelStubGenerator;

use Illuminate\Support\Facades\File;

class StubCreator
{
    public function __construct(public ReplaceVariableHandler $variableHandler)
    {
    }

    private function getStubContents($stub): array|bool|string
    {
        $contents = file_get_contents($stub);

        return $this->variableHandler->replaceVariables($contents);
    }

    public function create(Stub $stub)
    {
        $fileFullPath = $this->variableHandler->replaceVariables($stub->getSaveFullPath());
        $fileName = last(explode('/', $fileFullPath));
        $folderPath = str_replace($fileName, '', $fileFullPath);

        $content = $this->getStubContents(__DIR__ . "/Console/stubs/{$stub->getStubName()}.stub");

        File::makeDirectory($folderPath, 0777, true, true);

        if (File::missing($fileFullPath)) {
            File::put($fileFullPath, $content);
        }
    }
}

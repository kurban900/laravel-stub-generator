<?php

namespace Kurban900\LaravelStubGenerator;

use Illuminate\Support\Str;

class ReplaceVariableHandler
{
    private array $variables;

    public function __construct(private string $moduleName)
    {
        $this->prepare();
    }

    private function prepare(): void
    {
        $name = $this->moduleName;

        $modelName = ucfirst(Str::of($name)->camel()->singular());

        $this->variables = [
            'MODULE_NAME' => $name,
            'MODEL_NAME' => $modelName,
            'CONTROLLER_NAME' => 'Admin' . $modelName . 'Controller',
            'FORM_NAME' => "{$modelName}Form",
            'TABLE_NAME' => Str::of($name)->snake()->plural(),
            'VIEW_PATH_NAME' => Str::of($name)->snake()->plural(),
            'MODEL_VARIABLE' => '$' . Str::camel($name),
            'MODEL_COMPACT_VARIABLE' => Str::camel($name),
            'MODELS_VARIABLE' => '$' . Str::of($name)->camel()->plural(),
            'MODELS_COMPACT_VARIABLE' => Str::of($name)->camel()->plural(),
        ];
    }

    public function replaceVariables(string $content): array|string
    {
        foreach ($this->variables as $search => $replace) {
            $content = str_replace("{{ $search }}", $replace, $content);
        }

        return $content;
    }
}

<?php

namespace Kurban900\LaravelStubGenerator\Console;

use Kurban900\LaravelStubGenerator\ReplaceVariableHandler;
use Kurban900\LaravelStubGenerator\StubCreator;
use Kurban900\LaravelStubGenerator\Stubs\ControllerStub;
use Kurban900\LaravelStubGenerator\Stubs\ModelStub;
use Kurban900\LaravelStubGenerator\Stubs\ViewCreateStub;
use Kurban900\LaravelStubGenerator\Stubs\ViewEditStub;
use Kurban900\LaravelStubGenerator\Stubs\ViewIndexStub;
use Illuminate\Console\Command;

class GenerateAdminStubs extends Command
{
    protected $signature = 'make:admin-stubs {module_name} {--fields=}';

    protected $description = 'Generate stubs to admin panel';

    private array $stubs = [
        ControllerStub::class,
        ModelStub::class,
        ViewCreateStub::class,
        ViewEditStub::class,
        ViewIndexStub::class
    ];

    public function handle()
    {
        $name = $this->argument('module_name');

        $handler = new ReplaceVariableHandler($name);
        $creator = new StubCreator($handler);

        foreach ($this->stubs as $stubClass) {
            $creator->create(new $stubClass());
        }

        $formName = $handler->replaceVariables("{{ FORM_NAME }}");
        \Artisan::call("make:form", [
            'name' => $formName,
            '--path' => 'app/Forms',
            '--fields' => $this->option('fields') ?? '',
        ]);
    }
}

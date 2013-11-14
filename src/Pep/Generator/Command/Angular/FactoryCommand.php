<?php namespace Pep\Generator\Command\Angular;

use Pep\Generator\Generator\FactoryGenerator;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Illuminate\Support\Str;

class FactoryCommand extends BaseCommand {

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'generate:ng:factory';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate a new angular factory.';

    /**
     * Get the path to the file that should be generated.
     *
     * @return string
     */
    protected function getPath()
    {
       return $this->option('path') . '/' . Str::studly($this->argument('name')) . '.js';
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return array(
            array(
                'name',
                InputArgument::REQUIRED,
                'Name of the factory to generate.',
            ),
        );
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return array(
            array(
                'appName',
                null,
                InputOption::VALUE_OPTIONAL,
                'Name of the Angular app. (default: app)',
                'app',
            ),
            array(
                'path',
                null,
                InputOption::VALUE_OPTIONAL,
                'Path to factorys directory. (default: public_path(\'js/factories\')',
                public_path('js/factories'),
            ),
            array(
                'template',
                null,
                InputOption::VALUE_OPTIONAL,
                'Path to template.',
                __DIR__ . '/../../templates/Angular/factory.mustache',
            ),
        );
    }

}

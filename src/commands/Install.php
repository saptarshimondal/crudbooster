<?php namespace crocodicstudio\crudbooster\commands;

use App;
use Cache;
use crocodicstudio\crudbooster\helpers\ComposerHelper;
use Illuminate\Support\Facades\DB;
use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Symfony\Component\Process\Process;

class Install extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'crudbooster:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'CRUDBooster Installation Command';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        $this->header();

        $this->checkRequirements();

        $this->info('Installing: ');

        if ($this->confirm('Do you have setting the database configuration at .env ?')) {

            if (! file_exists(public_path('vendor')) ) {
                mkdir(public_path('vendor'));
            }

            $this->info('Please wait CRUDBooster publish assets...');
            $this->call('vendor:publish', ['--tag' => 'cb_config']);
            $this->call('vendor:publish', ['--tag' => 'cb_hook']);
            $this->call('vendor:publish', ['--tag' => 'cb_asset', '--force' => true]);
            $this->call('vendor:publish', ['--tag' => 'cb_migration', '--force' => true]);

            /*
             * Add some env for CB
             */
            setEnvironmentValue([
                "APP_DEBUG"=> false,
                "CACHE_DRIVER"=>"memcached"
            ]);

            /*
             * Create CBPlugins
             */
            if(!file_exists(app_path("CBPlugins"))) {
                mkdir(app_path("CBPlugins"));
            }

            /*
             * Create storage dir on public
             * We need it to change default laravel local filesystem from storage to public
             * We won't use symlink because of a security issue in many server
             */
            if(!file_exists(public_path("storage"))) {
                $this->info("Create storage directory on /public");
                mkdir(public_path("storage"));
                file_put_contents(public_path("storage/.gitignore"),"!.gitignore");
                file_put_contents(public_path("storage/index.html"),"&nbsp;");
            }

            /*
             * We want to add more security to your Laravel
             * Disable index listing
             * Disable php execution on /vendor/*
             */
            $this->info("Tweak some security for your laravel");
            file_put_contents(base_path(".htaccess"), "\n\n# Generated by CRUDBooster\nServerSignature Off\nIndexIgnore *\nRewriteRule ^(.*)/vendor/.*\.(php|rb|py)$ - [F,L,NC]\nRewriteRule ^vendor/.*\.(php|rb|py)$ - [F,L,NC]\n<FilesMatch \"^\.\">\nOrder allow,deny\nDeny from all\n</FilesMatch>",FILE_APPEND);
            file_put_contents(public_path(".htaccess"), "\n\n# Generated by CRUDBooster\nServerSignature Off\nIndexIgnore *\nRewriteRule ^(.*)/vendor/.*\.(php|rb|py)$ - [F,L,NC]\nRewriteRule ^vendor/.*\.(php|rb|py)$ - [F,L,NC]\n<FilesMatch \"^\.\">\nOrder allow,deny\nDeny from all\n</FilesMatch>",FILE_APPEND);


            $this->info('Dumping the autoloaded files and reloading all new files...');
            ComposerHelper::dumpAutoLoad();

            $this->info('Migrating database...');
            $this->call('migrate');
            $this->call('config:clear');
            $this->info('Installing CRUDBooster Is Completed ! Thank You :)');
        } else {
            $this->info('Setup Aborted !');
            $this->info('Please setting the database configuration for first !');
        }

        $this->footer();
    }

    private function header()
    {
        $this->info("
#     __________  __  ______  ____                   __           
#    / ____/ __ \/ / / / __ \/ __ )____  ____  _____/ /____  _____
#   / /   / /_/ / / / / / / / __  / __ \/ __ \/ ___/ __/ _ \/ ___/
#  / /___/ _, _/ /_/ / /_/ / /_/ / /_/ / /_/ (__  ) /_/  __/ /    
#  \____/_/ |_|\____/_____/_____/\____/\____/____/\__/\___/_/     
#                                                                                                                       
            ");
        $this->info('--------- :===: Thanks for choosing CRUDBooster :==: ---------------');
        $this->info('====================================================================');
    }

    private function checkRequirements()
    {
        $this->info('System Requirements Checking:');
        $system_failed = 0;
        $laravel = app();

        if ($laravel->version() >= 6.0) {
            $this->info('Laravel Version (>= 6.0): [Good]');
        } else {
            $this->warn('Laravel Version (>= 6.0): [Bad]');
            $system_failed++;
        }

        if (version_compare(phpversion(), '7.3.0', '>=')) {
            $this->info('PHP Version (>= 7.3.0): [Good]');
        } else {
            $this->warn('PHP Version (>= 7.3.0): [Bad] Yours: '.phpversion());
            $system_failed++;
        }

        if (extension_loaded('mbstring')) {
            $this->info('Mbstring extension: [Good]');
        } else {
            $this->warn('Mbstring extension: [Bad]');
            $system_failed++;
        }

        if (extension_loaded('openssl')) {
            $this->info('OpenSSL extension: [Good]');
        } else {
            $this->warn('OpenSSL extension: [Bad]');
            $system_failed++;
        }

        if (extension_loaded('pdo')) {
            $this->info('PDO extension: [Good]');
        } else {
            $this->warn('PDO extension: [Bad]');
            $system_failed++;
        }

        if (extension_loaded('tokenizer')) {
            $this->info('Tokenizer extension: [Good]');
        } else {
            $this->warn('Tokenizer extension: [Bad]');
            $system_failed++;
        }

        if (extension_loaded('xml')) {
            $this->info('XML extension: [Good]');
        } else {
            $this->warn('XML extension: [Bad]');
            $system_failed++;
        }

        if (extension_loaded('gd')) {
            $this->info('GD extension: [Good]');
        } else {
            $this->warn('GD extension: [Bad]');
            $system_failed++;
        }

        if (extension_loaded('fileinfo')) {
            $this->info('PHP Fileinfo extension: [Good]');
        } else {
            $this->warn('PHP Fileinfo extension: [Bad]');
            $system_failed++;
        }

        if (is_writable(base_path('public'))) {
            $this->info('public dir is writable: [Good]');
        } else {
            $this->warn('public dir is writable: [Bad]');
            $system_failed++;
        }

        if ($system_failed != 0) {
            $this->warn('Sorry unfortunately your system is not meet with our requirements !');
            $this->footer(false);
        }
        $this->info('--');
    }

    private function footer($success = true)
    {

        $this->info('--');

        (new DeveloperCommandService($this))->create();

        $this->info("--");
        $this->info('Documentation : https://saptarshimondal.github.io/crudbooster');
        $this->info('Github : https://github.com/saptarshimondal/crudbooster');
        $this->info('====================================================================');
        if ($success == true) {
            $this->info('------------------- :===: Completed !! :===: ------------------------');
        } else {
            $this->info('------------------- :===: Failed !!    :===: ------------------------');
        }
    }

}

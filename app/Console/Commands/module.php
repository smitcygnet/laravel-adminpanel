<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputDefinition;
use Arcanedev\NoCaptcha\Exceptions\InvalidArgumentException;
use Illuminate\Support\Facades\DB;


class module extends Command
{

    protected $model_namespace            = 'App\\Models\\';
    protected $responses_namespace        = 'App\\Http\\Responses\\';
    protected $controller_namespace       = 'App\\Http\\Controllers\\';
    protected $table_controller_namespace = 'App\\Http\\Controllers\\';
    protected $request_namespace          = 'App\\Http\\Requests\\';
    protected $resource_namespace         = 'App\\Http\\Resources\\';
    protected $repo_namespace             = 'App\\Repositories\\';
    protected $view_path                  = 'resources\\views\\';
    protected $route_path                 = 'routes\\Generator\\';

   /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'module:remove {module}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Removes All files related to the module from the project';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //echo $this->argument('module');
        //exit;

        if($this->argument('module') == ''){
              $this->info('Module name required!');
        }else{
          /* $item  = DB::select('select items from menus where type = ?', ['backend']);
             $value = json_decode($item[0]->items);*/

            if ($this->confirm('This will delete all the files for this module, Do you wish to continue?')) {
                    $module         = ucfirst($this->argument('module'));
                    $module_lplural = strtolower(str_plural($module));
                    $module_ucfirst = ucfirst($module);

                    if(is_dir(base_path($this->model_namespace.$module_ucfirst))) {
                        $this->deleteDir(base_path($this->model_namespace.$module_ucfirst));
                    }
                    if(is_dir(base_path($this->responses_namespace.'Backend\\'.$module_ucfirst))) {
                        $this->deleteDir(base_path($this->responses_namespace.'Backend\\'.$module_ucfirst));
                    }
                    if(is_dir(base_path($this->controller_namespace.'Backend\\'.$module_ucfirst))) {
                       $this->deleteDir(base_path($this->controller_namespace.'Backend\\'.$module_ucfirst));
                    }
                    if(is_dir(base_path($this->request_namespace.'Backend\\'.$module))) {
                       $this->deleteDir(base_path($this->request_namespace.'Backend\\'.$module));
                    }
                    if(file_exists(base_path($this->resource_namespace.str_plural($module).'Resource.php'))){
                       unlink(base_path($this->resource_namespace.str_plural($module).'Resource.php'));
                    }
                    if(is_dir(base_path($this->repo_namespace.'\\Backend\\'.$module))) {
                       $this->deleteDir(base_path($this->repo_namespace.'\\Backend\\'.$module));
                    }
                    if(is_dir(base_path($this->view_path.'\\backend\\'.$module_lplural))) {
                       $this->deleteDir(base_path($this->view_path.'\\backend\\'.$module_lplural));
                    }
                    if(file_exists(base_path($this->route_path.$module.'.php'))){
                       unlink(base_path($this->route_path.$module.'.php'));
                    }
                     $this->info('Successfully removed the module!');
                }
            }
    }

    public static function deleteDir($dirPath) {
    if (! is_dir($dirPath)) {
        throw new InvalidArgumentException("$dirPath must be a directory");
    }
    if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
        $dirPath .= '/';
    }
    $files = glob($dirPath . '*', GLOB_MARK);
    foreach ($files as $file) {
        if (is_dir($file)) {
            self::deleteDir($file);
        } else {
            unlink($file);
        }
    }
    rmdir($dirPath);
}
}

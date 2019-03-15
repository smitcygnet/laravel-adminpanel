<?php

namespace Bvipul\Generator\Repositories;

use Bvipul\Generator\Module;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use App\Models\Access\Permission\Permission;
use Illuminate\Support\Facades\Storage;

/**
 * Class ModuleRepository.
 */
class ModuleRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Module::class;

    protected $dbfile_path;

    protected $storage;
    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->dbfile_path = 'dbfiles'.DIRECTORY_SEPARATOR;
        $this->storage = Storage::disk('public');
    }

    /**
     * @return mixed
     */
    public function getForDataTable()
    {
        return $this->query()
            ->leftjoin('users', 'users.id', '=', 'modules.created_by')
            ->select([
                'modules.id',
                'modules.name',
                'modules.url',
                'modules.view_permission_id',
                'modules.created_by',
                'modules.updated_by',
                'users.first_name as created_by',
            ]);
    }

    /**
     * @param array $input
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function create(array $input, array $permissions)
    {
        $module = Module::where('name', $input['name'])->first();
        if (!$module) {
            $name  = $input['model_name'];
            $model = strtolower($name);
            foreach ($permissions as $permission) {
                $perm = [
                    'name'         => $permission,
                    'display_name' => title_case(str_replace('-', ' ', $permission)).' Permission',
                ];
                //Creating Permission
                $per = Permission::firstOrCreate($perm);
            }

            $mod = [
                'view_permission_id' => "view-$model-permission",
                'name'               => $input['name'],
                'url'                => 'admin.'.str_plural($model).'.index',
                'created_by'         => access()->user()->id,
            ];

            $create = Module::create($mod);

            return $create;
        }
        else {
            return $module;
        }

        throw new GeneralException('There was some error in creating the Module. Please Try Again.');
    }

    /**
     * @param array $input
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function uploadCsvToGetDbData(array $input)
    {
        if(!empty($input['dbfile'])) {

            $path       = $this->dbfile_path;

            $dbFile     = $input['dbfile'];

            $dbFileName = time().$dbFile->getClientOriginalName();

            $this->storage->put($path.$dbFileName, file_get_contents($dbFile->getRealPath()));

            $uploadDBFIle = $this->importCsv($dbFileName);

            return $uploadDBFIle;
        }
    }

    public function importCsv($dbFileName){
        $file          = public_path(Storage::url('dbfiles/'.$dbFileName));
        $allData       = $this->csvToArray($file);
        $tableName     = [];
        $moduleName    = [];
        $modelName     = [];
        $directoryName = [];
        $i = 0;
        foreach($allData as $data){
            if($data['fieldname'] == 'Module Name'){
                $i++;
                $modules[$i]['module_name'] = $data['datatype'];
            }
            else if($data['fieldname'] == 'Directory Name'){
                $modules[$i]['directory_name'] = $data['datatype'];
            }
            else if($data['fieldname'] == 'Model Name'){
                $modules[$i]['model_name'] = $data['datatype'];
            }
            else if($data['fieldname'] == 'Table Name'){
                $modules[$i]['table_name'] = $data['datatype'];
            }else {
                $modules[$i]['data'][] = $data;
            }
        }
        return $modules;
    }


    public function csvToArray($filename = '', $delimiter = ','){
        if (!file_exists($filename) || !is_readable($filename))
            return false;

        $header = null;
        $data = array();
        if (($handle = fopen($filename, 'r')) !== false)
        {
            while (($row = fgetcsv($handle, 1000, $delimiter)) !== false)
            {
                if (!$header)
                    $header = $row;
                else
                    $data[] = array_combine($header, $row);
            }
            fclose($handle);
        }
        return $data;
    }
}

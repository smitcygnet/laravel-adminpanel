<?php

namespace App\Repositories\Backend\Modulecreator;

use App\Models\Modulecreator\Module;
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

            $dataForForm = $this->importCsv($dbFileName,$input);

        }else{

            $j = 1;
            $dataForForm[$j]['module_name']    = $input['name'];
            $dataForForm[$j]['directory_name'] = $input['directory_name'];
            $dataForForm[$j]['model_name']     = $input['model_name'];
            $dataForForm[$j]['table_name']     = $input['table_name'];
            $dataForForm[$j]['model_edit']     = $input['model_edit'];
            $dataForForm[$j]['model_create']   = $input['model_create'];
            $dataForForm[$j]['model_delete']   = $input['model_delete'];
            $dataForForm[$j]['api_create']     = $input['api_create'];
            $dataForForm[$j]['api_edit']       = $input['api_edit'];
            $dataForForm[$j]['api_delete']     = $input['api_delete'];
            $dataForForm[$j]['api_delete']     = $input['api_delete'];

            for($i=0; $i<count($input['field_name']);$i++){
                    $data[$i]['fieldname']  = $input['field_name'][$i];
                    $data[$i]['fieldlabel'] = $input['field_label'][$i];
                    $data[$i]['datatype']   = $input['data_type'][$i];
                    $data[$i]['value']      = $input['values'][$i];
                    $data[$i]['nullable']   = isset($input['nullable'][$i]) ? 1 : 0 ;
                    $data[$i]['inlist']     = isset($input['inlist'][$i]) ? 1 : 0 ;
                    $data[$i]['rule']       = $input['rules'][$i];
                    $data[$i]['input_type'] = $input['input_type'][$i];
                    $data[$i]['options']    = $input['field_options'][$i];
                    $data[$i]['unsigned']  = '';
            }
            $dataForForm[$j]['data']= $data;
        }
        return $dataForForm;
    }

    public function importCsv($dbFileName,$input){
        $file    = public_path(Storage::url('dbfiles/'.$dbFileName));
        $allData = $this->csvToArray($file);
        $i       = 0;
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
                $modules[$i]['model_create'] = $input['model_create'];
                $modules[$i]['model_edit']   = $input['model_edit'];
                $modules[$i]['model_delete'] = $input['model_delete'];
                $modules[$i]['api_create']   = $input['api_create'];
                $modules[$i]['api_edit']     = $input['api_edit'];
                $modules[$i]['api_delete']   = $input['api_delete'];
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

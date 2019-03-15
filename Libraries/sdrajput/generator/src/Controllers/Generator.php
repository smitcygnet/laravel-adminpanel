<?php

namespace Sdrajput\Generator\Controllers;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;

/**
 * Class Generator.
 *
 * @author
 */
class Generator
{
    /**
     * Module Name.
     */
    protected $module;

    /**
     * Files Object.
     */
    protected $files;

    /**
     * Directory Name.
     */
    protected $directory;

    /**
     * ----------------------------------------------------------------------------------------------
     * Model Related Files
     * -----------------------------------------------------------------------------------------------
     * 1. Model Name
     * 2. Attribute Name
     * 3. Relationship Name
     * 4. Attribute Namespace
     * 5. Relationship Namespace
     * 6. Traits directory
     * 7. Model Namespace.
     */
    protected $model;
    protected $attribute;
    protected $relationship;
    protected $attribute_namespace;
    protected $relationship_namespace;
    protected $trait_directory = 'Traits';
    protected $model_namespace = 'App\\Models\\';

    /**
     * Responses
     * 1. EditResponse Name
     * 2. CreateResponse Name
     * 3. EditResponse Namespace
     * 4. CreateResponse Namespace
     * 5. Responses Namespace
     */
    protected $edit_response = 'EditResponse';
    protected $create_response = 'CreateResponse';
    protected $edit_response_namespace;
    protected $create_response_namespace;
    protected $responses_namespace = 'App\\Http\\Responses\\';

    /**
     * Controllers
     * 1. Controlller Name
     * 2. Table Controller Name
     * 3. Controller Namespace
     * 4. API Controller Namespace.
     * 5. Table Controller Namespace.
     */
    protected $controller;
    protected $table_controller;
    protected $controller_namespace = 'App\\Http\\Controllers\\';
    protected $api_controller_namespace = 'App\\Http\\Controllers\\Api\\V1\\';
    protected $table_controller_namespace = 'App\\Http\\Controllers\\';

    /**
     * Requests
     * 1. Edit Request Name
     * 2. Store Request Name
     * 3. Create Request Name
     * 4. Update Request Name
     * 5. Delete Request Name
     * 6. Manage Request Name
     * 7. Edit Request Namespace
     * 8. Store Request Namespace
     * 9. Manage Request Namespace
     * 10. Create Request Namespace
     * 11. Update Request Namespace
     * 12. Delete Request Namespace
     * 13. Request Namespace.
     */
    protected $edit_request;
    protected $store_request;
    protected $create_request;
    protected $update_request;
    protected $delete_request;
    protected $manage_request;
    protected $edit_request_namespace;
    protected $store_request_namespace;
    protected $manage_request_namespace;
    protected $create_request_namespace;
    protected $update_request_namespace;
    protected $delete_request_namespace;
    protected $request_namespace = 'App\\Http\\Requests\\';

    /**
     * Resource Namespace
     */
    protected $resource_namespace = 'App\\Http\\Resources\\';
    /**
     * Resource Name
     */
    protected $resource;

    /**
     * Permissions
     * 1. Edit Permission
     * 2. Store Permission
     * 3. Manage Permission
     * 4. Create Permission
     * 5. Update Permission
     * 6. Delete Permission.
     */
    protected $edit_permission;
    protected $store_permission;
    protected $manage_permission;
    protected $create_permission;
    protected $update_permission;
    protected $delete_permission;

    /**
     * Routes
     * 1. Edit Route
     * 2. Store Route
     * 3. Manage Route
     * 4. Create Route
     * 5. Update Route
     * 6. Delete Route.
     */
    protected $edit_route;
    protected $store_route;
    protected $index_route;
    protected $create_route;
    protected $update_route;
    protected $delete_route;

    /**
     * API
     * 1. API create
     * 2. API edit
     * 3. API delete
     */
    protected $api_create;
    protected $api_edit;
    protected $api_delete;

     /**
     * Database File Data
     * 1. Core CSV Data
     * 2. Fields String
     * 3. Rules String
     * 4. getForDataTable String
     */
    protected $db_core_data;
    protected $db_fields_str;
    protected $db_rules_str;
    protected $db_datatable_str;
    protected $db_labels;
    protected $index_view_column;
    protected $index_view_label;
    protected $form_view;
    protected $backend_custom;
    protected $datepicker_data;
    protected $repo_protected_var;
    protected $repo_construct_data;
    protected $repo_uploadFormImg_data;

    /**
     * Repository
     * 1. Repository Name
     * 2. Repository Namespace.
     */
    protected $repository;
    protected $repo_namespace = 'App\\Repositories\\';

    /**
     * Table Name.
     */
    protected $table;

    /**
     * Events.
     *
     * @var array
     */
    protected $events = [];

    /**
     * Route Path.
     */
    protected $route_path = 'routes\\Generator\\';

    /**
     * View Path.
     */
    protected $view_path = 'resources\\views\\';

    /**
     * Event Namespace.
     */
    protected $event_namespace = 'Backend\\';

    /**
     * Migration Path.
     */
    protected $migration_path = 'database\\migrations\\';

    /**
     * Public Path.
     */
    protected $public_js_path = 'public\\js\\';

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->files = new Filesystem();
    }

    /**
     * Initialization.
     *
     * @param array $input
     */
    public function initialize($input,$rowData)
    {
        //Module
        $this->module = title_case($input['name']);

        //Directory
        $this->directory = str_replace(' ' , '', str_singular(title_case($input['directory_name'])));

        //Model
        $this->model = str_singular(title_case($input['model_name']));

        //Table
        $this->table = strtolower($input['table_name']);

        //Controller
        $this->controller = str_plural($this->model).'Controller';

        //Table Controller
        $this->table_controller = str_plural($this->model).'TableController';

        //Attributes
        $this->attribute = $this->model.'Attribute';
        $this->attribute_namespace = $this->model_namespace;

        //Relationship
        $this->relationship = $this->model.'Relationship';
        $this->relationship_namespace = $this->model_namespace;

        //Repository
        $this->repository = $this->model.'Repository';

        //Requests
        $this->edit_request   = 'Edit'.$this->model.'Request';
        $this->store_request  = 'Store'.$this->model.'Request';
        $this->create_request = 'Create'.$this->model.'Request';
        $this->update_request = 'Update'.$this->model.'Request';
        $this->delete_request = 'Delete'.$this->model.'Request';
        $this->manage_request = 'Manage'.$this->model.'Request';

        //CRUD Options
        $this->edit = !empty($input['model_edit']) ? true : false;
        $this->create = !empty($input['model_create']) ? true : false;
        $this->delete = !empty($input['model_delete']) ? true : false;

        $model_singular = strtolower(str_singular($this->model));

        //Permissions
        $this->edit_permission   = 'edit-'.$model_singular;
        $this->store_permission  = 'store-'.$model_singular;
        $this->manage_permission = 'manage-'.$model_singular;
        $this->create_permission = 'create-'.$model_singular;
        $this->update_permission = 'update-'.$model_singular;
        $this->delete_permission = 'delete-'.$model_singular;

        $model_plural = strtolower(str_plural($this->model));

        //Routes
        $this->index_route  = 'admin.'.$model_plural.'.index';
        $this->create_route = 'admin.'.$model_plural.'.create';
        $this->store_route  = 'admin.'.$model_plural.'.store';
        $this->edit_route   = 'admin.'.$model_plural.'.edit';
        $this->update_route = 'admin.'.$model_plural.'.update';
        $this->delete_route = 'admin.'.$model_plural.'.destroy';

        //Events
        $this->events = array_filter($input['event']);

        // API Options : To Create API
        $this->api_create = !empty($input['api_create']) ? true : false;
        $this->api_edit   = !empty($input['api_edit']) ? true : false;
        $this->api_delete = !empty($input['api_delete']) ? true : false;
        // API Controller
        $this->controller = str_plural($this->model).'Controller';

        // Database CSV data
        $this->db_core_data       = !empty($rowData['core_data']) ? $rowData['core_data'] : [];
        $this->db_fields_str      = !empty($rowData['fields_string']) ? $rowData['fields_string'] : [];
        $this->db_rules_str       = !empty($rowData['rules_string']) ? $rowData['rules_string'] : '';
        $this->db_datatable_str   = !empty($rowData['datatable_string']) ? $rowData['datatable_string'] : '';
        $this->db_labels          = !empty($rowData['labels']) ? $rowData['labels'] : [];
        $this->index_view_label   = !empty($rowData['index_label']) ? $rowData['index_label'] : '';
        $this->index_view_column  = !empty($rowData['index_column']) ? $rowData['index_column'] : '';
        $this->form_view          = !empty($rowData['form_view']) ? $rowData['form_view'] : '';
        $this->backend_custom     = !empty($rowData['backend_custom']) ? $rowData['backend_custom'] : '';
        $this->datepicker_data    = !empty($rowData['datepicker_data']) ? $rowData['datepicker_data'] : '';
        $this->repo_protected_var = !empty($rowData['repo_protected_var']) ? $rowData['repo_protected_var'] : '';
        $this->repo_construct_data = !empty($rowData['repo_construct_data']) ? $rowData['repo_construct_data'] : '';
        $this->repo_uploadFormImg_data = !empty($rowData['uploadFormImg']) ? $rowData['uploadFormImg'] : '';

        //Generate Namespaces
        $this->createNamespacesAndValues();
    }

    public function setNameSpacePath(){
         $this->model_namespace            = 'App\\Models\\';
         $this->attribute_namespace        = 'App\\Models\\';
         $this->controller_namespace       = 'App\\Http\\Controllers\\';
         $this->api_controller_namespace   = 'App\\Http\\Controllers\\Api\\V1\\';
         $this->table_controller_namespace = 'App\\Http\\Controllers\\';
         $this->request_namespace          = 'App\\Http\\Requests\\';
         $this->resource_namespace         = 'App\\Http\\Resources\\';
         $this->view_path                  = 'resources\\views\\';
         $this->responses_namespace        = 'App\\Http\\Responses\\';
         $this->repo_namespace             = 'App\\Repositories\\';
         $this->event_namespace            = 'Backend\\';
         $this->relationship_namespace     = 'App\\Models\\';
    }

    /**
     * @return void
     */
    private function createNamespacesAndValues()
    {
        //Model Namespace
        $this->setNameSpacePath();

        $this->model_namespace .= $this->getFullNamespace($this->model);

        //Controller Namespace
        $this->controller_namespace .= config('generator.controller_namespace').'\\'.$this->getFullNamespace($this->controller);

        //Table Controller Namespace
        $this->table_controller_namespace .= config('generator.controller_namespace').'\\'.$this->getFullNamespace($this->table_controller);

        //API Controller Namespace
        $this->api_controller_namespace .= config('generator.api_controller_namespace').$this->controller;
        $this->resource_namespace .= config('generator.resource_namespace').str_plural($this->model).'Resource';

        //$this->resource .= config('generator.resource').str_plural($this->model).'Resource';
          $this->resource = config('generator.resource').str_plural($this->model).'Resource';

        //Attribute Namespace
        $this->attribute_namespace .= $this->getFullNamespace($this->attribute, $this->trait_directory);
        //Relationship Namespace
        $this->relationship_namespace .= $this->getFullNamespace($this->relationship, $this->trait_directory);

        //View Path
        $this->view_path .= config('generator.views_folder').'\\'.$this->getFullNamespace('');

        //Requests
        $this->request_namespace        .= config('generator.request_namespace'). '\\';
        $this->edit_request_namespace   = $this->request_namespace.$this->getFullNamespace($this->edit_request);
        $this->store_request_namespace  = $this->request_namespace.$this->getFullNamespace($this->store_request);
        $this->manage_request_namespace = $this->request_namespace.$this->getFullNamespace($this->manage_request);
        $this->create_request_namespace = $this->request_namespace.$this->getFullNamespace($this->create_request);
        $this->update_request_namespace = $this->request_namespace.$this->getFullNamespace($this->update_request);
        $this->delete_request_namespace = $this->request_namespace.$this->getFullNamespace($this->delete_request);

        //Responses
        $this->responses_namespace       .= config('generator.response_namespace'). '\\';
        $this->create_response_namespace = $this->responses_namespace.$this->getFullNamespace($this->create_response);
        $this->edit_response_namespace   = $this->responses_namespace.$this->getFullNamespace($this->edit_response);

        //Repository Namespace
        $this->repo_namespace  .= config('generator.request_namespace'). '\\' .$this->getFullNamespace($this->repository);

        //Events Namespace
        $this->event_namespace .= $this->getFullNamespace('');

    }

    /**
     * @return string
     */
    public function getModelNamespace()
    {
        return $this->model_namespace;
    }

    /**
     * @return string
     */
    public function getRequestNamespace()
    {
        return $this->request_namespace;
    }

    /**
     * @return string
     */
    public function getControllerNamespace()
    {
        return $this->controller_namespace;
    }

    /**
     * @return string
     */
    public function getRepoNamespace()
    {
        return $this->repo_namespace;
    }

    /**
     * @return string
     */
    public function getResponsesNamespace()
    {
        return $this->responses_namespace;
    }

    /**
     * @return string
     */
    public function getRoutePath()
    {
        return $this->route_path;
    }

    /**
     * @return string
     */
    public function getViewPath()
    {
        return $this->view_path;
    }

    /**
     * Return the permissions used in the module.
     *
     * @return array
     */
    public function getPermissions()
    {
        $permissions = [
            $this->manage_permission
        ];

        if ($this->create) {
            $permissions[] = $this->create_permission;
            $permissions[] = $this->store_permission;
        }
        if ($this->edit) {
            $permissions[] = $this->edit_permission;
            $permissions[] = $this->update_permission;
        }
        if ($this->delete) {
            $permissions[] = $this->delete_permission;
        }

        return $permissions;
    }

    /**
     * @return string
     */
    public function getFullNamespace($name, $inside_directory = null)
    {
        if (empty($name)) {
            return $this->directory;
        } elseif ($inside_directory) {
            return $this->directory.'\\'.$inside_directory.'\\'.$name;
        } else {
            return $this->directory.'\\'.$name;
        }
    }

    /**
     * @return void
     */
    public function createModel()
    {
        $this->createDirectory($this->getBasePath($this->attribute_namespace, true));
        //Generate Attribute File
        $this->generateFile('Attribute', [
            'AttributeNamespace' => ucfirst($this->removeFileNameFromEndOfNamespace($this->attribute_namespace)),
            'AttributeClass'     => $this->attribute,
            'editPermission'     => $this->edit_permission,
            'editRoute'          => $this->edit_route,
            'deletePermission'   => $this->delete_permission,
            'deleteRoute'        => $this->delete_route,
        ], lcfirst($this->attribute_namespace));

        //Generate Relationship File
        $this->generateFile('Relationship', [
            'RelationshipNamespace' => ucfirst($this->removeFileNameFromEndOfNamespace($this->relationship_namespace)),
            'RelationshipClass'     => $this->relationship,
        ], lcfirst($this->relationship_namespace));

        //Generate Model File
        $this->generateFile('Model', [
            'DummyNamespace'    => ucfirst($this->removeFileNameFromEndOfNamespace($this->model_namespace)),
            'DummyAttribute'    => $this->attribute_namespace,
            'DummyRelationship' => $this->relationship_namespace,
            'AttributeName'     => $this->attribute,
            'RelationshipName'  => $this->relationship,
            'DummyModel'        => $this->model,
            'table_name'        => $this->table,
            'DummyFillable'     => $this->db_fields_str,
        ], lcfirst($this->model_namespace));
    }

    /**
     * @return void
     */
    public function createDirectory($path)
    {
        $this->files->makeDirectory($path, 0777, true, true);
    }

    /**
     * @return void
     */
    public function createRequests()
    {
        $this->request_namespace .= $this->getFullNamespace('');
        $this->createDirectory($this->getBasePath($this->request_namespace));

        //Generate Manage Request File
        $this->generateFile('Request', [
                'DummyNamespace' => ucfirst($this->removeFileNameFromEndOfNamespace($this->manage_request_namespace)),
                'DummyClass'     => $this->manage_request,
                'permission'     => $this->manage_permission,
                'DummyRules'     => '',
            ], lcfirst($this->manage_request_namespace));

        if ($this->create) {
            //Generate Create Request File
            $this->generateFile('Request', [
                    'DummyNamespace' => ucfirst($this->removeFileNameFromEndOfNamespace($this->create_request_namespace)),
                    'DummyClass'     => $this->create_request,
                    'permission'     => $this->create_permission,
                    'DummyRules'     => '',
                ], lcfirst($this->create_request_namespace));

            //Generate Store Request File
            $this->generateFile('Request', [
                    'DummyNamespace' => ucfirst($this->removeFileNameFromEndOfNamespace($this->store_request_namespace)),
                    'DummyClass'     => $this->store_request,
                    'permission'     => $this->store_permission,
                    'DummyRules'     => $this->db_rules_str,
                ], lcfirst($this->store_request_namespace));
        }

        if ($this->edit) {
            //Generate Edit Request File
            $this->generateFile('Request', [
                    'DummyNamespace' => ucfirst($this->removeFileNameFromEndOfNamespace($this->edit_request_namespace)),
                    'DummyClass'     => $this->edit_request,
                    'permission'     => $this->edit_permission,
                    'DummyRules'     => '',
                ], lcfirst($this->edit_request_namespace));

            //Generate Update Request File
            $this->generateFile('Request', [
                    'DummyNamespace' => ucfirst($this->removeFileNameFromEndOfNamespace($this->update_request_namespace)),
                    'DummyClass'     => $this->update_request,
                    'permission'     => $this->update_permission,
                    'DummyRules'     => '',
                ], lcfirst($this->update_request_namespace));
        }

        if ($this->delete) {
            //Generate Delete Request File
            $this->generateFile('Request', [
                    'DummyNamespace' => ucfirst($this->removeFileNameFromEndOfNamespace($this->delete_request_namespace)),
                    'DummyClass'     => $this->delete_request,
                    'permission'     => $this->delete_permission,
                    'DummyRules'     => '',
                ], lcfirst($this->delete_request_namespace));
        }
    }

    /**
     * @return void
     */
    public function createRepository()
    {
        $this->createDirectory($this->getBasePath($this->repo_namespace, true));
        //Getting stub file content
        $file_contents = $this->files->get($this->getStubPath().'Repository.stub');
        //If Model Create is checked
        if (!$this->create) {
            $file_contents = $this->delete_all_between('@startCreate', '@endCreate', $file_contents);
        } else {//If it isn't
            $file_contents = $this->delete_all_between('@startCreate', '@startCreate', $file_contents);
            $file_contents = $this->delete_all_between('@endCreate', '@endCreate', $file_contents);
        }
        //If Model Edit is Checked
        if (!$this->edit) {
            $file_contents = $this->delete_all_between('@startEdit', '@endEdit', $file_contents);
        } else {//If it isn't
            $file_contents = $this->delete_all_between('@startEdit', '@startEdit', $file_contents);
            $file_contents = $this->delete_all_between('@endEdit', '@endEdit', $file_contents);
        }
        //If Model Delete is Checked
        if (!$this->delete) {
            $file_contents = $this->delete_all_between('@startDelete', '@endDelete', $file_contents);
        } else {//If it isn't
            $file_contents = $this->delete_all_between('@startDelete', '@startDelete', $file_contents);
            $file_contents = $this->delete_all_between('@endDelete', '@endDelete', $file_contents);
        }
        //Replacements to be done in repository stub file
        $replacements = [
                'DummyNamespace'                => ucfirst($this->removeFileNameFromEndOfNamespace($this->repo_namespace)),
                'DummyModelNamespace'           => $this->model_namespace,
                'DummyRepoName'                 => $this->repository,
                'dummy_model_name'              => $this->model,
                'dummy_small_model_name'        => strtolower($this->model),
                'model_small_plural'            => strtolower(str_plural($this->model)),
                'dummy_small_plural_model_name' => strtolower(str_plural($this->model)),
                'DummyGetForDataTable'          => $this->db_datatable_str,
                'dummy_datepicker_data'         => $this->datepicker_data,
                'dummy_protected_var'           => $this->repo_protected_var,
                'repo_construct_data'           => $this->repo_construct_data,
                'repo_uploadFormImg_data'       => $this->repo_uploadFormImg_data,
        ];
        //Generating the repo file
        $this->generateFile(false, $replacements, lcfirst($this->repo_namespace), $file_contents);
    }

    /**
     * @return void
     */
    public function createResponses()
    {
        $this->responses_namespace .= $this->getFullNamespace('');
        $this->createDirectory($this->getBasePath($this->responses_namespace));

        if ($this->create) {
            //Generate CreateResponse File
            $this->generateFile('CreateResponse', [
                'DummyNamespace' => ucfirst($this->removeFileNameFromEndOfNamespace($this->create_response_namespace)),
                'dummy_small_plural_model' => strtolower(str_plural($this->model)),
            ], lcfirst($this->create_response_namespace));
        }

        if ($this->edit) {
            //Generate EditResponse File
            $this->generateFile('EditResponse', [
                'DummyNamespace' => ucfirst($this->removeFileNameFromEndOfNamespace($this->edit_response_namespace)),
                'DummyModelNamespace'         => $this->model_namespace,
                'dummy_small_plural_model' => strtolower(str_plural($this->model)),
                'dummy_small_singular_model' => strtolower(ucfirst(str_singular($this->model))),
            ], lcfirst($this->edit_response_namespace));
        }

        // if ($this->edit) {
        //     //Generate Create Request File
        //     $this->generateFile('Request', [
        //             'DummyNamespace' => ucfirst($this->removeFileNameFromEndOfNamespace($this->create_request_namespace)),
        //             'DummyClass'     => $this->create_request,
        //             'permission'     => $this->create_permission,
        //         ], lcfirst($this->create_request_namespace));

        //     //Generate Store Request File
        //     $this->generateFile('Request', [
        //             'DummyNamespace' => ucfirst($this->removeFileNameFromEndOfNamespace($this->store_request_namespace)),
        //             'DummyClass'     => $this->store_request,
        //             'permission'     => $this->store_permission,
        //         ], lcfirst($this->store_request_namespace));
        // }
    }

    /**
     * @return void
     */
    public function createController()
    {
        $this->createDirectory($this->getBasePath($this->controller_namespace, true));
        //Getting stub file content
        $file_contents = $this->files->get($this->getStubPath().'Controller.stub');
        //Replacements to be done in controller stub
        $replacements = [
            'DummyModelNamespace'         => $this->model_namespace,
            'DummyCreateResponseNamespace' => $this->create_response_namespace,
            'DummyEditResponseNamespace'   => $this->edit_response_namespace,
            'DummyModel'                  => $this->model,
            'DummyArgumentName'           => strtolower($this->model),
            'DummyManageRequestNamespace' => $this->manage_request_namespace,
            'DummyManageRequest'          => $this->manage_request,
            'DummyController'             => $this->controller,
            'DummyNamespace'              => ucfirst($this->removeFileNameFromEndOfNamespace($this->controller_namespace)),
            'DummyRepositoryNamespace'    => $this->repo_namespace,
            'dummy_repository'            => $this->repository,
            'dummy_small_plural_model'    => strtolower(str_plural($this->model)),
        ];
        $namespaces = '';
        if (!$this->create) {
            $file_contents = $this->delete_all_between('@startCreate', '@endCreate', $file_contents);
        } else {
            $file_contents = $this->delete_all_between('@startCreate', '@startCreate', $file_contents);
            $file_contents = $this->delete_all_between('@endCreate', '@endCreate', $file_contents);

            //replacements
            $namespaces .= 'use '.$this->create_request_namespace.";\n";
            $namespaces .= 'use '.$this->store_request_namespace.";\n";
            $replacements['DummyCreateRequest'] = $this->create_request;
            $replacements['DummyStoreRequest'] = $this->store_request;
        }

        if (!$this->edit) {
            $file_contents = $this->delete_all_between('@startEdit', '@endEdit', $file_contents);
        } else {
            $file_contents = $this->delete_all_between('@startEdit', '@startEdit', $file_contents);
            $file_contents = $this->delete_all_between('@endEdit', '@endEdit', $file_contents);
            //replacements
            $namespaces .= 'use '.$this->edit_request_namespace.";\n";
            $namespaces .= 'use '.$this->update_request_namespace.";\n";
            $replacements['DummyEditRequest'] = $this->edit_request;
            $replacements['DummyUpdateRequest'] = $this->update_request;
        }

        if (!$this->delete) {
            $file_contents = $this->delete_all_between('@startDelete', '@endDelete', $file_contents);
        } else {
            $file_contents = $this->delete_all_between('@startDelete', '@startDelete', $file_contents);
            $file_contents = $this->delete_all_between('@endDelete', '@endDelete', $file_contents);
            //replacements
            $namespaces .= 'use '.$this->delete_request_namespace.";\n";
            $replacements['DummyDeleteRequest'] = $this->delete_request;
        }
        //Putting Namespaces in Controller
        $file_contents = str_replace('@Namespaces', $namespaces, $file_contents);

        $this->generateFile(false, $replacements, lcfirst($this->controller_namespace), $file_contents);
    }

    /**
     * @return void
     */
    public function createTableController()
    {
        $this->createDirectory($this->getBasePath($this->table_controller_namespace, true));
        //replacements to be done in table controller stub
        $replacements = [
            'DummyNamespace'              => ucfirst($this->removeFileNameFromEndOfNamespace($this->table_controller_namespace)),
            'DummyRepositoryNamespace'    => $this->repo_namespace,
            'DummyManageRequestNamespace' => $this->manage_request_namespace,
            'DummyTableController'        => $this->table_controller,
            'dummy_repository'            => $this->repository,
            'dummy_small_repo_name'       => strtolower($this->model),
            'dummy_manage_request_name'   => $this->manage_request,
        ];
        //generating the file
        $this->generateFile('TableController', $replacements, lcfirst($this->table_controller_namespace));
    }

    /**
     * @return void
     */
    public function createRouteFiles()
    {
        $this->createDirectory($this->getBasePath($this->route_path));

        if ($this->create && $this->edit && $this->delete) {//Then get the resourceRoute stub
            //Getting stub file content
            $file_contents = $this->files->get($this->getStubPath().'resourceRoute.stub');
            $file_contents = $this->delete_all_between('@startNamespace', '@startNamespace', $file_contents);
            $file_contents = $this->delete_all_between('@endNamespace', '@endNamespace', $file_contents);
            $file_contents = $this->delete_all_between('@startWithoutNamespace', '@endWithoutNamespace', $file_contents);
        } else {//Get the basic route stub
            //Getting stub file content
            $file_contents = $this->files->get($this->getStubPath().'route.stub');
            $file_contents = $this->delete_all_between('@startNamespace', '@startNamespace', $file_contents);
            $file_contents = $this->delete_all_between('@endNamespace', '@endNamespace', $file_contents);
            $file_contents = $this->delete_all_between('@startWithoutNamespace', '@endWithoutNamespace', $file_contents);
            //If create is checked
            if ($this->create) {
                $file_contents = $this->delete_all_between('@startCreate', '@startCreate', $file_contents);
                $file_contents = $this->delete_all_between('@endCreate', '@endCreate', $file_contents);
            } else {//If it isn't
                $file_contents = $this->delete_all_between('@startCreate', '@endCreate', $file_contents);
            }
            //If Edit is checked
            if ($this->edit) {
                $file_contents = $this->delete_all_between('@startEdit', '@startEdit', $file_contents);
                $file_contents = $this->delete_all_between('@endEdit', '@endEdit', $file_contents);
            } else {//if it isn't
                $file_contents = $this->delete_all_between('@startEdit', '@endEdit', $file_contents);
            }
            //If delete is checked
            if ($this->delete) {
                $file_contents = $this->delete_all_between('@startDelete', '@startDelete', $file_contents);
                $file_contents = $this->delete_all_between('@endDelete', '@endDelete', $file_contents);
            } else {//If it isn't
                $file_contents = $this->delete_all_between('@startDelete', '@endDelete', $file_contents);
            }
        }
        //Generate the Route file
        $this->generateFile(false, [
            'route_namespace'      => config('generator.controller_namespace'),
            'DummyModuleName'      => $this->module,
            'DummyModel'           => $this->directory,
            'dummy_name'           => strtolower(str_plural($this->model)),
            'DummyController'      => $this->controller,
            'DummyTableController' => $this->table_controller,
            'dummy_argument_name'  => strtolower($this->model),
        ], $this->route_path.$this->model, $file_contents);

        //Routes web.php file
        $web_file = base_path('routes/web.php');
        //file_contents of Backend.php
        $file_contents = file_get_contents($web_file);
        //If this is already not there, then only append
        if (!strpos($file_contents, "includeRouteFiles(__DIR__.'/Generator/');")) {
            $content = "\n/*\n* Routes From Module Generator\n*/\nincludeRouteFiles(__DIR__.'/Generator/');";
            //Appending into web.php file
            file_put_contents($web_file, $content, FILE_APPEND);
        }
    }

    /**
     * This would enter the necessary language file contents to respective language files.
     *
     * @param [array] $input
     */
    public function insertToLanguageFiles()
    {
        //Model singular version
        $model_singular = ucfirst(str_singular($this->model));
        //Model Plural version
        $model_plural = strtolower(str_plural($this->model));
        //Model plural with capitalize
        $model_plural_capital = ucfirst($model_plural);
        //Path to that language files
        $path = resource_path('lang'.DIRECTORY_SEPARATOR.'en');
        //config folder path
        $config_path = config_path('module.php');

    //  Creating directory if it isn't

        $this->createDirectory($path);

        foreach($this->db_labels as $key=>$val){
           $table_label[$key]  = $val;
        }

        //Labels file
        $labels = [
            'create'     => "Create $model_singular",
            'edit'       => "Edit $model_singular",
            'management' => "$model_singular Management",
            'title'      => "$model_plural_capital",
            'table'      => array_merge([
                            'id' => "ID",
                            'createdat' => "Created At",
                            ],$table_label),

        ];
        $labels = array_merge($labels,$table_label);

        //Pushing values to labels
        add_key_value_in_file($path.'/labels.php', [$model_plural => $labels], 'backend');
        //Menus file
        $menus = [
            'all'        => "All $model_plural_capital",
            'create'     => "Create $model_singular",
            'edit'       => "Edit $model_singular",
            'management' => "$model_singular Management",
            'main'       => "$model_plural_capital",
        ];
        //Pushing to menus file
        add_key_value_in_file($path.'/menus.php', [$model_plural => $menus], 'backend');
        //Exceptions file
        $exceptions = [
            'already_exists' => "That $model_singular already exists. Please choose a different name.",
            'create_error'   => "There was a problem creating this $model_singular. Please try again.",
            'delete_error'   => "There was a problem deleting this $model_singular. Please try again.",
            'not_found'      => "That $model_singular does not exist.",
            'update_error'   => "There was a problem updating this $model_singular. Please try again.",
        ];
        //Alerts File
        $alerts = [
            'created' => "The $model_singular was successfully created.",
            'deleted' => "The $model_singular was successfully deleted.",
            'updated' => "The $model_singular was successfully updated.",
        ];
        //Pushing to menus file
        add_key_value_in_file($path.'/alerts.php', [$model_plural => $alerts], 'backend');
        //Pushing to exceptions file
        add_key_value_in_file($path.'/exceptions.php', [$model_plural => $exceptions], 'backend');
        //config file "module.php"
        $config = [
            $model_plural => [
                'table' => $this->table,
            ],
        ];
        //Pushing to config file
        add_key_value_in_file($config_path, $config);
    }

    /**
     * Creating View Files.
     *
     * @param array $input
     */
    public function createViewFiles()
    {
        //Getiing model
        $model = $this->model;
        //lowercase version of model
        $model_lower = strtolower($model);
        //lowercase and plural version of model
        $model_lower_plural = str_plural($model_lower);
        //View folder name
        $view_folder_name = $model_lower_plural;
        //View path
        $path = escapeSlashes(strtolower(str_plural($this->view_path)));
        //Header buttons folder
        $header_button_path = $path.DIRECTORY_SEPARATOR.'partials';
        //This would create both the directory name as well as partials inside of that directory
        $this->createDirectory(base_path($header_button_path));
        //Header button full path
        $header_button_file_path = $header_button_path.DIRECTORY_SEPARATOR."$model_lower_plural-header-buttons.blade";
        //Getting stub file content
        $header_button_contents = $this->files->get($this->getStubPath().'header-buttons.stub');
        if (!$this->create) {
            $header_button_contents = $this->delete_all_between('@create', '@endCreate', $header_button_contents);
        } else {
            $header_button_contents = $this->delete_all_between('@create', '@create', $header_button_contents);
            $header_button_contents = $this->delete_all_between('@endCreate', '@endCreate', $header_button_contents);
        }
        //Generate Header buttons file
        $this->generateFile(false, ['dummy_small_plural_model' => $model_lower_plural, 'dummy_small_model' => $model_lower], $header_button_file_path, $header_button_contents);
        // Index blade
        $index_path = $path.DIRECTORY_SEPARATOR.'index.blade';
        // Generate the Index blade file
        //
        $this->generateFile('index_view',
             [
                'dummy_small_plural_model' => $model_lower_plural,
                'index_view_column'        => $this->index_view_column,
                'index_view_label'         => $this->index_view_label,
             ],
             $index_path
         );
        //Create Blade
        if ($this->create) {
            //Create Blade
            $create_path = $path.DIRECTORY_SEPARATOR.'create.blade';
            //Generate Create Blade
            $this->generateFile('create_view',
                        [
                            'dummy_small_plural_model' => $model_lower_plural,
                            'dummy_small_model' => $model_lower
                        ], $create_path);
        }
        //Edit Blade
        if ($this->edit) {
            //Edit Blade
            $edit_path = $path.DIRECTORY_SEPARATOR.'edit.blade';
            //Generate Edit Blade
            $this->generateFile('edit_view', [
                'dummy_small_plural_model'   => $model_lower_plural,
                'dummy_small_model'          => $model_lower,
                'dummy_small_singular_model' => strtolower(ucfirst(str_singular($this->model))),
                ], $edit_path);
        }
        // Form Blade
        if ($this->create || $this->edit) {
            //Form Blade
            $form_path = $path.DIRECTORY_SEPARATOR.'form.blade';
            //Generate Form Blade
            $this->generateFile('form_view',
                [
                    'form_view' => $this->form_view,
                ],
            $form_path);
        }
        //BreadCrumbs Folder Path
        $breadcrumbs_path = escapeSlashes('app\\Http\\Breadcrumbs\\Backend');
        //Breadcrumb File path
        $breadcrumb_file_path = $breadcrumbs_path.DIRECTORY_SEPARATOR.$this->model;
        //Generate BreadCrumb File
        $this->generateFile('Breadcrumbs', ['dummy_small_plural_model' => $model_lower_plural], $breadcrumb_file_path);
        //Backend File of Breadcrumb
        $breadcrumb_backend_file = $breadcrumbs_path.DIRECTORY_SEPARATOR.'Backend.php';
        //file_contents of Backend.php
        $file_contents = file_get_contents(base_path($breadcrumb_backend_file));
        //If this is already not there, then only append
        if (!strpos($file_contents, "require __DIR__.'/$this->model.php';")) {
            //Appending into BreadCrumb backend file
            file_put_contents(base_path($breadcrumb_backend_file), "\nrequire __DIR__.'/$this->model.php';", FILE_APPEND);
        }
    }

    /**
     * Creating Table File.
     *
     * @param array $input
     */
    public function createMigration()
    {
        $table = $this->table;
        if (Schema::hasTable($table)) {
            return 'Table Already Exists!';
        } else {
            //Calling Artisan command to create table
            Artisan::call('make:migration', [
                'name'     => 'create_'.$table.'_table',
                '--create' => $table,
            ]);

            // CODE CHANGES TO IMPORT and EDIT Migration file.:
            $migrationFile = explode(': ', Artisan::output());
            $migrationFile = explode('\n',$migrationFile[1]);
            $basepath = base_path(
                    $this->migration_path.DIRECTORY_SEPARATOR.trim($migrationFile[0]).".php"
            );
             $fileContent    = file($basepath);
             $contentBefore  = array_slice($fileContent, 0, 17);
             $contentMiddle  = $this->migrationMiddleContent($fileContent[1],$this->db_core_data);
             $contentAfter   = array_slice($fileContent, 17);
             $fileContentNew = array_merge($contentBefore,$contentMiddle,$contentAfter);
             file_put_contents($basepath,implode("", $fileContentNew));
             // CODE CHANGES TO IMPORT and EDIT Migration file.:
            return Artisan::output();

        }
    }

    /**
     * Creating Event Files.
     *
     * @param array $input
     */
    public function createEvents()
    {
        if (!empty($this->events)) {
            $base_path = $this->event_namespace;

            foreach ($this->events as $event) {
                $path = escapeSlashes($base_path.DIRECTORY_SEPARATOR.$event);
                $model = str_replace(DIRECTORY_SEPARATOR, '\\', $path);

                Artisan::call('make:event', [
                    'name' => $model,
                ]);

                Artisan::call('make:listener', [
                    'name'    => $model.'Listener',
                    '--event' => $model,
                ]);
            }
        }
    }

    /**
     * Generating the file by
     * replacing placeholders in stub file.
     *
     * @param $stub_name Name of the Stub File
     * @param $replacements [array] Array of the replacement to be done in stub file
     * @param $file [string] full path of the file
     * @param $contents [string][optional] file contents
     */
    public function generateFile($stub_name, $replacements, $file, $contents = null)
    {
        if ($stub_name) {
            //Getting the Stub Files Content
            $file_contents = $this->files->get($this->getStubPath().$stub_name.'.stub');
        } else {
            //Getting the Stub Files Content
            $file_contents = $contents;
        }
        //Replacing the stub
        $file_contents = str_replace(
            array_keys($replacements),
            array_values($replacements),
            $file_contents
        );

        $this->files->put(base_path(escapeSlashes($file)).'.php', $file_contents);
    }

    /**
     * getting the stub folder path.
     *
     * @return string
     */
    public function getStubPath()
    {
        $path = resource_path('views'.DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'generator'.DIRECTORY_SEPARATOR.'Stubs'.DIRECTORY_SEPARATOR);
        $package_stubs_path = base_path('vendor'.DIRECTORY_SEPARATOR.'bvipul'.DIRECTORY_SEPARATOR.'generator'.DIRECTORY_SEPARATOR.'src'.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'Stubs'.DIRECTORY_SEPARATOR);
        if($this->files->exists($path))
            return $path;
        else
            return $package_stubs_path;
    }

    /**
     * getBasePath
     *
     * @param string $namespace
     * @param bool $status
     * @return string
     */
    public function getBasePath($namespace, $status = false)
    {
        if ($status) {
            return base_path(escapeSlashes($this->removeFileNameFromEndOfNamespace($namespace, $status)));
        }

        return base_path(lcfirst(escapeSlashes($namespace)));
    }

    /**
     * Removes the filename from the passed the namespace
     *
     * @param string $namespace
     * @return string
     */
    public function removeFileNameFromEndOfNamespace($namespace)
    {
        $namespace = explode('\\', $namespace);

        unset($namespace[count($namespace) - 1]);

        return lcfirst(implode('\\', $namespace));
    }

    /**
     * Modify strings by removing content between $beginning and $end.
     *
     * @param string $beginning
     * @param string $end
     * @param string $string
     *
     * @return string
     */
    public function delete_all_between($beginning, $end, $string)
    {
        $beginningPos = strpos($string, $beginning);

        $endPos = strpos($string, $end);

        if ($beginningPos === false || $endPos === false) {

            return $string;

        }

        $textToDelete = substr($string, $beginningPos, ($endPos + strlen($end)) - $beginningPos);

        return str_replace($textToDelete, '', $string);

    }

    /**
     * Create Data for Schema::create function for migration file for the module.
     *
     * @param string $nl            New Line Character
     * @param array $dbFileData     CSV file Data in array format.
     *
     * @return array
     */

    public function migrationMiddleContent($nl,$dbFileData){

        $middleContent = [];
        if(count($dbFileData)> 0){
        foreach($dbFileData as $data){
                $datatype  = "\t\t\t".'$table->'.$data['datatype'];
                $fieldname = $data['fieldname'];
                $value     = $data['value'];
                $nullable  = ( $data['nullable'] == 'yes' )? "->nullable()" : '';
                $unsigned  = ( $data['unsigned'] == 'yes' )? "->unsigned()" : '';
                if($fieldname != ''){
                    if( strpos( $value, '-' ) !== false ){
                       $middleContent[] = $datatype.'("'.$fieldname.'",'.str_replace("--", ",", $value).')'.$unsigned.$nullable.';';
                    }else{
                       $middleContent[] = $datatype.'("'.$fieldname.'")'.$unsigned.$nullable.';';
                    }
                }else{
                    $middleContent[] = $datatype.'()'.$unsigned.$nullable.';';
                }
                $middleContent[] = $nl;
            }
        }
        return $middleContent;
    }

    /**
     * Creating API Files.
     *
     * @param array $input
     */
    public function createAPI(){

        if ($this->api_create || $this->api_edit || $this->api_delete) {

        // Getting stub file content
        $file_contents = $this->files->get($this->getStubPath().'ApiController.stub');

        //Replacements to be done in controller stub
        $replacements = [
            'DummyModelNamespace'          => $this->model_namespace,
            'DummyCreateResponseNamespace' => $this->create_response_namespace,
            'DummyEditResponseNamespace'   => $this->edit_response_namespace,
            'DummyModel'                   => $this->model,
            'DummyArgumentName'            => strtolower($this->model),
            'DummyManageRequestNamespace'  => $this->manage_request_namespace,
            'DummyManageRequest'           => $this->manage_request,
            'DummyController'              => $this->controller,
            'DummyNamespace'               => ucfirst($this->removeFileNameFromEndOfNamespace($this->controller_namespace)),
            'DummyRepositoryNamespace'     => $this->repo_namespace,
            'dummy_repository'             => $this->repository,
            'dummy_small_plural_model'     => strtolower(str_plural($this->model)),
            'DummyResource'                => $this->resource,
            'DummyResourceNameSpace'       => $this->resource_namespace,
        ];

        $namespaces = '';
        if (!$this->api_create) {
            $file_contents = $this->delete_all_between('@startCreate', '@endCreate', $file_contents);
        } else {
            $file_contents = $this->delete_all_between('@startCreate', '@startCreate', $file_contents);
            $file_contents = $this->delete_all_between('@endCreate', '@endCreate', $file_contents);

            //replacements
            $namespaces .= 'use '.$this->create_request_namespace.";\n";
            $namespaces .= 'use '.$this->store_request_namespace.";\n";
            $replacements['DummyCreateRequest'] = $this->create_request;
            $replacements['DummyStoreRequest'] = $this->store_request;
        }

        if (!$this->api_edit) {
            $file_contents = $this->delete_all_between('@startEdit', '@endEdit', $file_contents);
        } else {
            $file_contents = $this->delete_all_between('@startEdit', '@startEdit', $file_contents);
            $file_contents = $this->delete_all_between('@endEdit', '@endEdit', $file_contents);
            //replacements
            $namespaces .= 'use '.$this->edit_request_namespace.";\n";
            $namespaces .= 'use '.$this->update_request_namespace.";\n";
            $replacements['DummyEditRequest'] = $this->edit_request;
            $replacements['DummyUpdateRequest'] = $this->update_request;
        }

        if (!$this->api_delete) {
            $file_contents = $this->delete_all_between('@startDelete', '@endDelete', $file_contents);
        } else {
            $file_contents = $this->delete_all_between('@startDelete', '@startDelete', $file_contents);
            $file_contents = $this->delete_all_between('@endDelete', '@endDelete', $file_contents);
            //replacements
            $namespaces .= 'use '.$this->delete_request_namespace.";\n";
            $replacements['DummyDeleteRequest'] = $this->delete_request;
        }

        //Putting Namespaces in Controller
        $file_contents = str_replace('@Namespaces', $namespaces, $file_contents);

        $this->generateFile(
                false,
                $replacements,
                lcfirst($this->api_controller_namespace),
                $file_contents);
        }
    }

    public function updateBackendCustomJs(){

        $basepath = base_path(
        $this->public_js_path.DIRECTORY_SEPARATOR.trim("backend-custom.js"));
        $fileContent    = file($basepath);
        $contentBefore  = array_slice($fileContent, 0, count($fileContent)-3);
        $contentMiddle  = $this->backend_custom;
        $contentAfter   = array_slice($fileContent, count($fileContent)-3);
        $fileContentNew = array_merge($contentBefore,$contentMiddle,$contentAfter);
        file_put_contents($basepath,implode("", $fileContentNew));

    }

 /**
  * Creates row data for new files.
  * $FNLC : fieldNameLowerCase
  * $FNCC : fieldNameCamelCase
  * @param      array   $input       The input
  * @param      <type>  $moduledata  The moduledata
  *
  * @return     array   ( description_of_the_return_value )
  */
 public function createRowDataForNewFiles(array $input,$moduledata)
    {
        $files   = ['getForDataTableRepoHtml', 'viewIndexLabelHtml', 'viewIndexColumnHtml',
                    'inputTypeFileHtml',       'repoConstructHtml',  'viewFormjavaScriptHTML',
                    'viewFormOneHTML',         'viewFormTwoHTML',    'viewFormMainHTML',
                    'viewIndexRadioButtonHtml','viewIndexDatepickerHtml','viewFormFileHtml',
                    'uploadFormImgFunctionCode' ];

        $rowData = [ 'labels' =>[], 'core_data' =>[], 'index_label'=>[], 'index_column' =>[],
                     'form_view' =>[], 'rules_string' =>[], 'fields_string' =>[],
                     'getfordatatable_string' =>[], 'input_type' =>[], 'backend_custom' =>[],
                     'datepicker_data' =>[], 'repo_protected_var' =>[],
                     'repo_construct_data'=>[],
        ];

            $fieldNameArr         = [];
            $fieldRuleArr         = [];
            $getForDataTableArr   = [];
            $indexViewColumnArr   = [];
            $indexViewLabelArr    = [];
            $formViewArr          = [];
            $inputTypeArr         = [];
            $inputTypeFileArr     = [];
            $repoConstructDataArr = [];

            $table      = $input['table_name'];
            $modelName  = $input['model_name'];
            $moduleName  = $input['name'];


            $isFile     = false;
            $rowData['core_data'] = $moduledata;

            foreach ($rowData['core_data'] as $data) {
                $FNLC   = $this->changeFieldCase($data['fieldname'],'lower');
                $FNCC   = $this->changeFieldCase($data['fieldname'],'camel');
                $inputTypeArr[]       = $data['input_type'];
                $fieldNameArr[]       = $FNLC;
                $getForDataTableArr[] = $this->getCommonReplacedHTML($table,$FNLC,$moduleName,$files[0]);
                $indexViewLabelArr[]  = $this->getCommonReplacedHTML($table,$FNLC,$moduleName,$files[1]);
                $indexViewColumnArr[] = $this->getCommonReplacedHTML($table,$FNLC,$moduleName,$files[2]);
                $formViewArr[]        = $this->getFieldHtml($table,$data,$FNLC,$modelName,$moduleName,$files);
                $fieldLabelArr[$FNLC] = $FNCC;
                if($data['rule'] != ''){
                   $fieldRuleArr[] = $FNLC."' => '".$data['rule'];
                }
                if($data['input_type'] == 'file'){
                   $isFile = true;
                   $inputTypeFileArr[]     = $this->getCommonReplacedHTML($table,$FNLC,$moduleName,$files[3]);
                   $repoConstructDataArr[] = $this->getCommonReplacedHTML($table,$FNLC,$moduleName,$files[4]);
                }
            }
                $formViewArr[]               = $this->getJavaScriptCode($input['name'],$inputTypeArr,$files[5]);
                $rowData['labels']           = $fieldLabelArr;
                $rowData['form_view']        = $this->getFormViewData($formViewArr);
                $rowData['index_label']      = $this->getIndexLabelData($indexViewLabelArr);
                $rowData['rules_string']     = $this->getRulesFieldsStringData($fieldRuleArr);
                $rowData['fields_string']    = $this->getRulesFieldsStringData($fieldNameArr);
                $rowData['index_column']     = $this->getIndexColumnData($indexViewColumnArr);
                $rowData['datatable_string'] = $this->getDatatableData($getForDataTableArr);
                $rowData['backend_custom']   = $this->getBackendCustomCode(
                                                      $input['name'],
                                                      $inputTypeArr,
                                                      $rowData['core_data']
                                                  );
                $rowData['datepicker_data']     = $this->getDatePickerDataForRepository($rowData['core_data']);
                $rowData['repo_protected_var']  = $this->getRepoProctedVar($inputTypeFileArr);
                $rowData['repo_construct_data'] = $this->getRepoConstructData($repoConstructDataArr);
                if($isFile){
                   $rowData['uploadFormImg']    = $this->getReplacedViewFormHTML([],$files[12]);
                }
                // print_r($rowData['datepicker_data']);
                // echo "<pre/>";
                /*print_r($rowData['datatable_string']);
                print_r($rowData['index_label']);
                print_r($rowData['index_column']);
                print_r($rowData['repo_protected_var']);
                print_r($rowData['repo_construct_data']);*/
                //exit;
                // print_r($rowData['form_view']);
                // print_r($rowData['index_label']);
                // print_r($rowData['index_column']);
                // print_r($rowData['repo_protected_var']);
                // print_r($rowData['repo_construct_data']);
                // echo "<pre/>";print_r($rowData['datatable_string']);exit;
                //exit;
             return $rowData;

    }

    public function changeFieldCase($data,$case){
        if($case == 'camel') {
            return ucwords(str_replace("_"," ",$data));
        }else{
            return strtolower(str_replace(" ","_",$data));
        }
    }

    public function getRepoConstructData($repoConstructDataArr){
        return "\t\t".implode("\t\n\n\t\t", $repoConstructDataArr)."\n\n\t\t".'$this->storage = Storage::disk("public");';
    }

    public function getRepoProctedVar($inputTypeFileArr){
        return 'protected $storage;'."\n\n".implode( "\t\n\n", $inputTypeFileArr);
    }

    public function getRulesFieldsStringData($data){
       return "'".implode( "',\n\t\t\t'", $data)."',";
    }
    public function getFormViewData($formViewArr){
        return "<div class='box-body'>\n".implode( "\n\t\t\t\t", $formViewArr)."</div><!--box-body-->\n";
    }

    public function getFieldHtml($table,$data,$FNLC,$modelName,$moduleName,$files){
        $replacements = [
                    'DummyFieldType'     => '',
                    'DummyFieldName'     => $data['fieldname'],
                    'DummyModuleName'    => $modelName,
                    'DummyModulel'       => str_plural(strtolower(str_replace("_","",$moduleName))),
                    'DummyPlaceholder'   => '',
                    'DummyFNLC'          => $FNLC,
                    'DummySelectOptions' => '',
                    'DummyClass'         => '',
                    'DummyLabelRequired' => '',
                    'DummyRequired'      => '',
                    'DummyExtraParams'   => '',
                    'DummyTable'         => strtolower($table),
                    'DummyCollg'         => 'col-lg-10',
                    'DummyLabelHTML'     => '',
                    'DummyFieldHTML'     => '',
                    'DummyLowerVal'      => '',
                    'DummyValue'         => '',
                    'DummySingularTable' => '',
            ];
         if(strpos($data['rule'], 'required') !== false) {
            $replacements['DummyLabelRequired'] = 'required';
            $replacements['DummyRequired']      = "'required'    => 'required',";
         }
         $replacements['DummyPlaceholder']      =  "trans('labels.backend.".$replacements['DummyModulel'].".$FNLC')";
         $replacements['DummyLabelHTML']        =  $this->getReplacedViewFormHTML($replacements,$files[7]);

         switch ($data['input_type']) {
             case 'textbox':
                 $replacements['DummyClass']       = 'form-control box-size';
                 $replacements['DummyFieldType']   = 'text';
                 $replacements['DummyExtraParams'] = '';
                 $replacements['DummyFieldHTML']   = $this->getReplacedViewFormHTML($replacements,$files[6]);
                 break;

             case 'textarea':
                 $replacements['DummyClass']       = 'form-control';
                 $replacements['DummyFieldType']   = 'textarea';
                 $replacements['DummyRequired']    = "";
                 $replacements['DummyExtraParams'] = "'rows' => 2";
                 $replacements['DummyFieldHTML']   = $this->getReplacedViewFormHTML($replacements,$files[6]);
                 break;

              case 'select':
                 $replacements['DummyCollg']         = 'col-lg-4';
                 $replacements['DummyClass']         = 'form-control select2 status box-size';
                 $replacements['DummyFieldType']     = 'select';
                 $replacements['DummyExtraParams']   = '';
                 $replacements['DummySelectOptions'] = str_replace("-",",",$data['options']).",";
                 $replacements['DummyFieldHTML']     = $this->getReplacedViewFormHTML($replacements,$files[6]);
                 break;

              case 'radio':
                 $replacements['DummyCollg']         = 'col-lg-4';
                 $replacements['DummyClass']         = 'form-control select2 status box-size';
                 $replacements['DummyFieldType']     = 'select';
                 $replacements['DummyExtraParams']   = '';
                 $replacements['DummySelectOptions'] =  str_replace("-",",",$data['options']);
                 $replacements['DummyFieldHTML']     = $this->getRadioHtml($replacements,$files,$data);
                 break;

               case 'datetime':
                 $replacements['DummyFieldType']     = 'select';
                 $replacements['DummyClass']         = 'form-control select2 status box-size';
                 $replacements['DummyExtraParams']   = '';
                 $replacements['DummyCollg']         = 'col-lg-4';
                 $replacements['DummyLowerVal']      = strtolower($replacements['DummyFieldName']);
                 $replacements['DummySingularTable'] = str_singular($replacements['DummyTable']);
                 $replacements['DummyFieldHTML']     = $this->getReplacedViewFormHTML($replacements,$files[10]);
                 break;
              case 'file':
                 $replacements['DummyFieldType']   = 'text';
                 $replacements['DummyClass']       = 'form-control box-size';
                 $replacements['DummyExtraParams'] = '';
                 $replacements['DummyFieldHTML']   = $this->getReplacedViewFormHTML($replacements,$files[11]);
                 break;
              default:
                 $replacements['DummyFieldType']   = 'text';
                 $replacements['DummyClass']       = 'form-control box-size';
                 $replacements['DummyExtraParams'] = '';
                 break;
         }
         return $this->getReplacedViewFormHTML($replacements,$files[8]);
    }

    public function getJavaScriptCode($module,$data,$file){
        $dummyContent = "//Backend.".str_singular($module);
        $hasJScode    = !empty(array_intersect(['textarea','datetime'], $data));
        if($hasJScode){
             $dummyContent = "Backend.".str_singular($module);
        }
        $replacements = [ '//DummyBackend' => $dummyContent, ];
        return $this->getReplacedContent($file,$replacements);
    }

    public function getDatePickerDataForRepository($coreData){
      $returnArr    = [];
      $returnString = '';
      foreach($coreData as $fielddata){
        if($fielddata['input_type'] == 'datetime'){
            $field       = $fielddata['fieldname'];
            $returnArr[] = "\$input['".$field."'] = Carbon::parse(\$input['".$field."']);\n";
        }
        if($fielddata['input_type'] == 'file'){
            $field       = $fielddata['fieldname'];
            $returnArr[] = "\n"."if(!empty(\$input['".$field."'])) {
            \$input['".$field."'] = \$this->uploadFormImg(\$input['".$field."'],'".$field."_path');
            }";
        }
      }
      if(count($returnArr) > 0 ){
            $returnString = implode("", $returnArr);
      }
      return $returnString;
    }

    public function getBackendCustomCode($module,$data,$coreData){

      $datetimefields    = [];
      $addHandlers       = [];
      $datetimefieldsStr = '';
      $addHandlersStr    = '';
      $i=1;
      foreach($coreData as $fielddata){
        if($fielddata['input_type'] == 'datetime'){
            $fieldname        = $fielddata['fieldname'];
            $datetimefields[] = "datetimepicker".$i.": jQuery('#".$fieldname."'),";
            $addHandlers[]    = "this.selectors.datetimepicker".$i.".datetimepicker();";
            $i++;
        }
      }

      if(count($datetimefields)>0){
        $datetimefieldsStr = implode("\n", $datetimefields);
        $addHandlersStr    = implode("\n", $addHandlers);
      }
      $model = str_singular($module);
      $hasTextara = false;
      $hasTextara = in_array('textarea', $data)? true : false;

      $backandCustomArr[] = ",\n".$model.": {\n";
      $backandCustomArr[] =        "\tselectors: {\n";
      $backandCustomArr[] =        "\t".$datetimefieldsStr."\n";
      $backandCustomArr[] =        "\t},\n";
      $backandCustomArr[] =        "\tinit: function (locale) {\n";
      $backandCustomArr[] =        "\t\tthis.addHandlers();\n";
      if($hasTextara){
        $backandCustomArr[] =      "\t\tBackend.tinyMCE.init(locale);\n";
      }
      $backandCustomArr[] =        "\t},\n";
      $backandCustomArr[] =        "\taddHandlers: function () {\n";
      $backandCustomArr[] =        "\t".$addHandlersStr."\n";
      $backandCustomArr[] =        "\t}\n";
      $backandCustomArr[] ="}\n";
      return $backandCustomArr;
    }

    public function getDateTimeHtml($table,$data,$required){
        $fieldname = $data['fieldname'];
        $lowerVal  = strtolower($data['fieldname']);

    }

    public function getRadioHtml($replacements,$files,$data){
        $options   = explode(",",str_replace(['[',']',"'"], "", $replacements['DummySelectOptions']));
        $radioString = "\t\t\t\t<div>\n";
        foreach ($options as $key => $value) {
            $replacements['DummyLowerVal'] = strtolower($value);
            $replacements['DummyValue'] = $value;
            $replacements['DummyTableSingular'] = str_singular($replacements['DummyTable']);
            $radioString .= $this->getReplacedViewFormHTML($replacements,$files[9]);
        }
        $radioString .= "\t\t\t\t</div>\n";
        return $radioString;
    }

    public function getReplacedViewFormHTML($replacements,$file){
        return $this->getReplacedContent($file,$replacements);
    }
    public function getCommonReplacedHTML($table,$field,$modulename,$file){
        $replacements = [
            'DummyTableName' => strtolower($table),
            'DummyModuleName' =>  str_plural(strtolower(str_replace("_","",$modulename))),
            'DummyFieldNameLowerCase' => $field,
        ];
        return $this->getReplacedContent($file,$replacements);
    }
    public function getIndexColumnData($indexViewColumnArr){
       return implode( ",\n\t\t\t\t", $indexViewColumnArr);
    }
    public function getDatatableData($getForDataTableArr){
        return implode( "',\n\t\t\t\t", $getForDataTableArr)."',";
    }
    public function getIndexLabelData($indexViewLabelArr){
        return implode( "\n\t\t\t\t", $indexViewLabelArr);
    }

    public function getReplacedContent($file,$replacements){
        $content = $this->files->get($this->getStubPath().$file.'.stub');
        $content = str_replace( array_keys($replacements),array_values($replacements),
            $content );
        return $content;
    }

}

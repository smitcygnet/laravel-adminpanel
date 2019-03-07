<?php

namespace App\Http\Responses\Backend\EmployeeoneBackend\Employeetwo;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Employeeone\EmployeeoneEmployeetwo\Employeetwo
     */
    protected $employeetwos;

    /**
     * @param App\Models\Employeeone\EmployeeoneEmployeetwo\Employeetwo $employeetwos
     */
    public function __construct($employeetwos)
    {
        $this->employeetwos = $employeetwos;
    }

    /**
     * To Response
     *
     * @param \App\Http\Requests\Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function toResponse($request)
    {
        return view('backend.employeetwos.edit')->with([
            'employeetwo' => $this->employeetwos
        ]);
    }
}
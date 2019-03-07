<?php

namespace App\Http\Responses\Backend\Employeeone;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Employeeone\Employeeone
     */
    protected $employeeones;

    /**
     * @param App\Models\Employeeone\Employeeone $employeeones
     */
    public function __construct($employeeones)
    {
        $this->employeeones = $employeeones;
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
        return view('backend.employeeones.edit')->with([
            'employeeone' => $this->employeeones
        ]);
    }
}
<?php

namespace App\Http\Responses\Backend\Tempmodule;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Tempmodule\Tempmodule
     */
    protected $tempmodules;

    /**
     * @param App\Models\Tempmodule\Tempmodule $tempmodules
     */
    public function __construct($tempmodules)
    {
        $this->tempmodules = $tempmodules;
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
        return view('backend.tempmodules.edit')->with([
            'tempmodule' => $this->tempmodules
        ]);
    }
}
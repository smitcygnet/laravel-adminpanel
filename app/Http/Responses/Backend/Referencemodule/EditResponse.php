<?php

namespace App\Http\Responses\Backend\Referencemodule;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Referencemodule\Referencemodule
     */
    protected $referencemodules;

    /**
     * @param App\Models\Referencemodule\Referencemodule $referencemodules
     */
    public function __construct($referencemodules)
    {
        $this->referencemodules = $referencemodules;
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
        return view('backend.referencemodules.edit')->with([
            'referencemodules' => $this->referencemodules
        ]);
    }
}
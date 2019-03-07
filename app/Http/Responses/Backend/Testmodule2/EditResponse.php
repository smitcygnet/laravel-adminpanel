<?php

namespace App\Http\Responses\Backend\Testmodule2;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Testmodule2\Testmodule
     */
    protected $testmodules;

    /**
     * @param App\Models\Testmodule2\Testmodule $testmodules
     */
    public function __construct($testmodules)
    {
        $this->testmodules = $testmodules;
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
        return view('backend.testmodules.edit')->with([
            'testmodule' => $this->testmodules
        ]);
    }
}
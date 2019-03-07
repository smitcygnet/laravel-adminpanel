<?php

namespace App\Http\Responses\Backend\Testmone;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Testmone\Testmone
     */
    protected $testmones;

    /**
     * @param App\Models\Testmone\Testmone $testmones
     */
    public function __construct($testmones)
    {
        $this->testmones = $testmones;
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
        return view('backend.testmones.edit')->with([
            'testmone' => $this->testmones
        ]);
    }
}
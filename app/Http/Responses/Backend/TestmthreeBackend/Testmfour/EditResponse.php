<?php

namespace App\Http\Responses\Backend\TestmthreeBackend\Testmfour;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Testmthree\TestmthreeTestmfour\Testmfour
     */
    protected $testmfours;

    /**
     * @param App\Models\Testmthree\TestmthreeTestmfour\Testmfour $testmfours
     */
    public function __construct($testmfours)
    {
        $this->testmfours = $testmfours;
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
        return view('backend.testmfours.edit')->with([
            'testmfour' => $this->testmfours
        ]);
    }
}
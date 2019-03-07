<?php

namespace App\Http\Responses\Backend\TestmoneBackend\Testmtwo;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Testmone\TestmoneTestmtwo\Testmtwo
     */
    protected $testmtwos;

    /**
     * @param App\Models\Testmone\TestmoneTestmtwo\Testmtwo $testmtwos
     */
    public function __construct($testmtwos)
    {
        $this->testmtwos = $testmtwos;
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
        return view('backend.testmtwos.edit')->with([
            'testmtwo' => $this->testmtwos
        ]);
    }
}
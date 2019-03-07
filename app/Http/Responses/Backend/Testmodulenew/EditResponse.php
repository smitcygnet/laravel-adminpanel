<?php

namespace App\Http\Responses\Backend\Testmodulenew;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Testmodulenew\Testmodulenew
     */
    protected $testmodulenews;

    /**
     * @param App\Models\Testmodulenew\Testmodulenew $testmodulenews
     */
    public function __construct($testmodulenews)
    {
        $this->testmodulenews = $testmodulenews;
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
        return view('backend.testmodulenews.edit')->with([
            'testmodulenew' => $this->testmodulenews
        ]);
    }
}
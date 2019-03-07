<?php

namespace App\Http\Responses\Backend\Testmthree;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Testmthree\Testmthree
     */
    protected $testmthrees;

    /**
     * @param App\Models\Testmthree\Testmthree $testmthrees
     */
    public function __construct($testmthrees)
    {
        $this->testmthrees = $testmthrees;
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
        return view('backend.testmthrees.edit')->with([
            'testmthree' => $this->testmthrees
        ]);
    }
}
<?php

namespace App\Http\Responses\Backend\Samplethree;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Samplethree\Samplethree
     */
    protected $samplethrees;

    /**
     * @param App\Models\Samplethree\Samplethree $samplethrees
     */
    public function __construct($samplethrees)
    {
        $this->samplethrees = $samplethrees;
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
        return view('backend.samplethrees.edit')->with([
            'samplethree' => $this->samplethrees
        ]);
    }
}
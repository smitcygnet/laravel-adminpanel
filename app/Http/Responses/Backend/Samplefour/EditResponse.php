<?php

namespace App\Http\Responses\Backend\Samplefour;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Samplefour\Samplefour
     */
    protected $samplefours;

    /**
     * @param App\Models\Samplefour\Samplefour $samplefours
     */
    public function __construct($samplefours)
    {
        $this->samplefours = $samplefours;
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
        return view('backend.samplefours.edit')->with([
            'samplefour' => $this->samplefours
        ]);
    }
}
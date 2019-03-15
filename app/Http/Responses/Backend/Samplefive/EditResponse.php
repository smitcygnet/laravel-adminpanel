<?php

namespace App\Http\Responses\Backend\Samplefive;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Samplefive\Samplefive
     */
    protected $samplefives;

    /**
     * @param App\Models\Samplefive\Samplefive $samplefives
     */
    public function __construct($samplefives)
    {
        $this->samplefives = $samplefives;
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
        return view('backend.samplefives.edit')->with([
            'samplefive' => $this->samplefives
        ]);
    }
}
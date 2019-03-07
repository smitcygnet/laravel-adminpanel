<?php

namespace App\Http\Responses\Backend\Sampleone;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Sampleone\Sampleone
     */
    protected $sampleones;

    /**
     * @param App\Models\Sampleone\Sampleone $sampleones
     */
    public function __construct($sampleones)
    {
        $this->sampleones = $sampleones;
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
        return view('backend.sampleones.edit')->with([
            'sampleone' => $this->sampleones
        ]);
    }
}
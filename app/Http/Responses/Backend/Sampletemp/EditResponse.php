<?php

namespace App\Http\Responses\Backend\Sampletemp;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Sampletemp\Sampletemp
     */
    protected $sampletemps;

    /**
     * @param App\Models\Sampletemp\Sampletemp $sampletemps
     */
    public function __construct($sampletemps)
    {
        $this->sampletemps = $sampletemps;
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
        return view('backend.sampletemps.edit')->with([
            'sampletemp' => $this->sampletemps
        ]);
    }
}
<?php

namespace App\Http\Responses\Backend\Sampletwo;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Sampletwo\Sampletwo
     */
    protected $sampletwos;

    /**
     * @param App\Models\Sampletwo\Sampletwo $sampletwos
     */
    public function __construct($sampletwos)
    {
        $this->sampletwos = $sampletwos;
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
        return view('backend.sampletwos.edit')->with([
            'sampletwo' => $this->sampletwos
        ]);
    }
}
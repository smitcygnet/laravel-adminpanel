<?php

namespace App\Http\Responses\Backend\Sampleseven;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Sampleseven\Sampleseven
     */
    protected $samplesevens;

    /**
     * @param App\Models\Sampleseven\Sampleseven $samplesevens
     */
    public function __construct($samplesevens)
    {
        $this->samplesevens = $samplesevens;
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
        return view('backend.samplesevens.edit')->with([
            'sampleseven' => $this->samplesevens
        ]);
    }
}
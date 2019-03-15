<?php

namespace App\Http\Responses\Backend\Samplesevennew;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Samplesevennew\Samplesevennew
     */
    protected $samplesevennews;

    /**
     * @param App\Models\Samplesevennew\Samplesevennew $samplesevennews
     */
    public function __construct($samplesevennews)
    {
        $this->samplesevennews = $samplesevennews;
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
        return view('backend.samplesevennews.edit')->with([
            'samplesevennew' => $this->samplesevennews
        ]);
    }
}
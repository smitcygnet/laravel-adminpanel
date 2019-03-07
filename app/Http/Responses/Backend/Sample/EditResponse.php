<?php

namespace App\Http\Responses\Backend\Sample;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Sample\Sample
     */
    protected $samples;

    /**
     * @param App\Models\Sample\Sample $samples
     */
    public function __construct($samples)
    {
        $this->samples = $samples;
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
        return view('backend.samples.edit')->with([
            'sample' => $this->samples
        ]);
    }
}
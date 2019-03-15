<?php

namespace App\Http\Responses\Backend\Samplesix;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Samplesix\Samplesix
     */
    protected $samplesixes;

    /**
     * @param App\Models\Samplesix\Samplesix $samplesixes
     */
    public function __construct($samplesixes)
    {
        $this->samplesixes = $samplesixes;
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
        return view('backend.samplesixes.edit')->with([
            'samplesix' => $this->samplesixes
        ]);
    }
}
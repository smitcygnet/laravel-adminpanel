<?php

namespace App\Http\Responses\Backend\Samplenew;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Samplenew\Samplenew
     */
    protected $samplenews;

    /**
     * @param App\Models\Samplenew\Samplenew $samplenews
     */
    public function __construct($samplenews)
    {
        $this->samplenews = $samplenews;
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
        return view('backend.samplenews.edit')->with([
            'samplenew' => $this->samplenews
        ]);
    }
}
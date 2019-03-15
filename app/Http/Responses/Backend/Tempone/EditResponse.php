<?php

namespace App\Http\Responses\Backend\Tempone;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Tempone\Tempone
     */
    protected $tempones;

    /**
     * @param App\Models\Tempone\Tempone $tempones
     */
    public function __construct($tempones)
    {
        $this->tempones = $tempones;
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
        return view('backend.tempones.edit')->with([
            'tempone' => $this->tempones
        ]);
    }
}
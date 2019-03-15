<?php

namespace App\Http\Responses\Backend\Temptwo;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Temptwo\Temptwo
     */
    protected $temptwos;

    /**
     * @param App\Models\Temptwo\Temptwo $temptwos
     */
    public function __construct($temptwos)
    {
        $this->temptwos = $temptwos;
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
        return view('backend.temptwos.edit')->with([
            'temptwo' => $this->temptwos
        ]);
    }
}
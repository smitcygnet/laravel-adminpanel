<?php

namespace App\Http\Responses\Backend\Vision;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Vision\Vision
     */
    protected $visions;

    /**
     * @param App\Models\Vision\Vision $visions
     */
    public function __construct($visions)
    {
        $this->visions = $visions;
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
        return view('backend.visions.edit')->with([
            'vision' => $this->visions
        ]);
    }
}
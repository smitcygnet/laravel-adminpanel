<?php

namespace App\Http\Responses\Backend\Life;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Life\Life
     */
    protected $lives;

    /**
     * @param App\Models\Life\Life $lives
     */
    public function __construct($lives)
    {
        $this->lives = $lives;
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
        return view('backend.lives.edit')->with([
            'life' => $this->lives
        ]);
    }
}
<?php

namespace App\Http\Responses\Backend\Barber;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Barber\Barber
     */
    protected $barbers;

    /**
     * @param App\Models\Barber\Barber $barbers
     */
    public function __construct($barbers)
    {
        $this->barbers = $barbers;
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
        return view('backend.barbers.edit')->with([
            'barber' => $this->barbers
        ]);
    }
}
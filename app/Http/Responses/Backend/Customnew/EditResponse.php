<?php

namespace App\Http\Responses\Backend\Customnew;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Customnew\Customnew
     */
    protected $customnews;

    /**
     * @param App\Models\Customnew\Customnew $customnews
     */
    public function __construct($customnews)
    {
        $this->customnews = $customnews;
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
        return view('backend.customnews.edit')->with([
            'customnew' => $this->customnews
        ]);
    }
}
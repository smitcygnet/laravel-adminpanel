<?php

namespace App\Http\Responses\Backend\Newcustomer;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Newcustomer\Newcustomer
     */
    protected $newcustomers;

    /**
     * @param App\Models\Newcustomer\Newcustomer $newcustomers
     */
    public function __construct($newcustomers)
    {
        $this->newcustomers = $newcustomers;
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
        return view('backend.newcustomers.edit')->with([
            'newcustomer' => $this->newcustomers
        ]);
    }
}
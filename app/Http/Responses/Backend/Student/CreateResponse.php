<?php

namespace App\Http\Responses\Backend\Student;

use Illuminate\Contracts\Support\Responsable;
use App\Models\Standard\Standard;

class CreateResponse implements Responsable
{
    /**
     * To Response
     *
     * @param \App\Http\Requests\Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function toResponse($request)
    {
        $standards = [];
        $standards = Standard::where('status', 1)->get()->all();
        foreach ($standards as $standard) {
            $data[$standard->id] = $standard->name;
        }
        return view('backend.students.create')->with([
            'standards' => $data
        ]);
    }
}
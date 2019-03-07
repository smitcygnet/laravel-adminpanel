<?php

namespace App\Http\Responses\Backend\Teacher;

use Illuminate\Contracts\Support\Responsable;

class EditResponse implements Responsable
{
    /**
     * @var App\Models\Teacher\Teacher
     */
    protected $teachers;

    /**
     * @param App\Models\Teacher\Teacher $teachers
     */
    public function __construct($teachers)
    {
        $this->teachers = $teachers;
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
        return view('backend.teachers.edit')->with([
            'teacher' => $this->teachers
        ]);
    }
}
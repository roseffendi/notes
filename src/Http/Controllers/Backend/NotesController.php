<?php

namespace Roseffendi\Notes\Http\Controllers\Backend;

use Increative\Foundation\Http\Controllers\AdminController;
use Illuminate\Http\Request;

class NotesController extends AdminController
{
    public function getIndex()
    {

    }

    public function getAccessCode(Request $request)
    {
        $code = $request->input('code');
    }
}
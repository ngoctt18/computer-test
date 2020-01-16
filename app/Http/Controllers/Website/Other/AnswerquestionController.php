<?php

namespace App\Http\Controllers\Website\Other;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AnswerquestionController extends Controller
{
    public function answerquestion()
    {
        return view('website.others.ansswerquestion');
    }
}

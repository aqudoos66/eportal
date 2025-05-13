<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TrainingController extends Controller
{
        public function indexPage(){
        return view('admin.pages.trainings.index');
    }
}

<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostType;
use App\Models\Product;
use App\Models\Recruitment;
use App\Models\RecruitmentPosition;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        return view('welcome');
    }

    public function intro()
    {
        return view('intro');
    }

    public function recruit()
    {
        return view('recruit');
    }
}

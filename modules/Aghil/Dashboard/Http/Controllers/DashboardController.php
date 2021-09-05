<?php

namespace Aghil\Dashboard\Http\Controllers;

use Illuminate\Routing\Controller;

class DashboardController extends Controller
{
    public function home()
    {
        return View('Dashboard::index');
    }
}

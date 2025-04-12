<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $type = $request->query('type', 'general');

        if ($type === 'ecommerce') {
            return $this->ecommerce();
        }

        return $this->general();
    }

    public function general()
    {
        return view('dashboard.general');
    }

    public function ecommerce()
    {
        return view('dashboard.ecommerce');
    }
}

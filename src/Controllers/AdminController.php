<?php

namespace Hillel\Controllers;

class AdminController
{
    public function index()
    {
        $title = 'Admin';

        return view('pages.home', ['title' => $title]);
    }
}
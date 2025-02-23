<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\applicationdetail;
use Illuminate\Http\Request;
use App\Models\Fund;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Stichoza\GoogleTranslate\GoogleTranslate;


class applicationdetailController extends Controller
{
    public function index()
    {
        return view('applicationdetail'); 
    }
}

<?php

namespace App\Http\Controllers;

use App\Moduls\Optionset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OptionsetController extends Controller
{
    protected array $error = ["message" => "No Optionset found"];

    public function getOptionset(String $category = '')
    {
        $option = Optionset::where('category', $category)->get();
        if ($option->isEmpty()) {
            return response()->json($this->error, 400);
        }
        return response()->json($option, 200);
    }
}

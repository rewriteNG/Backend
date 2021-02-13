<?php

namespace App\Http\Controllers;

use App\Moduls\Character\CharBase;
use App\Moduls\Character\CharValue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class CharacterController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth:api');
    }


    public function index()
    {
        $char = CharBase::where('user_id', auth()->user()->id)->get();
        if ($char->isEmpty()) {
            return response()->json(["message" => "No Character found"], 400);
        }
        return response()->json($char, 200);
    }

    public function getCharBase(int $id)
    {
        $char = CharBase::where('id', $id)->get();
        if ($char->isEmpty()) {
            return response()->json(["message" => "No Character found"], 400);
        }
        return response()->json($char->first(), 200);
    }

    public function getCharValue(int $id)
    {
        $value = CharValue::where('char_id', $id)->where('user_id', auth()->user()->id)->get();
        if ($value->isEmpty()) {
            return response()->json(["message" => "No Character found"], 400);
        }
        return response()->json($value->first(), 200);
    }
}

<?php

namespace App\Http\Controllers;

use App\Moduls\Character\CharBase;
use App\Moduls\Character\CharValue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class CharacterController extends Controller
{
    protected array $error = ["message" => "No Character found"];

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
            return response()->json($this->error, 400);
        }
        return response()->json($char, 200);
    }

    public function getCharBase(int $id)
    {
        $char = $this->getCharBaseData($id);
        if ($char->isEmpty()) {
            return response()->json($this->error, 400);
        }
        return response()->json($char->first(), 200);
    }

    public function getCharValue(int $id)
    {
        $value = $this->getCharValueData($id);
        if ($value->isEmpty()) {
            return response()->json($this->error, 400);
        }
        return response()->json($value->first(), 200);
    }

    public function deteleChar(int $id)
    {
        $charBase = $this->getCharBaseData($id);
        if ($charBase->isEmpty()) {
            return response()->json($this->error, 400);
        }
        $charValue = $this->getCharValueData($id);
        if ($charValue->isEmpty()) {
            return response()->json($this->error, 400);
        }
        $charBase->first()->delete();
        // $charValue->first()->delete();
        return response()->json();
    }


    private function getCharBaseData(int $id)
    {
        return CharBase::where('id', $id)->where('user_id', auth()->user()->id)->get();
    }

    private function getCharValueData(int $id)
    {
        return CharValue::where('char_id', $id)->where('user_id', auth()->user()->id)->get();
    }
}

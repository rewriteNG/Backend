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
        $this->middleware('auth:api'); //TODO after finish uncomment
    }


    public function index()
    {
        $char = CharBase::where('user_id', auth()->user()->id)->get();
        if ($char->isEmpty()) {
            return response()->json($this->error, 400);
        }
        return response()->json($char, 200);
    }

    public function createChar(Request $request)
    {
        $valid = $this->createValidate($request->all());
        if ($valid !== null) {
            return response()->json($valid, 400);
        }
        $userid = auth()->user()->id;
        $charBase = new CharBase();
        $charBase->user_id = $userid;
        $charBase->name = $request['name'];
        $charBase->age = $request['age'];
        $charBase->home_village = CharBase::HOME_VILLAGE[0];
        $charBase->current_location = $charBase->home_village;
        $charBase->save();
        $charBase->refresh();
        $charValue = new CharValue();
        $charValue->user_id = $userid;
        $charValue->char_id = $charBase->id;
        $charValue->save();
        Log::debug($charBase);
        return response()->json();
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

    /**
     * validates input for registration, when error it returns an array, else null
     * @param array $request
     * @return null|array
     */
    protected function createValidate(array $request)
    {
        $validator = Validator::make($request, [
            'name' => 'required|min:4',
            'age' => 'required|numeric|min:12|max:21',
        ]);
        if ($validator->fails()) {
            return ['message' => $validator->getMessageBag()];
        }
        // if (User::where('name', $request['name'])->first() !== null) {
        //     return ['message' => ['name' => ['name already exists']]];
        // }
        // if (User::where('email', $request['email'])->first() !== null) {
        //     return ['message' => ['email' => ['email already exists']]];
        // }
        return null;
    }
}

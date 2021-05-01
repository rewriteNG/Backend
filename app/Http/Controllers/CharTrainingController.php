<?php

namespace App\Http\Controllers;

use App\Moduls\Character\CharTraining;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CharTrainingController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api'); //TODO after finish uncomment
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $valid = $this->createValidate($request->all());
        if ($valid !== null) {
            return response()->json($valid, 400);
        }
        $this->destroy($request['id']);
        CharTraining::create([
            'user_id' => auth()->user()->id,
            'char_id' => $request['id'],
            'char_value' => $request["char_value"],
            'days' => $request['days']
        ]);
        return response()->json();
    }

    /**
     * Display the specified resource.
     *
     * @param  App\Moduls\Character\CharTraining  $char_training
     * @return \Illuminate\Http\Response
     */
    public function show(CharTraining $char_training)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Moduls\Character\CharTraining  $char_training
     * @return \Illuminate\Http\Response
     */
    public function edit(CharTraining $char_training)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Moduls\Character\CharTraining  $char_training
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CharTraining $char_training)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Moduls\Character\CharTraining  $char_training
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $char_id)
    {
        $value = CharTraining::where('char_id', $char_id)->where('user_id', auth()->user()->id)->get();
        if (!$value->isEmpty()) {
            $value->delete();
        }
        return response()->json();
    }

    public function getBaseTrainValue(int $id)
    {
        $out = [];
        $base_value = 1.35;
        $base_stamina = 7.5;
        $base_chakra = 3.75;
        $out = [
            'str' => $base_value,
            'def' => $base_value,
            'speed' => $base_value,
            'chakra' => $base_chakra,
            'stamina' => $base_stamina,
        ];
        return response()->json($out, 200);
    }

    /**
     * validates input for registration, when error it returns an array, else null
     * @param array $request
     * @return null|array
     */
    protected function createValidate(array $request)
    {
        $validator = Validator::make($request, [
            'char_id' => 'required',
            'char_value' => 'required',
            'days' => 'required|min:1'
        ]);
        if ($validator->fails()) {
            return ['message' => $validator->getMessageBag()];
        }
        return null;
    }
}

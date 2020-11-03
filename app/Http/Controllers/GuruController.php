<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GuruModel;
use Illuminate\Support\Facades\Validator;

class GuruController extends Controller
{

    // Create
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama'=>'required',
            'gender'=>'required',
            'nik'=>'required',
            'tanggal_lahir'=>'required'
        ]);

        if ($validator->fails())
        {
            return Response()->json($validator->errors());
        }

        $save = GuruModel::create([
            'nama'=>$request->nama,
            'gender'=>$request->gender,
            'nik'=>$request->nik,
            'tanggal_lahir'=>$request->tanggal_lahir
        ]);
        
        if ($save)
        {
            return Response()->json(['status'=>1]);
        } else
        {
            return Response()->json(['status'=>0]);
        }
    }

    // Update 
    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama'=>'required',
            'gender'=>'required',
            'nik'=>'required',
            'tanggal_lahir'=>'required'
        ]);

        if ($validator->fails())
        {
            return Response()->json($validator->errors());
        }

        $change = GuruModel::where('id', $id)->update([
            'nama'=>$request->nama,
            'gender'=>$request->gender,
            'nik'=>$request->nik,
            'tanggal_lahir'=>$request->tanggal_lahir
        ]);

        if ($change)
        {
            return Response()->json(['status'=>1]);
        } else
        {
            return Response()->json(['status'=>0]);
        }
    }

    // Delete
    public function destroy($id)    
    {
        $delete = GuruModel::where('id', $id)->delete();

        if ($delete)
        {
            return Response()->json(['status'=>1]);
        } else
        {
            return Response()->json(['status'=>0]);
        }
    }
}

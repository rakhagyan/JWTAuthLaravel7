<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiswaModel;
use Illuminate\Support\Facades\Validator;

class SiswaController extends Controller
{

    // Create
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama'=>'required',
            'tanggal_lahir'=>'required',
            'gender'=>'required',
            'alamat'=>'required',
            'nik'=>'required'
        ]);

        if ($validator->fails())
        {
            return Response()->json($validator->errors());
        }

        $save = SiswaModel::create([
            'nama'=>$request->nama,
            'tanggal_lahir'=>$request->tanggal_lahir,
            'gender'=>$request->gender,
            'alamat'=>$request->alamat,
            'nik'=>$request->nik
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
            'tanggal_lahir'=>'required',
            'gender'=>'required',
            'alamat'=>'required',
            'nik'=>'required'
        ]);

        if ($validator->fails())
        {
            return Response()->json($validator->errors());
        }

        $change = SiswaModel::where('id', $id)->update([
            'nama'=>$request->nama,
            'tanggal_lahir'=>$request->tanggal_lahir,
            'gender'=>$request->gender,
            'alamat'=>$request->alamat,
            'nik'=>$request->nik
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
        $delete = SiswaModel::where('id', $id)->delete();

        if ($delete)
        {
            return Response()->json(['status'=>1]);
        } else
        {
            return Response()->json(['status'=>0]);
        }
    }
}

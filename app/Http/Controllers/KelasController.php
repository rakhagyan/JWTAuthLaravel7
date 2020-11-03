<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KelasModel;
use Illuminate\Support\Facades\Validator;

class KelasController extends Controller
{

    // Create
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama'=>'required',
            'kelompok'=>'required'
        ]);

        if ($validator->fails())
        {
            return Response()->json($validator->errors());
        }

        $save = KelasModel::create([
            'nama'=>$request->nama,
            'kelompok'=>$request->kelompok
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
            'kelompok'=>'required'
        ]);

        if ($validator->fails())
        {
            return Response()->json($validator->errors());
        }

        $change = KelasModel::where('id', $id)->update([
            'nama'=>$request->nama,
            'kelompok'=>$request->kelompok
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
        $delete = KelasModel::where('id', $id)->delete();

        if ($delete)
        {
            return Response()->json(['status'=>1]);
        } else
        {
            return Response()->json(['status'=>0]);
        }
    }
}

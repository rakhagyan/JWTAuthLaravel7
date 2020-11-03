<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MapelModel;
use Illuminate\Support\Facades\Validator;

class MapelController extends Controller
{

    // Create
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama'=>'required',
            'kelompok'=>'required',
            'deskripsi'=>'required'
        ]);

        if ($validator->fails())
        {
            return Response()->json($validator->errors());
        }

        $save = MapelModel::create([
            'nama'=>$request->nama,
            'kelompok'=>$request->kelompok,
            'deskripsi'=>$request->deskripsi
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
            'kelompok'=>'required',
            'deskripsi'=>'required'
        ]);

        if ($validator->fails())
        {
            return Response()->json($validator->errors());
        }

        $change = MapelModel::where('id', $id)->update([
            'nama'=>$request->nama,
            'kelompok'=>$request->kelompok,
            'deskripsi'=>$request->deskripsi
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
        $delete = MapelModel::where('id', $id)->delete();

        if ($delete)
        {
            return Response()->json(['status'=>1]);
        } else
        {
            return Response()->json(['status'=>0]);
        }
    }
}

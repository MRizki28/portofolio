<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ProjectModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Ramsey\Uuid\Uuid;

class ProjectController extends Controller
{
    public function getAllData()
    {
        $data = ProjectModel::all();
        return response()->json([
            'code' => 200,
            'message' => 'success get all data',
            'data' => $data
        ]);
    }

    public function createData(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'title' => 'required',
            'link' => 'required',
            'image' => 'required',
            'date' => 'required',
            'tecnologi1' => 'required',
            'tecnologi2' => 'required',
            'tecnologi3' => 'required'
        ]);


        if ($validation->fails()) {
            return response()->json([
                'code' => 401,
                'message' => 'check your validation',
                'errors' => $validation->errors()
            ]);
        }

        try {
            $data = new ProjectModel;
            $data->uuid = Uuid::uuid4();
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}

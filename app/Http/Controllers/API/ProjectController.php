<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ProjectModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Ramsey\Uuid\Uuid;

use Illuminate\Support\Str;

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
            $data->uuid = Uuid::uuid4()->toString();
            $data->title = $request->input('title');
            $data->link = $request->input('link');
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $extention = $file->getClientOriginalExtension();
                $filename = 'PROJECT-' . Str::random(15) . '.' . $extention;
                Storage::makeDirectory('uploads/project/');
                $file->move(public_path('uploads/project/'), $filename);
                $data->image = $filename;
            }
            $data->date = $request->input('date');
            $data->tecnologi1 = $request->input('tecnologi1');
            $data->tecnologi2 = $request->input('tecnologi2');
            $data->tecnologi3 = $request->input('tecnologi3');
            $data->save();
        } catch (\Throwable $th) {
            return response()->json([
                'code' => 402,
                'message' => 'failed',
                'errors' => $th->getMessage()
            ]);
        }

        return response()->json([
            'code' => 200,
            'message' => 'success create data',
            'data' => $data
        ]);
    }
}

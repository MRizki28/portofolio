<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ProjectModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
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

    public function getDataByUuid($uuid)
    {
        $data = ProjectModel::where('uuid', $uuid)->first();
        return response()->json([
            'code' => 200,
            'message' => 'success ge data by uuid',
            'data' => $data
        ]);
    }

    public function updateDataByUuid(Request $request, $uuid)
    {
        try {
            $data = ProjectModel::where('uuid', $uuid)->firstOrFail();
            $data->title = $request->input('title');
            $data->link = $request->input('link');
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $extention = $file->getClientOriginalExtension();
                $filename = 'PROJECT-' . Str::random(15) . '.' . $extention;
                Storage::makeDirectory('uploads/project/');
                $file->move(public_path('uploads/project/'), $filename);
                $old_file_path = public_path('uploads/project/') . $data->image;
                if (file_exists($old_file_path)) {
                    unlink($old_file_path);
                }
                $data->image = $filename;
            }
            $data->date = $request->input('date');
            $data->tecnologi1 = $request->input('tecnologi1');
            $data->tecnologi2 = $request->input('tecnologi2');
            $data->tecnologi3 = $request->input('tecnologi3');
            $data->save();
        } catch (\Throwable $th) {
            return response()->json([
                'code' => 401,
                'message' => 'failed update data',
                'errors' => $th->getMessage()
            ]);
        }

        return response()->json([
            'code' => 200,
            'message' => 'success update data',
            'data' => $data
        ]);
    }

    public function deleteData($uuid)
    {
        try {
            $data = ProjectModel::where('uuid' , $uuid)->first();
            $location = 'uploads/project/' . $data->image;
            $data->delete();
            if ((File::exists($location))) {
                File::delete($location);
            }

            return response()->json([
                'code' => 200,
                'message' => 'success delete'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'failed delete',
                'errors' => $th->getMessage()
            ]);
        }
    }
}

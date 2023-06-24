<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\CertificateModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Str;

class CertificateController extends Controller
{
    public function getAllData()
    {
        $data = CertificateModel::all();
        return response()->json([
            'code' => 200,
            'message' => 'Success get data certificate' ,
            'data' => $data
        ]);
    }

    public function createData(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'title' => 'required',
            'image' => 'required',
            'date_publish' => 'required',
            'date_expaire' => 'required',
        ]);


        if ($validation->fails()) {
            return response()->json([
                'code' => 401,
                'message' => 'check your validation',
                'errors' => $validation->errors()
            ]);
        }

        try {
            $data = new CertificateModel;
            $data->uuid = Uuid::uuid4()->toString();
            $data->title = $request->input('title');
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $extention = $file->getClientOriginalExtension();
                $filename = 'CERTIFICATE-' . Str::random(15). '.' . $extention;
                Storage::makeDirectory('uploads/certificate/');
                $file->move(public_path('uploads/certificate/'), $filename);
                $data->image =$filename;
            }
            $data->date_publish = $request->input('date_publish');
            $data->date_expaire = $request->input('date_expaire');
            $data->learn1 = $request->input('learn1');
            $data->learn2 = $request->input('learn2');
            $data->learn3 = $request->input('learn3');
            $data->save();
        } catch (\Throwable $th) {
            return response()->json([
                'code' => 401,
                'message' => 'failed add certificate',
                'errors' => $th->getMessage()
            ]);
        }


        return response()->json([
            'code' => 200,
            'message' => 'success upload certificate' ,
            'data' => $data
        ]);
    }

    public function getDataByUuid ($uuid)
    {

        if (!Uuid::isValid($uuid)) {
            return response()->json([
                'message' => 'uuid invalid'
            ]);
        }

        $data = CertificateModel::where('uuid' , $uuid)->first();
        if (!$data) {
            return response()->json([
                'code' => 404,
                'message' => 'data not found'
            ]);
        }else{
            return response()->json([
                'code' => 200,
                'message' => 'sucess get data by uuid',
                'data' => $data
            ]);
        }
    }
}

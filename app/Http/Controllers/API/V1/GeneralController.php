<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class GeneralController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'file' => 'required',
            'path' => 'required',
        ]);

        if ($validatedData->fails()) {
            return $this->errorStatus($validatedData->errors()->first());
        }

        if ($request->has('old_file')) {
            File::delete($request->old_file);
        }

        return $this->respondWithItem(upload($request->file, $request->path));
    } 
} 
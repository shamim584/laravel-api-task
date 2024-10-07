<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentInfoRequest;
use App\Models\StudentInfo;
use App\Services\StudentInfoService;
use App\Http\Resources\StudentInfoResource;
use App\Http\Resources\StudentInfoCollection;
use Illuminate\Http\Request;
use App\Http\Requests\StudentInfoRequestStudentInfoRequest;
use Illuminate\Validation\Rule;

class StudentInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $studentInfo = new StudentInfoCollection(StudentInfo::all());
        return response()->json(['status' => true, 'data' => $studentInfo, 'message' => 'Success']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StudentInfoRequest $request)
    {
        try {
            $student = (new StudentInfoService())->createStudent($request);
            return response()->json(['status' => true, 'data' => $student, 'message' => 'Student info created success'], 200);
        } catch (\Throwable $th) {
            return response()->json(['status' => false, 'data' => '', 'message' => $th->getMessage()], 422);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(StudentInfo $student)
    {
        // dd($student);
        try {
            $info = new StudentInfoResource($student);
            return response()->json(['status' => true, 'data' => $info, 'message' => 'success']);
        } catch (\Throwable $th) {
            return response()->json(['status' => false, 'data' => '', 'message' => $th->getMessage()], 422);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StudentInfo $studentInfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StudentInfoRequest $request, StudentInfo $student)
    {
        try {
            $validatedData = $request->validated();

            $student->update($validatedData);
            // $student = StudentInfo::where('id', $id)->update($validatedData);

            return response()->json(['status' => true, 'data' => (new StudentInfoResource($student)), 'message' => 'Student info updated successfully']);
        } catch (\Throwable $th) {
            return response()->json(['status' => false, 'data' => '', 'message' => $th->getMessage()], 422);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudentInfo $studentInfo, $id)
    {
        try {
            $studentInfo->find($id)->delete();
            return response()->json(['status' => true, 'data' => $studentInfo, 'message' => 'Student info deleted successfully']);
        } catch (\Throwable $th) {
            return response()->json(['status' => false, 'data' => '', 'message' => $th->getMessage()], 422);
        }
    }
}

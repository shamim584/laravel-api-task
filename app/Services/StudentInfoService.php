<?php

namespace App\Services;

use App\Http\Resources\StudentInfoResource;
use App\Models\StudentInfo;

class StudentInfoService
{
    /**
     * @param $request
     * @return StudentInfoResource
     */
    public function createStudent($request): StudentInfoResource
    {
        $studentInfo = new StudentInfo;
        $studentInfo->full_name = $request->full_name;
        $studentInfo->email_id = $request->email_id;
        $studentInfo->phone_number = $request->phone_number;
        $studentInfo->description = $request->description;
        $studentInfo->save();
        return new StudentInfoResource($studentInfo);
    }
}
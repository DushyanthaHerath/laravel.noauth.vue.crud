<?php

namespace App\Http\Controllers\API;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\EmployeeCollecton;
use App\Http\Resources\EmployeeResource;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return (EmployeeCollecton::collection(Employee::all()))
        ->response()->setStatusCode(201);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required',
            'epf' => 'required',
            'address' => 'required'
        ]);
        
        if($validation->fails()) {
            $validationErrors = $validation->errors();
            
            return response()->json([
                'errors' => $validationErrors
            ])->setStatusCode(400);
        } else {
            $employee = Employee::create($request->all());
            
            return (new EmployeeResource($employee))
            ->response()->setStatusCode(201);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return (new EmployeeResource($employee))->response()->setStatusCode(200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $validation = Validator::make([
            'name' => 'required',
            'epf' => 'required',
            'address' => 'required'
        ]);
        
        if($validation->fails()) {
            $validationErrors = $validation->errors();
            
            return response()->json([
                'errors' => $validationErrors
            ])->setStatusCode(400);
        } else {
            $employee->update($request->all());
            
            return (new EmployeeResource($employee))
            ->response()->setStatusCode(201);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return response()->json(null, 204);
    }
}

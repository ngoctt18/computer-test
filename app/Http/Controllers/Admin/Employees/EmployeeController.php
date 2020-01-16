<?php

namespace App\Http\Controllers\Admin\Employees;

use App\Models\Admin\User;
use App\Http\Requests\Admin\StoreEmployeeRequest;
use App\Http\Requests\Admin\UpdateEmployeeRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees =  User::whereIn('rule', array(1, 2))->orderBy('status','asc')->latest()->get();
        return view('admin.employees.index', compact(['employees']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeeRequest $request)
    {
        // $data = $request->only(['name', 'username', 'code', 'gender', 'email', 'phone', 'password', 'address', 'birthday',]);
        $data = $request->all();
        $data['rule'] = 2;
        // return $data;
        User::create($data);

        session()->flash('msg.success', 'Thêm mới thành công');
        return redirect()->route('admin.employees.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $employee)
    {
        return view('admin.employees.edit', compact(['employee']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployeeRequest $request, User $employee)
    {
        $request['password'] = bcrypt($request['password']);
        $employee->update($request->all());
        session()->flash('msg.success', 'Cập nhật thành công');
        return redirect()->route('admin.employees.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $employee)
    {
        $employee->delete();

        session()->flash('msg.success', 'Xóa thành công');
        return redirect()->route('admin.employees.index');
    }
}

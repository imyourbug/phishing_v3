<?php

namespace App\Http\Controllers;

use App\Models\Domain;
use Illuminate\Http\Request;
use Toastr;

class DomainController extends Controller
{
    public function create()
    {
        return view('admin.domain.add', [
            'title' => 'Thêm domain',
            'domains' => Domain::all()
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'domain' => 'required|string',
        ]);
        try {
            Domain::create($data);
            Toastr::success('Tạo domain thành công','Thành công');
        } catch (Throwable $e) {
            Toastr::error('Tạo domain thất bại', 'Thất bại');
        }

        return redirect()->back();
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'id' => 'required|int',
            'domain' => 'required|string',
        ]);
        $update = Domain::where('id', $data['id'])->update([
            'domain' => $data['domain'],
        ]);
        if ($update) {
            Toastr::success('Cập nhật thành công','Thành công');
        } else Toastr::error('Cập nhật thất bại', 'Thất bại');

        return redirect()->back();
    }

    public function delete($id)
    {
        $delete = Domain::firstWhere('id', $id)->delete();
        if ($delete) {
            Toastr::success('Xóa thành công','Thành công');
        } else Toastr::error('Xóa thất bại', 'Thất bại');

        return redirect()->back();
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            return response()->json([
                'status' => 0,
                'domains' => Domain::all()
            ]);
        }

        return view('admin.domain.list', [
            'title' => 'Danh sách domain',
            'domains' => Domain::all()
        ]);
    }

    public function show($id)
    {
        return view('admin.domain.edit', [
            'title' => 'Chi tiết domain',
            'domain' => Domain::firstWhere('id', $id),
        ]);
    }

    public function destroy($id)
    {
        try {
            Domain::firstWhere('id', $id)->delete();

            return response()->json([
                'status' => 0,
            ]);
        } catch (Throwable $e) {
            return response()->json([
                'status' => 1,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function getTypeByParentId(Request $request)
    {
        return response()->json([
            'status' => 0,
            'data' => Domain::where('parent_id', $request->id)
                ->get()
        ]);
    }
}

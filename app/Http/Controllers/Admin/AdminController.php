<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        // Search
        $search = $request->input('search');

        // Query
        $query = User::where('role', 'admin');

        // Search by email
        if (!empty($search)) {
            $query->where('email', 'LIKE', '%' . $search . '%');
        }

        // Pagination
        $admins = $query->paginate(10);

        return view('admin.index', compact('admins'));
    }
    // DELETE
    public function destroy($id)
    {
        $admin = User::findOrFail($id);
        $admin->delete();

        return redirect()->route('admin.index')->with('success', 'Deleted successfully');
    }
}
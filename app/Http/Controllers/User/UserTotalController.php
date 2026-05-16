<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; // បន្ថែមជួរនេះសម្រាប់ចាប់ទិន្នន័យ Search
use App\Models\User;

class UserTotalController extends Controller
{
    public function index(Request $request)
    {
        // ចាប់យកពាក្យគន្លឹះពីប្រអប់ Input ឈ្មោះ 'search'
        $search = $request->input('search');

        // បង្កើត Query មូលដ្ឋានសម្រាប់ទាញតែគណនី 'user'
        $query = User::where('role', 'user');

        // ប្រសិនបើមានការវាយស្វែងរក
        if (!empty($search)) {
            $query->where('email', 'LIKE', '%' . $search . '%');
        }

        // បង្ហាញទិន្នន័យម្តង ១០ នាក់
        $users = $query->paginate(10);

        return view('user.index', compact('users'));
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user.index')->with('success', 'User deleted successfully');
    }
}

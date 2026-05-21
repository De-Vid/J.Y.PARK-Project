<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category; // 1. កុំភ្លេច use Category Model
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = Product::withCount('categories');

        if (!empty($search)) {
            $query->where('name', 'LIKE', "%{$search}%");
        }

        $products = $query->paginate(10);
        return view('admin.product.index', compact('products'));
    }

    // ២. បន្ថែម Function សម្រាប់បង្ហាញ Form បង្កើត Product ថ្មី
    public function create()
    {
        // ទាញយក categories ទាំងអស់ដើម្បីយកទៅបង្ហាញឱ្យគេរើសក្នុង Form
        $categories = Category::all();
        return view('admin.product.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'name'         => 'required|string|max:255',
            'price'        => 'required|numeric|min:0',
            'stock'        => 'required|integer|min:0',
            'categories'   => 'required|array',
            'categories.*' => 'exists:categories,id',

            'image'  => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'image1' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'image2' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Default image names
        $image  = null;
        $image1 = null;
        $image2 = null;

        // Upload image
        if ($request->hasFile('image')) {

            $image = time() . '_image.' .
                $request->image->extension();

            $request->image->move(
                public_path('image'),
                $image
            );
        }

        // Upload image1
        if ($request->hasFile('image1')) {

            $image1 = time() . '_image1.' .
                $request->image1->extension();

            $request->image1->move(
                public_path('image'),
                $image1
            );
        }

        // Upload image2
        if ($request->hasFile('image2')) {

            $image2 = time() . '_image2.' .
                $request->image2->extension();

            $request->image2->move(
                public_path('image'),
                $image2
            );
        }

        // Create Product
        $product = Product::create([
            'name'   => $request->name,
            'price'  => $request->price,
            'stock'  => $request->stock,
            'image'  => $image,
            'image1' => $image1,
            'image2' => $image2,
        ]);

        // Sync Categories
        $product->categories()->sync($request->categories);

        return redirect()
            ->route('admin.product.index')
            ->with('success', 'Product created successfully!');
    }

    public function edit($id)
    {
        // ស្វែងរក Product ទៅតាម ID បើរកមិនឃើញឱ្យចេញ Error 404
        $product = Product::findOrFail($id);

        // ទាញយក categories ទាំងអស់ដើម្បីបង្ហាញឱ្យគេរើស
        $categories = Category::all();

        return view('admin.product.edit', compact('product', 'categories'));
    }

    // ២. ទទួលទិន្នន័យពី Form Edit យកទៅកែប្រែក្នុង Database (Update)
    public function update(Request $request, $id)
    {
        // Validation ពិនិត្យផ្ទៀងផ្ទាត់ទិន្នន័យ
        $request->validate([
            'name'        => 'required|string|max:255',
            'price'       => 'required|numeric|min:0',
            'stock'        => 'required|integer|min:0',
            'categories'  => 'required|array',
            'categories.*' => 'exists:categories,id',
        ]);

        // ស្វែងរក Product ដែលត្រូវកែប្រែ
        $product = Product::findOrFail($id);

        // ធ្វើបច្ចុប្បន្នភាព (Update) ទិន្នន័យ Product
        $product->update([
            'name'  => $request->name,
            'price' => $request->price,
            'stock'  => $request->stock,
        ]);

        // ធ្វើបច្ចុប្បន្នភាព Categories ដែលបានភ្ជាប់ជាមួយ Product នេះ (លុបអាចាស់ចោល ជំនួសអាថ្មីចូល)
        $product->categories()->sync($request->categories);

        // បង្វែរត្រឡប់ទៅទំព័រដើមវិញជាមួយសារជោគជ័យ
        return redirect()->route('admin.product.index')->with('success', 'Product updated successfully!');
    }
    public function destroy($id)
    {
        // ស្វែងរក Product ទៅតាម ID បើរកមិនឃើញឱ្យចេញ Error 404
        $product = Product::findOrFail($id);

        // ផ្ដាច់ទំនាក់ទំនង Categories ទាំងអស់ចេញពី Product នេះជាមុនសិន (ជៀសវាងទិន្នន័យទាក់ទងគ្នានៅសល់ក្នុង table កណ្តាល)
        $product->categories()->detach();

        // លុប Product ចេញ
        $product->delete();

        // បង្វែរត្រឡប់ទៅទំព័រដើមវិញជាមួយសារជោគជ័យ
        return redirect()->route('admin.product.index')->with('success', 'Product deleted successfully!');
    }
}
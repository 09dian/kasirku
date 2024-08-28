<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('app.category', [
            'title' => 'Kategori',
            'category'=>Category::all(),
        ]);
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
    public function store(Request $request)
{
    $validate = $request->validate([
        'category' => 'required|max:255',
        'slug' => 'required|max:255',
    ]);

    // Buat slug dari input category
    $slug = Str::slug($request->input('category'));

    // Cek apakah slug sudah ada di database
    $originalSlug = $slug;
    $count = 1;

    while (Category::where('slug', $slug)->exists()) {
        // Jika slug sudah ada, tambahkan angka di belakangnya
        $slug = $originalSlug . '-' . $count;
        $count++;
    }

    // Masukkan slug yang unik ke dalam validasi data
    $validate['slug'] = $slug;

    // Simpan data ke database
    Category::create($validate);

    return redirect()->route('category.index')->with('success', 'Kategori berhasil disimpan!');
}


    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }
    public function update(Request $request, Category $category)
{
    // Validasi status (opsional, jika perlu)
    $request->validate([
        'status' => 'required|boolean',
    ]);

    // Update status kategori
    $category->status = $request->input('status');
    $category->save();
    return redirect()->route('category.index')->with('success', 'Berhasil di Update');

}

    
    
    
    
    

     
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('category.index')->with('success', 'Data berhasil dihapus!');
    }
}

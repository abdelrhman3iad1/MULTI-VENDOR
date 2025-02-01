<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use View;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view("Admin.Dashboard.Categories.index",compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $parents = Category::all();
        return view("Admin.Dashboard.Categories.create",compact("parents"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->merge([
            "slug" => Str::slug($request->post("name"))
        ]);
        Category::create($request->all());
        
        return redirect()->route('dashboard.categories.index')->with("success","Category Added Successfully .");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try{
            $category = Category::findOrFail($id);

            
            // SELECT * FROM CATEGORIES WHERE id <> $id
            // AND 
            // (parent_id IS NULL OR parent_id <> $id)
            $parents = 
                Category::where('id' , "<>" , $id)
                ->where(function($query) use($id){
                $query->whereNull("parent_id")
                ->orWhere("parent_id","<>",$id);
                })
            ->get();

        }catch(Exception $e){
            return redirect()->route("dashboard.categories.index")->with("info","Category don't exist!");
        }
        return view("Admin.Dashboard.Categories.edit",compact("category","parents"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::findOrFail($id);
        $category->update($request->all());
        return redirect()->route("dashboard.categories.index")->with("success","Category updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Category::destroy($id);
        return redirect()->route("dashboard.categories.index")->with("success","Category deleted successfully!");

    }
}

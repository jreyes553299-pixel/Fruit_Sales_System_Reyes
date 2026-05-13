<?php

namespace App\Http\Controllers;

use App\Models\fruit;
use Illuminate\Http\Request;

class FruitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fruits = fruit::all();
        return view('fruits.index', compact('fruits'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('fruits.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock_quantity' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'availability' => 'required|string',
        ]);

        fruit::create($validated);

        return redirect()->route('fruits.index')->with('success', 'Fruit added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(fruit $fruit)
    {
        return view('fruits.show', compact('fruit'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(fruit $fruit)
    {
        return view('fruits.edit', compact('fruit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, fruit $fruit)
    {
         $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'stock_quantity' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'availability' => 'required|string',
        ]);

        $fruit->update($validated);

        return redirect()->route('fruits.index')->with('success', 'Fruit updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(fruit $fruit)
    {
        $fruit->delete();
        return redirect()->route('fruits.index')->with('success', 'Fruit deleted successfully.');
    }

    public function reports(Request $request)
    {
        $query = fruit::query();

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        if ($request->filled('availability')) {
            $query->where('availability', $request->availability);
        }

        $fruits = $query->get();
        $categories = fruit::select('category')->distinct()->pluck('category');

        return view('fruits.reports', compact('fruits', 'categories'));
    }

    public function exportPdf(Request $request)
    {
        $query = fruit::query();
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }
        if ($request->filled('availability')) {
            $query->where('availability', $request->availability);
        }
        $fruits = $query->get();

        return view('fruits.print', compact('fruits'));
    }

    public function exportExcel(Request $request)
    {
        $query = fruit::query();
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }
        if ($request->filled('availability')) {
            $query->where('availability', $request->availability);
        }
        $fruits = $query->get();

        $filename = "fruits_report.csv";
        $handle = fopen('php://output', 'w');
        
        ob_start();
        fputcsv($handle, ['ID', 'Name', 'Category', 'Price', 'Stock Quantity', 'Description', 'Availability']);

        foreach ($fruits as $fruit) {
            fputcsv($handle, [
                $fruit->id,
                $fruit->name,
                $fruit->category,
                $fruit->price,
                $fruit->stock_quantity,
                $fruit->description,
                $fruit->availability,
            ]);
        }
        
        fclose($handle);
        $csvData = ob_get_clean();

        return response($csvData)
            ->header('Content-Type', 'text/csv')
            ->header('Content-Disposition', 'attachment; filename="' . $filename . '"');
    }
}

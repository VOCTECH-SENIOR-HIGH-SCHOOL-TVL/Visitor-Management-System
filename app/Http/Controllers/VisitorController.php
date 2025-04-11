<?php

namespace App\Http\Controllers;

use App\Models\Visitor;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB; 
class VisitorController extends Controller
{
    public function create()
    {
        return view('visitor.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'contact_number' => 'required|string|max:15',
            'address' => 'required|string',
            'who_to_meet' => 'required|string|max:255',
            'reason' => 'required|string',
            'time_in' => 'required|date_format:H:i',
            'time_out' => 'required|date_format:H:i',
        ]);

        Visitor::create($request->all());

        return redirect()->route('visitors.index')->with('success', 'Visitor registered successfully!');
    }

    public function index()
{
    $visitors = Visitor::paginate(10); 
    return view('visitor.index', compact('visitors'));
}

public function today()
{
    $today = now()->format('Y-m-d');
    $visitors = Visitor::whereDate('created_at', $today)->paginate(10); 
    return view('visitor.index', compact('visitors'));
}

        public function edit($id)
    {
        $visitor = Visitor::findOrFail($id);
        return view('visitor.edit', compact('visitor'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'contact_number' => 'required|string|max:15',
            'address' => 'required|string',
            'who_to_meet' => 'required|string|max:255',
            'reason' => 'required|string',
            'time_in' => 'required|date_format:H:i',
            'time_out' => 'required|date_format:H:i',
        ]);

        $visitor = Visitor::findOrFail($id);
        $visitor->update($request->all());

        return redirect()->route('visitors.index')->with('success', 'Visitor updated successfully!');
    }
    public function destroy($id)
    {
        $visitor = Visitor::findOrFail($id);
        $visitor->delete();

        return redirect()->route('visitors.index')->with('success', 'Visitor deleted successfully!');
    }

        public function dashboard()
    {
        $totalVisitors = Visitor::count();
        $totalVisitorsToday = Visitor::whereDate('created_at', Carbon::today())->count();

        return view('dashboard', compact('totalVisitors', 'totalVisitorsToday'));
    }

}
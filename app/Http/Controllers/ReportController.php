<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;

class ReportController extends Controller
{
    public function submitReport(Request $request)
{
    \Log::info($request->all());  // Log all incoming request data
    //dd($request->all());  // Dump and die to inspect the request data
    
    $validatedData = $request->validate([
        'area' => 'required|string',
        'longitude' => 'nullable|numeric',
        'latitude' => 'nullable|numeric',
        'location_details' => 'nullable|string',
        'infestation_details' => 'nullable|string',
        'image_url' => 'nullable|string',
    ]);

    $imagePath = null;
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('reports', 'public');
    }

    $report = new Report();
    $report->area = $validatedData['area'];
    $report->longitude = $validatedData['longitude'];
    $report->latitude = $validatedData['latitude'];
    $report->location_details = $validatedData['location_details'];
    $report->infestation_details = $validatedData['infestation_details'];
    $report->image_url = $imagePath;
    $report->save();

    return response()->json(['message' => 'Report submitted successfully!'], 200);
}


    public function getAllReports()
    {
        // Fetch all reports from the database
        $reports = Report::all();

        // Return the reports as JSON
        return response()->json($reports, 200);
    }

    public function getReportById($id)
    {
        $report = Report::findOrFail($id);
        return response()->json($report, 200);
    }
}

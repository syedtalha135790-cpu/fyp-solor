<?php

namespace App\Http\Controllers;

use App\Models\SolarEstimation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SolarEstimatorController extends Controller
{
    /**
     * Show the solar estimator form
     */
    public function show()
    {
        return view('frontend.solar-estimator');
    }

    /**
     * Store solar estimation data
     */
    public function store(Request $request)
    {
        // Validate all form inputs
        $validated = $request->validate([
            // Step 1: Electricity Usage
            'monthly_kwh' => 'required|numeric|min:50|max:5000',
            'monthly_bill' => 'required|numeric|min:500|max:100000',
            'connection_type' => 'required|in:single,three',

            // Step 2: Location & Roof
            'city' => 'required|string|max:255',
            'peak_sun_hours' => 'required|numeric|min:3|max:8',
            'roof_type' => 'required|string|max:255',
            'roof_area' => 'required|numeric|min:10|max:1000',
            'roof_direction' => 'required|string|max:255',

            // Step 3: Calculations (Auto-calculated)
            'system_size' => 'required|numeric|min:1|max:100',
            'daily_generation' => 'required|numeric|min:1',
            'monthly_generation' => 'required|numeric|min:1',
            'panel_count' => 'required|integer|min:1',
            'inverter_capacity' => 'required|numeric|min:1',
            'battery_option' => 'required|in:no_battery,3kwh,5kwh,10kwh,15kwh',
            'battery_capacity' => 'nullable|numeric|min:0',

            // Step 4: Package Selection
            'selected_panel' => 'required|string|max:255',
            'panel_price' => 'required|numeric|min:0',
            'selected_inverter' => 'required|string|max:255',
            'inverter_price' => 'required|numeric|min:0',
            'selected_battery' => 'nullable|string|max:255',
            'battery_price' => 'nullable|numeric|min:0',
            'installation_service_cost' => 'required|numeric|min:0',
            'warranty_service_cost' => 'nullable|numeric|min:0',
            'total_price' => 'required|numeric|min:0',

            // Step 5: Summary & Savings
            'estimated_monthly_savings' => 'required|numeric|min:0',
            'estimated_annual_savings' => 'required|numeric|min:0',

            // Contact Information
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'contact_method' => 'required|in:email,phone,whatsapp',
            'additional_message' => 'nullable|string|max:1000',
        ], [
            'monthly_kwh.required' => 'Monthly electricity usage is required',
            'monthly_kwh.numeric' => 'Monthly usage must be a number',
            'monthly_kwh.min' => 'Monthly usage must be at least 50 kWh',
            'monthly_kwh.max' => 'Monthly usage cannot exceed 5000 kWh',
            
            'monthly_bill.required' => 'Monthly bill amount is required',
            'monthly_bill.numeric' => 'Monthly bill must be a number',
            
            'connection_type.required' => 'Please select a connection type',
            'connection_type.in' => 'Invalid connection type selected',
            
            'city.required' => 'City selection is required',
            'city.string' => 'City must be text',
            
            'roof_type.required' => 'Roof type is required',
            'roof_area.required' => 'Roof area is required',
            'roof_area.numeric' => 'Roof area must be a number',
            'roof_area.min' => 'Roof area must be at least 10 sq meters',
            
            'name.required' => 'Your name is required',
            'name.string' => 'Name must be text',
            'name.max' => 'Name cannot exceed 255 characters',
            
            'email.required' => 'Email address is required',
            'email.email' => 'Please enter a valid email address',
            
            'phone.required' => 'Phone number is required',
            'phone.string' => 'Phone must be valid',
            'phone.max' => 'Phone number is too long',
            
            'contact_method.required' => 'Please select preferred contact method',
        ]);

        try {
            // Create the solar estimation record
            $estimation = SolarEstimation::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'],
                'monthly_kwh' => $validated['monthly_kwh'],
                'monthly_bill' => $validated['monthly_bill'],
                'connection_type' => $validated['connection_type'],
                'city' => $validated['city'],
                'peak_sun_hours' => $validated['peak_sun_hours'],
                'roof_type' => $validated['roof_type'],
                'roof_area' => $validated['roof_area'],
                'roof_direction' => $validated['roof_direction'] ?? 'South',
                'battery_option' => $validated['battery_option'],
                'system_size' => $validated['system_size'],
                'daily_generation' => $validated['daily_generation'],
                'monthly_generation' => $validated['monthly_generation'],
                'panel_count' => $validated['panel_count'],
                'inverter_capacity' => $validated['inverter_capacity'],
                'battery_capacity' => $validated['battery_capacity'] ?? 0,
                'selected_panel' => $validated['selected_panel'],
                'panel_price' => $validated['panel_price'],
                'selected_inverter' => $validated['selected_inverter'],
                'inverter_price' => $validated['inverter_price'],
                'selected_battery' => $validated['selected_battery'] ?? null,
                'battery_price' => $validated['battery_price'] ?? 0,
                'installation_service_cost' => $validated['installation_service_cost'],
                'warranty_service_cost' => $validated['warranty_service_cost'] ?? 0,
                'total_price' => $validated['total_price'],
                'estimated_monthly_savings' => $validated['estimated_monthly_savings'],
                'estimated_annual_savings' => $validated['estimated_annual_savings'],
                'contact_method' => $validated['contact_method'],
                'additional_message' => $validated['additional_message'] ?? null,
                'status' => 'pending',
                'submitted_at' => now(),
            ]);

            // Return success response
            return response()->json([
                'success' => true,
                'message' => 'Solar estimation submitted successfully!',
                'estimation_id' => $estimation->id,
                'redirect' => route('solar-estimator-success', ['id' => $estimation->id]),
            ], 201);

        } catch (\Exception $e) {
            \Log::error('Solar Estimation Error: ' . $e->getMessage());
            
            return response()->json([
                'success' => false,
                'message' => 'Error submitting estimation. Please try again.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Show success page after submission
     */
    public function success($id)
    {
        $estimation = SolarEstimation::findOrFail($id);
        return view('frontend.solar-estimator-success', compact('estimation'));
    }

    /**
     * Get estimations list (for admin)
     */
    public function list()
    {
        $estimations = SolarEstimation::orderBy('submitted_at', 'desc')
            ->paginate(20);
        
        return view('backend.solar-estimations-list', compact('estimations'));
    }

    /**
     * Get single estimation details (for admin)
     */
    public function detail($id)
    {
        $estimation = SolarEstimation::findOrFail($id);
        return view('backend.solar-estimation-detail', compact('estimation'));
    }

    /**
     * Update estimation status
     */
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,contacted,quote_sent,completed,cancelled',
        ]);

        $estimation = SolarEstimation::findOrFail($id);
        $estimation->update(['status' => $request->status]);

        return redirect()->back()->with('success', 'Status updated successfully');
    }

    /**
     * Delete estimation
     */
    public function delete($id)
    {
        $estimation = SolarEstimation::findOrFail($id);
        $estimation->delete();

        return redirect()->back()->with('success', 'Estimation deleted successfully');
    }

    /**
     * Get statistics for dashboard
     */
    public function statistics()
    {
        $stats = [
            'total_estimations' => SolarEstimation::count(),
            'pending' => SolarEstimation::where('status', 'pending')->count(),
            'contacted' => SolarEstimation::where('status', 'contacted')->count(),
            'quote_sent' => SolarEstimation::where('status', 'quote_sent')->count(),
            'completed' => SolarEstimation::where('status', 'completed')->count(),
            'total_revenue' => SolarEstimation::sum('total_price'),
            'average_system_size' => SolarEstimation::avg('system_size'),
            'average_savings' => SolarEstimation::avg('estimated_annual_savings'),
        ];

        return response()->json($stats);
    }

    /**
     * Export estimations to CSV
     */
    public function export()
    {
        $estimations = SolarEstimation::all();
        
        $filename = 'solar-estimations-' . date('Y-m-d-H-i-s') . '.csv';
        
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=$filename",
        ];

        $columns = [
            'ID', 'Name', 'Email', 'Phone', 'Monthly kWh', 'Monthly Bill', 
            'Connection Type', 'City', 'System Size', 'Panel Count', 
            'Total Price', 'Monthly Savings', 'Status', 'Submitted At'
        ];

        $callback = function() use ($estimations, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($estimations as $estimation) {
                fputcsv($file, [
                    $estimation->id,
                    $estimation->name,
                    $estimation->email,
                    $estimation->phone,
                    $estimation->monthly_kwh,
                    $estimation->monthly_bill,
                    $estimation->connection_type,
                    $estimation->city,
                    $estimation->system_size,
                    $estimation->panel_count,
                    $estimation->total_price,
                    $estimation->estimated_monthly_savings,
                    $estimation->status,
                    $estimation->submitted_at,
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}

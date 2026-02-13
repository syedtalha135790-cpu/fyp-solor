<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use App\Models\SolarEstimation;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }
    public function shop()
    {
        return view('frontend.shop');
    }
    public function subscribeNewsletter(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:newsletters,email',
        ]);

        Newsletter::create([
            'email' => $request->email,
        ]);

        return redirect()->back()->with('success', 'Subscribed to newsletter successfully');
    }

    /**
     * Save Solar Estimation to Database
     */
    public function saveSolarEstimation(Request $request)
    {
        try {
            $estimation = SolarEstimation::create([
                'monthly_kwh' => $request->monthly_kwh ?? 0,
                'monthly_bill' => $request->monthly_bill ?? 0,
                'connection_type' => $request->connection_type,
                'city' => $request->city,
                'peak_sun_hours' => $request->peak_sun_hours ?? 0,
                'roof_type' => $request->roof_type,
                'roof_area' => $request->roof_area ?? 0,
                'battery_option' => $request->battery_option ?? 'no',
                'system_size' => $request->system_size ?? 0,
                'daily_generation' => $request->daily_generation ?? 0,
                'monthly_generation' => $request->monthly_generation ?? 0,
                'panel_count' => $request->panel_count ?? 0,
                'inverter_capacity' => $request->inverter_capacity ?? 0,
                'battery_capacity' => $request->battery_capacity ?? 0,
                'selected_panel' => $request->selected_panel,
                'panel_price' => $request->panel_price ?? 0,
                'selected_inverter' => $request->selected_inverter,
                'inverter_price' => $request->inverter_price ?? 0,
                'selected_battery' => $request->selected_battery,
                'battery_price' => $request->battery_price ?? 0,
                'installation_service_cost' => $request->installation_service_cost ?? 0,
                'warranty_service_cost' => $request->warranty_service_cost ?? 0,
                'total_price' => $request->total_price ?? 0,
                'estimated_monthly_savings' => $request->estimated_monthly_savings ?? 0,
                'estimated_annual_savings' => $request->estimated_annual_savings ?? 0,
                'status' => $request->status ?? 'draft',
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Solar estimation saved successfully',
                'id' => $estimation->id
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error saving solar estimation: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Send Solar Quote via Email
     */
    public function sendSolarQuote(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'estimation_id' => 'nullable|integer'
        ]);

        try {
            // Update estimation if ID provided
            if ($request->estimation_id) {
                $estimation = SolarEstimation::find($request->estimation_id);
                if ($estimation) {
                    $estimation->update([
                        'name' => $request->name,
                        'email' => $request->email,
                        'phone' => $request->phone,
                        'additional_message' => $request->message ?? '',
                        'contact_method' => 'email',
                        'status' => 'submitted',
                        'submitted_at' => now()
                    ]);
                }
            } else {
                // Create new if no ID
                SolarEstimation::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'additional_message' => $request->message ?? '',
                    'contact_method' => 'email',
                    'status' => 'submitted',
                    'submitted_at' => now()
                ]);
            }

            // Send email notification (if you have Mail configured)
            // \Mail::to($request->email)->send(new SolarQuoteMail($request->all()));

            return response()->json([
                'success' => true,
                'message' => 'Quote sent successfully! We will contact you shortly.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error sending quote: ' . $e->getMessage()
            ], 500);
        }
    }
}

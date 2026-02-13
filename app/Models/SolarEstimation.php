<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolarEstimation extends Model
{
    use HasFactory;

    protected $table = 'solar_estimations';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'monthly_kwh',
        'monthly_bill',
        'connection_type',
        'city',
        'peak_sun_hours',
        'roof_type',
        'roof_area',
        'battery_option',
        'system_size',
        'daily_generation',
        'monthly_generation',
        'panel_count',
        'inverter_capacity',
        'battery_capacity',
        'selected_panel',
        'panel_price',
        'selected_inverter',
        'inverter_price',
        'selected_battery',
        'battery_price',
        'installation_service_cost',
        'warranty_service_cost',
        'total_price',
        'estimated_monthly_savings',
        'estimated_annual_savings',
        'contact_method',
        'additional_message',
        'status',
        'submitted_at',
    ];

    protected $casts = [
        'submitted_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get all Pakistan cities
     */
    public static function getAllPakistanCities()
    {
        return [
            // Sindh
            'karachi' => 'Karachi (Sindh) - 5.8h',
            'hyderabad' => 'Hyderabad (Sindh) - 5.7h',
            'sukkur' => 'Sukkur (Sindh) - 5.8h',
            'larkana' => 'Larkana (Sindh) - 5.7h',
            'jacobabad' => 'Jacobabad (Sindh) - 5.9h',
            'khairpur' => 'Khairpur (Sindh) - 5.6h',
            'mirpur_khas' => 'Mirpur Khas (Sindh) - 5.6h',
            'tando_allahyar' => 'Tando Allahyar (Sindh) - 5.5h',
            
            // Punjab
            'lahore' => 'Lahore (Punjab) - 5.2h',
            'multan' => 'Multan (Punjab) - 5.6h',
            'faisalabad' => 'Faisalabad (Punjab) - 5.3h',
            'sahiwal' => 'Sahiwal (Punjab) - 5.5h',
            'sargodha' => 'Sargodha (Punjab) - 5.4h',
            'gujranwala' => 'Gujranwala (Punjab) - 5.1h',
            'gujrat' => 'Gujrat (Punjab) - 5.0h',
            'sialkot' => 'Sialkot (Punjab) - 5.0h',
            'sheikhupura' => 'Sheikhupura (Punjab) - 5.2h',
            'jhang' => 'Jhang (Punjab) - 5.3h',
            'okara' => 'Okara (Punjab) - 5.4h',
            'bahawalpur' => 'Bahawalpur (Punjab) - 5.5h',
            'bahawalnagar' => 'Bahawalnagar (Punjab) - 5.5h',
            'rahim_yar_khan' => 'Rahim Yar Khan (Punjab) - 5.6h',
            'lodhran' => 'Lodhran (Punjab) - 5.5h',
            
            // Khyber Pakhtunkhwa
            'peshawar' => 'Peshawar (KP) - 4.9h',
            'mardan' => 'Mardan (KP) - 4.9h',
            'swat' => 'Swat (KP) - 4.6h',
            'kohat' => 'Kohat (KP) - 5.1h',
            'abbottabad' => 'Abbottabad (KP) - 4.7h',
            'mansehra' => 'Mansehra (KP) - 4.7h',
            'karak' => 'Karak (KP) - 5.0h',
            'hangu' => 'Hangu (KP) - 5.0h',
            'bannu' => 'Bannu (KP) - 5.1h',
            'dera_ismail_khan' => 'Dera Ismail Khan (KP) - 5.2h',
            'charsadda' => 'Charsadda (KP) - 4.9h',
            'nowshera' => 'Nowshera (KP) - 4.9h',
            
            // Balochistan
            'quetta' => 'Quetta (Balochistan) - 6.2h',
            'gwadar' => 'Gwadar (Balochistan) - 6.1h',
            'turbat' => 'Turbat (Balochistan) - 6.0h',
            'khuzdar' => 'Khuzdar (Balochistan) - 6.0h',
            'kalat' => 'Kalat (Balochistan) - 5.9h',
            'sibi' => 'Sibi (Balochistan) - 5.9h',
            'zhob' => 'Zhob (Balochistan) - 5.8h',
            'loralai' => 'Loralai (Balochistan) - 5.8h',
            'musakhel' => 'Musakhel (Balochistan) - 5.8h',
            'chagai' => 'Chagai (Balochistan) - 6.1h',
            
            // Islamabad & AJK
            'islamabad' => 'Islamabad - 4.8h',
            'rawalpindi' => 'Rawalpindi - 4.8h',
            'mirpur' => 'Mirpur (AJK) - 4.5h',
            'muzaffarabad' => 'Muzaffarabad (AJK) - 4.4h',
            'kotli' => 'Kotli (AJK) - 4.5h',
            
            // Gilgit-Baltistan
            'gilgit' => 'Gilgit (GB) - 5.0h',
            'skardu' => 'Skardu (GB) - 5.2h',
            
            // Punjab Additional
            'attock' => 'Attock (Punjab) - 5.0h',
            'chakwal' => 'Chakwal (Punjab) - 4.9h',
            'jhellum' => 'Jhelum (Punjab) - 4.9h',
            'mianwali' => 'Mianwali (Punjab) - 5.3h',
        ];
    }
}

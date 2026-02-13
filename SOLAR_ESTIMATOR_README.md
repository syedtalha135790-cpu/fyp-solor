# Solar Energy Estimation & Package Builder - Documentation

## Overview
A comprehensive, modern, and user-friendly Solar Energy Estimation & Package Builder for professional solar energy solutions websites. This wizard-style tool allows customers to estimate their solar system requirements and build custom solar packages in real-time with dynamic pricing.

## Features

### 1. **Step-by-Step Wizard Interface**
- 5-step interactive form with visual progress indicator
- Responsive design works on desktop, tablet, and mobile
- Auto-validation at each step
- Smooth transitions between steps

### 2. **Step 1: Electricity Usage**
- Input monthly electricity consumption in kWh OR monthly bill amount
- Auto-calculate missing value (kWh ↔ Bill conversion)
- Select connection type: Single Phase (≤5kW) or Three Phase (>5kW)
- Average rate: Rs 22 per kWh for conversions

### 3. **Step 2: Location & Roof Details**
- Select city/location from 12 major Pakistani cities
- Auto-populate peak sun hours based on location
- Choose roof type: Concrete, Metal, Tile, Asbestos, or Ground Installation
- Specify available roof area in square feet
- Optional battery backup selection

**Peak Sun Hours by City:**
```
Karachi: 5.8 hours
Lahore: 5.2 hours
Islamabad: 4.8 hours
Rawalpindi: 4.8 hours
Faisalabad: 5.3 hours
Multan: 5.6 hours
Sahiwal: 5.5 hours
Peshawar: 4.9 hours
Quetta: 6.2 hours
Hyderabad: 5.7 hours
Gujranwala: 5.1 hours
Sialkot: 5.0 hours
```

### 4. **Step 3: Automatic Calculations**
System automatically calculates:
- **Required System Size (kW):** Formula = Monthly kWh / (30 × Peak Sun Hours × 0.75 efficiency)
- **Daily Power Generation (kWh):** System Size × Peak Sun Hours × 0.75
- **Monthly Power Generation (kWh):** Daily Generation × 30
- **Number of Panels:** System Size × 1000 / Panel Wattage
- **Inverter Capacity (kW):** System Size × 1.2 (20% buffer)
- **Battery Requirement (Optional):** Daily Usage × 2 days backup

### 5. **Step 4: Package Selection**
Two modes available:

#### A. Recommended Full Package (Pre-selected)
- Best value combination automatically selected
- Optimized based on system requirements
- Professional installation included

#### B. Custom Individual Selection
Users can choose:
- **Solar Panels** (Brand, Wattage, Quantity)
  - JA Solar 400W: Rs 25,000/panel
  - Canadian Solar 385W: Rs 23,000/panel
  - JinkoSolar 410W: Rs 26,000/panel
  - Trina Solar 395W: Rs 24,000/panel
  - LONGi 420W: Rs 27,000/panel
  - Local Brand 380W: Rs 18,000/panel

- **Inverter Types**
  - On-Grid 3kW: Rs 120,000
  - On-Grid 5kW: Rs 180,000
  - On-Grid 8kW (3-phase): Rs 280,000
  - Hybrid 3kW: Rs 220,000
  - Hybrid 5kW: Rs 320,000
  - Off-Grid 5kW: Rs 380,000
  - Off-Grid 8kW: Rs 580,000

- **Backup Batteries** (if selected)
  - Lithium 5.12 kWh: Rs 280,000
  - Lithium 10.24 kWh: Rs 550,000
  - Lead Acid 4.8 kWh: Rs 120,000
  - Lead Acid 9.6 kWh: Rs 230,000
  - Gel 5 kWh: Rs 150,000

- **Installation Services**
  - Professional Installation: Rs 50,000 (included by default)
  - 5-Year Extended Warranty: Rs 25,000 (optional)

### 6. **Real-Time Pricing**
- Price breakdown updates instantly as components are selected
- Component-wise cost display
- Total estimated price calculation
- Tax-exclusive pricing display

### 7. **Step 5: Final Summary**
Displays:
- System size in kW
- Estimated monthly savings (based on current bill)
- Selected components with specifications
- Financial overview:
  - Estimated total cost
  - Annual savings
  - Payback period (ROI in years)
  - 25-year profit calculation

### 8. **Contact & Quote Options**
- **WhatsApp Integration:** Direct link to WhatsApp with pre-filled message
- **Email Quote:** Modal form to collect user details and send detailed quote
- Quote data includes:
  - Personal information
  - System requirements
  - Selected components
  - Financial summary
  - Custom message field

## File Structure

```
fyp-solor/
├── resources/views/components/
│   ├── header.blade.php (Updated with Solar Estimator button)
│   └── solar-estimator.blade.php (Main component HTML & CSS)
├── public/frontend/assets/js/
│   └── solar-estimator.js (JavaScript logic)
└── [Other project files]
```

## Installation Instructions

### 1. **Files Already Created:**
- `resources/views/components/solar-estimator.blade.php` - Main modal component
- `public/frontend/assets/js/solar-estimator.js` - JavaScript logic
- `resources/views/components/header.blade.php` - Updated with button and includes

### 2. **Requirements:**
- Bootstrap 5 (for modal and styling) - Already in project
- jQuery (for modal management) - Already in project
- Font Awesome icons (for UI elements) - Already in project
- Modern browser with JavaScript enabled

### 3. **How It Works:**

#### Opening the Solar Estimator:
```html
<!-- In navbar -->
<a href="#" onclick="openSolarEstimation(event)">Solar Estimator</a>
```

Or programmatically:
```javascript
openSolarEstimation();
```

#### Component Usage in Blade:
```blade
@include('components.solar-estimator')
```

## JavaScript API

### Global Functions:

```javascript
// Open the estimator modal
openSolarEstimation(event)

// Navigate to next step
nextStep()

// Navigate to previous step
previousStep()

// Select solar panel
selectPanel(element, panelId)

// Select inverter
selectInverter(element, inverterId)

// Select battery
selectBattery(element, batteryId)

// Send email quote
sendEmailQuote()

// Submit email quote form
submitEmailQuote()
```

### Global State Object:

```javascript
solarEstimatorState = {
    currentStep: 1,              // Current wizard step (1-5)
    monthlyKwh: 0,               // Monthly electricity in kWh
    monthlyBill: 0,              // Monthly bill in Rs
    connectionType: 'single',    // 'single' or 'three'
    city: '',                    // Selected city
    peakSunHours: 5.5,          // Auto-populated from city
    roofType: '',               // Roof type selection
    roofArea: 0,                // Available area in sq ft
    wantsBattery: false,        // Battery requirement
    
    // Calculated values
    systemSize: 0,              // Required system in kW
    dailyGeneration: 0,         // Daily power in kWh
    monthlyGeneration: 0,       // Monthly power in kWh
    panelCount: 0,              // Number of panels needed
    inverterCapacity: 0,        // Inverter size in kW
    batteryCapacity: 0,         // Battery size in kWh
    
    // Selections
    selectedPanel: null,        // Selected panel object
    selectedInverter: null,     // Selected inverter object
    selectedBattery: null,      // Selected battery object
    installationService: true,  // Installation included
    warrantyService: false,     // Extended warranty
    
    totalPrice: 0              // Total estimated price
}
```

## Customization Guide

### 1. **Change Pricing:**
Edit the data arrays in `solar-estimator.js`:

```javascript
const solarPanels = [
    { id: 'panel1', brand: 'Brand Name', wattage: 400, price: 25000, specs: '...' },
    // Add more panels...
];

const inverters = [
    { id: 'inv1', type: 'On-Grid', capacity: 3, price: 120000, specs: '...' },
    // Add more inverters...
];

const batteries = [
    { id: 'bat1', type: 'Lithium', capacity: 5.12, price: 280000, specs: '...' },
    // Add more batteries...
];
```

### 2. **Add More Cities:**
```javascript
const peakSunHoursByCity = {
    'new-city': 5.5,  // Peak sun hours
    // ...
};
```

### 3. **Modify Calculation Formulas:**
In `calculateSystem()` function in `solar-estimator.js`:

```javascript
// Change system size formula (currently: monthly kWh / (30 × PSH × 0.75))
solarEstimatorState.systemSize = monthlyKwh / (30 * peakSunHours * 0.75);

// Change efficiency factor
const efficiency = 0.75; // Adjust as needed

// Change panel buffer
solarEstimatorState.inverterCapacity = solarEstimatorState.systemSize * 1.2; // 20% buffer
```

### 4. **Update WhatsApp Contact:**
In `solar-estimator.js`, change the WhatsApp number:

```javascript
<a href="https://wa.me/923001234567?text=...">
```

### 5. **Change Email Recipient:**
In `generateEmailBody()` function, update the recipient email in the backend or modify the fallback email address.

### 6. **Styling Customization:**
All CSS is inline in the component. To customize:
- Edit colors in the style block of `solar-estimator.blade.php`
- Modify gradient colors for cards
- Adjust responsive breakpoints
- Change animation speeds

Example color variables to customize:
```css
/* Primary colors */
#28a745 - Green (success)
#667eea - Purple (primary gradient start)
#764ba2 - Purple (primary gradient end)

/* Neutral colors */
#f0f0f0 - Light gray background
#ddd - Border gray
#666 - Text gray
```

## Email Quote Backend Integration

### Option 1: Using Laravel Route (Recommended)
Create a route in `routes/web.php`:

```php
Route::post('/api/send-solar-quote', [SolarQuoteController::class, 'sendQuote'])->middleware('csrf');
```

Create controller `app/Http/Controllers/SolarQuoteController.php`:

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SolarQuoteController extends Controller
{
    public function sendQuote(Request $request)
    {
        try {
            // Send email logic here
            // Use Laravel Mail facade
            
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }
}
```

### Option 2: Using Simple Email Fallback
The system automatically opens the default email client if backend is unavailable, with pre-filled quote details.

## Troubleshooting

### Modal Not Opening?
- Ensure Bootstrap 5 is loaded
- Check if jQuery is loaded
- Verify JavaScript console for errors
- Check CSRF token is in meta tag: `<meta name="csrf-token" content="{{ csrf_token() }}">`

### Calculations Not Working?
- Verify JavaScript file is loaded: `solar-estimator.js`
- Check browser console for JavaScript errors
- Ensure DOM is loaded before running JavaScript
- Verify form input values are numbers, not strings

### Pricing Not Updating?
- Check `updatePricing()` function is being called
- Verify component selections are setting state correctly
- Ensure HTML input IDs match JavaScript selectors

### Modal Not Closing?
- Ensure Bootstrap modal is properly initialized
- Check for JavaScript errors in console
- Verify `data-dismiss="modal"` attributes are present

## Performance Optimization

The solar estimator is optimized for:
- Fast loading (deferred script loading)
- Minimal DOM manipulation
- Efficient calculations
- Responsive design
- Mobile-friendly

## Browser Compatibility

- Chrome 90+
- Firefox 88+
- Safari 14+
- Edge 90+
- Mobile browsers (iOS Safari, Chrome Mobile)

## Future Enhancements

Potential improvements:
1. Add financing/EMI calculator
2. Integration with solar irradiance maps API
3. Real-time weather data for location
4. Seasonal variance calculations
5. Carbon footprint offset calculation
6. Multi-language support
7. Admin panel for managing pricing
8. Quote management dashboard
9. Integration with ERP systems
10. PDF quote generation

## Support & Maintenance

For issues or enhancements:
1. Check browser console for errors
2. Verify all files are in correct locations
3. Test on different browsers
4. Review calculation formulas
5. Test form validation

## License
All code is proprietary to the Soliur Solar Energy Solutions website.

---

**Last Updated:** February 11, 2026
**Version:** 1.0.0

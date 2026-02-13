# Solar Estimator - Quick Start Guide

## What Was Added?

A complete **Solar Energy Estimation & Package Builder** has been integrated into your Soliur website. This is a professional, modern wizard-style form that allows customers to:

1. Estimate their solar system requirements
2. View real-time calculations
3. Select from recommended or custom packages
4. Get instant pricing
5. Request quotes via WhatsApp or Email

## Files Modified/Created

### Modified Files:
- `resources/views/components/header.blade.php` - Added "Solar Estimator" button to navbar and included the component

### New Files Created:
1. `resources/views/components/solar-estimator.blade.php` - Main modal component (HTML + CSS)
2. `public/frontend/assets/js/solar-estimator.js` - All JavaScript logic
3. `SOLAR_ESTIMATOR_README.md` - Detailed documentation

## How to Use

### For Users/Customers:

1. **Click "Solar Estimator"** in the navigation menu
2. **Step 1 - Electricity Usage:**
   - Enter monthly electricity consumption (kWh) OR your monthly bill
   - Select your connection type (Single or Three Phase)
   - Click "Next"

3. **Step 2 - Location & Roof:**
   - Select your city (12 major Pakistani cities available)
   - Choose your roof type
   - Enter available roof area in square feet
   - Optionally select if you want battery backup
   - Click "Next"

4. **Step 3 - See Calculations:**
   - System automatically calculates:
     - Required system size
     - Daily/Monthly power generation
     - Number of panels needed
     - Inverter capacity
     - Battery requirement (if selected)
   - Click "Next"

5. **Step 4 - Select Your Package:**
   - **Option A (Recommended):** Uses best value components
   - **Option B (Custom):** Choose your own panels, inverter, batteries
   - Watch price update in real-time
   - Click "Next"

6. **Step 5 - Summary & Quote:**
   - Review your system summary
   - See financial breakdown:
     - Estimated cost
     - Monthly savings
     - Annual savings
     - Payback period
     - 25-year profit
   - Click "Get Quote on WhatsApp" OR "Send Quote via Email"

### For Administrators:

#### To Change Pricing:
Open `public/frontend/assets/js/solar-estimator.js` and find:

```javascript
const solarPanels = [
    { id: 'panel1', brand: 'JA Solar', wattage: 400, price: 25000, specs: '...' },
    // Update prices here
];

const inverters = [
    { id: 'inv1', type: 'On-Grid', capacity: 3, price: 120000, specs: '...' },
    // Update prices here
];

const batteries = [
    { id: 'bat1', type: 'Lithium (LiFePO4)', capacity: 5.12, price: 280000, specs: '...' },
    // Update prices here
];
```

#### To Change WhatsApp Number:
In `resources/views/components/solar-estimator.blade.php`, find:
```html
<a href="https://wa.me/923001234567?text=...">
```
Replace `923001234567` with your WhatsApp number.

#### To Add More Cities:
In `solar-estimator.js`, find `peakSunHoursByCity` and add:
```javascript
'new-city': 5.5  // Peak sun hours
```

## Key Features Explained

### 1. **Smart Calculations**
- Converts between kWh and bill amount automatically
- Calculates system size based on location's peak sun hours
- Includes 25% system loss factor (realistic)
- Recommends panel count, inverter size, and battery capacity

### 2. **Real-Time Pricing**
- Price updates instantly as you select components
- Shows breakdown of all costs
- Total includes installation and optional warranty

### 3. **Two Modes**
- **Recommended:** Auto-selected best value package
- **Custom:** Build your own with 6 panel brands, 7 inverter options, 5 battery choices

### 4. **Financial Insights**
- Monthly savings estimate
- Annual savings projection
- ROI calculation (payback period)
- 25-year profit forecast

### 5. **Multiple Contact Options**
- Direct WhatsApp link (opens chat with pre-filled message)
- Email quote form (collects details and sends personalized quote)

## Customization Examples

### Change System Efficiency Factor:
In `solar-estimator.js`, find `calculateSystem()` function:
```javascript
const efficiency = 0.75; // Change from 0.75 to your value (0.70, 0.80, etc.)
```

### Change Inverter Buffer:
```javascript
// Current: 20% buffer (multiply by 1.2)
solarEstimatorState.inverterCapacity = solarEstimatorState.systemSize * 1.2;
// Change to 1.3 for 30% buffer, 1.1 for 10%, etc.
```

### Change Battery Backup Days:
```javascript
// Current: 2 days backup
solarEstimatorState.batteryCapacity = dailyUsage * 2;
// Change 2 to 1 for 1-day backup, 3 for 3-day backup, etc.
```

### Change Installation Service Fee:
In `solar-estimator.blade.php`, find:
```html
<span class="badge badge-success">+Rs 50,000</span>
```
And in `solar-estimator.js`, find:
```javascript
if (solarEstimatorState.installationService) {
    total += 50000; // Change 50000 to your fee
```

### Change Warranty Fee:
Similar process - find "25,000" for warranty and update both in HTML and JavaScript.

## Testing the System

1. **Test Calculation Accuracy:**
   - Enter: 300 kWh/month, Sahiwal, Concrete roof, 500 sq ft
   - Expected: ~3-4 kW system, ~10 panels (400W), 4-5 kW inverter

2. **Test Pricing:**
   - Select components and verify price updates immediately
   - Check price breakdown shows all items

3. **Test Email Quote:**
   - Complete form and check console for errors
   - Verify fallback email opens your default email client

4. **Test WhatsApp Link:**
   - Click WhatsApp button
   - Verify it opens WhatsApp with your number

## FAQ

**Q: Can I change the panel brands?**
A: Yes! Edit the `solarPanels` array in `solar-estimator.js`

**Q: Can I remove the warranty option?**
A: Yes! Delete the warranty checkbox section in `solar-estimator.blade.php` and remove from `updatePricing()` function

**Q: How do I integrate with my backend?**
A: Create a Laravel route to handle `/api/send-solar-quote` POST request. See SOLAR_ESTIMATOR_README.md for details.

**Q: Can I hide the battery section?**
A: Yes! Users won't see batteries if they don't check "I want backup batteries" in Step 2, and you can set `document.getElementById('wantsBattery').checked = false;` by default

**Q: How do I change the currency from Rs to another currency?**
A: Do a find-replace for "Rs " in both blade and JavaScript files with your currency symbol

## Performance Tips

1. **Lazy Load the Script:**
   Already done - script has `defer` attribute in header

2. **Cache the Modal:**
   Modal opens from cached HTML in memory, not fetched each time

3. **Minimize Form Fields:**
   Only 6 essential fields before calculations

## Security Notes

1. **CSRF Protection:**
   - Token is automatically included from meta tag
   - Backend should validate all POST requests

2. **Input Validation:**
   - All numbers are validated as numeric values
   - Required fields are checked before step progression
   - Email validation on email field

3. **Data Privacy:**
   - Quote data is only sent to your email/WhatsApp
   - No data is stored in the database by default
   - You can add backend storage if needed

## Browser Compatibility

- ✅ Chrome 90+
- ✅ Firefox 88+
- ✅ Safari 14+
- ✅ Edge 90+
- ✅ Mobile browsers (Chrome, Safari on iOS)

## Next Steps

1. **Test thoroughly** - Click through entire flow
2. **Update WhatsApp number** - Add your business number
3. **Test email quote** - Ensure emails work
4. **Customize pricing** - Add your actual rates
5. **Monitor quotes** - Track quote inquiries from dashboard
6. **Gather feedback** - Get user feedback and iterate

---

**Questions?** Refer to `SOLAR_ESTIMATOR_README.md` for detailed documentation.

**Last Updated:** February 11, 2026

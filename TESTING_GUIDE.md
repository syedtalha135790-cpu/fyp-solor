# 🧪 Solar Estimator - Testing Guide

## Quick Start (2 Minutes)

### Step 1: Open Your Website
```
Go to: http://localhost/fyp-solor
(or your domain)
```

### Step 2: Find the Button
Look in the **navigation menu** for:
- **"Estimate Now"** (with solar panel icon 🟨)
- It's after "Register" in the menu

### Step 3: Click It!
Click "Estimate Now" → Modal opens

### Step 4: Fill the Form

#### Step 1 - Electricity Usage
```
Monthly Electricity Units: 300 kWh
(or Monthly Bill: 5000 Rs)
Connection Type: Single Phase ✓
Click: Next →
```

#### Step 2 - Location & Roof
```
City: Sahiwal ✓
Roof Type: Concrete ✓
Roof Area: 500 sq ft
✓ I want backup batteries
Click: Next →
```

#### Step 3 - View Calculations
```
You see automatically calculated:
- System Size
- Daily/Monthly Generation
- Panel Count
- Inverter Capacity
- Battery Capacity

Click: Next →
```

#### Step 4 - Select Package
```
Choose ONE:
Option A: Recommended (Auto-selected)
Option B: Custom (Build your own)

See real-time pricing update!

Click: Next →
```

#### Step 5 - Final Summary
```
See:
- System specifications
- Monthly savings
- Annual savings
- Payback period
- Total cost

Choose:
□ Get Quote on WhatsApp
□ Send Quote via Email
```

---

## 🔍 Detailed Testing Checklist

### UI Elements Visible?
- [ ] "Estimate Now" button in navbar
- [ ] Button has solar panel icon
- [ ] Button is clickable
- [ ] Modal opens when clicked
- [ ] Modal displays properly
- [ ] All 5 step indicators visible
- [ ] Form fields are visible

### Functionality Tests

#### Navigation
- [ ] "Next" button works
- [ ] "Previous" button appears from Step 2+
- [ ] Steps progress correctly
- [ ] Step indicator updates
- [ ] Cannot go forward without data
- [ ] Can go backward anytime

#### Step 1: Input Validation
- [ ] Can enter kWh amount
- [ ] kWh auto-fills Bill field
- [ ] Can enter Bill amount
- [ ] Bill auto-fills kWh field
- [ ] Connection type can be selected
- [ ] Requires at least one value to proceed

#### Step 2: Location & Roof
- [ ] City dropdown works
- [ ] Peak sun hours auto-populate
- [ ] Roof type dropdown works
- [ ] Can enter roof area
- [ ] Battery checkbox toggles
- [ ] All fields required
- [ ] Cannot proceed without all filled

#### Step 3: Calculations
- [ ] System Size displays (kW)
- [ ] Daily Generation displays (kWh)
- [ ] Monthly Generation displays (kWh)
- [ ] Panel Count displays (pcs)
- [ ] Inverter Capacity displays (kW)
- [ ] Battery Capacity displays (if selected)
- [ ] Numbers are reasonable
- [ ] No "NaN" or errors visible

#### Step 4: Packages
- [ ] Recommended package shows
- [ ] Custom selection tab works
- [ ] Solar panels can be selected
- [ ] Inverters can be selected
- [ ] Batteries can be selected (if enabled)
- [ ] Installation checkbox works
- [ ] Warranty checkbox works
- [ ] Price updates in real-time
- [ ] Price breakdown shows all items
- [ ] Total price calculation correct

#### Step 5: Summary & Quote
- [ ] Summary card displays
- [ ] All calculations visible
- [ ] Financial data shows:
  - [ ] Estimated cost
  - [ ] Monthly savings
  - [ ] Annual savings
  - [ ] Payback period (years)
  - [ ] 25-year profit
- [ ] Selected components list shows
- [ ] WhatsApp button visible
- [ ] Email button visible
- [ ] Buttons are clickable

### Integration Tests

#### WhatsApp
- [ ] Click WhatsApp button
- [ ] On mobile: Opens WhatsApp app
- [ ] On desktop: Opens web.whatsapp.com
- [ ] Phone number is correct
- [ ] Message is pre-filled

#### Email Quote
- [ ] Click Email button
- [ ] Email modal opens
- [ ] Form has:
  - [ ] Name field
  - [ ] Email field
  - [ ] Phone field
  - [ ] Message field
- [ ] Can fill all fields
- [ ] Submit button works
- [ ] On success: Shows confirmation
- [ ] On fail: Fallback to email client

### Browser Console (F12 → Console)

#### Check Logs
```javascript
// Should see:
"Solar Estimator loaded successfully"

// Try this:
openSolarEstimation()
// Modal should open

// Try this:
console.log(solarEstimatorState)
// Should show all data
```

#### No Errors?
- [ ] No red error messages
- [ ] No warnings about missing files
- [ ] JavaScript file loaded (Network tab)
- [ ] CSS applied correctly
- [ ] Bootstrap loaded

---

## 📊 Sample Test Data

### Test Case 1: Residential - Small System
```
Monthly Usage: 200 kWh
Location: Lahore
Roof Type: Tile
Roof Area: 400 sq ft
Batteries: No

Expected Results:
System Size: ~1.2-1.5 kW
Panels: ~3-4 pieces (400W each)
Inverter: 3 kW
Cost: ~Rs 350,000-400,000
Payback: 4-5 years
```

### Test Case 2: Residential - Large System with Battery
```
Monthly Usage: 500 kWh
Location: Sahiwal
Roof Type: Concrete
Roof Area: 700 sq ft
Batteries: Yes

Expected Results:
System Size: ~2.5-3 kW
Panels: ~8-10 pieces (400W each)
Inverter: 5 kW Hybrid
Battery: 5-10 kWh
Cost: ~Rs 1,000,000-1,200,000
Payback: 5-6 years
```

### Test Case 3: Commercial
```
Monthly Usage: 1000 kWh
Location: Karachi
Roof Type: Metal
Roof Area: 1200 sq ft
Batteries: No

Expected Results:
System Size: ~5-6 kW
Panels: ~15-20 pieces (400W each)
Inverter: 8 kW Three-Phase
Cost: ~Rs 2,000,000-2,500,000
Payback: 4-5 years
```

---

## 🎬 Video Testing Walkthrough

### Video 1: Basic Flow (5 min)
1. Open homepage
2. Click "Estimate Now"
3. Fill Step 1 with 300 kWh
4. Fill Step 2 with Sahiwal, Concrete, 500 sq ft
5. View Step 3 calculations
6. Select recommended package in Step 4
7. View summary in Step 5
8. Close modal

### Video 2: Advanced (7 min)
1. Open estimator
2. Enter bill amount (5000 Rs) - check auto-conversion
3. Select city - watch PSH auto-populate
4. Click on custom package
5. Try selecting different panels
6. Try selecting different inverters
7. Try enabling batteries
8. Watch price update in real-time
9. View final summary

### Video 3: Contact (3 min)
1. Complete full flow to Step 5
2. Click "Send Quote via Email"
3. Fill email form
4. Submit (watch for success/error)
5. Test WhatsApp link on mobile

---

## 🚨 Troubleshooting Tests

### Test: Modal Won't Open
**Fix:**
1. Open Browser Console (F12)
2. Check for errors
3. Type: `openSolarEstimation()`
4. Modal should open
5. If not: Check if JavaScript file loaded

### Test: Calculations Show 0
**Fix:**
1. Make sure Step 1 is filled
2. Make sure Step 2 is filled
3. Go back to Step 2
4. Re-fill fields
5. Proceed to Step 3 again

### Test: Price Shows 0
**Fix:**
1. Make sure you selected a package component
2. Click on solar panel in Step 4
3. Price should update
4. Check real-time price breakdown

### Test: WhatsApp Doesn't Open
**Fix:**
1. On mobile: Install WhatsApp app first
2. On desktop: Check internet connection
3. Verify phone number in code:
   ```javascript
   // Check URL in Step 5 WhatsApp button
   ```

### Test: Email Doesn't Send
**Fix:**
1. Check all 3 fields filled (name, email, phone)
2. Valid email format
3. Check browser console for errors
4. Try fallback: Let email client open

---

## ✅ Final Checklist

### Before Publishing
- [ ] All buttons clickable
- [ ] All form fields work
- [ ] Calculations accurate
- [ ] Pricing displays correctly
- [ ] Modals open/close properly
- [ ] No JavaScript errors
- [ ] WhatsApp link works
- [ ] Email form works
- [ ] Responsive on mobile
- [ ] Responsive on tablet
- [ ] Responsive on desktop
- [ ] All navigation works
- [ ] Step progression works
- [ ] Can go back
- [ ] Can close modals

### Browser Compatibility
- [ ] Chrome/Chromium
- [ ] Firefox
- [ ] Safari (Mac)
- [ ] Edge
- [ ] Chrome Mobile
- [ ] Safari Mobile

### Performance Check
- [ ] Modal opens instantly
- [ ] Price updates instantly
- [ ] No lag when typing
- [ ] Calculations quick
- [ ] No freezing

---

## 📝 Test Report Template

```
Solar Estimator Testing Report
================================

Date: _______________
Tester: _______________
Browser: _______________
Device: _______________

Results:
- UI Elements: ✓/✗
- Navigation: ✓/✗
- Input Validation: ✓/✗
- Calculations: ✓/✗
- Pricing: ✓/✗
- Quote Options: ✓/✗

Issues Found:
1. _______________
2. _______________
3. _______________

Status: ✓ PASS / ✗ FAIL

Signature: _______________
```

---

## 🎯 Success Criteria

**The Solar Estimator works correctly when:**

1. ✅ Button is visible and clickable
2. ✅ Modal opens without errors
3. ✅ All 5 steps are functional
4. ✅ Calculations are accurate
5. ✅ Pricing updates in real-time
6. ✅ Quote options work
7. ✅ No console errors
8. ✅ Works on mobile
9. ✅ Works on desktop
10. ✅ All links are functional

---

## 🎊 You're Done!

Once all tests pass, your Solar Estimator is **ready for production**!

**Questions?** Check the documentation files or browser console for clues.

Good luck! 🚀

---

**Created:** February 11, 2026
**Version:** 1.0

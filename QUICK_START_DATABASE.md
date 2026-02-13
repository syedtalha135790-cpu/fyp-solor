# ⚡ Quick Start - Database Setup

**Time Required:** 2 minutes  
**Difficulty:** Easy

---

## 🚀 Step-by-Step Setup

### Step 1: Run Migration (30 seconds)
```bash
php artisan migrate
```

✅ Creates `solar_estimations` table  
✅ Sets up all 30+ database columns  
✅ Ready for data storage  

### Step 2: Clear Cache (30 seconds)
```bash
php artisan optimize:clear
php artisan cache:clear
```

### Step 3: Test (1 minute)
1. Open: `http://localhost:8000/solar-estimator`
2. Click "Estimate Now" if on home page
3. Fill all 5 steps
4. Submit form
5. Check database:

```bash
php artisan tinker
>>> \App\Models\SolarEstimation::latest()->first();
```

---

## 📋 What Gets Saved

When user completes Step 5:
- ✅ All form inputs
- ✅ Calculated values (system size, panels, etc.)
- ✅ Selected components (panels, inverter, battery)
- ✅ Total pricing
- ✅ Estimated savings
- ✅ Auto status: `draft`

When user submits quote:
- ✅ User contact info (name, email, phone)
- ✅ Status changes to: `submitted`
- ✅ Submission timestamp recorded

---

## 🌍 Cities Available

### 60+ Pakistan Cities Across:
- **Sindh** (8 cities)
- **Punjab** (18 cities)
- **KP** (12 cities)
- **Balochistan** (10 cities)
- **Islamabad & AJK** (5 cities)
- **Gilgit-Baltistan** (2 cities)

Each with:
- ✅ Peak sun hours
- ✅ Regional description
- ✅ Auto-calculated sunlight

---

## 📊 View Saved Data

### Check Latest Estimation
```bash
php artisan tinker
>>> $est = \App\Models\SolarEstimation::latest()->first();
>>> $est->city;        // Returns: "karachi"
>>> $est->system_size; // Returns: 2.5
>>> $est->total_price; // Returns: 300000
```

### View All Estimations
```bash
# In MySQL
mysql> SELECT * FROM solar_estimations;
```

---

## ✨ Files Changed

| File | Change | Type |
|------|--------|------|
| `database/migrations/2026_02_11_...` | NEW - Create table | Migration |
| `app/Models/SolarEstimation.php` | NEW - Model | Model |
| `app/Http/Controllers/HomeController.php` | UPDATED - Save methods | Controller |
| `routes/web.php` | UPDATED - API routes | Routes |
| `resources/views/frontend/solar-estimator.blade.php` | UPDATED - CSRF token | View |
| `public/frontend/assets/js/solar-estimator.js` | UPDATED - Save function | JavaScript |

---

## 🔗 API Endpoints

### Save Estimation
```
POST /api/solar-estimation/save
```
Auto-called when reaching Step 5

### Send Quote Email
```
POST /api/send-solar-quote
```
Called when user submits email quote

---

## 🎯 Expected Results

### After Step 5:
```
Database: 1 new record created
Status: draft
Name: NULL (until email submitted)
City: karachi (selected by user)
System Size: 2.5 kW
Total Price: 300,000 PKR
```

### After Email Submission:
```
Same record UPDATED
Status: submitted
Name: Ahmed Khan
Email: ahmed@example.com
Phone: 03001234567
Submitted At: 2026-02-11 14:30:00
```

---

## 🐛 If Something Goes Wrong

### Error: "SQLSTATE[42S02]... no such table"
**Solution:** Run `php artisan migrate`

### Error: "class SolarEstimation not found"
**Solution:** Check `app/Models/SolarEstimation.php` exists

### Error: "CSRF token mismatch"
**Solution:** Check meta tag in blade file (should have CSRF token)

### City dropdown empty
**Solution:** Check JavaScript `peakSunHoursByCity` object has all cities

---

## 📈 Next: Optional Enhancements

1. **Email Notifications**
   ```bash
   php artisan make:mail SolarQuoteMail
   ```

2. **Admin Dashboard**
   - View all quotes
   - Export to Excel
   - Follow-up reminders

3. **Reporting**
   - Conversion funnel
   - Popular products
   - City-wise analytics

---

## ✅ Verification Checklist

- [ ] Migration ran successfully
- [ ] Table `solar_estimations` exists in database
- [ ] `/solar-estimator` page loads
- [ ] City dropdown has 60+ cities
- [ ] Form submits without errors
- [ ] Data saved to database
- [ ] Can query with Laravel Tinker
- [ ] Status shows "draft" for new estimations

---

## 🎉 You're Done!

Database integration is complete. Users can now:
1. ✅ Estimate their solar system
2. ✅ See 60+ cities with sun hours
3. ✅ Data auto-saves to database
4. ✅ Submit quotes with contact info
5. ✅ Track estimations in database

**Happy solar estimating! ☀️**

---

**Setup Time:** ~2 minutes  
**Status:** Ready for Production  
**Database:** PostgreSQL/MySQL compatible

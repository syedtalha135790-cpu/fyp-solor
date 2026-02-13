<x-header/>
<!-- CSRF Token for API Requests -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Link Enhanced CSS -->
<link href="{{ asset('css/solar-estimator-enhanced.css') }}" rel="stylesheet">

<!-- Solar Energy Estimation Page -->
<div class="page-wrapper">
    <!-- Page Header with Title -->
    <section class="estimator-page-header">
        <div class="container">
            <div class="estimator-page-header-content">
                <h1 class="estimator-page-title">
                    <i class="fas fa-solar-panel"></i> Solar Energy Estimator
                </h1>
                <p class="estimator-page-subtitle">
                    Calculate your solar system size and savings in just 5 minutes
                </p>
            </div>
        </div>
    </section>

    <!-- Main Estimator Content -->
    <section class="estimator-section py-60" style="background: #f8fafc;">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <!-- Step Indicator -->
                    <div class="step-indicator mb-50">
                        <div class="step-item active" data-step="1">
                            <div class="step-number">1</div>
                            <div class="step-label">Electricity Usage</div>
                        </div>
                        <div class="step-item" data-step="2">
                            <div class="step-number">2</div>
                            <div class="step-label">Location & Roof</div>
                        </div>
                        <div class="step-item" data-step="3">
                            <div class="step-number">3</div>
                            <div class="step-label">Calculations</div>
                        </div>
                        <div class="step-item" data-step="4">
                            <div class="step-number">4</div>
                            <div class="step-label">Package Selection</div>
                        </div>
                        <div class="step-item" data-step="5">
                            <div class="step-number">5</div>
                            <div class="step-label">Summary</div>
                        </div>
                    </div>

                    <!-- Estimation Form -->
                    <div class="estimator-form-wrapper bg-white p-40 rounded-10 shadow-sm">
                        <form id="solarEstimationForm">

                            <!-- STEP 1: Electricity Usage -->
                            <div class="form-step" data-step="1">
                                <h3 class="mb-30"><i class="fas fa-bolt"></i> Step 1: Your Electricity Usage</h3>
                                
                                <!-- Quick Preset Options -->
                                <div class="mb-4">
                                    <label class="form-label fw-bold mb-3">Quick Presets - Select Your Category</label>
                                    <div class="row g-3">
                                        <div class="col-md-4">
                                            <div class="preset-card" onclick="selectPreset(150, 'Small Home')">
                                                <div class="preset-icon"><i class="fas fa-home"></i></div>
                                                <div class="preset-title">Small Home</div>
                                                <div class="preset-sub">150-250 kWh/month</div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="preset-card" onclick="selectPreset(400, 'Average Home')">
                                                <div class="preset-icon"><i class="fas fa-building"></i></div>
                                                <div class="preset-title">Average Home</div>
                                                <div class="preset-sub">350-450 kWh/month</div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="preset-card" onclick="selectPreset(700, 'Large Home')">
                                                <div class="preset-icon"><i class="fas fa-house-lock"></i></div>
                                                <div class="preset-title">Large Home</div>
                                                <div class="preset-sub">600-800 kWh/month</div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="preset-card" onclick="selectPreset(1200, 'Business')">
                                                <div class="preset-icon"><i class="fas fa-shop"></i></div>
                                                <div class="preset-title">Business</div>
                                                <div class="preset-sub">1000-1500 kWh/month</div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="preset-card" onclick="selectPreset(2000, 'Industrial')">
                                                <div class="preset-icon"><i class="fas fa-industry"></i></div>
                                                <div class="preset-title">Industrial</div>
                                                <div class="preset-sub">1500+ kWh/month</div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="preset-card" onclick="showCustomInput()">
                                                <div class="preset-icon"><i class="fas fa-sliders-h"></i></div>
                                                <div class="preset-title">Custom</div>
                                                <div class="preset-sub">Enter your own values</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- OR Divider -->
                                <div class="divider-section mb-4">
                                    <span>OR</span>
                                </div>

                                <!-- Manual Input Section -->
                                <div id="customInputSection" style="display: none;">
                                    <div class="row">
                                        <div class="col-md-6 mb-20">
                                            <div class="form-group">
                                                <label class="form-label fw-bold">Monthly Electricity Units (kWh)</label>
                                                <div class="input-with-slider">
                                                    <input type="range" id="monthlyKwhSlider" class="form-range" min="50" max="3000" value="300" oninput="updateKwhFromSlider(this.value)">
                                                    <input type="number" id="monthlyKwh" class="form-control form-control-lg" placeholder="e.g., 300" min="0" step="1" oninput="updateSliderFromInput(this.value)">
                                                    <div class="slider-labels">
                                                        <span>50</span>
                                                        <span id="sliderValue">300 kWh</span>
                                                        <span>3000</span>
                                                    </div>
                                                </div>
                                                <small class="form-text text-muted mt-2">
                                                    <i class="fas fa-info-circle"></i> Check your electricity bill for monthly units
                                                </small>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-20">
                                            <div class="form-group">
                                                <label class="form-label fw-bold">OR Monthly Bill Amount (Rs)</label>
                                                <div class="input-with-slider">
                                                    <input type="range" id="monthlyBillSlider" class="form-range" min="500" max="50000" value="5000" step="100" oninput="updateBillFromSlider(this.value)">
                                                    <input type="number" id="monthlyBill" class="form-control form-control-lg" placeholder="e.g., 5000" min="0" step="100" oninput="updateSliderFromBill(this.value)">
                                                    <div class="slider-labels">
                                                        <span>Rs 500</span>
                                                        <span id="sliderBillValue">Rs 5,000</span>
                                                        <span>Rs 50K</span>
                                                    </div>
                                                </div>
                                                <small class="form-text text-muted mt-2">
                                                    <i class="fas fa-info-circle"></i> We'll auto-calculate kWh (avg rate: Rs 20-25/kWh)
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Connection Type Selection -->
                                <div class="form-group mt-4">
                                    <label class="form-label fw-bold mb-3">Choose Your Connection Type</label>
                                    <div class="row">
                                        <div class="col-md-6 mb-20">
                                            <div class="connection-option" onclick="selectConnection('single')">
                                                <div class="connection-icon">
                                                    <i class="fas fa-plug"></i>
                                                </div>
                                                <input type="radio" id="singlePhase" name="connectionType" class="form-check-input" value="single" checked style="display: none;">
                                                <div class="connection-info">
                                                    <div class="connection-title">Single Phase</div>
                                                    <div class="connection-details">
                                                        Up to 5 kW capacity<br>
                                                        <small>Most homes & small offices</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-20">
                                            <div class="connection-option" onclick="selectConnection('three')">
                                                <div class="connection-icon">
                                                    <i class="fas fa-bolt"></i>
                                                </div>
                                                <input type="radio" id="threePhase" name="connectionType" class="form-check-input" value="three" style="display: none;">
                                                <div class="connection-info">
                                                    <div class="connection-title">Three Phase</div>
                                                    <div class="connection-details">
                                                        Above 5 kW capacity<br>
                                                        <small>Businesses & large homes</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Help Section -->
                                <div class="alert alert-light border-start border-4 border-info mt-4">
                                    <h6 class="alert-heading"><i class="fas fa-lightbulb"></i> Need Help?</h6>
                                    <ul class="mb-0 ps-3">
                                        <li><strong>Can't find your bill?</strong> Check your DISCO/utility email or contact your provider</li>
                                        <li><strong>Not sure about kWh?</strong> Multiply monthly bill by 0.04-0.05 as rough estimate</li>
                                        <li><strong>Want to reduce usage?</strong> Our solar systems typically save 70-90% on electricity costs</li>
                                    </ul>
                                </div>
                            </div>

                            <!-- STEP 2: Location & Roof Details -->
                            <div class="form-step" data-step="2" style="display: none;">
                                <h3 class="mb-30"><i class="fas fa-map-marker-alt"></i> Step 2: Location & Roof Details</h3>
                                
                                <div class="row">
                                    <div class="col-md-6 mb-20">
                                        <div class="form-group">
                                            <label class="form-label fw-bold">City / Location <span class="text-danger">*</span></label>
                                            <div class="city-selector">
                                                <select id="city" class="form-control form-control-lg city-dropdown" required onchange="updatePeakSunHours()">
                                                    <option value="">📍 Select Your City in Pakistan</option>
                                                    
                                                    <!-- Sindh -->
                                                    <optgroup label="🌅 SINDH">
                                                        <option value="karachi">Karachi (5.8h) - Coastal, Very Sunny</option>
                                                        <option value="hyderabad">Hyderabad (5.7h) - Central, Very Sunny</option>
                                                        <option value="sukkur">Sukkur (5.8h) - Upper Sindh</option>
                                                        <option value="larkana">Larkana (5.7h) - Historic City</option>
                                                        <option value="jacobabad">Jacobabad (5.9h) - Hot Zone</option>
                                                        <option value="khairpur">Khairpur (5.6h) - Central Sindh</option>
                                                        <option value="mirpur_khas">Mirpur Khas (5.6h) - Eastern Sindh</option>
                                                        <option value="tando_allahyar">Tando Allahyar (5.5h) - Lower Sindh</option>
                                                    </optgroup>
                                                    
                                                    <!-- Punjab -->
                                                    <optgroup label="🌾 PUNJAB">
                                                        <option value="lahore">Lahore (5.2h) - Capital Region</option>
                                                        <option value="faisalabad">Faisalabad (5.3h) - Industrial Hub</option>
                                                        <option value="multan">Multan (5.6h) - Ancient City, Very Sunny</option>
                                                        <option value="sahiwal">Sahiwal (5.5h) - Cotton City</option>
                                                        <option value="sargodha">Sargodha (5.4h) - Fruit City</option>
                                                        <option value="gujranwala">Gujranwala (5.1h) - Industrial Zone</option>
                                                        <option value="gujrat">Gujrat (5.0h) - Industrial Area</option>
                                                        <option value="sialkot">Sialkot (5.0h) - Sports City</option>
                                                        <option value="sheikhupura">Sheikhupura (5.2h) - Near Lahore</option>
                                                        <option value="jhang">Jhang (5.3h) - Central Punjab</option>
                                                        <option value="okara">Okara (5.4h) - Agricultural</option>
                                                        <option value="bahawalpur">Bahawalpur (5.5h) - Southern Punjab</option>
                                                        <option value="bahawalnagar">Bahawalnagar (5.5h) - South Punjab</option>
                                                        <option value="rahim_yar_khan">Rahim Yar Khan (5.6h) - South Punjab</option>
                                                        <option value="lodhran">Lodhran (5.5h) - Southern Area</option>
                                                        <option value="jhellum">Jhelum (4.9h) - Salt Region</option>
                                                        <option value="chakwal">Chakwal (4.9h) - Northern Punjab</option>
                                                        <option value="attock">Attock (5.0h) - Western Punjab</option>
                                                        <option value="mianwali">Mianwali (5.3h) - Northern Area</option>
                                                    </optgroup>
                                                    
                                                    <!-- Khyber Pakhtunkhwa -->
                                                    <optgroup label="⛰️ KHYBER PAKHTUNKHWA">
                                                        <option value="peshawar">Peshawar (4.9h) - Provincial Capital</option>
                                                        <option value="mardan">Mardan (4.9h) - Garden City</option>
                                                        <option value="swat">Swat (4.6h) - Mountain Valley</option>
                                                        <option value="kohat">Kohat (5.1h) - Historic City</option>
                                                        <option value="abbottabad">Abbottabad (4.7h) - Hill Station</option>
                                                        <option value="mansehra">Mansehra (4.7h) - Mountainous</option>
                                                        <option value="karak">Karak (5.0h) - Scenic Area</option>
                                                        <option value="hangu">Hangu (5.0h) - Coal Region</option>
                                                        <option value="bannu">Bannu (5.1h) - Southern KP</option>
                                                        <option value="dera_ismail_khan">Dera Ismail Khan (5.2h) - Hot Zone</option>
                                                        <option value="charsadda">Charsadda (4.9h) - Northern Area</option>
                                                        <option value="nowshera">Nowshera (4.9h) - Indus Valley</option>
                                                    </optgroup>
                                                    
                                                    <!-- Balochistan -->
                                                    <optgroup label="🏜️ BALOCHISTAN">
                                                        <option value="quetta">Quetta (6.2h) - BEST SUN! Provincial Capital</option>
                                                        <option value="gwadar">Gwadar (6.1h) - Coastal Port</option>
                                                        <option value="turbat">Turbat (6.0h) - Makran Region</option>
                                                        <option value="khuzdar">Khuzdar (6.0h) - Central Balochistan</option>
                                                        <option value="kalat">Kalat (5.9h) - Historic Region</option>
                                                        <option value="sibi">Sibi (5.9h) - Southern Area</option>
                                                        <option value="zhob">Zhob (5.8h) - Northern Balochistan</option>
                                                        <option value="loralai">Loralai (5.8h) - Western Area</option>
                                                        <option value="musakhel">Musakhel (5.8h) - Northern Zone</option>
                                                        <option value="chagai">Chagai (6.1h) - Desert Region</option>
                                                    </optgroup>
                                                    
                                                    <!-- Islamabad & Others -->
                                                    <optgroup label="🏛️ ISLAMABAD & FEDERAL AREAS">
                                                        <option value="islamabad">Islamabad (4.8h) - Federal Capital</option>
                                                        <option value="rawalpindi">Rawalpindi (4.8h) - Twin City</option>
                                                    </optgroup>
                                                    
                                                    <!-- AJK -->
                                                    <optgroup label="🏔️ AZAD JAMMU & KASHMIR">
                                                        <option value="muzaffarabad">Muzaffarabad (4.4h) - AJK Capital</option>
                                                        <option value="mirpur">Mirpur (4.5h) - AJK Region</option>
                                                        <option value="kotli">Kotli (4.5h) - Mountain Area</option>
                                                    </optgroup>
                                                    
                                                    <!-- Gilgit-Baltistan -->
                                                    <optgroup label="❄️ GILGIT-BALTISTAN">
                                                        <option value="gilgit">Gilgit (5.0h) - Mountain Region</option>
                                                        <option value="skardu">Skardu (5.2h) - High Altitude</option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                            <small class="form-text text-muted mt-2">
                                                <i class="fas fa-info-circle"></i> More sunshine = Better solar production. Quetta has best sunlight in Pakistan!
                                            </small>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-20">
                                        <div class="form-group">
                                            <label class="form-label fw-bold">Peak Sun Hours (Calculated)</label>
                                            <div class="peak-sun-display">
                                                <input type="text" id="peakSunHours" class="form-control form-control-lg" readonly style="background-color: #e8f4f8; border: 2px solid #667eea; font-weight: bold;">
                                                <small class="form-text text-muted mt-2">Hours of effective sunlight per day</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Roof Type Selection -->
                                <div class="mb-4">
                                    <label class="form-label fw-bold mb-3">Roof Type & Material</label>
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <div class="roof-type-card" onclick="selectRoofType('concrete')">
                                                <div class="roof-icon"><i class="fas fa-warehouse"></i></div>
                                                <div class="roof-name">Concrete Slab</div>
                                                <div class="roof-rating">⭐⭐⭐⭐⭐ Ideal</div>
                                                <small>Flat, no obstructions</small>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <div class="roof-type-card" onclick="selectRoofType('metal')">
                                                <div class="roof-icon"><i class="fas fa-industry"></i></div>
                                                <div class="roof-name">Metal Roof</div>
                                                <div class="roof-rating">⭐⭐⭐⭐⭐ Excellent</div>
                                                <small>Easy mounting</small>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <div class="roof-type-card" onclick="selectRoofType('tile')">
                                                <div class="roof-icon"><i class="fas fa-home"></i></div>
                                                <div class="roof-name">Tile Roof</div>
                                                <div class="roof-rating">⭐⭐⭐⭐ Good</div>
                                                <small>Standard</small>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <div class="roof-type-card" onclick="selectRoofType('asbestos')">
                                                <div class="roof-icon"><i class="fas fa-cube"></i></div>
                                                <div class="roof-name">Asbestos</div>
                                                <div class="roof-rating">⭐⭐⭐ Fair</div>
                                                <small>Acceptable</small>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <div class="roof-type-card" onclick="selectRoofType('ground')">
                                                <div class="roof-icon"><i class="fas fa-square"></i></div>
                                                <div class="roof-name">Ground Mount</div>
                                                <div class="roof-rating">⭐⭐⭐⭐⭐ Perfect</div>
                                                <small>Best option</small>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" id="roofType">
                                </div>

                                <!-- Roof Area Input -->
                                <div class="mb-4">
                                    <label class="form-label fw-bold">Available Roof Area</label>
                                    <div class="roof-area-input">
                                        <input type="range" id="roofAreaSlider" class="form-range" min="100" max="2000" value="500" step="50" oninput="updateRoofAreaFromSlider(this.value)">
                                        <input type="number" id="roofArea" class="form-control form-control-lg" placeholder="e.g., 500" min="100" step="50" oninput="updateRoofAreaSlider(this.value)">
                                        <div class="slider-labels">
                                            <span>100 sq ft</span>
                                            <span id="roofAreaValue">500 sq ft</span>
                                            <span>2000 sq ft</span>
                                        </div>
                                    </div>
                                    <small class="form-text text-muted mt-2">
                                        <i class="fas fa-lightbulb"></i> 1 kW system needs ~100-120 sq ft. We'll warn you if insufficient
                                    </small>
                                </div>

                                <!-- Battery Checkbox with More Options -->
                                <div class="mb-4 p-4 bg-light rounded border-start border-4 border-info">
                                    <h6 class="mb-3"><i class="fas fa-battery-half"></i> Do You Want Backup Power?</h6>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="batteryNo" name="batteryOption" value="no" checked onchange="updateBatteryVisibility()">
                                                <label class="form-check-label" for="batteryNo">
                                                    <strong>No Battery</strong><br>
                                                    <small class="text-muted">Grid-tied only (save money)</small>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="batteryPartial" name="batteryOption" value="partial" onchange="updateBatteryVisibility()">
                                                <label class="form-check-label" for="batteryPartial">
                                                    <strong>Partial Backup</strong><br>
                                                    <small class="text-muted">Few hours backup (hybrid)</small>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="batteryFull" name="batteryOption" value="full" onchange="updateBatteryVisibility()">
                                                <label class="form-check-label" for="batteryFull">
                                                    <strong>Full Backup</strong><br>
                                                    <small class="text-muted">24/7 independence (expensive)</small>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" id="wantsBattery" value="no">
                                </div>

                                <!-- Info Box -->
                                <div class="alert alert-light border-start border-4 border-success mt-4">
                                    <h6 class="alert-heading"><i class="fas fa-lightbulb"></i> Roof Facts</h6>
                                    <ul class="mb-0 ps-3">
                                        <li>South-facing roofs get best sunlight in Pakistan</li>
                                        <li>Shaded areas reduce generation by 20-50%</li>
                                        <li>Clean roof yearly = 5-10% better performance</li>
                                    </ul>
                                </div>
                            </div>

                            <!-- STEP 3: Calculations -->
                            <div class="form-step" data-step="3" style="display: none;">
                                <h3 class="mb-30"><i class="fas fa-calculator"></i> Step 3: System Calculations</h3>
                                
                                <div class="row">
                                    <div class="col-md-6 mb-20">
                                        <div class="calc-card">
                                            <div class="calc-label">Required System Size</div>
                                            <div class="calc-value" id="systemSize">0 kW</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-20">
                                        <div class="calc-card">
                                            <div class="calc-label">Daily Power Generation</div>
                                            <div class="calc-value" id="dailyGeneration">0 kWh</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-20">
                                        <div class="calc-card">
                                            <div class="calc-label">Monthly Power Generation</div>
                                            <div class="calc-value" id="monthlyGeneration">0 kWh</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-20">
                                        <div class="calc-card">
                                            <div class="calc-label">Number of Solar Panels</div>
                                            <div class="calc-value" id="panelCount">0 pcs</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-20">
                                        <div class="calc-card">
                                            <div class="calc-label">Inverter Capacity</div>
                                            <div class="calc-value" id="inverterCapacity">0 kW</div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-20">
                                        <div class="calc-card">
                                            <div class="calc-label">Battery Backup (Optional)</div>
                                            <div class="calc-value" id="batteryCapacity">0 kWh</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="alert alert-info mt-4">
                                    <i class="fas fa-info-circle"></i> <strong>How we calculated:</strong>
                                    <ul class="mt-2 mb-0">
                                        <li>System Size = Monthly kWh / (30 × Peak Sun Hours × 0.75 efficiency)</li>
                                        <li>Panels = System Size / Panel Wattage</li>
                                        <li>Inverter = System Size + 20% buffer</li>
                                        <li>Battery = Daily usage × 2 days backup (if selected)</li>
                                    </ul>
                                </div>
                            </div>

                            <!-- STEP 4: Package Selection -->
                            <div class="form-step" data-step="4" style="display: none;">
                                <h3 class="mb-30"><i class="fas fa-cube"></i> Step 4: Select Your Package</h3>
                                
                                <div class="alert alert-info mb-4">
                                    <i class="fas fa-info-circle"></i> <strong>Two Ways to Choose:</strong> Use our smart recommendation or build your custom package with better quality components
                                </div>

                                <ul class="nav nav-tabs nav-tabs-custom mb-4" id="packageTabs" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="recommended-tab" data-bs-toggle="tab" data-bs-target="#recommended" type="button" role="tab">
                                            <i class="fas fa-wand-magic-sparkles"></i> Smart Recommendation
                                        </button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="custom-tab" data-bs-toggle="tab" data-bs-target="#custom" type="button" role="tab">
                                            <i class="fas fa-sliders-h"></i> Custom Components
                                        </button>
                                    </li>
                                </ul>

                                <div class="tab-content" id="packageContent">
                                    <div class="tab-pane fade show active" id="recommended" role="tabpanel">
                                        <h5 class="mb-3">Complete Solar System Package</h5>
                                        <div id="recommendedPackageContent" class="package-container">
                                            <!-- Auto-filled -->
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="custom" role="tabpanel">
                                        <h5 class="mb-3">Build Your Own Package</h5>
                                        
                                        <div class="component-section mb-4">
                                            <h6><i class="fas fa-square"></i> Solar Panels</h6>
                                            <div id="panelsSelection" class="row">
                                                <!-- Auto-filled -->
                                            </div>
                                        </div>

                                        <div class="component-section mb-4">
                                            <h6><i class="fas fa-plug"></i> Inverter Type</h6>
                                            <div id="inverterSelection">
                                                <!-- Auto-filled -->
                                            </div>
                                        </div>

                                        <div class="component-section mb-4" id="batterySection" style="display: none;">
                                            <h6><i class="fas fa-battery-full"></i> Backup Batteries</h6>
                                            <div id="batterySelection">
                                                <!-- Auto-filled -->
                                            </div>
                                        </div>

                                        <div class="component-section mb-4">
                                            <h6><i class="fas fa-hammer"></i> Structure & Installation</h6>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="installationService" checked>
                                                <label class="form-check-label" for="installationService">
                                                    Professional Installation Service <span class="badge bg-success">+Rs 50,000</span>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="warrantyService">
                                                <label class="form-check-label" for="warrantyService">
                                                    Extended 5-Year Warranty <span class="badge bg-info">+Rs 25,000</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="price-update-section mt-4 p-3 bg-light rounded">
                                    <h5>Real-Time Price Breakdown</h5>
                                    <div id="priceBreakdown">
                                        <!-- Auto-filled -->
                                    </div>
                                    <div class="total-price-section mt-3 pt-3 border-top">
                                        <h4 class="mb-0">
                                            Estimated Total Price: <span id="totalEstimatedPrice" class="text-success">Rs 0</span>
                                        </h4>
                                    </div>
                                </div>
                            </div>

                            <!-- STEP 5: Final Summary -->
                            <div class="form-step" data-step="5" style="display: none;">
                                <h3 class="mb-30"><i class="fas fa-check-circle"></i> Step 5: Your Solar System Summary & Contact</h3>
                                
                                <div class="summary-card p-4 rounded mb-4" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white;">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="summary-item">
                                                <div class="summary-label">System Size</div>
                                                <div class="summary-value" id="summarySystemSize">0 kW</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="summary-item">
                                                <div class="summary-label">Estimated Monthly Savings</div>
                                                <div class="summary-value" id="summarySavings">Rs 0</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <div class="summary-card p-3 rounded">
                                            <h6>System Details</h6>
                                            <ul id="summaryDetails" class="summary-list">
                                                <!-- Auto-filled -->
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="summary-card p-3 rounded">
                                            <h6>Financial Overview</h6>
                                            <ul class="summary-list">
                                                <li>
                                                    <span>Estimated Cost:</span>
                                                    <strong id="summaryTotalCost">Rs 0</strong>
                                                </li>
                                                <li>
                                                    <span>Annual Savings:</span>
                                                    <strong id="summaryAnnualSavings">Rs 0</strong>
                                                </li>
                                                <li>
                                                    <span>Payback Period (ROI):</span>
                                                    <strong id="summaryPaybackPeriod">0 years</strong>
                                                </li>
                                                <li>
                                                    <span>25-Year Profit:</span>
                                                    <strong id="summary25YearProfit">Rs 0</strong>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="selected-components mb-4">
                                    <h6>Selected Components</h6>
                                    <div id="summaryComponents">
                                        <!-- Auto-filled -->
                                    </div>
                                </div>

                                <!-- Contact Information Section -->
                                <div class="contact-info-section mt-4 pt-4 border-top">
                                    <h4 class="mb-4"><i class="fas fa-user"></i> Your Contact Information</h4>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <div class="form-group">
                                                <label class="form-label fw-bold">Full Name <span class="text-danger">*</span></label>
                                                <input type="text" name="name" class="form-control form-control-lg" placeholder="Your full name" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="form-group">
                                                <label class="form-label fw-bold">Email Address <span class="text-danger">*</span></label>
                                                <input type="email" name="email" class="form-control form-control-lg" placeholder="your@email.com" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <div class="form-group">
                                                <label class="form-label fw-bold">Phone Number <span class="text-danger">*</span></label>
                                                <input type="tel" name="phone" class="form-control form-control-lg" placeholder="+92 300 1234567" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="form-group">
                                                <label class="form-label fw-bold">Preferred Contact Method <span class="text-danger">*</span></label>
                                                <select name="contact_method" class="form-control form-control-lg" required>
                                                    <option value="">-- Select Method --</option>
                                                    <option value="email">📧 Email</option>
                                                    <option value="phone">📞 Phone Call</option>
                                                    <option value="whatsapp">💬 WhatsApp</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 mb-3">
                                            <div class="form-group">
                                                <label class="form-label fw-bold">Additional Message (Optional)</label>
                                                <textarea name="additional_message" class="form-control" rows="3" placeholder="Any questions or special requirements?"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Hidden fields to store calculated values -->
                                <input type="hidden" name="system_size" id="formSystemSize">
                                <input type="hidden" name="daily_generation" id="formDailyGeneration">
                                <input type="hidden" name="monthly_generation" id="formMonthlyGeneration">
                                <input type="hidden" name="panel_count" id="formPanelCount">
                                <input type="hidden" name="inverter_capacity" id="formInverterCapacity">
                                <input type="hidden" name="selected_panel" id="formSelectedPanel">
                                <input type="hidden" name="panel_price" id="formPanelPrice">
                                <input type="hidden" name="selected_inverter" id="formSelectedInverter">
                                <input type="hidden" name="inverter_price" id="formInverterPrice">
                                <input type="hidden" name="selected_battery" id="formSelectedBattery">
                                <input type="hidden" name="battery_price" id="formBatteryPrice">
                                <input type="hidden" name="installation_service_cost" id="formInstallationCost">
                                <input type="hidden" name="warranty_service_cost" id="formWarrantyCost">
                                <input type="hidden" name="total_price" id="formTotalPrice">
                                <input type="hidden" name="estimated_monthly_savings" id="formMonthlySavings">
                                <input type="hidden" name="estimated_annual_savings" id="formAnnualSavings">
                                <input type="hidden" name="roof_direction" id="formRoofDirection" value="South">

                                <!-- CSRF Token -->
                                @csrf

                                <!-- Submit Button -->
                                <div class="row mt-4">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary btn-estimator w-100 btn-lg">
                                            <i class="fas fa-check"></i> Submit Estimation & Get Quote
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </form>

                        <!-- Navigation Buttons -->
                        <div class="form-navigation mt-40">
                            <button type="button" class="btn btn-secondary btn-lg" id="prevBtn" onclick="previousStep()" style="display: none;">
                                <i class="fas fa-arrow-left"></i> Previous
                            </button>
                            <button type="button" class="btn btn-primary btn-lg" id="nextBtn" onclick="nextStep()">
                                Next <i class="fas fa-arrow-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Email Quote Modal -->
    <div id="emailQuoteModal" class="modal fade" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Send Quote via Email</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="emailQuoteForm">
                        <div class="form-group mb-3">
                            <label>Full Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="quoteName" required>
                        </div>
                        <div class="form-group mb-3">
                            <label>Email Address <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="quoteEmail" required>
                        </div>
                        <div class="form-group mb-3">
                            <label>Phone Number <span class="text-danger">*</span></label>
                            <input type="tel" class="form-control" id="quotePhone" required>
                        </div>
                        <div class="form-group mb-3">
                            <label>Message (Optional)</label>
                            <textarea class="form-control" id="quoteMessage" rows="4" placeholder="Any additional details..."></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" onclick="submitEmailQuote()">Send Quote</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Styles for Solar Estimator Page -->
<style>
    :root {
        --primary: #667eea;
        --secondary: #764ba2;
        --success: #28a745;
        --info: #17a2b8;
        --danger: #dc3545;
        --light: #f8fafc;
        --dark: #2d3748;
    }

    .page-title {
        margin-top: 20px;
    }

    /* ===== PRESET CARDS ===== */
    .preset-card {
        background: white;
        border: 2px solid #e9ecef;
        border-radius: 12px;
        padding: 25px 15px;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s ease;
        position: relative;
    }

    .preset-card:hover {
        border-color: var(--primary);
        box-shadow: 0 8px 16px rgba(102, 126, 234, 0.15);
        transform: translateY(-3px);
    }

    .preset-card.selected {
        background: linear-gradient(135deg, rgba(102, 126, 234, 0.1) 0%, rgba(118, 75, 162, 0.1) 100%);
        border-color: var(--primary);
        box-shadow: 0 8px 16px rgba(102, 126, 234, 0.25);
    }

    .preset-icon {
        font-size: 2.5rem;
        margin-bottom: 12px;
        color: var(--primary);
    }

    .preset-card.selected .preset-icon {
        transform: scale(1.1);
    }

    .preset-title {
        font-weight: 700;
        font-size: 1.1rem;
        color: var(--dark);
        margin-bottom: 5px;
    }

    .preset-sub {
        font-size: 0.85rem;
        color: #666;
        line-height: 1.4;
    }

    /* ===== DIVIDER ===== */
    .divider-section {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 15px;
        margin: 30px 0;
    }

    .divider-section::before,
    .divider-section::after {
        content: '';
        flex: 1;
        height: 1px;
        background: #e9ecef;
    }

    .divider-section span {
        color: #999;
        font-weight: 500;
        font-size: 0.9rem;
    }

    /* ===== SLIDER INPUTS ===== */
    .input-with-slider {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .form-range {
        height: 8px;
        border-radius: 4px;
        background: linear-gradient(90deg, #e9ecef 0%, #e9ecef 100%);
        border: none;
    }

    .form-range::-webkit-slider-thumb {
        appearance: none;
        width: 24px;
        height: 24px;
        border-radius: 50%;
        background: var(--primary);
        cursor: pointer;
        border: 3px solid white;
        box-shadow: 0 2px 8px rgba(102, 126, 234, 0.3);
    }

    .form-range::-moz-range-thumb {
        width: 24px;
        height: 24px;
        border-radius: 50%;
        background: var(--primary);
        cursor: pointer;
        border: 3px solid white;
        box-shadow: 0 2px 8px rgba(102, 126, 234, 0.3);
    }

    .slider-labels {
        display: flex;
        justify-content: space-between;
        font-size: 0.85rem;
        color: #999;
        padding: 0 2px;
    }

    /* ===== CONNECTION OPTIONS ===== */
    .connection-option {
        background: white;
        border: 2px solid #e9ecef;
        border-radius: 12px;
        padding: 20px;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: flex-start;
        gap: 15px;
    }

    .connection-option:hover {
        border-color: var(--primary);
        background: #f8f9fc;
    }

    .connection-option.selected {
        background: linear-gradient(135deg, rgba(102, 126, 234, 0.1) 0%, rgba(118, 75, 162, 0.1) 100%);
        border-color: var(--primary);
        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.2);
    }

    .connection-icon {
        font-size: 2rem;
        color: var(--primary);
        min-width: 50px;
        text-align: center;
    }

    .connection-info {
        flex: 1;
    }

    .connection-title {
        font-weight: 700;
        color: var(--dark);
        font-size: 1.05rem;
        margin-bottom: 5px;
    }

    .connection-details {
        font-size: 0.9rem;
        color: #666;
        line-height: 1.5;
    }

    /* ===== ROOF TYPE CARDS ===== */
    .roof-type-card {
        background: white;
        border: 2px solid #e9ecef;
        border-radius: 12px;
        padding: 20px 15px;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .roof-type-card:hover {
        border-color: var(--success);
        box-shadow: 0 8px 16px rgba(40, 167, 69, 0.15);
        transform: translateY(-3px);
    }

    .roof-type-card.selected {
        background: linear-gradient(135deg, rgba(40, 167, 69, 0.1) 0%, rgba(40, 167, 69, 0.05) 100%);
        border-color: var(--success);
        box-shadow: 0 8px 16px rgba(40, 167, 69, 0.25);
    }

    .roof-icon {
        font-size: 2rem;
        margin-bottom: 10px;
        color: var(--primary);
    }

    .roof-type-card.selected .roof-icon {
        color: var(--success);
        transform: scale(1.15);
    }

    .roof-name {
        font-weight: 700;
        color: var(--dark);
        margin: 10px 0 5px;
    }

    .roof-rating {
        color: #ff9800;
        font-size: 0.9rem;
        margin-bottom: 8px;
    }

    .roof-type-card small {
        color: #999;
        font-size: 0.8rem;
    }

    /* ===== ROOF AREA SLIDER ===== */
    .roof-area-input {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    /* ===== CALCULATION CARDS ===== */
    .estimator-form-wrapper {
        border: 1px solid #e9ecef;
    }

    .calc-card {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 25px 20px;
        border-radius: 12px;
        text-align: center;
        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.2);
    }

    .calc-label {
        font-size: 0.9rem;
        opacity: 0.9;
        margin-bottom: 10px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .calc-value {
        font-size: 28px;
        font-weight: bold;
        line-height: 1.2;
    }

    /* ===== COMPONENT ITEMS ===== */
    .component-item {
        background: white;
        border: 2px solid #e9ecef;
        border-radius: 12px;
        padding: 18px;
        margin-bottom: 15px;
        cursor: pointer;
        transition: all 0.3s ease;
        position: relative;
    }

    .component-item:hover {
        border-color: var(--success);
        box-shadow: 0 4px 12px rgba(40, 167, 69, 0.15);
        transform: translateX(4px);
    }

    .component-item.selected {
        background: linear-gradient(135deg, rgba(40, 167, 69, 0.08) 0%, rgba(40, 167, 69, 0.02) 100%);
        border-color: var(--success);
        box-shadow: 0 4px 12px rgba(40, 167, 69, 0.25);
    }

    .component-item.selected::before {
        content: '✓';
        position: absolute;
        top: -8px;
        right: 10px;
        background: var(--success);
        color: white;
        width: 28px;
        height: 28px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        font-size: 1rem;
        box-shadow: 0 2px 8px rgba(40, 167, 69, 0.3);
    }

    .component-title {
        font-weight: 700;
        margin-bottom: 6px;
        color: var(--dark);
        font-size: 1.05rem;
    }

    .component-specs {
        font-size: 0.85rem;
        color: #666;
        margin-bottom: 10px;
        line-height: 1.4;
    }

    .component-price {
        font-size: 1.3rem;
        color: var(--success);
        font-weight: bold;
        text-align: right;
    }

    /* ===== COMPONENT SECTION ===== */
    .component-section {
        background: white;
        padding: 20px;
        border: 1px solid #dee2e6;
        border-radius: 12px;
        margin-bottom: 20px;
    }

    .component-section h6 {
        margin-bottom: 18px;
        color: var(--dark);
        font-weight: 700;
        font-size: 1.05rem;
    }

    /* ===== PRICE SECTION ===== */
    .price-update-section {
        background: linear-gradient(135deg, #f8fafc 0%, #f0f4fc 100%);
        border: 1px solid #e9ecef;
        border-left: 4px solid var(--primary);
    }

    .price-item {
        display: flex;
        justify-content: space-between;
        padding: 12px 0;
        font-size: 0.95rem;
        border-bottom: 1px solid #e9ecef;
        align-items: center;
    }

    .price-item:last-child {
        border-bottom: none;
    }

    .price-item span {
        color: #666;
    }

    .price-item strong {
        color: var(--dark);
        font-weight: 600;
    }

    .total-price-section {
        color: var(--success);
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    #totalEstimatedPrice {
        font-size: 1.4rem;
        font-weight: 700;
    }

    /* ===== SUMMARY CARDS ===== */
    .summary-card {
        background: #f8f9fa;
        border: 1px solid #dee2e6;
        color: #333;
        border-radius: 12px;
    }

    .summary-card p {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 20px;
        border-radius: 12px;
    }

    .summary-label {
        font-size: 0.85rem;
        opacity: 0.8;
        margin-bottom: 8px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .summary-value {
        font-size: 1.8rem;
        font-weight: bold;
    }

    .summary-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .summary-list li {
        display: flex;
        justify-content: space-between;
        padding: 12px 0;
        border-bottom: 1px solid #e9ecef;
        font-size: 0.95rem;
    }

    .summary-list li:last-child {
        border-bottom: none;
    }

    .summary-list span {
        color: #666;
    }

    .summary-list strong {
        color: var(--success);
        font-weight: 700;
    }

    /* ===== STEP INDICATOR ===== */
    .step-indicator {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 40px;
        gap: 15px;
    }

    .step-item {
        display: flex;
        flex-direction: column;
        align-items: center;
        flex: 1;
        position: relative;
    }

    .step-item:not(:last-child)::after {
        content: '';
        position: absolute;
        top: 20px;
        left: 50%;
        width: 100%;
        height: 3px;
        background: #e9ecef;
        z-index: 0;
    }

    .step-item.active:not(:last-child)::after {
        background: linear-gradient(90deg, var(--success), var(--success));
    }

    .step-item.completed:not(:last-child)::after {
        background: var(--success);
    }

    .step-number {
        width: 45px;
        height: 45px;
        border-radius: 50%;
        background: white;
        border: 3px solid #e9ecef;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        position: relative;
        z-index: 1;
        color: #999;
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    .step-item.active .step-number {
        background: linear-gradient(135deg, var(--primary), var(--secondary));
        color: white;
        border-color: var(--primary);
        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
    }

    .step-item.completed .step-number {
        background: var(--success);
        color: white;
        border-color: var(--success);
    }

    .step-label {
        margin-top: 12px;
        font-size: 0.85rem;
        font-weight: 600;
        text-align: center;
        color: #999;
        transition: all 0.3s ease;
    }

    .step-item.active .step-label {
        color: var(--primary);
        font-weight: 700;
    }

    .step-item.completed .step-label {
        color: var(--success);
    }

    /* ===== NAV TABS CUSTOM ===== */
    .nav-tabs-custom {
        border-bottom: 2px solid #e9ecef;
        gap: 10px;
    }

    .nav-tabs-custom .nav-link {
        border: none;
        border-bottom: 3px solid transparent;
        color: #666;
        font-weight: 600;
        padding: 12px 20px;
        transition: all 0.3s ease;
    }

    .nav-tabs-custom .nav-link:hover {
        color: var(--primary);
        border-bottom-color: var(--primary);
    }

    .nav-tabs-custom .nav-link.active {
        color: white;
        background: linear-gradient(135deg, var(--primary), var(--secondary));
        border-radius: 8px 8px 0 0;
        border-bottom: 3px solid transparent;
    }

    /* ===== FORM NAVIGATION ===== */
    .form-navigation {
        display: flex;
        gap: 12px;
        justify-content: flex-end;
        margin-top: 40px;
    }

    .form-navigation button {
        padding: 12px 32px;
        font-weight: 600;
        border-radius: 8px;
        transition: all 0.3s ease;
    }

    .form-navigation .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(102, 126, 234, 0.3);
    }

    .form-navigation .btn-secondary:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(108, 117, 125, 0.2);
    }

    /* ===== UTILITIES ===== */
    .py-60 {
        padding-top: 60px;
        padding-bottom: 60px;
    }

    .p-40 {
        padding: 40px;
    }

    .mb-50 {
        margin-bottom: 50px;
    }

    .mb-30 {
        margin-bottom: 30px;
    }

    .rounded-10 {
        border-radius: 10px;
    }

    .shadow-sm {
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12);
    }

    .fw-bold {
        font-weight: 700;
    }

    .form-control-lg {
        padding: 12px 16px;
        font-size: 1rem;
        border-radius: 8px;
        border: 1px solid #e9ecef;
    }

    .form-control-lg:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 768px) {
        .step-indicator {
            flex-wrap: wrap;
            gap: 20px;
        }

        .step-item {
            flex: 0 0 calc(50% - 10px);
        }

        .step-item:nth-child(5) {
            flex: 0 0 100%;
        }

        .step-item:not(:last-child)::after {
            display: none;
        }

        .calc-value {
            font-size: 22px;
        }

        .form-navigation {
            flex-direction: column;
        }

        .form-navigation button {
            width: 100%;
        }

        .p-40 {
            padding: 20px;
        }

        .connection-option {
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .preset-card {
            padding: 18px 10px;
        }

        .preset-icon {
            font-size: 2rem;
        }

        .nav-tabs-custom .nav-link {
            padding: 10px 15px;
            font-size: 0.9rem;
        }
    }
</style>

<!-- Solar Estimator JavaScript -->
<script src="{{ asset('frontend/assets/js/solar-estimator.js') }}"></script>

<x-footer />

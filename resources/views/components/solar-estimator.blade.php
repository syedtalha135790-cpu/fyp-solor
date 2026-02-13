<!-- Solar Energy Estimation & Package Builder Modal -->
<div id="solarEstimatorModal" class="modal fade" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">
                    <i class="fas fa-solar-panel"></i> Solar Energy Estimation & Package Builder
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Step Indicator -->
                <div class="step-indicator mb-4">
                    <div class="step-item" data-step="1">
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

                <!-- Form Container -->
                <form id="solarEstimationForm">

                    <!-- STEP 1: Electricity Usage -->
                    <div class="form-step" data-step="1">
                        <h4 class="mb-4"><i class="fas fa-bolt"></i> Step 1: Your Electricity Usage</h4>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Monthly Electricity Units (kWh) <span class="text-danger">*</span></label>
                                    <input type="number" id="monthlyKwh" class="form-control" placeholder="e.g., 300" min="0" step="1">
                                    <small class="form-text text-muted">OR enter your monthly bill</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Monthly Electricity Bill (Rs/PKR) <span class="text-danger">*</span></label>
                                    <input type="number" id="monthlyBill" class="form-control" placeholder="e.g., 5000" min="0" step="0.01">
                                    <small class="form-text text-muted">We'll calculate kWh from your bill</small>
                                </div>
                            </div>
                        </div>

                        <div class="alert alert-info mt-3">
                            <i class="fas fa-lightbulb"></i> <strong>Tip:</strong> Enter either monthly kWh OR bill amount. We'll auto-calculate the other value.
                        </div>

                        <div class="form-group">
                            <label>Connection Type <span class="text-danger">*</span></label>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="singlePhase" name="connectionType" class="custom-control-input" value="single" checked>
                                <label class="custom-control-label" for="singlePhase">
                                    Single Phase (Upto 5 kW)
                                </label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="threePhase" name="connectionType" class="custom-control-input" value="three">
                                <label class="custom-control-label" for="threePhase">
                                    Three Phase (Above 5 kW)
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- STEP 2: Location & Roof Details -->
                    <div class="form-step" data-step="2" style="display: none;">
                        <h4 class="mb-4"><i class="fas fa-map-marker-alt"></i> Step 2: Location & Roof Details</h4>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>City / Location <span class="text-danger">*</span></label>
                                    <select id="city" class="form-control" required>
                                        <option value="">Select Your City</option>
                                        <option value="karachi">Karachi</option>
                                        <option value="lahore">Lahore</option>
                                        <option value="islamabad">Islamabad</option>
                                        <option value="rawalpindi">Rawalpindi</option>
                                        <option value="faisalabad">Faisalabad</option>
                                        <option value="multan">Multan</option>
                                        <option value="sahiwal">Sahiwal</option>
                                        <option value="peshawar">Peshawar</option>
                                        <option value="quetta">Quetta</option>
                                        <option value="hyderabad">Hyderabad</option>
                                        <option value="gujranwala">Gujranwala</option>
                                        <option value="sialkot">Sialkot</option>
                                    </select>
                                    <small class="form-text text-muted">Location affects sunlight estimation</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Annual Peak Sun Hours (PSH) <span class="text-danger">*</span></label>
                                    <input type="number" id="peakSunHours" class="form-control" placeholder="e.g., 5.5" min="0" step="0.1" readonly>
                                    <small class="form-text text-muted">Auto-calculated from city</small>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Roof Type <span class="text-danger">*</span></label>
                                    <select id="roofType" class="form-control" required>
                                        <option value="">Select Roof Type</option>
                                        <option value="concrete">Concrete (Best - No obstructions)</option>
                                        <option value="metal">Metal (Good - Easy mounting)</option>
                                        <option value="tile">Tile (Good - Standard)</option>
                                        <option value="asbestos">Asbestos (Acceptable)</option>
                                        <option value="ground">Ground Installation</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Available Roof Area (sq ft) <span class="text-danger">*</span></label>
                                    <input type="number" id="roofArea" class="form-control" placeholder="e.g., 500" min="0" step="1">
                                    <small class="form-text text-muted">1 kW needs ~100-120 sq ft</small>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="wantsBattery">
                                <label class="custom-control-label" for="wantsBattery">
                                    I want backup batteries (for off-grid / hybrid system)
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- STEP 3: Calculations & Summary -->
                    <div class="form-step" data-step="3" style="display: none;">
                        <h4 class="mb-4"><i class="fas fa-calculator"></i> Step 3: System Calculations</h4>
                        
                        <div class="calculation-results">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="calc-card">
                                        <div class="calc-label">Required System Size</div>
                                        <div class="calc-value" id="systemSize">0 kW</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="calc-card">
                                        <div class="calc-label">Daily Power Generation</div>
                                        <div class="calc-value" id="dailyGeneration">0 kWh</div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="calc-card">
                                        <div class="calc-label">Monthly Power Generation</div>
                                        <div class="calc-value" id="monthlyGeneration">0 kWh</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="calc-card">
                                        <div class="calc-label">Number of Solar Panels</div>
                                        <div class="calc-value" id="panelCount">0 pcs</div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="calc-card">
                                        <div class="calc-label">Inverter Capacity</div>
                                        <div class="calc-value" id="inverterCapacity">0 kW</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="calc-card">
                                        <div class="calc-label">Battery Backup (Optional)</div>
                                        <div class="calc-value" id="batteryCapacity">0 kWh</div>
                                    </div>
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
                        <h4 class="mb-4"><i class="fas fa-cube"></i> Step 4: Select Your Package</h4>
                        
                        <ul class="nav nav-tabs mb-4" id="packageTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="recommended-tab" data-toggle="tab" href="#recommended" role="tab">
                                    ⭐ Recommended Full Package
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="custom-tab" data-toggle="tab" href="#custom" role="tab">
                                    🔧 Custom Individual Selection
                                </a>
                            </li>
                        </ul>

                        <!-- Recommended Package -->
                        <div class="tab-content" id="packageContent">
                            <div class="tab-pane fade show active" id="recommended" role="tabpanel">
                                <h5 class="mb-3">Complete Solar System Package</h5>
                                <div id="recommendedPackageContent" class="package-container">
                                    <!-- Auto-filled -->
                                </div>
                            </div>

                            <!-- Custom Selection -->
                            <div class="tab-pane fade" id="custom" role="tabpanel">
                                <h5 class="mb-3">Build Your Own Package</h5>
                                
                                <!-- Solar Panels Selection -->
                                <div class="component-section mb-4">
                                    <h6><i class="fas fa-square"></i> Solar Panels</h6>
                                    <div class="form-group">
                                        <label>Select Panel Brand & Wattage</label>
                                        <div id="panelsSelection" class="row">
                                            <!-- Auto-filled -->
                                        </div>
                                    </div>
                                </div>

                                <!-- Inverter Selection -->
                                <div class="component-section mb-4">
                                    <h6><i class="fas fa-plug"></i> Inverter Type</h6>
                                    <div class="form-group">
                                        <label>Choose Inverter Configuration</label>
                                        <div id="inverterSelection">
                                            <!-- Auto-filled -->
                                        </div>
                                    </div>
                                </div>

                                <!-- Batteries Selection -->
                                <div class="component-section mb-4" id="batterySection" style="display: none;">
                                    <h6><i class="fas fa-battery-full"></i> Backup Batteries</h6>
                                    <div class="form-group">
                                        <label>Select Battery Capacity & Type</label>
                                        <div id="batterySelection">
                                            <!-- Auto-filled -->
                                        </div>
                                    </div>
                                </div>

                                <!-- Structure & Installation -->
                                <div class="component-section mb-4">
                                    <h6><i class="fas fa-hammer"></i> Structure & Installation</h6>
                                    <div class="form-group">
                                        <label>Installation Services</label>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="installationService" checked>
                                            <label class="custom-control-label" for="installationService">
                                                Professional Installation Service <span class="badge badge-success">+Rs 50,000</span>
                                            </label>
                                        </div>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="warrantyService">
                                            <label class="custom-control-label" for="warrantyService">
                                                Extended 5-Year Warranty <span class="badge badge-info">+Rs 25,000</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Real-time Price Update -->
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
                        <h4 class="mb-4"><i class="fas fa-check-circle"></i> Step 5: Your Solar System Summary</h4>
                        
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

                        <div class="row">
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

                        <div class="selected-components mt-4">
                            <h6>Selected Components</h6>
                            <div id="summaryComponents">
                                <!-- Auto-filled -->
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-6">
                                <a href="https://wa.me/923001234567?text=Please%20provide%20quote%20for%20solar%20system" target="_blank" class="btn btn-success btn-block btn-lg">
                                    <i class="fab fa-whatsapp"></i> Get Quote on WhatsApp
                                </a>
                            </div>
                            <div class="col-md-6">
                                <button type="button" class="btn btn-primary btn-block btn-lg" onclick="sendEmailQuote()">
                                    <i class="fas fa-envelope"></i> Send Quote via Email
                                </button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>

            <!-- Modal Footer with Navigation Buttons -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="prevBtn" onclick="previousStep()" style="display: none;">
                    <i class="fas fa-arrow-left"></i> Previous
                </button>
                <button type="button" class="btn btn-primary" id="nextBtn" onclick="nextStep()">
                    Next <i class="fas fa-arrow-right"></i>
                </button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

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
                    <div class="form-group">
                        <label>Full Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="quoteName" required>
                    </div>
                    <div class="form-group">
                        <label>Email Address <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" id="quoteEmail" required>
                    </div>
                    <div class="form-group">
                        <label>Phone Number <span class="text-danger">*</span></label>
                        <input type="tel" class="form-control" id="quotePhone" required>
                    </div>
                    <div class="form-group">
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

<style>
    /* Step Indicator Styles */
    .step-indicator {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
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
        height: 2px;
        background: #e9ecef;
        z-index: 0;
    }

    .step-item.active:not(:last-child)::after {
        background: #28a745;
    }

    .step-number {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: #f0f0f0;
        border: 2px solid #ddd;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        position: relative;
        z-index: 1;
        background: white;
        color: #666;
    }

    .step-item.active .step-number {
        background: #28a745;
        color: white;
        border-color: #28a745;
    }

    .step-item.completed .step-number {
        background: #28a745;
        color: white;
        border-color: #28a745;
    }

    .step-item.completed .step-number::after {
        content: '✓';
    }

    .step-label {
        margin-top: 10px;
        font-size: 12px;
        font-weight: 500;
        text-align: center;
        color: #666;
    }

    .step-item.active .step-label {
        color: #28a745;
        font-weight: 600;
    }

    /* Calculation Cards */
    .calc-card {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 20px;
        border-radius: 8px;
        text-align: center;
        margin-bottom: 20px;
    }

    .calc-label {
        font-size: 14px;
        opacity: 0.9;
        margin-bottom: 10px;
    }

    .calc-value {
        font-size: 28px;
        font-weight: bold;
    }

    /* Package Cards */
    .component-item {
        background: white;
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 15px;
        margin-bottom: 15px;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .component-item:hover {
        border-color: #28a745;
        box-shadow: 0 2px 8px rgba(40, 167, 69, 0.15);
    }

    .component-item.selected {
        background: #f0fdf4;
        border-color: #28a745;
    }

    .component-title {
        font-weight: 600;
        margin-bottom: 5px;
    }

    .component-specs {
        font-size: 12px;
        color: #666;
        margin-bottom: 10px;
    }

    .component-price {
        font-size: 18px;
        color: #28a745;
        font-weight: bold;
    }

    /* Summary Cards */
    .summary-card {
        background: #f8f9fa;
        border: 1px solid #dee2e6;
        color: #333;
    }

    .summary-item {
        text-align: center;
        padding: 10px;
    }

    .summary-label {
        font-size: 12px;
        opacity: 0.8;
        margin-bottom: 5px;
    }

    .summary-value {
        font-size: 24px;
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
        padding: 10px 0;
        border-bottom: 1px solid #e9ecef;
        font-size: 14px;
    }

    .summary-list li:last-child {
        border-bottom: none;
    }

    .summary-list span {
        color: #666;
    }

    .summary-list strong {
        color: #28a745;
    }

    /* Price Breakdown */
    .price-update-section {
        border: 2px solid #28a745;
        border-radius: 8px;
    }

    .price-item {
        display: flex;
        justify-content: space-between;
        padding: 8px 0;
        font-size: 14px;
        border-bottom: 1px solid #e9ecef;
    }

    .total-price-section {
        color: #28a745;
    }

    /* Modal Adjustments */
    .modal-xl {
        max-width: 900px;
    }

    .modal-body {
        padding: 30px;
    }

    .form-step {
        animation: fadeIn 0.3s ease;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Component Section */
    .component-section {
        background: white;
        padding: 15px;
        border: 1px solid #dee2e6;
        border-radius: 8px;
    }

    .component-section h6 {
        margin-bottom: 15px;
        color: #333;
        font-weight: 600;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .step-indicator {
            flex-wrap: wrap;
        }

        .step-item {
            flex: 0 0 33.33%;
            margin-bottom: 15px;
        }

        .step-item:not(:last-child)::after {
            display: none;
        }

        .modal-body {
            padding: 15px;
        }

        .calc-value {
            font-size: 20px;
        }
    }
</style>

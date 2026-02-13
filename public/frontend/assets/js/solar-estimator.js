// Solar Energy Estimation & Package Builder - JavaScript Logic
// ============================================================

// Global state management
let solarEstimatorState = {
    currentStep: 1,
    monthlyKwh: 0,
    monthlyBill: 0,
    connectionType: 'single',
    city: '',
    peakSunHours: 5.5,
    roofType: '',
    roofArea: 0,
    wantsBattery: false,
    
    // Calculations
    systemSize: 0,
    dailyGeneration: 0,
    monthlyGeneration: 0,
    panelCount: 0,
    inverterCapacity: 0,
    batteryCapacity: 0,
    
    // Package selection
    selectedPanel: null,
    selectedInverter: null,
    selectedBattery: null,
    installationService: true,
    warrantyService: false,
    
    totalPrice: 0
};

// Peak Sun Hours by Pakistani Cities (Comprehensive)
const peakSunHoursByCity = {
    // Sindh
    karachi: 5.8,
    hyderabad: 5.7,
    sukkur: 5.8,
    larkana: 5.7,
    jacobabad: 5.9,
    khairpur: 5.6,
    mirpur_khas: 5.6,
    tando_allahyar: 5.5,
    
    // Punjab
    lahore: 5.2,
    multan: 5.6,
    faisalabad: 5.3,
    sahiwal: 5.5,
    sargodha: 5.4,
    gujranwala: 5.1,
    gujrat: 5.0,
    sialkot: 5.0,
    sheikhupura: 5.2,
    jhang: 5.3,
    okara: 5.4,
    bahawalpur: 5.5,
    bahawalnagar: 5.5,
    rahim_yar_khan: 5.6,
    lodhran: 5.5,
    jhellum: 4.9,
    chakwal: 4.9,
    attock: 5.0,
    mianwali: 5.3,
    
    // Khyber Pakhtunkhwa
    peshawar: 4.9,
    mardan: 4.9,
    swat: 4.6,
    kohat: 5.1,
    abbottabad: 4.7,
    mansehra: 4.7,
    karak: 5.0,
    hangu: 5.0,
    bannu: 5.1,
    dera_ismail_khan: 5.2,
    charsadda: 4.9,
    nowshera: 4.9,
    
    // Balochistan
    quetta: 6.2,
    gwadar: 6.1,
    turbat: 6.0,
    khuzdar: 6.0,
    kalat: 5.9,
    sibi: 5.9,
    zhob: 5.8,
    loralai: 5.8,
    musakhel: 5.8,
    chagai: 6.1,
    
    // Islamabad & AJK
    islamabad: 4.8,
    rawalpindi: 4.8,
    mirpur: 4.5,
    muzaffarabad: 4.4,
    kotli: 4.5,
    
    // Gilgit-Baltistan
    gilgit: 5.0,
    skardu: 5.2
};

// Solar Panel Data (Brand, Wattage, Price)
const solarPanels = [
    { id: 'panel1', brand: 'JA Solar', wattage: 400, price: 25000, specs: '400W Monocrystalline, 25-year warranty' },
    { id: 'panel2', brand: 'Canadian Solar', wattage: 385, price: 23000, specs: '385W Monocrystalline, 25-year warranty' },
    { id: 'panel3', brand: 'JinkoSolar', wattage: 410, price: 26000, specs: '410W Monocrystalline, 25-year warranty' },
    { id: 'panel4', brand: 'Trina Solar', wattage: 395, price: 24000, specs: '395W Monocrystalline, 25-year warranty' },
    { id: 'panel5', brand: 'LONGi', wattage: 420, price: 27000, specs: '420W Monocrystalline, 25-year warranty' },
    { id: 'panel6', brand: 'Local Brand', wattage: 380, price: 18000, specs: '380W Monocrystalline, 5-year warranty' }
];

// Inverter Data (Type, Capacity, Price)
const inverters = [
    { id: 'inv1', type: 'On-Grid', capacity: 3, price: 120000, specs: '3kW Single Phase, String Inverter' },
    { id: 'inv2', type: 'On-Grid', capacity: 5, price: 180000, specs: '5kW Single Phase, String Inverter' },
    { id: 'inv3', type: 'On-Grid', capacity: 8, price: 280000, specs: '8kW Three Phase, String Inverter' },
    { id: 'inv4', type: 'Hybrid', capacity: 3, price: 220000, specs: '3kW Hybrid, Battery Compatible' },
    { id: 'inv5', type: 'Hybrid', capacity: 5, price: 320000, specs: '5kW Hybrid, Battery Compatible' },
    { id: 'inv6', type: 'Off-Grid', capacity: 5, price: 380000, specs: '5kW Off-Grid, Complete Backup' },
    { id: 'inv7', type: 'Off-Grid', capacity: 8, price: 580000, specs: '8kW Off-Grid, Complete Backup' }
];

// Battery Data (Type, Capacity, Price)
const batteries = [
    { id: 'bat1', type: 'Lithium (LiFePO4)', capacity: 5.12, price: 280000, specs: '5.12 kWh Lithium, 5000+ cycles' },
    { id: 'bat2', type: 'Lithium (LiFePO4)', capacity: 10.24, price: 550000, specs: '10.24 kWh Lithium, 5000+ cycles' },
    { id: 'bat3', type: 'Lead Acid', capacity: 4.8, price: 120000, specs: '4.8 kWh Tubular, 1200 cycles' },
    { id: 'bat4', type: 'Lead Acid', capacity: 9.6, price: 230000, specs: '9.6 kWh Tubular, 1200 cycles' },
    { id: 'bat5', type: 'Gel', capacity: 5, price: 150000, specs: '5 kWh Gel Battery, 800 cycles' }
];

// ============================================================
// UTILITY FUNCTIONS
// ============================================================

// Open Solar Estimator Modal
function openSolarEstimation(event) {
    if (event) event.preventDefault();
    resetEstimator();
    
    // Try Bootstrap 5 first, fall back to jQuery
    const modalElement = document.getElementById('solarEstimatorModal');
    if (modalElement) {
        try {
            // Bootstrap 5
            const modal = new bootstrap.Modal(modalElement, {
                keyboard: true,
                backdrop: true,
                focus: true
            });
            modal.show();
        } catch(e) {
            try {
                // Fall back to jQuery Bootstrap
                if (typeof jQuery !== 'undefined' && jQuery.fn.modal) {
                    jQuery('#solarEstimatorModal').modal('show');
                } else {
                    console.warn('Neither Bootstrap 5 nor jQuery available for modal');
                }
            } catch(e2) {
                console.error('Failed to open modal:', e2);
            }
        }
    } else {
        console.error('Modal element not found');
    }
}

// Reset Estimator
function resetEstimator() {
    solarEstimatorState.currentStep = 1;
    const form = document.getElementById('solarEstimationForm');
    if (form) form.reset();
    updateStepIndicator();
    showStep(1);
    updateButtons();
    // Scroll to top
    window.scrollTo(0, 0);
}

// ============================================================
// STEP NAVIGATION
// ============================================================

function nextStep() {
    if (validateStep(solarEstimatorState.currentStep)) {
        if (solarEstimatorState.currentStep < 5) {
            // Before moving to step 3, calculate everything
            if (solarEstimatorState.currentStep === 2) {
                calculateSystem();
                populateCalculations();
            }
            // Before moving to step 4, populate packages
            if (solarEstimatorState.currentStep === 3) {
                populatePackageSelection();
            }
            // Before moving to step 5, calculate final summary
            if (solarEstimatorState.currentStep === 4) {
                populateFinalSummary();
                // Save to database before showing summary
                saveEstimationToDatabase();
            }
            
            solarEstimatorState.currentStep++;
            showStep(solarEstimatorState.currentStep);
            updateStepIndicator();
            updateButtons();
            window.scrollTo(0, 0);
        }
    }
}

function previousStep() {
    if (solarEstimatorState.currentStep > 1) {
        solarEstimatorState.currentStep--;
        showStep(solarEstimatorState.currentStep);
        updateStepIndicator();
        updateButtons();
        window.scrollTo(0, 0);
    }
}

function showStep(step) {
    // Hide all steps
    document.querySelectorAll('.form-step').forEach(el => el.style.display = 'none');
    // Show current step
    document.querySelector(`.form-step[data-step="${step}"]`).style.display = 'block';
}

function updateStepIndicator() {
    document.querySelectorAll('.step-item').forEach((item, index) => {
        const step = index + 1;
        item.classList.remove('active', 'completed');
        
        if (step < solarEstimatorState.currentStep) {
            item.classList.add('completed');
        } else if (step === solarEstimatorState.currentStep) {
            item.classList.add('active');
        }
    });
}

function updateButtons() {
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    
    if (solarEstimatorState.currentStep === 1) {
        prevBtn.style.display = 'none';
        nextBtn.innerHTML = 'Next <i class="fas fa-arrow-right"></i>';
    } else if (solarEstimatorState.currentStep === 5) {
        prevBtn.style.display = 'block';
        nextBtn.innerHTML = 'Complete <i class="fas fa-check"></i>';
        nextBtn.onclick = function() { 
            alert('Your solar system estimate is ready! Use WhatsApp or Email to get a quote.');
            window.location.href = '/';
        };
    } else {
        prevBtn.style.display = 'block';
        nextBtn.innerHTML = 'Next <i class="fas fa-arrow-right"></i>';
        nextBtn.onclick = function() { nextStep(); };
    }
}

// ============================================================
// VALIDATION
// ============================================================

function validateStep(step) {
    switch(step) {
        case 1:
            const kwh = parseFloat(document.getElementById('monthlyKwh').value) || 0;
            const bill = parseFloat(document.getElementById('monthlyBill').value) || 0;
            
            if (kwh === 0 && bill === 0) {
                alert('Please enter either monthly kWh or bill amount');
                return false;
            }
            
            // Save values and calculate missing one
            if (kwh > 0) {
                solarEstimatorState.monthlyKwh = kwh;
                solarEstimatorState.monthlyBill = kwh * 22; // Average rate
            } else {
                solarEstimatorState.monthlyBill = bill;
                solarEstimatorState.monthlyKwh = bill / 22; // Assuming Rs 22 per kWh
            }
            
            solarEstimatorState.connectionType = document.querySelector('input[name="connectionType"]:checked').value;
            return true;
            
        case 2:
            const city = document.getElementById('city').value;
            const roofType = document.getElementById('roofType').value;
            const roofArea = parseFloat(document.getElementById('roofArea').value) || 0;
            
            if (!city || !roofType || roofArea === 0) {
                alert('Please fill in all location and roof details');
                return false;
            }
            
            solarEstimatorState.city = city;
            solarEstimatorState.roofType = roofType;
            solarEstimatorState.roofArea = roofArea;
            solarEstimatorState.peakSunHours = peakSunHoursByCity[city] || 5.5;
            solarEstimatorState.wantsBattery = document.getElementById('wantsBattery').checked;
            
            return true;
            
        case 3:
        case 4:
            return true;
            
        case 5:
            return true;
            
        default:
            return false;
    }
}

// ============================================================
// CALCULATIONS
// ============================================================

function calculateSystem() {
    const monthlyKwh = solarEstimatorState.monthlyKwh;
    const peakSunHours = solarEstimatorState.peakSunHours;
    const efficiency = 0.75; // System efficiency loss
    const panelWattage = 400; // Default panel wattage
    
    // System Size in kW
    solarEstimatorState.systemSize = monthlyKwh / (30 * peakSunHours * efficiency);
    
    // Daily and Monthly Generation
    solarEstimatorState.dailyGeneration = (solarEstimatorState.systemSize * peakSunHours * efficiency);
    solarEstimatorState.monthlyGeneration = solarEstimatorState.dailyGeneration * 30;
    
    // Number of Panels
    solarEstimatorState.panelCount = Math.ceil(solarEstimatorState.systemSize * 1000 / panelWattage);
    
    // Inverter Capacity (20% buffer)
    solarEstimatorState.inverterCapacity = solarEstimatorState.systemSize * 1.2;
    
    // Battery Backup (2 days)
    if (solarEstimatorState.wantsBattery) {
        const dailyUsage = solarEstimatorState.monthlyKwh / 30;
        solarEstimatorState.batteryCapacity = dailyUsage * 2;
    } else {
        solarEstimatorState.batteryCapacity = 0;
    }
}

function populateCalculations() {
    document.getElementById('systemSize').textContent = solarEstimatorState.systemSize.toFixed(2) + ' kW';
    document.getElementById('dailyGeneration').textContent = solarEstimatorState.dailyGeneration.toFixed(2) + ' kWh';
    document.getElementById('monthlyGeneration').textContent = solarEstimatorState.monthlyGeneration.toFixed(2) + ' kWh';
    document.getElementById('panelCount').textContent = solarEstimatorState.panelCount + ' pcs';
    document.getElementById('inverterCapacity').textContent = solarEstimatorState.inverterCapacity.toFixed(2) + ' kW';
    document.getElementById('batteryCapacity').textContent = solarEstimatorState.batteryCapacity.toFixed(2) + ' kWh';
}

// ============================================================
// PACKAGE POPULATION
// ============================================================

function populatePackageSelection() {
    const systemSizeKw = solarEstimatorState.systemSize;
    
    // Show battery section if battery wanted
    const batterySection = document.getElementById('batterySection');
    if (solarEstimatorState.wantsBattery) {
        batterySection.style.display = 'block';
    } else {
        batterySection.style.display = 'none';
    }
    
    // Populate Recommended Package
    populateRecommendedPackage();
    
    // Populate Custom Selection
    populatePanelSelection();
    populateInverterSelection();
    if (solarEstimatorState.wantsBattery) {
        populateBatterySelection();
    }
    
    // Update real-time pricing
    updatePricing();
}

function populateRecommendedPackage() {
    const systemSizeKw = solarEstimatorState.systemSize;
    const panelCount = solarEstimatorState.panelCount;
    
    // Select best value panel
    const recommendedPanel = solarPanels[0]; // JA Solar
    solarEstimatorState.selectedPanel = recommendedPanel;
    
    // Select appropriate inverter
    let recommendedInverter;
    if (systemSizeKw <= 3) {
        recommendedInverter = inverters[0]; // 3kW On-Grid
    } else if (systemSizeKw <= 5) {
        recommendedInverter = inverters[1]; // 5kW On-Grid
    } else {
        recommendedInverter = inverters[2]; // 8kW Three-Phase
    }
    solarEstimatorState.selectedInverter = recommendedInverter;
    
    // Select battery if wanted
    if (solarEstimatorState.wantsBattery) {
        const batteryNeeded = solarEstimatorState.batteryCapacity;
        let recommendedBattery;
        if (batteryNeeded <= 5) {
            recommendedBattery = batteries[0]; // 5.12 kWh Lithium
        } else {
            recommendedBattery = batteries[1]; // 10.24 kWh Lithium
        }
        solarEstimatorState.selectedBattery = recommendedBattery;
    }
    
    // Generate HTML for recommended package
    let html = `
        <div class="component-item selected">
            <div class="component-title">
                <i class="fas fa-check-circle text-success"></i> ${recommendedPanel.brand} ${recommendedPanel.wattage}W
            </div>
            <div class="component-specs">
                ${recommendedPanel.specs}
                <br><strong>Quantity: ${panelCount} pcs</strong>
            </div>
            <div class="component-price">Rs ${(recommendedPanel.price * panelCount).toLocaleString()}</div>
        </div>
        
        <div class="component-item selected">
            <div class="component-title">
                <i class="fas fa-check-circle text-success"></i> ${recommendedInverter.type} ${recommendedInverter.capacity} kW Inverter
            </div>
            <div class="component-specs">${recommendedInverter.specs}</div>
            <div class="component-price">Rs ${recommendedInverter.price.toLocaleString()}</div>
        </div>
    `;
    
    if (solarEstimatorState.selectedBattery) {
        html += `
        <div class="component-item selected">
            <div class="component-title">
                <i class="fas fa-check-circle text-success"></i> ${solarEstimatorState.selectedBattery.type} ${solarEstimatorState.selectedBattery.capacity} kWh
            </div>
            <div class="component-specs">${solarEstimatorState.selectedBattery.specs}</div>
            <div class="component-price">Rs ${solarEstimatorState.selectedBattery.price.toLocaleString()}</div>
        </div>
        `;
    }
    
    html += `
        <div class="component-item selected">
            <div class="component-title">
                <i class="fas fa-check-circle text-success"></i> Professional Installation & Structure
            </div>
            <div class="component-specs">Complete setup, wiring, mounting structure, and testing</div>
            <div class="component-price">Rs 50,000</div>
        </div>
        
        <div class="alert alert-success mt-3">
            <strong>Why This Package?</strong><br>
            This is an optimized combination based on your requirements, offering best value with quality components and professional installation.
        </div>
    `;
    
    document.getElementById('recommendedPackageContent').innerHTML = html;
}

function populatePanelSelection() {
    let html = '';
    solarPanels.forEach(panel => {
        const panelCount = solarEstimatorState.panelCount;
        const totalPrice = panel.price * panelCount;
        html += `
        <div class="col-md-6">
            <div class="component-item" onclick="selectPanel(this, '${panel.id}')">
                <div class="component-title">${panel.brand} ${panel.wattage}W</div>
                <div class="component-specs">${panel.specs}</div>
                <div class="component-price">Rs ${totalPrice.toLocaleString()} (${panelCount} pcs)</div>
            </div>
        </div>
        `;
    });
    document.getElementById('panelsSelection').innerHTML = html;
}

function populateInverterSelection() {
    let html = '';
    inverters.forEach(inverter => {
        html += `
        <div class="component-item mb-3" onclick="selectInverter(this, '${inverter.id}')">
            <div class="component-title">${inverter.type} - ${inverter.capacity} kW</div>
            <div class="component-specs">${inverter.specs}</div>
            <div class="component-price">Rs ${inverter.price.toLocaleString()}</div>
        </div>
        `;
    });
    document.getElementById('inverterSelection').innerHTML = html;
}

function populateBatterySelection() {
    let html = '';
    batteries.forEach(battery => {
        html += `
        <div class="component-item mb-3" onclick="selectBattery(this, '${battery.id}')">
            <div class="component-title">${battery.type} - ${battery.capacity} kWh</div>
            <div class="component-specs">${battery.specs}</div>
            <div class="component-price">Rs ${battery.price.toLocaleString()}</div>
        </div>
        `;
    });
    document.getElementById('batterySelection').innerHTML = html;
}

function selectPanel(element, panelId) {
    document.querySelectorAll('#panelsSelection .component-item').forEach(el => el.classList.remove('selected'));
    element.classList.add('selected');
    solarEstimatorState.selectedPanel = solarPanels.find(p => p.id === panelId);
    updatePricing();
}

function selectInverter(element, inverterId) {
    document.querySelectorAll('#inverterSelection .component-item').forEach(el => el.classList.remove('selected'));
    element.classList.add('selected');
    solarEstimatorState.selectedInverter = inverters.find(inv => inv.id === inverterId);
    updatePricing();
}

function selectBattery(element, batteryId) {
    document.querySelectorAll('#batterySelection .component-item').forEach(el => el.classList.remove('selected'));
    element.classList.add('selected');
    solarEstimatorState.selectedBattery = batteries.find(bat => bat.id === batteryId);
    updatePricing();
}

// ============================================================
// PRICING
// ============================================================

function updatePricing() {
    let total = 0;
    let breakdown = [];
    
    // Panel cost
    if (solarEstimatorState.selectedPanel) {
        const panelCost = solarEstimatorState.selectedPanel.price * solarEstimatorState.panelCount;
        total += panelCost;
        breakdown.push({
            name: `Solar Panels (${solarEstimatorState.panelCount} × ${solarEstimatorState.selectedPanel.brand} ${solarEstimatorState.selectedPanel.wattage}W)`,
            price: panelCost
        });
    }
    
    // Inverter cost
    if (solarEstimatorState.selectedInverter) {
        total += solarEstimatorState.selectedInverter.price;
        breakdown.push({
            name: `${solarEstimatorState.selectedInverter.type} Inverter (${solarEstimatorState.selectedInverter.capacity} kW)`,
            price: solarEstimatorState.selectedInverter.price
        });
    }
    
    // Battery cost
    if (solarEstimatorState.wantsBattery && solarEstimatorState.selectedBattery) {
        total += solarEstimatorState.selectedBattery.price;
        breakdown.push({
            name: `${solarEstimatorState.selectedBattery.type} Battery (${solarEstimatorState.selectedBattery.capacity} kWh)`,
            price: solarEstimatorState.selectedBattery.price
        });
    }
    
    // Installation
    if (solarEstimatorState.installationService) {
        total += 50000;
        breakdown.push({ name: 'Professional Installation & Structure', price: 50000 });
    }
    
    // Warranty
    if (solarEstimatorState.warrantyService) {
        total += 25000;
        breakdown.push({ name: '5-Year Extended Warranty', price: 25000 });
    }
    
    solarEstimatorState.totalPrice = total;
    
    // Update breakdown
    let breakdownHtml = '';
    breakdown.forEach(item => {
        breakdownHtml += `
        <div class="price-item">
            <span>${item.name}</span>
            <strong>Rs ${item.price.toLocaleString()}</strong>
        </div>
        `;
    });
    document.getElementById('priceBreakdown').innerHTML = breakdownHtml;
    document.getElementById('totalEstimatedPrice').textContent = 'Rs ' + total.toLocaleString();
}

// ============================================================
// FINAL SUMMARY
// ============================================================

function populateFinalSummary() {
    const systemSize = solarEstimatorState.systemSize;
    const monthlyGeneration = solarEstimatorState.monthlyGeneration;
    const monthlyBill = solarEstimatorState.monthlyBill;
    const totalCost = solarEstimatorState.totalPrice;
    
    // Savings calculations
    const monthlySavings = monthlyBill; // Assuming 100% offset
    const annualSavings = monthlySavings * 12;
    const paybackYears = totalCost / annualSavings;
    const profit25Years = (annualSavings * 25) - totalCost;
    
    // Update summary cards
    document.getElementById('summarySystemSize').textContent = systemSize.toFixed(2) + ' kW';
    document.getElementById('summarySavings').textContent = 'Rs ' + monthlySavings.toLocaleString();
    document.getElementById('summaryTotalCost').textContent = 'Rs ' + totalCost.toLocaleString();
    document.getElementById('summaryAnnualSavings').textContent = 'Rs ' + annualSavings.toLocaleString();
    document.getElementById('summaryPaybackPeriod').textContent = paybackYears.toFixed(1) + ' years';
    document.getElementById('summary25YearProfit').textContent = 'Rs ' + profit25Years.toLocaleString();
    
    // System details
    let detailsHtml = `
        <li>
            <span>System Size:</span>
            <strong>${systemSize.toFixed(2)} kW</strong>
        </li>
        <li>
            <span>Monthly Generation:</span>
            <strong>${monthlyGeneration.toFixed(0)} kWh</strong>
        </li>
        <li>
            <span>Solar Panels:</span>
            <strong>${solarEstimatorState.panelCount} × ${solarEstimatorState.selectedPanel?.brand} ${solarEstimatorState.selectedPanel?.wattage}W</strong>
        </li>
        <li>
            <span>Inverter:</span>
            <strong>${solarEstimatorState.selectedInverter?.type} (${solarEstimatorState.selectedInverter?.capacity} kW)</strong>
        </li>
        ${solarEstimatorState.wantsBattery ? `
        <li>
            <span>Battery Backup:</span>
            <strong>${solarEstimatorState.selectedBattery?.type} (${solarEstimatorState.selectedBattery?.capacity} kWh)</strong>
        </li>
        ` : ''}
        <li>
            <span>Location:</span>
            <strong>${solarEstimatorState.city.charAt(0).toUpperCase() + solarEstimatorState.city.slice(1)}</strong>
        </li>
    `;
    document.getElementById('summaryDetails').innerHTML = detailsHtml;
    
    // Selected components
    let componentsHtml = `
        <div class="row">
            <div class="col-md-6">
                <h6><i class="fas fa-square"></i> Solar Panels</h6>
                <p><strong>${solarEstimatorState.selectedPanel?.brand}</strong><br>
                ${solarEstimatorState.panelCount} × ${solarEstimatorState.selectedPanel?.wattage}W<br>
                <span class="text-success">Rs ${(solarEstimatorState.selectedPanel.price * solarEstimatorState.panelCount).toLocaleString()}</span></p>
            </div>
            <div class="col-md-6">
                <h6><i class="fas fa-plug"></i> Inverter</h6>
                <p><strong>${solarEstimatorState.selectedInverter?.type}</strong><br>
                ${solarEstimatorState.selectedInverter?.capacity} kW<br>
                <span class="text-success">Rs ${solarEstimatorState.selectedInverter?.price.toLocaleString()}</span></p>
            </div>
        </div>
    `;
    
    if (solarEstimatorState.wantsBattery && solarEstimatorState.selectedBattery) {
        componentsHtml += `
        <div class="row mt-3">
            <div class="col-md-6">
                <h6><i class="fas fa-battery-full"></i> Battery</h6>
                <p><strong>${solarEstimatorState.selectedBattery?.type}</strong><br>
                ${solarEstimatorState.selectedBattery?.capacity} kWh<br>
                <span class="text-success">Rs ${solarEstimatorState.selectedBattery?.price.toLocaleString()}</span></p>
            </div>
            <div class="col-md-6">
                <h6><i class="fas fa-hammer"></i> Installation</h6>
                <p><strong>Professional Setup</strong><br>
                Including Structure & Wiring<br>
                <span class="text-success">Rs 50,000</span></p>
            </div>
        </div>
        `;
    } else {
        componentsHtml += `
        <div class="row mt-3">
            <div class="col-md-6">
                <h6><i class="fas fa-hammer"></i> Installation</h6>
                <p><strong>Professional Setup</strong><br>
                Including Structure & Wiring<br>
                <span class="text-success">Rs 50,000</span></p>
            </div>
        </div>
        `;
    }
    
    document.getElementById('summaryComponents').innerHTML = componentsHtml;
}

// ============================================================
// DATABASE SAVE FUNCTION
// ============================================================

function saveEstimationToDatabase() {
    const data = {
        monthly_kwh: solarEstimatorState.monthlyKwh || 0,
        monthly_bill: solarEstimatorState.monthlyBill || 0,
        connection_type: solarEstimatorState.connectionType,
        city: solarEstimatorState.city,
        peak_sun_hours: solarEstimatorState.peakSunHours,
        roof_type: solarEstimatorState.roofType,
        roof_area: solarEstimatorState.roofArea || 0,
        battery_option: document.querySelector('input[name="batteryOption"]:checked')?.value || 'no',
        system_size: solarEstimatorState.systemSize || 0,
        daily_generation: solarEstimatorState.dailyGeneration || 0,
        monthly_generation: solarEstimatorState.monthlyGeneration || 0,
        panel_count: solarEstimatorState.panelCount || 0,
        inverter_capacity: solarEstimatorState.inverterCapacity || 0,
        battery_capacity: solarEstimatorState.batteryCapacity || 0,
        selected_panel: solarEstimatorState.selectedPanel?.brand || '',
        panel_price: solarEstimatorState.selectedPanel?.price || 0,
        selected_inverter: solarEstimatorState.selectedInverter?.type || '',
        inverter_price: solarEstimatorState.selectedInverter?.price || 0,
        selected_battery: solarEstimatorState.selectedBattery?.type || '',
        battery_price: solarEstimatorState.selectedBattery?.price || 0,
        installation_service_cost: solarEstimatorState.installationService ? 50000 : 0,
        warranty_service_cost: solarEstimatorState.warrantyService ? 25000 : 0,
        total_price: solarEstimatorState.totalPrice || 0,
        estimated_monthly_savings: solarEstimatorState.monthlyBill || 0,
        estimated_annual_savings: (solarEstimatorState.monthlyBill * 12) || 0,
        status: 'draft'
    };

    // Get CSRF token from meta tag
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
    
    if (!csrfToken) {
        console.warn('CSRF token not found, skipping database save');
        return;
    }

    // Save to database
    fetch('/api/solar-estimation/save', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken
        },
        body: JSON.stringify(data)
    })
    .then(response => response.json())
    .then(result => {
        console.log('Estimation saved to database:', result);
        // Store the ID in state for later use
        if (result.id) {
            solarEstimatorState.estimationId = result.id;
        }
    })
    .catch(error => {
        console.error('Error saving estimation:', error);
    });
}

// ============================================================
// CONTACT FUNCTIONS
// ============================================================

function sendEmailQuote() {
    const emailModal = document.getElementById('emailQuoteModal');
    if (emailModal) {
        try {
            const modal = new bootstrap.Modal(emailModal, {
                keyboard: true,
                backdrop: true
            });
            modal.show();
        } catch(e) {
            try {
                if (typeof jQuery !== 'undefined') jQuery('#emailQuoteModal').modal('show');
            } catch(e2) {
                console.error('Failed to open email modal:', e2);
            }
        }
    }
}

function submitEmailQuote() {
    const name = document.getElementById('quoteName').value;
    const email = document.getElementById('quoteEmail').value;
    const phone = document.getElementById('quotePhone').value;
    const message = document.getElementById('quoteMessage').value;
    
    if (!name || !email || !phone) {
        alert('Please fill in all required fields');
        return;
    }
    
    // Prepare quote data
    const quoteData = {
        name: name,
        email: email,
        phone: phone,
        message: message,
        systemSize: solarEstimatorState.systemSize.toFixed(2) + ' kW',
        monthlyGeneration: solarEstimatorState.monthlyGeneration.toFixed(0) + ' kWh',
        totalPrice: solarEstimatorState.totalPrice,
        selectedPanel: `${solarEstimatorState.selectedPanel?.brand} ${solarEstimatorState.selectedPanel?.wattage}W`,
        panelCount: solarEstimatorState.panelCount,
        inverter: `${solarEstimatorState.selectedInverter?.type} (${solarEstimatorState.selectedInverter?.capacity} kW)`,
        battery: solarEstimatorState.wantsBattery ? `${solarEstimatorState.selectedBattery?.type} (${solarEstimatorState.selectedBattery?.capacity} kWh)` : 'Not selected'
    };
    
    // Send via backend (if you have Laravel backend)
    fetch('/api/send-solar-quote', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
        },
        body: JSON.stringify(quoteData)
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Quote sent successfully! Check your email.');
            closeEmailQuoteModal();
        } else {
            alert('Error sending quote. Please try again.');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        // Fallback: Open mailto
        const emailBody = encodeURIComponent(generateEmailBody(quoteData));
        window.location.href = `mailto:soliur@mail.com?subject=Solar System Quote Request&body=${emailBody}`;
        alert('Opening email client. Please send this quote to: soliur@mail.com');
        closeEmailQuoteModal();
    });
}

function closeEmailQuoteModal() {
    const emailModal = document.getElementById('emailQuoteModal');
    if (emailModal) {
        try {
            const modal = bootstrap.Modal.getInstance(emailModal);
            if (modal) modal.hide();
        } catch(e) {
            try {
                if (typeof jQuery !== 'undefined') jQuery('#emailQuoteModal').modal('hide');
            } catch(e2) {
                console.log('Could not close email modal');
            }
        }
    }
}

function generateEmailBody(quoteData) {
    return `Hello,

I am interested in your solar energy solutions. Here are my requirements and estimated system details:

PERSONAL INFORMATION:
Name: ${quoteData.name}
Email: ${quoteData.email}
Phone: ${quoteData.phone}

SYSTEM REQUIREMENTS:
System Size: ${quoteData.systemSize}
Monthly Generation: ${quoteData.monthlyGeneration}
Peak Sun Hours: ${solarEstimatorState.peakSunHours}
Location: ${solarEstimatorState.city}
Roof Type: ${solarEstimatorState.roofType}
Roof Area: ${solarEstimatorState.roofArea} sq ft

SELECTED COMPONENTS:
Solar Panels: ${quoteData.panelCount} × ${quoteData.selectedPanel}
Inverter: ${quoteData.inverter}
Battery Backup: ${quoteData.battery}

FINANCIAL SUMMARY:
Estimated Total Cost: Rs ${quoteData.totalPrice.toLocaleString()}

ADDITIONAL MESSAGE:
${quoteData.message || 'N/A'}

Please contact me with a detailed quote and installation timeline.

Thank you!`;
}

// ============================================================
// EVENT LISTENERS
// ============================================================

document.addEventListener('DOMContentLoaded', function() {
    // Auto-calculate kWh from bill
    document.getElementById('monthlyBill')?.addEventListener('change', function() {
        if (this.value) {
            const kwh = this.value / 22;
            document.getElementById('monthlyKwh').value = kwh.toFixed(0);
        }
    });
    
    // Auto-calculate bill from kWh
    document.getElementById('monthlyKwh')?.addEventListener('change', function() {
        if (this.value) {
            const bill = this.value * 22;
            document.getElementById('monthlyBill').value = bill.toFixed(0);
        }
    });
    
    // Update peak sun hours on city change
    document.getElementById('city')?.addEventListener('change', function() {
        const psh = peakSunHoursByCity[this.value] || 5.5;
        document.getElementById('peakSunHours').value = psh;
        solarEstimatorState.peakSunHours = psh;
    });
    
    // Installation checkbox
    document.getElementById('installationService')?.addEventListener('change', function() {
        solarEstimatorState.installationService = this.checked;
        updatePricing();
    });
    
    // Warranty checkbox
    document.getElementById('warrantyService')?.addEventListener('change', function() {
        solarEstimatorState.warrantyService = this.checked;
        updatePricing();
    });
});

// ============================================================
// NEW INTERACTIVE FEATURES
// ============================================================

// Preset Selection
function selectPreset(kwh, label) {
    solarEstimatorState.monthlyKwh = kwh;
    document.getElementById('monthlyKwh').value = kwh;
    document.getElementById('monthlyKwhSlider').value = kwh;
    document.getElementById('sliderValue').textContent = kwh + ' kWh';
    
    // Show custom input section
    document.getElementById('customInputSection').style.display = 'block';
    
    // Update preset card styling
    document.querySelectorAll('.preset-card').forEach(card => {
        card.classList.remove('selected');
    });
    event.currentTarget.classList.add('selected');
}

// Show Custom Input Section
function showCustomInput() {
    document.getElementById('customInputSection').style.display = 'block';
    document.querySelectorAll('.preset-card').forEach(card => {
        card.classList.remove('selected');
    });
    event.currentTarget.classList.add('selected');
    document.getElementById('monthlyKwh').focus();
}

// Update Slider from Input
function updateKwhFromSlider(value) {
    document.getElementById('monthlyKwh').value = value;
    document.getElementById('sliderValue').textContent = value + ' kWh';
    solarEstimatorState.monthlyKwh = parseFloat(value);
}

function updateSliderFromInput(value) {
    if (value === '') return;
    document.getElementById('monthlyKwhSlider').value = value;
    document.getElementById('sliderValue').textContent = value + ' kWh';
    solarEstimatorState.monthlyKwh = parseFloat(value);
}

// Bill to kWh conversion (using avg rate of Rs 22/kWh)
function updateBillFromSlider(value) {
    document.getElementById('monthlyBill').value = value;
    document.getElementById('sliderBillValue').textContent = 'Rs ' + parseInt(value).toLocaleString();
    const estimatedKwh = Math.round(parseFloat(value) / 22);
    if (estimatedKwh > 0) {
        document.getElementById('monthlyKwh').value = estimatedKwh;
        document.getElementById('monthlyKwhSlider').value = estimatedKwh;
        document.getElementById('sliderValue').textContent = estimatedKwh + ' kWh';
        solarEstimatorState.monthlyKwh = estimatedKwh;
    }
}

function updateSliderFromBill(value) {
    if (value === '') return;
    document.getElementById('monthlyBillSlider').value = value;
    document.getElementById('sliderBillValue').textContent = 'Rs ' + parseInt(value).toLocaleString();
    const estimatedKwh = Math.round(parseFloat(value) / 22);
    if (estimatedKwh > 0) {
        document.getElementById('monthlyKwh').value = estimatedKwh;
        document.getElementById('monthlyKwhSlider').value = estimatedKwh;
        document.getElementById('sliderValue').textContent = estimatedKwh + ' kWh';
        solarEstimatorState.monthlyKwh = estimatedKwh;
    }
}

// Connection Type Selection
function selectConnection(type) {
    document.getElementById(type === 'single' ? 'singlePhase' : 'threePhase').checked = true;
    solarEstimatorState.connectionType = type;
    
    document.querySelectorAll('.connection-option').forEach(option => {
        option.classList.remove('selected');
    });
    event.currentTarget.classList.add('selected');
}

// Update Peak Sun Hours
function updatePeakSunHours() {
    const city = document.getElementById('city').value;
    if (city && peakSunHoursByCity[city]) {
        const hours = peakSunHoursByCity[city];
        document.getElementById('peakSunHours').value = hours.toFixed(1) + ' hours/day';
        solarEstimatorState.peakSunHours = hours;
    }
}

// Roof Type Selection
function selectRoofType(type) {
    document.getElementById('roofType').value = type;
    solarEstimatorState.roofType = type;
    
    document.querySelectorAll('.roof-type-card').forEach(card => {
        card.classList.remove('selected');
    });
    event.currentTarget.classList.add('selected');
}

// Update Roof Area from Slider
function updateRoofAreaFromSlider(value) {
    document.getElementById('roofArea').value = value;
    document.getElementById('roofAreaValue').textContent = value + ' sq ft';
    solarEstimatorState.roofArea = parseFloat(value);
}

function updateRoofAreaSlider(value) {
    if (value === '') return;
    document.getElementById('roofAreaSlider').value = value;
    document.getElementById('roofAreaValue').textContent = value + ' sq ft';
    solarEstimatorState.roofArea = parseFloat(value);
}

// Update Battery Visibility and State
function updateBatteryVisibility() {
    const batteryOption = document.querySelector('input[name="batteryOption"]:checked').value;
    document.getElementById('wantsBattery').value = batteryOption;
    solarEstimatorState.wantsBattery = batteryOption !== 'no';
    
    const batterySection = document.getElementById('batterySection');
    if (batteryOption !== 'no') {
        batterySection.style.display = 'block';
    } else {
        batterySection.style.display = 'none';
    }
}

// Make function available globally
window.openSolarEstimation = openSolarEstimation;
window.nextStep = nextStep;
window.previousStep = previousStep;
window.selectPanel = selectPanel;
window.selectInverter = selectInverter;
window.selectBattery = selectBattery;
window.sendEmailQuote = sendEmailQuote;
window.submitEmailQuote = submitEmailQuote;
window.closeEmailQuoteModal = closeEmailQuoteModal;
window.closeMainModal = closeMainModal;
window.selectPreset = selectPreset;
window.showCustomInput = showCustomInput;
window.updateKwhFromSlider = updateKwhFromSlider;
window.updateSliderFromInput = updateSliderFromInput;
window.updateBillFromSlider = updateBillFromSlider;
window.updateSliderFromBill = updateSliderFromBill;
window.selectConnection = selectConnection;
window.updatePeakSunHours = updatePeakSunHours;
window.selectRoofType = selectRoofType;
window.updateRoofAreaFromSlider = updateRoofAreaFromSlider;
window.updateRoofAreaSlider = updateRoofAreaSlider;
window.updateBatteryVisibility = updateBatteryVisibility;

// Log initialization
console.log('Solar Estimator loaded successfully with enhanced UI features');

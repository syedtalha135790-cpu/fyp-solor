<x-header/>

<!-- Success Page -->
<div class="page-wrapper">
    <!-- Success Header -->
    <section class="estimator-page-header" style="background: linear-gradient(135deg, #28a745 0%, #20c997 100%);">
        <div class="container">
            <div class="estimator-page-header-content text-center">
                <div style="font-size: 60px; margin-bottom: 20px;">
                    <i class="fas fa-check-circle" style="color: white;"></i>
                </div>
                <h1 class="estimator-page-title" style="color: white;">
                    Estimation Submitted Successfully!
                </h1>
                <p class="estimator-page-subtitle" style="color: rgba(255,255,255,0.9);">
                    Thank you for choosing Soliur. We'll contact you shortly with a detailed quote.
                </p>
            </div>
        </div>
    </section>

    <!-- Success Details -->
    <section class="estimator-section py-60" style="background: #f8fafc;">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="success-card bg-white p-5 rounded-15" style="box-shadow: 0 8px 24px rgba(0,0,0,0.12); border: 2px solid #28a745;">
                        <!-- Estimation ID -->
                        <div class="text-center mb-4 pb-4 border-bottom">
                            <h3 class="text-muted">Estimation Reference Number</h3>
                            <h2 style="color: #28a745; font-weight: 800;">EST-{{ str_pad($estimation->id, 6, '0', STR_PAD_LEFT) }}</h2>
                        </div>

                        <!-- Summary Details -->
                        <div class="row mb-5">
                            <div class="col-md-6 mb-4">
                                <div class="detail-item">
                                    <label style="color: #666; font-size: 12px; font-weight: 600; text-transform: uppercase; letter-spacing: 1px;">System Size</label>
                                    <div style="font-size: 32px; font-weight: 800; color: #28a745; margin-top: 8px;">{{ $estimation->system_size }} kW</div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="detail-item">
                                    <label style="color: #666; font-size: 12px; font-weight: 600; text-transform: uppercase; letter-spacing: 1px;">Monthly Savings</label>
                                    <div style="font-size: 32px; font-weight: 800; color: #28a745; margin-top: 8px;">Rs {{ number_format($estimation->estimated_monthly_savings, 0) }}</div>
                                </div>
                            </div>
                        </div>

                        <!-- System Details Grid -->
                        <div class="row mb-5 pb-5 border-bottom">
                            <div class="col-md-6">
                                <h5 class="mb-3" style="color: #1a1a1a; font-weight: 700;">System Details</h5>
                                <ul style="list-style: none; padding: 0; margin: 0;">
                                    <li style="padding: 8px 0; display: flex; justify-content: space-between; border-bottom: 1px solid #eee;">
                                        <span style="color: #666;">Monthly Electricity Usage:</span>
                                        <strong style="color: #1a1a1a;">{{ $estimation->monthly_kwh }} kWh</strong>
                                    </li>
                                    <li style="padding: 8px 0; display: flex; justify-content: space-between; border-bottom: 1px solid #eee;">
                                        <span style="color: #666;">Location:</span>
                                        <strong style="color: #1a1a1a;">{{ ucfirst($estimation->city) }}</strong>
                                    </li>
                                    <li style="padding: 8px 0; display: flex; justify-content: space-between; border-bottom: 1px solid #eee;">
                                        <span style="color: #666;">Peak Sun Hours:</span>
                                        <strong style="color: #1a1a1a;">{{ $estimation->peak_sun_hours }} h/day</strong>
                                    </li>
                                    <li style="padding: 8px 0; display: flex; justify-content: space-between; border-bottom: 1px solid #eee;">
                                        <span style="color: #666;">Connection Type:</span>
                                        <strong style="color: #1a1a1a;">{{ ucfirst($estimation->connection_type) }} Phase</strong>
                                    </li>
                                    <li style="padding: 8px 0; display: flex; justify-content: space-between;">
                                        <span style="color: #666;">Panel Count:</span>
                                        <strong style="color: #1a1a1a;">{{ $estimation->panel_count }} Panels</strong>
                                    </li>
                                </ul>
                            </div>

                            <div class="col-md-6">
                                <h5 class="mb-3" style="color: #1a1a1a; font-weight: 700;">Financial Overview</h5>
                                <ul style="list-style: none; padding: 0; margin: 0;">
                                    <li style="padding: 8px 0; display: flex; justify-content: space-between; border-bottom: 1px solid #eee;">
                                        <span style="color: #666;">Total System Cost:</span>
                                        <strong style="color: #1a1a1a;">Rs {{ number_format($estimation->total_price, 0) }}</strong>
                                    </li>
                                    <li style="padding: 8px 0; display: flex; justify-content: space-between; border-bottom: 1px solid #eee;">
                                        <span style="color: #666;">Monthly Savings:</span>
                                        <strong style="color: #28a745;">Rs {{ number_format($estimation->estimated_monthly_savings, 0) }}</strong>
                                    </li>
                                    <li style="padding: 8px 0; display: flex; justify-content: space-between; border-bottom: 1px solid #eee;">
                                        <span style="color: #666;">Annual Savings:</span>
                                        <strong style="color: #28a745;">Rs {{ number_format($estimation->estimated_annual_savings, 0) }}</strong>
                                    </li>
                                    <li style="padding: 8px 0; display: flex; justify-content: space-between; border-bottom: 1px solid #eee;">
                                        <span style="color: #666;">Daily Generation:</span>
                                        <strong style="color: #1a1a1a;">{{ $estimation->daily_generation }} kWh</strong>
                                    </li>
                                    <li style="padding: 8px 0; display: flex; justify-content: space-between;">
                                        <span style="color: #666;">Monthly Generation:</span>
                                        <strong style="color: #1a1a1a;">{{ number_format($estimation->monthly_generation, 0) }} kWh</strong>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Selected Components -->
                        <div class="mb-5">
                            <h5 class="mb-3" style="color: #1a1a1a; font-weight: 700;">Selected Components</h5>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <div style="background: #f8f9fa; padding: 20px; border-radius: 10px; border-left: 4px solid #28a745;">
                                        <div style="color: #666; font-size: 12px; font-weight: 600; margin-bottom: 8px;">Solar Panels</div>
                                        <div style="color: #1a1a1a; font-weight: 700; margin-bottom: 8px;">{{ $estimation->selected_panel }}</div>
                                        <div style="color: #28a745; font-weight: 700;">Rs {{ number_format($estimation->panel_price, 0) }}</div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div style="background: #f8f9fa; padding: 20px; border-radius: 10px; border-left: 4px solid #20c997;">
                                        <div style="color: #666; font-size: 12px; font-weight: 600; margin-bottom: 8px;">Inverter</div>
                                        <div style="color: #1a1a1a; font-weight: 700; margin-bottom: 8px;">{{ $estimation->selected_inverter }}</div>
                                        <div style="color: #28a745; font-weight: 700;">Rs {{ number_format($estimation->inverter_price, 0) }}</div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <div style="background: #f8f9fa; padding: 20px; border-radius: 10px; border-left: 4px solid #667eea;">
                                        <div style="color: #666; font-size: 12px; font-weight: 600; margin-bottom: 8px;">Installation & Service</div>
                                        <div style="color: #1a1a1a; font-weight: 700; margin-bottom: 8px;">Complete Setup</div>
                                        <div style="color: #28a745; font-weight: 700;">Rs {{ number_format($estimation->installation_service_cost, 0) }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- What's Next -->
                        <div class="mb-5 pb-5 border-bottom">
                            <h5 class="mb-3" style="color: #1a1a1a; font-weight: 700;">What's Next?</h5>
                            <div style="background: linear-gradient(135deg, rgba(40, 167, 69, 0.05), rgba(32, 201, 151, 0.05)); padding: 20px; border-radius: 10px; border-left: 4px solid #28a745;">
                                <ol style="margin: 0; padding-left: 20px;">
                                    <li style="margin-bottom: 12px;">
                                        <strong>Confirmation Email:</strong> We'll send you an email confirming your estimation request within 1 hour.
                                    </li>
                                    <li style="margin-bottom: 12px;">
                                        <strong>Site Verification:</strong> Our team will review your details and may contact you to verify site conditions.
                                    </li>
                                    <li style="margin-bottom: 12px;">
                                        <strong>Detailed Quote:</strong> Within 24-48 hours, we'll send you a comprehensive quote with all specifications.
                                    </li>
                                    <li>
                                        <strong>Installation:</strong> Once you approve, we'll schedule your solar system installation.
                                    </li>
                                </ol>
                            </div>
                        </div>

                        <!-- Contact Information -->
                        <div class="mb-4">
                            <h5 class="mb-3" style="color: #1a1a1a; font-weight: 700;">Your Contact Information</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <div style="margin-bottom: 15px;">
                                        <label style="color: #666; font-size: 12px; font-weight: 600;">Name</label>
                                        <div style="color: #1a1a1a; font-weight: 600; font-size: 16px;">{{ $estimation->name }}</div>
                                    </div>
                                    <div>
                                        <label style="color: #666; font-size: 12px; font-weight: 600;">Email</label>
                                        <div style="color: #1a1a1a; font-weight: 600; font-size: 16px;">{{ $estimation->email }}</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div style="margin-bottom: 15px;">
                                        <label style="color: #666; font-size: 12px; font-weight: 600;">Phone</label>
                                        <div style="color: #1a1a1a; font-weight: 600; font-size: 16px;">{{ $estimation->phone }}</div>
                                    </div>
                                    <div>
                                        <label style="color: #666; font-size: 12px; font-weight: 600;">Preferred Contact</label>
                                        <div style="color: #1a1a1a; font-weight: 600; font-size: 16px;">{{ ucfirst($estimation->contact_method) }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="row g-3 mt-4">
                            <div class="col-md-6">
                                <a href="{{ route('home') }}" class="btn btn-outline-primary btn-estimator w-100">
                                    <i class="fas fa-home"></i> Back to Home
                                </a>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('contact') }}" class="btn btn-estimator w-100">
                                    <i class="fas fa-envelope"></i> Contact Us
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Additional Info -->
                    <div class="mt-5 p-4 rounded" style="background: linear-gradient(135deg, #f8f9fa, #ffffff); border: 2px solid #e0e0e0;">
                        <h5 class="mb-3" style="color: #1a1a1a; font-weight: 700;">Why Choose Soliur?</h5>
                        <div class="row">
                            <div class="col-md-4 text-center mb-3">
                                <div style="font-size: 32px; color: #28a745; margin-bottom: 10px;">
                                    <i class="fas fa-award"></i>
                                </div>
                                <h6>Expert Team</h6>
                                <p style="color: #666; font-size: 14px; margin: 0;">Years of experience in solar installation</p>
                            </div>
                            <div class="col-md-4 text-center mb-3">
                                <div style="font-size: 32px; color: #28a745; margin-bottom: 10px;">
                                    <i class="fas fa-lock"></i>
                                </div>
                                <h6>5-Year Warranty</h6>
                                <p style="color: #666; font-size: 14px; margin: 0;">Full coverage on materials and labor</p>
                            </div>
                            <div class="col-md-4 text-center mb-3">
                                <div style="font-size: 32px; color: #28a745; margin-bottom: 10px;">
                                    <i class="fas fa-headset"></i>
                                </div>
                                <h6>24/7 Support</h6>
                                <p style="color: #666; font-size: 14px; margin: 0;">Always here to help with any questions</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<x-footer />

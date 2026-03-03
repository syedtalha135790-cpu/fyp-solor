<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Your Email Address</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Helvetica Neue', Arial, sans-serif;
            background-color: #f5f7fa;
            color: #333;
            line-height: 1.6;
        }
        
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }
        
        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 40px 20px;
            text-align: center;
        }
        
        .header h1 {
            font-size: 24px;
            font-weight: 600;
            margin: 0;
        }
        
        .content {
            padding: 40px 30px;
        }
        
        .greeting {
            font-size: 18px;
            font-weight: 600;
            color: #2d3748;
            margin-bottom: 20px;
        }
        
        .intro-text {
            color: #4a5568;
            margin-bottom: 30px;
            font-size: 15px;
            line-height: 1.8;
        }
        
        .cta-section {
            text-align: center;
            margin: 40px 0;
        }
        
        .cta-button {
            display: inline-block;
            background: linear-gradient(135deg, #20232f 0%, #764ba2 100%);
            color: white;
            padding: 14px 45px;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 600;
            font-size: 16px;
            transition: transform 0.2s, box-shadow 0.2s;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
        }
        
        .cta-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.6);
        }
        
        .alternative-link {
            margin-top: 30px;
            padding: 20px;
            background-color: #f5f7fa;
            border-radius: 6px;
            border-left: 4px solid #667eea;
        }
        
        .alternative-link p {
            color: #4a5568;
            font-size: 14px;
            margin: 0 0 10px 0;
        }
        
        .alternative-link a {
            color: #667eea;
            word-break: break-all;
            text-decoration: none;
            font-weight: 500;
        }
        
        .security-notice {
            background-color: #fffaf0;
            border-left: 4px solid #ed8936;
            padding: 15px;
            margin: 30px 0;
            border-radius: 4px;
            font-size: 13px;
            color: #744210;
        }
        
        .footer {
            background-color: #f5f7fa;
            padding: 30px;
            text-align: center;
            border-top: 1px solid #e2e8f0;
            font-size: 12px;
            color: #718096;
        }
        
        .footer-content {
            margin-bottom: 15px;
        }
        
        .footer a {
            color: #667eea;
            text-decoration: none;
        }
        
        .social-links {
            margin: 15px 0;
        }
        
        .social-links a {
            margin: 0 10px;
            color: #667eea;
        }
        
        .divider {
            height: 1px;
            background-color: #e2e8f0;
            margin: 20px 0;
        }
        
        @media only screen and (max-width: 600px) {
            .email-container {
                width: 100%;
                margin: 0;
            }
            
            .content {
                padding: 25px 20px;
            }
            
            .header {
                padding: 30px 20px;
            }
            
            .cta-button {
                padding: 12px 35px;
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Header -->
        <div class="header">
            <h1>🔐 Verify Your Email Address</h1>
        </div>
        
        <!-- Main Content -->
        <div class="content">
            <p class="greeting">Welcome to Our Energy Solutions!</p>
            
            <p class="intro-text">
                Thank you for registering with us. We're excited to have you on board! To complete your registration and start enjoying all the benefits of your account, please verify your email address by clicking the button below.
            </p>
            
            <!-- CTA Button -->
            <div class="cta-section">
                <a href="{{ $linkn }}" class="cta-button">Verify Your Email Address</a>
            </div>
            
            <!-- Security Notice -->
            <div class="security-notice">
                <strong>⏱️ Time-Sensitive:</strong> This verification link will expire in 24 hours. If you didn't create this account, please ignore this email or contact our support team.
            </div>
            
            <p class="intro-text">
                Your security is our priority. Never share your verification link with anyone. Our team will never ask you for this link via email or any other channel.
            </p>
        </div>
        
        <!-- Footer -->
        <div class="footer">
            <div class="footer-content">
                <p><strong>Need Help?</strong></p>
                <p>If you're having trouble verifying your account, please <a href="#">contact our support team</a>.</p>
            </div>
            
            <div class="divider"></div>
            
            <div class="footer-content">
                <p>&copy; 2026 Solar Energy Solutions. All rights reserved.</p>
                <p>123 Green Street, Solar City, SC 12345</p>
            </div>
        </div>
    </div>
</body>
</html>

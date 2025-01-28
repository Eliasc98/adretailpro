<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings - AdRetail Pro</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <!-- Navigation -->
    <nav class="dashboard-nav">
        <div class="nav-container">
            <div class="logo">AdRetail Pro</div>
            <div class="user-menu">
                <span class="user-name">Joseph Ezeokeke</span>
                <img src="https://ui-avatars.com/api/?name=Joseph+Ezeokeke&background=4F46E5&color=fff&size=40&rounded=true&bold=true" alt="Joseph Ezeokeke" class="profile-img">
                <div class="dropdown-menu">
                    <a href="#profile"><i class="fas fa-user"></i> Profile</a>
                    <a href="settings.html"><i class="fas fa-cog"></i> Settings</a>
                    <a href="login.html"><i class="fas fa-sign-out-alt"></i> Logout</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Dashboard Content -->
    <div class="dashboard-container">
        <!-- Sidebar -->
        <aside class="dashboard-sidebar">
            <ul class="sidebar-menu">
                <li>
                    <a href="seller-dashboard.html">
                        <i class="fas fa-chart-line"></i>
                        <span>Overview</span>
                    </a>
                </li>
                <li>
                    <a href="manage-ad.html">
                        <i class="fas fa-ad"></i>
                        <span>Manage Ads</span>
                    </a>
                </li>
                <li>
                    <a href="analytics.html">
                        <i class="fas fa-chart-bar"></i>
                        <span>Analytics</span>
                    </a>
                </li>
                <li>
                    <a href="products.html">
                        <i class="fas fa-box"></i>
                        <span>Products</span>
                    </a>
                </li>
                <li>
                    <a href="orders.html">
                        <i class="fas fa-shopping-cart"></i>
                        <span>Orders</span>
                    </a>
                </li>
                <li>
                    <a href="customers.html">
                        <i class="fas fa-users"></i>
                        <span>Customers</span>
                    </a>
                </li>
                <li class="active">
                    <a href="settings.html">
                        <i class="fas fa-cog"></i>
                        <span>Settings</span>
                    </a>
                </li>
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="dashboard-main">
            <section class="dashboard-section">
                <!-- Header -->
                <div class="section-header">
                    <h2>Settings</h2>
                    <div class="header-actions">
                        <button class="btn btn-primary" onclick="saveSettings()">
                            <i class="fas fa-save"></i> Save Changes
                        </button>
                    </div>
                </div>

                <!-- Settings Stats -->
                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-icon"><i class="fas fa-server"></i></div>
                        <div class="stat-content">
                            <h3>System Status</h3>
                            <p class="stat-number">Active</p>
                            <span class="stat-text">All systems operational</span>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon"><i class="fas fa-database"></i></div>
                        <div class="stat-content">
                            <h3>Storage Used</h3>
                            <p class="stat-number">45.2 GB</p>
                            <span class="stat-text">of 100 GB</span>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon"><i class="fas fa-question-circle"></i></div>
                        <div class="stat-content">
                            <h3>FAQs</h3>
                            <p class="stat-number">24</p>
                            <span class="stat-text">Help Articles</span>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon"><i class="fas fa-headset"></i></div>
                        <div class="stat-content">
                            <h3>Customer Care</h3>
                            <p class="stat-number">24/7</p>
                            <span class="stat-text">Support Available</span>
                            <div class="support-actions">
                                <a href="#" class="stat-link" onclick="openLiveChat()">
                                    <i class="fas fa-comments"></i> Live Chat
                                </a>
                                <a href="mailto:support@adretailpro.com" class="stat-link">
                                    <i class="fas fa-envelope"></i> Email Support
                                </a>
                                <a href="tel:+2348001234567" class="stat-link">
                                    <i class="fas fa-phone"></i> Call Support
                                </a>
                            </div>
                        </div>
                    </div>
                
                </div>

                <!-- Settings Tabs -->
                <div class="settings-tabs">
                    <div class="tab-navigation">
                        <button class="tab-btn active" data-tab="business">
                            <i class="fas fa-store"></i> Business
                        </button>
                        <button class="tab-btn" data-tab="general">
                            <i class="fas fa-cog"></i> General
                        </button>
                        <button class="tab-btn" data-tab="security">
                            <i class="fas fa-shield-alt"></i> Security
                        </button>
                        <button class="tab-btn" data-tab="notifications">
                            <i class="fas fa-bell"></i> Notifications
                        </button>
                        <button class="tab-btn" data-tab="integrations">
                            <i class="fas fa-plug"></i> Integrations
                        </button>
                    </div>

                    <!-- Settings Content -->
                    <div class="settings-content">
                        <!-- Business Settings -->
                        <div class="tab-content active" id="business">
                            <div class="settings-card">
                                <h3>Business Information</h3>
                                <div class="form-group">
                                    <label>Business Logo</label>
                                    <div class="logo-upload">
                                        <img src="https://ui-avatars.com/api/?name=AdRetail+Pro&background=4F46E5&color=fff&size=100&rounded=true&bold=true" alt="Business Logo" class="business-logo">
                                        <div class="logo-upload-actions">
                                            <button class="btn btn-outline">
                                                <i class="fas fa-upload"></i> Upload New Logo
                                            </button>
                                            <button class="btn btn-outline">
                                                <i class="fas fa-trash"></i> Remove
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Business Name</label>
                                    <input type="text" value="AdRetail Pro Store" class="form-input">
                                </div>
                                <div class="form-group">
                                    <label>Business Description</label>
                                    <textarea class="form-input" rows="4" placeholder="Describe your business...">A leading online retail store specializing in high-quality products and exceptional customer service.</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Business Category</label>
                                    <select class="form-input">
                                        <option value="retail">Retail</option>
                                        <option value="electronics">Electronics</option>
                                        <option value="fashion">Fashion</option>
                                        <option value="food">Food & Beverages</option>
                                        <option value="health">Health & Beauty</option>
                                    </select>
                                </div>
                            </div>

                            <div class="settings-card mt-4">
                                <h3>Contact Information</h3>
                                <div class="form-group">
                                    <label>Business Email</label>
                                    <input type="email" value="contact@adretailpro.com" class="form-input">
                                </div>
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input type="tel" value="+234 800 123 4567" class="form-input">
                                </div>
                                <div class="form-group">
                                    <label>Alternative Phone</label>
                                    <input type="tel" placeholder="+234 800 xxx xxxx" class="form-input">
                                </div>
                              
                            </div>

                            <div class="settings-card mt-4">
                                <h3>Business Address</h3>
                                <div class="form-group">
                                    <label>Street Address</label>
                                    <input type="text" value="123 Business Avenue" class="form-input">
                                </div>
                                <div class="form-row">
                                    <div class="form-group flex-1">
                                        <label>City</label>
                                        <input type="text" value="Lagos" class="form-input">
                                    </div>
                                    <div class="form-group flex-1">
                                        <label>State</label>
                                        <input type="text" value="Lagos State" class="form-input">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group flex-1">
                                        <label>Postal Code</label>
                                        <input type="text" value="100001" class="form-input">
                                    </div>
                                    <div class="form-group flex-1">
                                        <label>Country</label>
                                        <select class="form-input">
                                            <option value="NG">Nigeria</option>
                                            <option value="GH">Ghana</option>
                                            <option value="KE">Kenya</option>
                                            <option value="ZA">South Africa</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                           

                            <div class="settings-card mt-4">
                                <h3>Social Media</h3>
                                <div class="form-group">
                                    <label><i class="fab fa-facebook"></i> Facebook</label>
                                    <input type="url" placeholder="Facebook page URL" class="form-input">
                                </div>
                                <div class="form-group">
                                    <label><i class="fab fa-instagram"></i> Instagram</label>
                                    <input type="url" placeholder="Instagram profile URL" class="form-input">
                                </div>
                                <div class="form-group">
                                    <label><i class="fab fa-twitter"></i> Twitter</label>
                                    <input type="url" placeholder="Twitter profile URL" class="form-input">
                                </div>
                                <div class="form-group">
                                    <label><i class="fab fa-linkedin"></i> LinkedIn</label>
                                    <input type="url" placeholder="LinkedIn company page URL" class="form-input">
                                </div>
                            </div>
                        </div>

                        <!-- General Settings -->
                        <div class="tab-content" id="general">
                            <div class="settings-card">
                                <h3>Profile Information</h3>
                                <div class="form-group">
                                    <label>Business Name</label>
                                    <input type="text" value="AdRetail Pro Store" class="form-input">
                                </div>
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input type="email" value="contact@adretailpro.com" class="form-input">
                                </div>
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input type="tel" value="+234 800 123 4567" class="form-input">
                                </div>
                                <div class="form-group">
                                    <label>Time Zone</label>
                                    <select class="form-input">
                                        <option value="WAT">West Africa Time (WAT)</option>
                                        <option value="GMT">GMT</option>
                                        <option value="EST">EST</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Security Settings -->
                        <div class="tab-content" id="security">
                            <div class="settings-card">
                                <h3>Security Settings</h3>
                                <div class="form-group">
                                    <label>Change Password</label>
                                    <input type="password" placeholder="Current Password" class="form-input">
                                    <input type="password" placeholder="New Password" class="form-input mt-3">
                                    <input type="password" placeholder="Confirm New Password" class="form-input mt-3">
                                </div>
                                <div class="form-group">
                                    <label class="checkbox-label">
                                        <input type="checkbox" checked>
                                        <span>Enable Two-Factor Authentication</span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="checkbox-label">
                                        <input type="checkbox" checked>
                                        <span>Email notifications for new login attempts</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Notification Settings -->
                        <div class="tab-content" id="notifications">
                            <div class="settings-card">
                                <h3>Notification Preferences</h3>
                                <div class="form-group">
                                    <label class="checkbox-label">
                                        <input type="checkbox" checked>
                                        <span>Email notifications for new orders</span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="checkbox-label">
                                        <input type="checkbox" checked>
                                        <span>SMS notifications for low stock</span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="checkbox-label">
                                        <input type="checkbox" checked>
                                        <span>Daily sales report summary</span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="checkbox-label">
                                        <input type="checkbox">
                                        <span>Marketing campaign updates</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Integration Settings -->
                        <div class="tab-content" id="integrations">
                            <div class="settings-card">
                                <h3>Connected Services</h3>
                                <div class="integration-item">
                                    <div class="integration-info">
                                        <i class="fab fa-paypal"></i>
                                        <div>
                                            <h4>PayPal</h4>
                                            <p>Connected</p>
                                        </div>
                                    </div>
                                    <button class="btn btn-outline">Disconnect</button>
                                </div>
                                <div class="integration-item">
                                    <div class="integration-info">
                                        <i class="fab fa-google"></i>
                                        <div>
                                            <h4>Google Analytics</h4>
                                            <p>Connected</p>
                                        </div>
                                    </div>
                                    <button class="btn btn-outline">Disconnect</button>
                                </div>
                                <div class="integration-item">
                                    <div class="integration-info">
                                        <i class="fab fa-facebook"></i>
                                        <div>
                                            <h4>Facebook Ads</h4>
                                            <p>Not connected</p>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary">Connect</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Function to switch tabs
            function switchTab(tabId) {
                // Remove active class from all tabs and content
                document.querySelectorAll('.tab-btn').forEach(btn => btn.classList.remove('active'));
                document.querySelectorAll('.tab-content').forEach(content => content.classList.remove('active'));
                
                // Add active class to selected tab and content
                const selectedTab = document.querySelector(`[data-tab="${tabId}"]`);
                const selectedContent = document.getElementById(tabId);
                
                if (selectedTab && selectedContent) {
                    selectedTab.classList.add('active');
                    selectedContent.classList.add('active');
                }
            }

            // Handle tab clicks
            document.querySelectorAll('.tab-btn').forEach(btn => {
                btn.addEventListener('click', () => {
                    const tabId = btn.getAttribute('data-tab');
                    switchTab(tabId);
                    // Update URL without reloading
                    const newUrl = new URL(window.location);
                    newUrl.searchParams.set('tab', tabId);
                    window.history.pushState({}, '', newUrl);
                });
            });

            // Handle URL parameters on load
            const urlParams = new URLSearchParams(window.location.search);
            const tabParam = urlParams.get('tab');
            if (tabParam) {
                switchTab(tabParam);
                
                // Handle profile section scroll if needed
                if (window.location.hash === '#profile' && tabParam === 'general') {
                    const profileSection = document.querySelector('.settings-card');
                    if (profileSection) {
                        profileSection.scrollIntoView({ behavior: 'smooth' });
                    }
                }
            }
        });
    </script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Settings - AdRetail Pro</title>
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
                    <a href="customer-settings.html"><i class="fas fa-user"></i> Profile</a>
                    <a href="customer-settings.html"><i class="fas fa-cog"></i> Settings</a>
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
                    <a href="buyer-dashboard.html">
                        <i class="fas fa-home"></i>
                        <span>Home</span>
                    </a>
                </li>
              
                <li>
                    <a href="cart.html">
                        <i class="fas fa-shopping-cart"></i>
                        <span>My Cart</span>
                    </a>
                </li>
                <li>
                    <a href="customer-order.html">
                        <i class="fas fa-box"></i>
                        <span>My Orders</span>
                    </a>
                </li>
                <li class="active">
                    <a href="customer-settings.html">
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
                    <h2>Account Settings</h2>
                    <div class="header-actions">
                        <button class="btn btn-primary" onclick="saveSettings()">
                            <i class="fas fa-save"></i> Save Changes
                        </button>
                    </div>
                </div>

                <!-- Settings Content -->
                <div class="settings-tabs">
                    <div class="tab-navigation">
                        <button class="tab-btn active" data-tab="profile">
                            <i class="fas fa-user"></i> Profile
                        </button>
                        <button class="tab-btn" data-tab="security">
                            <i class="fas fa-shield-alt"></i> Security
                        </button>
                        <button class="tab-btn" data-tab="preferences">
                            <i class="fas fa-sliders-h"></i> Preferences
                        </button>
                        <button class="tab-btn" data-tab="notifications">
                            <i class="fas fa-bell"></i> Notifications
                        </button>
                    </div>

                    <div class="settings-content">
                        <!-- Profile Settings -->
                        <div class="tab-content active" id="profile">
                            <div class="settings-card">
                                <h3>Profile Information</h3>
                                <div class="form-group">
                                    <label>Profile Picture</label>
                                    <div class="profile-upload">
                                        <img src="https://ui-avatars.com/api/?name=Joseph+Ezeokeke&background=4F46E5&color=fff&size=100&rounded=true&bold=true" alt="Profile Picture" class="profile-preview">
                                        <button class="btn btn-secondary">
                                            <i class="fas fa-camera"></i> Change Photo
                                        </button>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Full Name</label>
                                    <input type="text" value="Joseph Ezeokeke" class="form-input">
                                </div>
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input type="email" value="joseph@example.com" class="form-input">
                                </div>
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input type="tel" value="+234 123 456 7890" class="form-input">
                                </div>
                            </div>

                            <div class="settings-card mt-4">
                                <h3>Shipping Address</h3>
                                <div class="form-group">
                                    <label>Street Address</label>
                                    <input type="text" class="form-input" placeholder="Enter your street address">
                                </div>
                                <div class="form-row">
                                    <div class="form-group">
                                        <label>City</label>
                                        <input type="text" class="form-input" placeholder="Enter city">
                                    </div>
                                    <div class="form-group">
                                        <label>State</label>
                                        <input type="text" class="form-input" placeholder="Enter state">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group">
                                        <label>Country</label>
                                        <select class="form-input">
                                            <option value="NG">Nigeria</option>
                                            <option value="GH">Ghana</option>
                                            <option value="KE">Kenya</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Postal Code</label>
                                        <input type="text" class="form-input" placeholder="Enter postal code">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Security Settings -->
                        <div class="tab-content" id="security">
                            <div class="settings-card">
                                <h3>Change Password</h3>
                                <div class="form-group">
                                    <label>Current Password</label>
                                    <input type="password" class="form-input" placeholder="Enter current password">
                                </div>
                                <div class="form-group">
                                    <label>New Password</label>
                                    <input type="password" class="form-input" placeholder="Enter new password">
                                </div>
                                <div class="form-group">
                                    <label>Confirm New Password</label>
                                    <input type="password" class="form-input" placeholder="Confirm new password">
                                </div>
                            </div>

                            <div class="settings-card mt-4">
                                <h3>Two-Factor Authentication</h3>
                                <div class="form-group">
                                    <label class="switch-label">
                                        <input type="checkbox" class="switch-input">
                                        <span class="switch-slider"></span>
                                        Enable Two-Factor Authentication
                                    </label>
                                    <p class="help-text">Add an extra layer of security to your account</p>
                                </div>
                            </div>
                        </div>

                        <!-- Preferences Settings -->
                        <div class="tab-content" id="preferences">
                            <div class="settings-card">
                                <h3>Shopping Preferences</h3>
                                <div class="form-group">
                                    <label>Default Currency</label>
                                    <select class="form-input">
                                        <option value="NGN">Nigerian Naira (₦)</option>
                                        <option value="USD">US Dollar ($)</option>
                                        <option value="EUR">Euro (€)</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Language</label>
                                    <select class="form-input">
                                        <option value="en">English</option>
                                        <option value="fr">French</option>
                                        <option value="es">Spanish</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Notification Settings -->
                        <div class="tab-content" id="notifications">
                            <div class="settings-card">
                                <h3>Email Notifications</h3>
                                <div class="form-group">
                                    <label class="switch-label">
                                        <input type="checkbox" class="switch-input" checked>
                                        <span class="switch-slider"></span>
                                        Order Updates
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="switch-label">
                                        <input type="checkbox" class="switch-input" checked>
                                        <span class="switch-slider"></span>
                                        Promotional Emails
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="switch-label">
                                        <input type="checkbox" class="switch-input" checked>
                                        <span class="switch-slider"></span>
                                        Price Drop Alerts
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <script>
        // Tab switching functionality
        function switchTab(tabId) {
            // Remove active class from all tabs and contents
            document.querySelectorAll('.tab-btn').forEach(btn => btn.classList.remove('active'));
            document.querySelectorAll('.tab-content').forEach(content => content.classList.remove('active'));
            
            // Add active class to selected tab and content
            document.querySelector(`[data-tab="${tabId}"]`).classList.add('active');
            document.getElementById(tabId).classList.add('active');
        }

        // Handle tab clicks
        document.querySelectorAll('.tab-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                const tabId = btn.getAttribute('data-tab');
                switchTab(tabId);
            });
        });

        // Save settings function
        function saveSettings() {
            // Add your save functionality here
            alert('Settings saved successfully!');
        }

        // Initialize dropdown menu
        document.querySelector('.profile-img').addEventListener('click', function() {
            document.querySelector('.dropdown-menu').classList.toggle('show');
        });

        // Close dropdown when clicking outside
        window.addEventListener('click', function(e) {
            if (!e.target.matches('.profile-img')) {
                const dropdown = document.querySelector('.dropdown-menu');
                if (dropdown.classList.contains('show')) {
                    dropdown.classList.remove('show');
                }
            }
        });
    </script>
</body>
</html>

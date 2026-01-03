<?php
session_start();
if (!isset($_SESSION['user_data'])) { header("Location: index.html"); exit(); }
$user = $_SESSION['user_data'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile | ZRPT Executive</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <style>
        :root { 
            --brand-blue: #0f172a; 
            --brand-gold: #c5a059; 
            --accent-gold: #e5c17e;
            --text-main: #334155;
        }
        
        body { 
            font-family: 'Inter', sans-serif; 
            /* Added Background Image with Overlay */
            background: linear-gradient(rgba(15, 23, 42, 0.85), rgba(15, 23, 42, 0.85)), 
                        url('https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?q=80&w=2070&auto=format&fit=crop');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: var(--text-main); 
            min-height: 100vh;
            display: flex;
            align-items: center;
        }

        .profile-card { 
            background: rgba(255, 255, 255, 0.98); 
            backdrop-filter: blur(15px);
            border-radius: 24px; 
            box-shadow: 0 40px 100px rgba(0,0,0,0.4); 
            overflow: hidden; 
            max-width: 550px; 
            margin: 40px auto; 
            border: 1px solid rgba(197, 160, 89, 0.3);
            position: relative;
        }

        /* Gold accent bar */
        .profile-card::before {
            content: ""; position: absolute; top: 0; left: 0; right: 0; height: 8px;
            background: linear-gradient(90deg, var(--brand-gold), var(--accent-gold), var(--brand-gold));
        }

        .profile-header { 
            background: var(--brand-blue); 
            color: white; 
            padding: 50px 30px; 
            text-align: center; 
            border-bottom: 2px solid var(--brand-gold);
        }

        .user-avatar {
            width: 90px;
            height: 90px;
            background: linear-gradient(135deg, var(--brand-gold), var(--accent-gold));
            border-radius: 20px; /* Modern squircle shape */
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 2.5rem;
            color: var(--brand-blue);
            box-shadow: 0 10px 20px rgba(0,0,0,0.3);
            transform: rotate(-5deg);
        }

        .profile-header h3 { 
            font-family: 'Playfair Display', serif; 
            font-weight: 700;
            letter-spacing: 1px;
            margin-bottom: 8px;
            color: var(--accent-gold);
        }

        .info-container {
            padding: 30px 15px;
        }

        .info-row { 
            display: flex; 
            flex-direction: column;
            padding: 18px 35px; 
            border-bottom: 1px solid #f1f5f9; 
            transition: all 0.3s ease;
        }

        .info-row:last-child { border-bottom: none; }
        
        .info-row:hover {
            background-color: #fcfaf6;
            padding-left: 40px; /* Subtle slide effect on hover */
        }

        .info-label { 
            font-weight: 800; 
            color: #94a3b8; 
            text-transform: uppercase; 
            font-size: 0.7rem; 
            letter-spacing: 1.5px;
            margin-bottom: 6px;
        }

        .info-value { 
            font-weight: 600; 
            color: var(--brand-blue); 
            font-size: 1.1rem;
        }

        .tracking-badge {
            background: var(--brand-blue);
            color: var(--accent-gold);
            padding: 6px 16px;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 700;
            display: inline-block;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        .footer-actions {
            background: #f8fafc;
            padding: 30px;
            text-align: center;
        }

        .btn-logout {
            background: var(--brand-blue);
            color: white;
            border: none;
            padding: 12px 40px;
            border-radius: 12px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
            box-shadow: 0 10px 20px rgba(15, 23, 42, 0.2);
        }

        .btn-logout:hover {
            background: #dc2626; /* Deep Red for Logout */
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 15px 25px rgba(220, 38, 38, 0.3);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="profile-card">
            <div class="profile-header">
                <div class="user-avatar">
                    <i class="fas fa-crown"></i>
                </div>
                <h3>Profile</h3>
                <p class="small m-0 text-white-50 tracking-widest fw-bold">ZIMBABWE ROYAL PROJECTS TRUST</p>
            </div>
            
            <div class="info-container">
                <div class="info-row">
                    <span class="info-label">Account Identification</span>
                    <div>
                        <span class="tracking-badge">
                            <i class="fas fa-shield-halved me-2"></i> <?php echo $user['tracking_code']; ?>
                        </span>
                    </div>
                </div>
                
                <div class="info-row">
                    <span class="info-label">Full Name</span>
                    <span class="info-value"><?php echo $user['app_name'] . " " . $user['app_surname']; ?></span>
                </div>
                
                <div class="info-row">
                    <span class="info-label">National Identity</span>
                    <span class="info-value fw-bold"><?php echo $user['app_id']; ?></span>
                </div>
                
                <div class="info-row border-0">
                    <div class="row w-100 m-0">
                        <div class="col-6 p-0 border-end pe-3">
                            <span class="info-label">Date of Birth</span><br>
                            <span class="info-value"><?php echo $user['app_dob']; ?></span>
                        </div>
                        <div class="col-6 p-0 ps-4">
                            <span class="info-label">Contact Link</span><br>
                            <span class="info-value"><?php echo $user['app_contact']; ?></span>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="footer-actions border-top">
                <a href="index.html" class="btn-logout">
                    <i class="fas fa-power-off me-2"></i> End Session
                </a>
                
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
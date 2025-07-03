<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POS Mainan - Sistem Kasir Modern</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            line-height: 1.6;
            overflow-x: hidden;
        }
        
        /* Header */
        .header {
            position: fixed;
            top: 0;
            width: 100%;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            z-index: 1000;
            padding: 1rem 0;
            transition: all 0.3s ease;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .member-photo img {
            width: 200px;
            height: 200px;
            object-fit: cover;
            border-radius: 50%; /* opsional, untuk foto bulat */
        }
        
        .logo {
            font-size: 1.8rem;
            font-weight: 800;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .nav-links {
            display: flex;
            list-style: none;
            gap: 2rem;
        }
        
        .nav-links a {
            text-decoration: none;
            color: #333;
            font-weight: 500;
            transition: color 0.3s ease;
            position: relative;
        }
        
        .nav-links a:hover {
            color: #667eea;
        }
        
        .nav-links a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -5px;
            left: 0;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            transition: width 0.3s ease;
        }
        
        .nav-links a:hover::after {
            width: 100%;
        }
        
        .auth-buttons {
            display: flex;
            gap: 1rem;
            align-items: center;
        }
        
        .btn {
            padding: 0.7rem 1.5rem;
            border: none;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            cursor: pointer;
            text-align: center;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .btn-outline {
            color: #667eea;
            border: 2px solid #667eea;
            background: transparent;
        }
        
        .btn-outline:hover {
            background: #667eea;
            color: white;
            transform: translateY(-2px);
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.6);
        }
        
        .btn-admin {
            background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(231, 76, 60, 0.4);
        }
        
        .btn-admin:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(231, 76, 60, 0.6);
        }
        
        /* Hero Section */
        .hero {
            min-height: 100vh;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
            padding-top: 80px;
        }
        
        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><defs><radialGradient id="a" cx="50%" cy="50%"><stop offset="0%" stop-color="%23ffffff" stop-opacity="0.1"/><stop offset="100%" stop-color="%23ffffff" stop-opacity="0"/></radialGradient></defs><circle cx="200" cy="200" r="100" fill="url(%23a)"/><circle cx="800" cy="300" r="150" fill="url(%23a)"/><circle cx="400" cy="600" r="80" fill="url(%23a)"/><circle cx="700" cy="700" r="120" fill="url(%23a)"/></svg>');
            opacity: 0.3;
        }
        
        .hero-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
            position: relative;
            z-index: 2;
        }
        
        .hero-content h1 {
            font-size: 3.5rem;
            font-weight: 800;
            color: white;
            margin-bottom: 1.5rem;
            line-height: 1.1;
        }
        
        .hero-content .highlight {
            background: linear-gradient(135deg, #ffeaa7 0%, #fdcb6e 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .hero-content p {
            font-size: 1.2rem;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 2rem;
            line-height: 1.6;
        }
        
        .hero-buttons {
            display: flex;
            gap: 1rem;
            margin-bottom: 3rem;
        }
        
        .btn-hero {
            padding: 1rem 2rem;
            font-size: 1.1rem;
            border-radius: 50px;
        }
        
        .btn-white {
            background: white;
            color: #667eea;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
        
        .btn-white:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
        }
        
        .hero-stats {
            display: flex;
            gap: 2rem;
        }
        
        .stat {
            text-align: center;
            color: white;
        }
        
        .stat-number {
            font-size: 2rem;
            font-weight: 800;
            display: block;
            color: #ffeaa7;
        }
        
        .stat-label {
            font-size: 0.9rem;
            opacity: 0.8;
        }
        
        .hero-image {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        .mockup {
            max-width: 100%;
            height: auto;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
            background: white;
            padding: 1rem;
            position: relative;
            transform: perspective(1000px) rotateY(-10deg) rotateX(5deg);
            transition: transform 0.3s ease;
        }
        
        .mockup:hover {
            transform: perspective(1000px) rotateY(-5deg) rotateX(2deg);
        }
        
        .mockup-content {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            padding: 2rem;
            border-radius: 15px;
            height: 400px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        
        .mockup-header {
            display: flex;
            gap: 0.5rem;
            margin-bottom: 1rem;
        }
        
        .dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
        }
        
        .dot.red { background: #ff5f56; }
        .dot.yellow { background: #ffbd2e; }
        .dot.green { background: #27ca3f; }
        
        .mockup-dashboard {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
            flex: 1;
        }
        
        .dashboard-card {
            background: white;
            border-radius: 10px;
            padding: 1rem;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        
        .dashboard-icon {
            font-size: 2rem;
            margin-bottom: 0.5rem;
        }
        
        .dashboard-icon.sales { color: #00b894; }
        .dashboard-icon.products { color: #0984e3; }
        .dashboard-icon.customers { color: #e17055; }
        .dashboard-icon.reports { color: #a29bfe; }
        
        /* User Types Section */
        .user-types {
            padding: 6rem 0;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        }
        
        .user-types-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }
        
        .user-types-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
            gap: 3rem;
            margin-top: 3rem;
        }
        
        .user-type-card {
            background: white;
            padding: 3rem 2rem;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            text-align: center;
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }
        
        .user-type-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }
        
        .user-type-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        .user-type-card.admin::before {
            background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%);
        }
        
        .user-type-icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 1.5rem;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            color: white;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        .user-type-card.admin .user-type-icon {
            background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%);
        }
        
        .user-type-title {
            font-size: 1.8rem;
            font-weight: 800;
            color: #333;
            margin-bottom: 1rem;
        }
        
        .user-type-description {
            color: #666;
            margin-bottom: 2rem;
            font-size: 1.1rem;
            line-height: 1.6;
        }
        
        .user-type-features {
            list-style: none;
            margin-bottom: 2rem;
        }
        
        .user-type-features li {
            padding: 0.5rem 0;
            color: #555;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .user-type-features li i {
            color: #667eea;
            width: 20px;
        }
        
        .user-type-card.admin .user-type-features li i {
            color: #e74c3c;
        }
        
        .user-type-button {
            width: 100%;
            padding: 1rem 2rem;
            font-size: 1.1rem;
            border-radius: 50px;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
        }
        
        .user-type-button.user {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
        }
        
        .user-type-button.admin {
            background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(231, 76, 60, 0.4);
        }
        
        .user-type-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.6);
        }
        
        .user-type-button.admin:hover {
            box-shadow: 0 8px 25px rgba(231, 76, 60, 0.6);
        }
        
        /* Features Section */
        .features {
            padding: 6rem 0;
            background: white;
        }
        
        .features-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }
        
        .section-header {
            text-align: center;
            margin-bottom: 4rem;
        }
        
        .section-title {
            font-size: 2.5rem;
            font-weight: 800;
            color: #333;
            margin-bottom: 1rem;
        }
        
        .section-subtitle {
            font-size: 1.2rem;
            color: #666;
            max-width: 600px;
            margin: 0 auto;
        }
        
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }
        
        .feature-card {
            background: white;
            padding: 2rem;
            border-radius: 20px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .feature-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }
        
        .feature-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.5rem;
        }
        
        .feature-icon i {
            font-size: 1.5rem;
            color: white;
        }
        
        .feature-title {
            font-size: 1.3rem;
            font-weight: 700;
            color: #333;
            margin-bottom: 1rem;
        }
        
        .feature-description {
            color: #666;
            line-height: 1.6;
        }
        
        /* Team Section */
        .team {
            padding: 6rem 0;
            background: #f8f9fa;
        }
        
        .team-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }
        
        .team-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
        }
        
        .team-card {
            background: white;
            padding: 2rem;
            border-radius: 20px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .team-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        .team-card:hover::before {
            opacity: 0.05;
        }
        
        .team-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }
        
        .team-avatar {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin: 0 auto 1.5rem;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            color: white;
            border: 4px solid #f8f9fa;
            position: relative;
            z-index: 2;
        }
        
        .team-name {
            font-size: 1.3rem;
            font-weight: 700;
            color: #333;
            margin-bottom: 0.5rem;
            position: relative;
            z-index: 2;
        }
        
        .team-role {
            color: #667eea;
            font-weight: 600;
            position: relative;
            z-index: 2;
        }
        
        /* Footer */
        .footer {
            background: #333;
            color: white;
            padding: 3rem 0 1rem;
        }
        
        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            text-align: center;
        }
        
        .footer-content {
            margin-bottom: 2rem;
        }
        
        .footer-logo {
            font-size: 1.5rem;
            font-weight: 800;
            margin-bottom: 1rem;
        }
        
        .footer-text {
            color: #aaa;
            margin-bottom: 2rem;
        }
        
        .social-links {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-bottom: 2rem;
        }
        
        .social-link {
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .social-link:hover {
            background: #667eea;
            transform: translateY(-2px);
        }
        
        .footer-bottom {
            border-top: 1px solid #444;
            padding-top: 1rem;
            color: #aaa;
            font-size: 0.9rem;
        }
        
        /* Mobile Responsive */
        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }
            
            .auth-buttons {
                flex-wrap: wrap;
                gap: 0.5rem;
            }
            
            .auth-buttons .btn {
                padding: 0.5rem 1rem;
                font-size: 0.9rem;
            }
            
            .hero-container {
                grid-template-columns: 1fr;
                text-align: center;
                gap: 2rem;
                padding-top: 2rem;
            }
            
            .hero-content h1 {
                font-size: 2.5rem;
            }
            
            .hero-buttons {
                flex-direction: column;
                align-items: center;
            }
            
            .hero-stats {
                justify-content: center;
                gap: 1rem;
            }
            
            .mockup {
                transform: none;
                max-width: 300px;
                margin-top: 1rem;
            }
            
            .user-types-grid {
                grid-template-columns: 1fr;
            }
            
            .features-grid,
            .team-grid {
                grid-template-columns: 1fr;
            }
            
            .section-title {
                font-size: 2rem;
            }
        }
        
        @media (max-width: 480px) {
            .nav-container {
                padding: 0 1rem;
            }
            
            .hero-container {
                padding: 0 1rem;
            }
            
            .hero-content h1 {
                font-size: 2rem;
                line-height: 1.2;
            }
            
            .hero-content p {
                font-size: 1rem;
            }
            
            .hero-stats {
                flex-direction: column;
                gap: 1rem;
            }
            
            .user-types-container,
            .features-container,
            .team-container {
                padding: 0 1rem;
            }
        }
        
        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .animate-fade-in-up {
            animation: fadeInUp 0.6s ease forwards;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        
        .float {
            animation: float 6s ease-in-out infinite;
        }
        
        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        
        .gradient-animate {
            background: linear-gradient(-45deg, #667eea, #764ba2, #f093fb, #f5576c);
            background-size: 400% 400%;
            animation: gradientShift 4s ease infinite;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

                * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f5f5;
            padding: 20px 0;
        }

        .footer {
            background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
            color: white;
            padding: 60px 0 0;
            position: relative;
            overflow: hidden;
        }

        .footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="white" opacity="0.05"/><circle cx="75" cy="75" r="1" fill="white" opacity="0.05"/><circle cx="50" cy="10" r="1" fill="white" opacity="0.05"/><circle cx="10" cy="90" r="1" fill="white" opacity="0.05"/><circle cx="90" cy="40" r="1" fill="white" opacity="0.05"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
            opacity: 0.3;
        }

        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            position: relative;
            z-index: 1;
        }

        .footer-content {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr 1.5fr;
            gap: 40px;
            margin-bottom: 40px;
        }

        .footer-section h4 {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 20px;
            color: #ecf0f1;
            position: relative;
            padding-bottom: 10px;
        }

        .footer-section h4::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 30px;
            height: 2px;
            background: linear-gradient(90deg, #3498db, #2ecc71);
            border-radius: 2px;
        }

        .footer-logo h3 {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 15px;
            background: linear-gradient(45deg, #3498db, #2ecc71);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .footer-logo p {
            color: #bdc3c7;
            line-height: 1.6;
            margin-bottom: 25px;
        }

        .social-media {
            display: flex;
            gap: 15px;
        }

        .social-link {
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .social-link:hover {
            background: #3498db;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(52, 152, 219, 0.4);
        }

        .footer-section ul {
            list-style: none;
        }

        .footer-section ul li {
            margin-bottom: 12px;
        }

        .footer-section ul li a {
            color: #bdc3c7;
            text-decoration: none;
            transition: all 0.3s ease;
            display: block;
            padding: 5px 0;
            position: relative;
        }

        .footer-section ul li a::before {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 0;
            height: 2px;
            background: #3498db;
            transition: width 0.3s ease;
        }

        .footer-section ul li a:hover {
            color: #3498db;
            padding-left: 10px;
        }

        .footer-section ul li a:hover::before {
            width: 20px;
        }

        .contact-info .contact-item {
            display: flex;
            align-items: flex-start;
            gap: 15px;
            margin-bottom: 20px;
            padding: 15px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 10px;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .contact-item i {
            font-size: 1.2rem;
            color: #3498db;
            width: 20px;
            flex-shrink: 0;
            margin-top: 2px;
        }

        .contact-item div p {
            color: #bdc3c7;
            margin-bottom: 5px;
            font-size: 0.9rem;
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding: 30px 0;
            margin-top: 40px;
        }

        .footer-bottom-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
        }

        .footer-bottom p {
            color: #bdc3c7;
            font-size: 0.9rem;
        }

        .footer-bottom-links {
            display: flex;
            gap: 30px;
        }

        .footer-bottom-links a {
            color: #bdc3c7;
            text-decoration: none;
            font-size: 0.9rem;
            transition: color 0.3s ease;
        }

        .footer-bottom-links a:hover {
            color: #3498db;
        }

        @media (max-width: 992px) {
            .footer-content {
                grid-template-columns: 1fr 1fr;
                gap: 30px;
            }
            
            .footer-section:first-child {
                grid-column: 1 / -1;
            }
        }

        @media (max-width: 768px) {
            .footer-content {
                grid-template-columns: 1fr;
                gap: 30px;
            }
            
            .footer-bottom-content {
                flex-direction: column;
                text-align: center;
            }
            
            .footer-bottom-links {
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="nav-container">
            <div class="logo">POS Mainan</div>
            <nav>
                <ul class="nav-links">
                    <li><a href="#akses">Akses Login</a></li>
                    <li><a href="#fitur">Fitur</a></li>
                    <li><a href="#tim">Tim Kami</a></li>
                    <li><a href="#kontak">Kontak</a></li>
                </ul>
            </nav>
            <div class="auth-buttons">
                <a href="/user/login" class="btn btn-outline">
                    <i class="fas fa-shopping-cart"></i> Login Pembeli
                </a>

                <a href="/admin/login" class="btn btn-admin">
                    <i class="fas fa-cash-register"></i> Login Kasir
                </a>
            </div>
        </div>
    </header>
    <br></br>
    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-container">
            <div class="hero-content animate-fade-in-up">
                <h1>
                    Kelola Toko <span class="highlight gradient-animate">Mainan</span><br>
                    dengan Sistem POS Modern
                </h1>
                <p>
                    Tingkatkan efisiensi bisnis Anda dengan sistem kasir digital yang mudah digunakan. 
                    Kelola inventory, proses transaksi, dan pantau penjualan dalam satu platform terintegrasi.
                </p>
                <div class="hero-buttons">
                    <a href="#akses" class="btn btn-white btn-hero">
                        <i class="fas fa-rocket"></i> Pilih Akses Login
                    </a>
                    <a href="#fitur" class="btn btn-outline btn-hero" style="color: white; border-color: white;">
                        <i class="fas fa-play"></i> Lihat Demo
                    </a>
                </div>
                <div class="hero-stats">
                    <div class="stat">
                        <span class="stat-number">1000+</span>
                        <span class="stat-label">Toko Aktif</span>
                    </div>
                    <div class="stat">
                        <span class="stat-number">50K+</span>
                        <span class="stat-label">Transaksi/Hari</span>
                    </div>
                    <div class="stat">
                        <span class="stat-number">99.9%</span>
                        <span class="stat-label">Uptime</span>
                    </div>
                </div>
            </div>
            <div class="hero-image">
                <div class="mockup float">
                    <div class="mockup-content">
                        <div class="mockup-header">
                            <div class="dot red"></div>
                            <div class="dot yellow"></div>
                            <div class="dot green"></div>
                        </div>
                        <div class="mockup-dashboard">
                            <div class="dashboard-card">
                                <div class="dashboard-icon sales">
                                    <i class="fas fa-chart-line"></i>
                                </div>
                                <strong>Penjualan</strong>
                            </div>
                            <div class="dashboard-card">
                                <div class="dashboard-icon products">
                                    <i class="fas fa-box"></i>
                                </div>
                                <strong>Produk</strong>
                            </div>
                            <div class="dashboard-card">
                                <div class="dashboard-icon customers">
                                    <i class="fas fa-users"></i>
                                </div>
                                <strong>Pelanggan</strong>
                            </div>
                            <div class="dashboard-card">
                                <div class="dashboard-icon reports">
                                    <i class="fas fa-chart-pie"></i>
                                </div>
                                <strong>Laporan</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- User Types Section -->
    <section id="akses" class="user-types">
        <div class="user-types-container">
            <div class="section-header">
                <h2 class="section-title">Pilih Jenis Akses Login</h2>
                <p class="section-subtitle">
                    Sistem kami menyediakan dua jenis akses dengan fitur yang disesuaikan untuk kebutuhan yang berbeda
                </p>
            </div>
            <div class="user-types-grid">
                <div class="user-type-card">
                    <div class="user-type-icon">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <h3 class="user-type-title">Login Pembeli</h3>
                    <p class="user-type-description">
                        Akses untuk pelanggan yang ingin menjelajahi produk, melakukan pemesanan, dan mengelola riwayat pembelian mereka dengan mudah
                   </p>
                    <button class="user-type-button" onclick="window.location.href='/user/login'">
                        Masuk Sebagai User
                    </button>
               </div>
               <div class="user-type-card">
                   <div class="user-type-icon">
                       <i class="fas fa-store"></i>
                   </div>
                   <h3 class="user-type-title">Login Penjual</h3>
                   <p class="user-type-description">
                       Akses untuk mitra bisnis yang ingin mengelola toko online, memantau penjualan, dan mengatur inventori produk
                   </p>
                    <button class="user-type-button" onclick="window.location.href='/admin/login'">
                        Masuk Sebagai Admin
                    </button>
               </div>
           </div>
       </div>
   </section>
   <!-- Features Section -->
<section id="fitur" class="features">
   <div class="features-container">
       <div class="section-header">
           <h2 class="section-title">Fitur Unggulan</h2>
           <p class="section-subtitle">
               Platform lengkap dengan fitur-fitur canggih untuk mendukung bisnis online Anda
           </p>
       </div>
       <div class="features-grid">
           <div class="feature-card">
               <div class="feature-icon">
                   <i class="fas fa-shopping-bag"></i>
               </div>
               <h3>Katalog Produk</h3>
               <p>Kelola ribuan produk dengan mudah, lengkap dengan variasi, kategori, dan sistem inventory otomatis</p>
               <ul class="feature-list">
                   <li>Upload produk unlimited</li>
                   <li>Manajemen stok real-time</li>
                   <li>Variasi produk multiple</li>
               </ul>
           </div>
           <div class="feature-card">
               <div class="feature-icon">
                   <i class="fas fa-credit-card"></i>
               </div>
               <h3>Payment Gateway</h3>
               <p>Integrasi dengan berbagai metode pembayaran yang aman dan terpercaya untuk kemudahan transaksi</p>
               <ul class="feature-list">
                   <li>Transfer bank otomatis</li>
                   <li>E-wallet terintegrasi</li>
                   <li>Kartu kredit/debit</li>
               </ul>
           </div>
           <div class="feature-card">
               <div class="feature-icon">
                   <i class="fas fa-chart-line"></i>
               </div>
               <h3>Analytics Dashboard</h3>
               <p>Pantau performa bisnis Anda dengan dashboard analytics yang komprehensif dan real-time</p>
               <ul class="feature-list">
                   <li>Laporan penjualan detail</li>
                   <li>Analisis customer behavior</li>
                   <li>Tracking ROI marketing</li>
               </ul>
           </div>
           <div class="feature-card">
               <div class="feature-icon">
                   <i class="fas fa-shipping-fast"></i>
               </div>
               <h3>Sistem Logistik</h3>
               <p>Integrasi dengan kurir terpercaya untuk pengiriman yang efisien ke seluruh Indonesia</p>
               <ul class="feature-list">
                   <li>Multi-courier integration</li>
                   <li>Real-time tracking</li>
                   <li>Automatic shipping cost</li>
               </ul>
           </div>
           <div class="feature-card">
               <div class="feature-icon">
                   <i class="fas fa-mobile-alt"></i>
               </div>
               <h3>Mobile Responsive</h3>
               <p>Platform yang dapat diakses dengan sempurna di semua perangkat mobile dan desktop</p>
               <ul class="feature-list">
                   <li>Progressive Web App</li>
                   <li>Touch-friendly interface</li>
                   <li>Offline capabilities</li>
               </ul>
           </div>
           <div class="feature-card">
               <div class="feature-icon">
                   <i class="fas fa-headset"></i>
               </div>
               <h3>Customer Support</h3>
               <p>Tim support yang siap membantu 24/7 melalui berbagai channel komunikasi</p>
               <ul class="feature-list">
                   <li>Live chat support</li>
                   <li>Ticket system</li>
                   <li>Video call assistance</li>
               </ul>
           </div>
       </div>
   </div>
</section>

<!-- Team Section -->
<section id="tim" class="team">
   <div class="team-container">
       <div class="section-header">
           <h2 class="section-title">Tim Kami</h2>
           <p class="section-subtitle">
               Bertemu dengan para ahli yang berdedikasi mengembangkan platform terbaik untuk Anda
           </p>
       </div>
 <div class="team-grid">
    <div class="team-member">
        <div class="member-photo">
            <img src="{{ asset('storage/rahma.jpg') }}" alt="CEO" style="width: 200px; height: 200px; object-fit: cover;">
            <div class="member-overlay">
                <div class="social-links">
                    <a href="https://www.instagram.com/rhmarvg/"><i class="fab fa-linkedin"></i></a>
                    <a href="https://www.linkedin.com/in/rahmawati-ibrahim-996985279/"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="member-info">
            <h4>Rahmawati Ibrahim</h4>
        </div>
    </div>
    
    <div class="team-member">
        <div class="member-photo">
            <img src="{{ asset('storage/najwa.jpg') }}" alt="CEO" style="width: 200px; height: 200px; object-fit: cover;">
            <div class="member-overlay">
                <div class="social-links">
                    <a href="https://www.linkedin.com/in/najwa-syahri-46b032304?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app "><i class="fab fa-linkedin"></i></a>
                    <a href="https://www.instagram.com/rkive_gf?igsh=MWFndmlvY2tiYzE1ag== "><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="member-info">
            <h4>Najwa Putri Syahri</h4>
        </div>
    </div>
    
    <div class="team-member">
        <div class="member-photo">
            <img src="{{ asset('storage/clarissa.jpg') }}" alt="CEO" style="width: 200px; height: 200px; object-fit: cover;">
            <div class="member-overlay">
                <div class="social-links">
                    <a href="https://id.linkedin.com/in/clarrisa-isabella-73485b2bb "><i class="fab fa-linkedin"></i></a>
                    <a href="https://www.instagram.com/clarrisa.ip/"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="member-info">
            <h4>Clarissa Issabella</h4>
        </div>
    </div>
    
    <div class="team-member">
        <div class="member-photo">
            <img src="{{ asset('storage/rapif.jpg') }}" alt="CEO" style="width: 200px; height: 200px; object-fit: cover;">
            <div class="member-overlay">
                <div class="social-links">
                    <a href="https://www.linkedin.com/in/muchamad-rafidzal-sunarto-2b269528b?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app "><i class="fab fa-linkedin"></i></a>
                    <a href="https://www.instagram.com/rafidzal_sunarto?igsh=dnAzZXBqbTg3NHl4"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="member-info">
            <h4>Rafidzal sunarto</h4>
        </div>
    </div>
</div>
           </div>
       </div>
   </div>
</section>

<!-- Footer -->
<footer class="footer">
   <div class="footer-container">
       <div class="footer-content">
           <div class="footer-section">
               <div class="footer-logo">
                   <h3>POS Toko Mainan</h3>
                   <p>Platform e-commerce terpercaya untuk membantu bisnis Anda berkembang pesat</p>
               </div>
               <div class="social-media">
                   <a href="#" class="social-link"><i class="fab fa-facebook"></i></a>
                   <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                   <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                   <a href="#" class="social-link"><i class="fab fa-linkedin"></i></a>
                   <a href="#" class="social-link"><i class="fab fa-youtube"></i></a>
               </div>
           </div>
           
           <div class="footer-section">
               <h4>Layanan</h4>
               <ul>
                   <li><a href="#">Katalog Produk</a></li>
                   <li><a href="#">Payment Gateway</a></li>
                   <li><a href="#">Analytics</a></li>
                   <li><a href="#">Sistem Logistik</a></li>
                   <li><a href="#">Customer Support</a></li>
               </ul>
           </div>
           
           <div class="footer-section">
               <h4>Perusahaan</h4>
               <ul>
                   <li><a href="#tentang">Tentang Kami</a></li>
                   <li><a href="#tim">Tim Kami</a></li>
                   <li><a href="#">Karir</a></li>
                   <li><a href="#">Berita</a></li>
                   <li><a href="#">Partnership</a></li>
               </ul>
           </div>
           
           <div class="footer-section">
               <h4>Bantuan</h4>
               <ul>
                   <li><a href="#">FAQ</a></li>
                   <li><a href="#">Panduan</a></li>
                   <li><a href="#">Syarat & Ketentuan</a></li>
                   <li><a href="#">Kebijakan Privasi</a></li>
                   <li><a href="#">Pusat Bantuan</a></li>
               </ul>
           </div>
           
           <div class="footer-section contact-info">
               <h4>Hubungi Kami</h4>
               <div class="contact-item">
                   <i class="fas fa-phone"></i>
                   <div>
                       <p>+62 21 1234 5678</p>
                       <p>+62 812 3456 7890</p>
                   </div>
               </div>
               <div class="contact-item">
                   <i class="fas fa-envelope"></i>
                   <div>
                       <p>info@tokokami.com</p>
                       <p>support@tokokami.com</p>
                   </div>
               </div>
               <div class="contact-item">
                   <i class="fas fa-map-marker-alt"></i>
                   <div>
                       <p>Jl. Sudirman No. 123</p>
                       <p>Jakarta Pusat, 10270</p>
                   </div>
               </div>
               <div class="contact-item">
                   <i class="fas fa-clock"></i>
                   <div>
                       <p>Senin - Jumat: 08:00 - 22:00</p>
                       <p>Sabtu - Minggu: 09:00 - 21:00</p>
                   </div>
               </div>
           </div>
       </div>
       
       <div class="footer-bottom">
           <div class="footer-bottom-content">
               <p>&copy; 2024 TokoKami. Semua hak dilindungi undang-undang.</p>
               <div class="footer-bottom-links">
                   <a href="#">Syarat Layanan</a>
                   <a href="#">Kebijakan Privasi</a>
                   <a href="#">Cookies</a>
               </div>
           </div>
       </div>
   </div>
</footer>
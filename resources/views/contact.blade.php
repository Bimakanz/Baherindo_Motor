@extends('layouts.main')

@section('content')
<div class="motorcycle-contact-wrapper">
    <!-- Animated Background -->
    <div class="animated-bg">
        <div class="road-lines"></div>
        <div class="motorcycle-silhouette motorcycle-1"></div>
        <div class="motorcycle-silhouette motorcycle-2"></div>
        <div class="gear gear-1"></div>
        <div class="gear gear-2"></div>
        <div class="gear gear-3"></div>
        <div class="exhaust-smoke"></div>
        <div class="speed-lines"></div>
    </div>

    <!-- Contact Form Container -->
    <div class="contact-container">
        <div class="contact-header">
            <h1 class="contact-title">
                <span class="title-icon">🏍️</span>
                Hubungi Berhindo Motor
                <span class="title-icon">🏍️</span>
            </h1>
            <p class="contact-subtitle">Siap melayani kebutuhan motor Anda dengan sepenuh hati</p>
        </div>

        <form class="contact-form" action="{{ route('contact.store') }}" method="POST">
            @csrf
            <div class="form-row">
                <div class="form-group">
                    <label for="name" class="form-label">
                        <i class="icon">👤</i>
                        Nama Lengkap
                    </label>
                    <input type="text" class="form-control" id="name" name="name" required placeholder="Masukkan nama lengkap Anda">
                </div>
                
                <div class="form-group">
                    <label for="phone" class="form-label">
                        <i class="icon">📱</i>
                        Nomor Telepon
                    </label>
                    <input type="tel" class="form-control" id="phone" name="phone" required placeholder="Contoh: 08123456789">
                </div>
            </div>

            <div class="form-group">
                <label for="email" class="form-label">
                    <i class="icon">✉️</i>
                    Email
                </label>
                <input type="email" class="form-control" id="email" name="email" required placeholder="contoh@email.com">
            </div>

            <div class="form-group">
                <label for="service_type" class="form-label">
                    <i class="icon">🔧</i>
                    Jenis Layanan
                </label>
                <select class="form-control" id="service_type" name="service_type" required>
                    <option value="">Pilih jenis layanan</option>
                    <option value="service">Service Motor</option>
                    <option value="spare_parts">Spare Parts</option>
                    <option value="consultation">Konsultasi</option>
                    <option value="emergency">Panggilan Darurat</option>
                    <option value="other">Lainnya</option>
                </select>
            </div>

            <div class="form-group">
                <label for="message" class="form-label">
                    <i class="icon">💬</i>
                    Pesan
                </label>
                <textarea class="form-control" id="message" name="message" rows="5" required placeholder="Ceritakan kebutuhan atau masalah motor Anda..."></textarea>
            </div>

            <button type="submit" class="submit-btn">
                <span class="btn-text">Kirim Pesan</span>
                <span class="btn-icon">🚀</span>
            </button>
        </form>

        <!-- Contact Info -->
        <div class="contact-info">
            <div class="info-item">
                <span class="info-icon">📍</span>
                <span>Jl. Motor Raya No. 123, Jakarta</span>
            </div>
            <div class="info-item">
                <span class="info-icon">⏰</span>
                <span>Senin - Sabtu: 08:00 - 17:00</span>
            </div>
            <div class="info-item">
                <span class="info-icon">📞</span>
                <span>+62 21 1234 5678</span>
            </div>
        </div>
    </div>
</div>

<style>
.motorcycle-contact-wrapper {
    min-height: 100vh;
    position: relative;
    background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
    overflow: hidden;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

/* Animated Background */
.animated-bg {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 1;
}

.road-lines {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 100px;
    background: repeating-linear-gradient(
        90deg,
        transparent 0px,
        transparent 40px,
        #ffd700 40px,
        #ffd700 60px
    );
    animation: roadMove 3s linear infinite;
    opacity: 0.3;
}

@keyframes roadMove {
    0% { transform: translateX(0); }
    100% { transform: translateX(-100px); }
}

.motorcycle-silhouette {
    position: absolute;
    width: 80px;
    height: 40px;
    background: #ff6b35;
    border-radius: 20px 5px 5px 20px;
    opacity: 0.2;
}

.motorcycle-1 {
    bottom: 120px;
    left: -100px;
    animation: bikeMove1 8s linear infinite;
}

.motorcycle-2 {
    bottom: 160px;
    right: -100px;
    animation: bikeMove2 12s linear infinite reverse;
    background: #4ecdc4;
}

@keyframes bikeMove1 {
    0% { transform: translateX(0); }
    100% { transform: translateX(calc(100vw + 200px)); }
}

@keyframes bikeMove2 {
    0% { transform: translateX(0); }
    100% { transform: translateX(calc(-100vw - 200px)); }
}

.gear {
    position: absolute;
    border: 3px solid #ffd700;
    border-radius: 50%;
    opacity: 0.1;
}

.gear-1 {
    width: 60px;
    height: 60px;
    top: 20%;
    left: 10%;
    animation: rotate 10s linear infinite;
}

.gear-2 {
    width: 40px;
    height: 40px;
    top: 60%;
    right: 15%;
    animation: rotate 8s linear infinite reverse;
}

.gear-3 {
    width: 80px;
    height: 80px;
    bottom: 30%;
    left: 70%;
    animation: rotate 12s linear infinite;
}

@keyframes rotate {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

.exhaust-smoke {
    position: absolute;
    bottom: 100px;
    left: 20%;
    width: 20px;
    height: 20px;
    background: radial-gradient(circle, rgba(255,255,255,0.3) 0%, transparent 70%);
    border-radius: 50%;
    animation: smoke 4s ease-in-out infinite;
}

@keyframes smoke {
    0% { transform: translateY(0) scale(1); opacity: 0.3; }
    50% { transform: translateY(-50px) scale(1.5); opacity: 0.1; }
    100% { transform: translateY(-100px) scale(2); opacity: 0; }
}

.speed-lines {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: repeating-linear-gradient(
        45deg,
        transparent 0px,
        transparent 100px,
        rgba(255, 215, 0, 0.1) 100px,
        rgba(255, 215, 0, 0.1) 102px
    );
    animation: speedLines 2s linear infinite;
}

@keyframes speedLines {
    0% { transform: translateX(0) translateY(0); }
    100% { transform: translateX(-50px) translateY(-50px); }
}

/* Contact Container */
.contact-container {
    position: relative;
    z-index: 2;
    max-width: 800px;
    margin: 0 auto;
    padding: 40px 20px;
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(10px);
    border-radius: 20px;
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
    margin-top: 50px;
    margin-bottom: 50px;
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.contact-header {
    text-align: center;
    margin-bottom: 40px;
}

.contact-title {
    font-size: 2.5rem;
    font-weight: bold;
    color: #1a1a2e;
    margin-bottom: 10px;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
}

.title-icon {
    display: inline-block;
    animation: bounce 2s ease-in-out infinite;
    margin: 0 10px;
}

@keyframes bounce {
    0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
    40% { transform: translateY(-10px); }
    60% { transform: translateY(-5px); }
}

.contact-subtitle {
    font-size: 1.1rem;
    color: #666;
    font-style: italic;
}

/* Form Styles */
.contact-form {
    margin-bottom: 30px;
}

.form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
    margin-bottom: 20px;
}

.form-group {
    margin-bottom: 20px;
}

.form-label {
    display: flex;
    align-items: center;
    font-weight: 600;
    color: #1a1a2e;
    margin-bottom: 8px;
    font-size: 1rem;
}

.form-label .icon {
    margin-right: 8px;
    font-size: 1.1rem;
}

.form-control {
    width: 100%;
    padding: 15px;
    border: 2px solid #e0e0e0;
    border-radius: 10px;
    font-size: 1rem;
    transition: all 0.3s ease;
    background: rgba(255, 255, 255, 0.9);
}

.form-control:focus {
    outline: none;
    border-color: #ff6b35;
    box-shadow: 0 0 0 3px rgba(255, 107, 53, 0.1);
    transform: translateY(-2px);
}

.form-control::placeholder {
    color: #999;
}

select.form-control {
    cursor: pointer;
}

textarea.form-control {
    resize: vertical;
    min-height: 120px;
}

.submit-btn {
    width: 100%;
    padding: 18px;
    background: linear-gradient(135deg, #ff6b35 0%, #f7931e 100%);
    color: white;
    border: none;
    border-radius: 12px;
    font-size: 1.2rem;
    font-weight: bold;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    box-shadow: 0 8px 20px rgba(255, 107, 53, 0.3);
}

.submit-btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 12px 25px rgba(255, 107, 53, 0.4);
    background: linear-gradient(135deg, #f7931e 0%, #ff6b35 100%);
}

.submit-btn:active {
    transform: translateY(-1px);
}

.btn-icon {
    animation: pulse 2s ease-in-out infinite;
}

@keyframes pulse {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.1); }
}

/* Contact Info */
.contact-info {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 15px;
    padding: 20px;
    background: rgba(26, 26, 46, 0.05);
    border-radius: 12px;
    border: 1px solid rgba(26, 26, 46, 0.1);
}

.info-item {
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 0.95rem;
    color: #555;
}

.info-icon {
    font-size: 1.2rem;
    width: 25px;
    text-align: center;
}

/* Responsive Design */
@media (max-width: 768px) {
    .contact-container {
        margin: 20px;
        padding: 30px 20px;
    }
    
    .contact-title {
        font-size: 2rem;
    }
    
    .form-row {
        grid-template-columns: 1fr;
        gap: 0;
    }
    
    .contact-info {
        grid-template-columns: 1fr;
    }
    
    .motorcycle-silhouette {
        width: 60px;
        height: 30px;
    }
    
    .gear-1, .gear-2, .gear-3 {
        width: 40px;
        height: 40px;
    }
}

@media (max-width: 480px) {
    .contact-title {
        font-size: 1.8rem;
    }
    
    .title-icon {
        display: block;
        margin: 10px 0;
    }
    
    .form-control {
        padding: 12px;
    }
    
    .submit-btn {
        padding: 15px;
        font-size: 1.1rem;
    }
}

/* Loading Animation */
.submit-btn.loading {
    pointer-events: none;
    opacity: 0.7;
}

.submit-btn.loading .btn-text::after {
    content: '';
    display: inline-block;
    width: 20px;
    height: 20px;
    border: 2px solid transparent;
    border-top: 2px solid white;
    border-radius: 50%;
    animation: spin 1s linear infinite;
    margin-left: 10px;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('.contact-form');
    const submitBtn = document.querySelector('.submit-btn');
    
    form.addEventListener('submit', function(e) {
        submitBtn.classList.add('loading');
        submitBtn.querySelector('.btn-text').textContent = 'Mengirim...';
    });
    
    // Add floating animation to form elements
    const formGroups = document.querySelectorAll('.form-group');
    formGroups.forEach((group, index) => {
        group.style.animationDelay = `${index * 0.1}s`;
        group.classList.add('fade-in');
    });
});
</script>

<style>
.fade-in {
    animation: fadeInUp 0.6s ease-out forwards;
    opacity: 0;
    transform: translateY(30px);
}

@keyframes fadeInUp {
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>
@endsection

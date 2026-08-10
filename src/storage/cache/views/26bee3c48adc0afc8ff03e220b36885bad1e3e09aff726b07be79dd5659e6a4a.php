<!DOCTYPE html>
<html lang="tr" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Sayfa Bulunamadı</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-full bg-slate-900 text-slate-100 flex flex-col justify-between font-sans selection:bg-indigo-500 selection:text-white">

    <!-- Header / Navbar -->
    <header class="w-full max-w-7xl mx-auto px-6 py-6 flex justify-between items-center">
        <div class="flex items-center gap-2">
            <!-- Inline SVG Logo / Icon -->
            <div class="w-8 h-8 rounded-lg bg-indigo-600 flex items-center justify-center text-white font-bold shadow-lg shadow-indigo-500/30">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M12.316 3.051a1 1 0 01.633 1.265l-4 12a1 1 0 11-1.898-.632l4-12a1 1 0 011.265-.633zM5.707 6.293a1 1 0 010 1.414L2.414 11l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0zm8.586 0a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L17.586 11l-3.293-3.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </div>
            <span class="text-lg font-semibold tracking-wide text-slate-200">Sistem Platformu</span>
        </div>
        <div>
            <a href="#" class="text-sm font-medium text-slate-400 hover:text-slate-200 transition-colors">Destek Ekibi</a>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow flex items-center justify-center px-6 py-12">
        <div class="max-w-xl w-full text-center">
            
            <!-- Inline SVG Technical / Enterprise Illustration -->
            <div class="relative w-48 h-48 mx-auto mb-8 flex items-center justify-center">
                <!-- Outer Glow -->
                <div class="absolute inset-0 bg-indigo-500/10 rounded-full blur-2xl"></div>
                
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 200 200" class="w-full h-full relative z-10 text-indigo-500">
                    <!-- Circuit Grid Effect -->
                    <circle cx="100" cy="100" r="80" fill="none" stroke="currentColor" stroke-width="1.5" stroke-dasharray="4 4" opacity="0.3" />
                    <circle cx="100" cy="100" r="55" fill="none" stroke="currentColor" stroke-width="1" opacity="0.2" />
                    
                    <!-- Server / Node SVG Graphic -->
                    <rect x="60" y="65" width="80" height="24" rx="4" fill="#1e293b" stroke="currentColor" stroke-width="2"/>
                    <circle cx="75" cy="77" r="3" fill="#10b981" />
                    <line x1="90" y1="77" x2="125" y2="77" stroke="#475569" stroke-width="2" stroke-linecap="round" />

                    <rect x="60" y="98" width="80" height="24" rx="4" fill="#1e293b" stroke="#ef4444" stroke-width="2"/>
                    <circle cx="75" cy="110" r="3" fill="#ef4444" />
                    <!-- Warning / Disconnect Cross -->
                    <path d="M100 106 L110 114 M110 106 L100 114" stroke="#ef4444" stroke-width="2" stroke-linecap="round"/>

                    <rect x="60" y="131" width="80" height="24" rx="4" fill="#1e293b" stroke="currentColor" stroke-width="2"/>
                    <circle cx="75" cy="143" r="3" fill="#10b981" />
                    <line x1="90" y1="143" x2="125" y2="143" stroke="#475569" stroke-width="2" stroke-linecap="round" />
                </svg>
            </div>

            <!-- Error Badge & Title -->
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-indigo-500/10 border border-indigo-500/20 text-indigo-400 text-xs font-mono mb-4">
                <span class="w-2 h-2 rounded-full bg-indigo-400 animate-pulse"></span>
                HTTP 404 STATUS
            </div>
            
            <h1 class="text-4xl sm:text-5xl font-extrabold text-white tracking-tight mb-4">
                Sayfa Bulunamadı
            </h1>
            
            <p class="text-base text-slate-400 leading-relaxed mb-8">
                İstediğiniz kaynağa ulaşılamıyor. Adres değiştirilmiş, silinmiş veya sunucularımızda geçici bir yönlendirme hatası oluşmuş olabilir.
            </p>

            <!-- CTA Actions -->
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="/" class="w-full sm:w-auto px-6 py-3 rounded-lg bg-indigo-600 hover:bg-indigo-500 text-white font-medium text-sm transition-all duration-200 shadow-lg shadow-indigo-600/25 flex items-center justify-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    Ana Sayfaya Dön
                </a>
                
                <button onclick="window.history.back()" class="w-full sm:w-auto px-6 py-3 rounded-lg bg-slate-800 hover:bg-slate-700 text-slate-300 border border-slate-700/60 font-medium text-sm transition-all duration-200 flex items-center justify-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Önceki Sayfaya Git
                </button>
            </div>
        </div>
    </main>

    <!-- Footer Status -->
    <footer class="w-full max-w-7xl mx-auto px-6 py-6 border-t border-slate-800/80 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-slate-500">
        <div class="flex items-center gap-2">
            <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
            <span>Tüm Kurumsal Sistemler Operasyonel</span>
        </div>
        <div>
            &copy; 2026 Altyapı Servisleri A.Ş.
        </div>
    </footer>

</body>
</html>
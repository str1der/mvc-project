
        <div class="navbar-brand">
            <a href="/">BenimSitem</a>
        </div>
        
        <ul class="navbar-menu">
            <li><a href="/">Ana Sayfa</a></li>
            <li><a href="/about">Hakkımızda</a></li>
            <li><a href="/contact">İletişim</a></li>
        </ul>

        <div class="navbar-user">
            <!-- Sizin Template Engine'iniz buradaki { userName } ifadesini derleyecektir -->
            <span class="welcome-text">Merhaba, { userName } 👋 
            @if($lokasyon !== null)
                Lokasyon: { lokasyon }
            @endif
            </span>
            
            <a href="/logout" class="logout-btn">Çıkış Yap</a>
        </div>

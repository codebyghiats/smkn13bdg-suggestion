// Logout Modal JavaScript
document.addEventListener('DOMContentLoaded', function() {
    // Fungsi untuk menampilkan modal logout
    function showLogoutModal() {
        const modal = document.getElementById('logoutModal');
        if (modal) {
            modal.classList.add('active');
            document.body.style.overflow = 'hidden'; // Mencegah scroll background
        }
    }

    // Fungsi untuk menyembunyikan modal logout
    function hideLogoutModal() {
        const modal = document.getElementById('logoutModal');
        if (modal) {
            modal.classList.remove('active');
            document.body.style.overflow = 'auto'; // Mengembalikan scroll
        }
    }

    // Event listener untuk tombol logout di sidebar
    const logoutLinks = document.querySelectorAll('.logout-link');
    logoutLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            showLogoutModal();
        });
    });

    // Event listener untuk tombol cancel
    const cancelBtn = document.getElementById('logoutCancel');
    if (cancelBtn) {
        cancelBtn.addEventListener('click', hideLogoutModal);
    }

    // Event listener untuk tombol confirm logout
    const confirmBtn = document.getElementById('logoutConfirm');
    if (confirmBtn) {
        confirmBtn.addEventListener('click', function() {
            // Tambahkan loading state
            this.innerHTML = '<i class="ph ph-spinner"></i> Logging out...';
            this.disabled = true;
            
            // Simulasi proses logout (ganti dengan URL logout yang sebenarnya)
            setTimeout(() => {
                window.location.href = '/'; // Redirect ke halaman login/home
            }, 1500);
        });
    }

    // Event listener untuk menutup modal saat klik overlay
    const modalOverlay = document.getElementById('logoutModal');
    if (modalOverlay) {
        modalOverlay.addEventListener('click', function(e) {
            if (e.target === this) {
                hideLogoutModal();
            }
        });
    }

    // Event listener untuk menutup modal dengan tombol ESC
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            hideLogoutModal();
        }
    });

    // Animasi untuk tombol logout saat hover
    const logoutButtons = document.querySelectorAll('.logout-link');
    logoutButtons.forEach(button => {
        button.addEventListener('mouseenter', function() {
            this.style.transform = 'translateX(5px)';
        });
        
        button.addEventListener('mouseleave', function() {
            this.style.transform = 'translateX(0)';
        });
    });
});

// Fungsi untuk menampilkan notifikasi logout berhasil
function showLogoutNotification() {
    const notification = document.createElement('div');
    notification.className = 'logout-notification';
    notification.innerHTML = `
        <div class="notification-content">
            <i class="ph ph-check-circle"></i>
            <span>Logout berhasil!</span>
        </div>
    `;
    
    // Tambahkan styling untuk notification
    notification.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        background: #4caf50;
        color: white;
        padding: 15px 20px;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.3);
        z-index: 10000;
        transform: translateX(100%);
        transition: transform 0.3s ease;
    `;
    
    document.body.appendChild(notification);
    
    // Animasi masuk
    setTimeout(() => {
        notification.style.transform = 'translateX(0)';
    }, 100);
    
    // Hapus setelah 3 detik
    setTimeout(() => {
        notification.style.transform = 'translateX(100%)';
        setTimeout(() => {
            document.body.removeChild(notification);
        }, 300);
    }, 3000);
}

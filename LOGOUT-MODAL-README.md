# UI Validasi Logout - SMKN13BDG

Sistem validasi logout yang modern dan user-friendly untuk website SMKN13BDG.

## 🚀 Fitur

- ✅ **Konfirmasi Logout**: Modal konfirmasi sebelum user logout
- ✅ **Animasi Smooth**: Transisi yang halus dan modern
- ✅ **Responsive Design**: Bekerja di semua ukuran layar
- ✅ **Loading State**: Indikator loading saat proses logout
- ✅ **Keyboard Support**: Dapat ditutup dengan tombol ESC
- ✅ **Click Outside**: Dapat ditutup dengan klik di luar modal
- ✅ **Konsisten Design**: Mengikuti tema website yang sudah ada

## 📁 File yang Dibuat

### CSS
- `public/css/logout-modal.css` - Styling untuk modal logout

### JavaScript
- `public/js/logout-modal.js` - Fungsi-fungsi untuk modal logout

### HTML/Blade
- `resources/views/partials/logout-modal.blade.php` - Komponen modal logout
- `public/demo-logout.html` - File demo untuk testing

### View yang Diupdate
- `resources/views/dashboard.blade.php` - Dashboard dengan modal logout
- `resources/views/pengumuman.blade.php` - Halaman pengumuman dengan modal logout
- `resources/views/siswa.blade.php` - Halaman siswa dengan modal logout

## 🛠️ Cara Penggunaan

### 1. Include CSS
Tambahkan link CSS di bagian `<head>`:
```html
<link rel="stylesheet" href="css/logout-modal.css">
```

### 2. Include JavaScript
Tambahkan script di bagian bawah sebelum `</body>`:
```html
<script src="js/logout-modal.js"></script>
```

### 3. Include Modal Component
Tambahkan komponen modal di bagian bawah sebelum `</body>`:
```html
@include('partials.logout-modal')
```

### 4. Update Link Logout
Ganti link logout biasa dengan class `logout-link`:
```html
<!-- Sebelum -->
<a href="/" class="logout"><i class="ph ph-sign-out"></i> Logout</a>

<!-- Sesudah -->
<a href="#" class="logout logout-link"><i class="ph ph-sign-out"></i> Logout</a>
```

## 🎨 Customization

### Mengubah Warna
Edit file `public/css/logout-modal.css`:
```css
.logout-btn-confirm {
    background-color: #8b1c1c; /* Ganti dengan warna yang diinginkan */
    border-color: #8b1c1c;
}
```

### Mengubah Animasi
Edit durasi animasi di CSS:
```css
.logout-modal-overlay {
    transition: all 0.3s ease; /* Ganti 0.3s dengan durasi yang diinginkan */
}
```

### Mengubah URL Logout
Edit file `public/js/logout-modal.js`:
```javascript
setTimeout(() => {
    window.location.href = '/'; // Ganti dengan URL logout yang sebenarnya
}, 1500);
```

## 📱 Responsive Design

Modal logout sudah responsive dan akan menyesuaikan dengan ukuran layar:
- **Desktop**: Layout horizontal dengan tombol side-by-side
- **Mobile**: Layout vertikal dengan tombol full-width

## 🔧 Testing

Untuk melihat demo modal logout, buka file:
```
public/demo-logout.html
```

## 🎯 Implementasi di Halaman Lain

Untuk menambahkan modal logout di halaman lain:

1. **Tambahkan CSS**:
```html
<link rel="stylesheet" href="css/logout-modal.css">
```

2. **Update link logout**:
```html
<a href="#" class="logout logout-link"><i class="ph ph-sign-out"></i> Logout</a>
```

3. **Include modal dan script**:
```html
@include('partials.logout-modal')
<script src="js/logout-modal.js"></script>
```

## 🐛 Troubleshooting

### Modal tidak muncul
- Pastikan file CSS dan JS sudah di-include
- Pastikan class `logout-link` sudah ditambahkan
- Cek console browser untuk error JavaScript

### Styling tidak sesuai
- Pastikan CSS logout-modal.css di-load setelah CSS utama
- Cek apakah ada konflik CSS dengan file lain

### JavaScript tidak berfungsi
- Pastikan file JS di-load sebelum `</body>`
- Pastikan tidak ada error JavaScript di console

## 📞 Support

Jika ada masalah atau pertanyaan, silakan hubungi tim development.

---

**Dibuat untuk SMKN13BDG Suggestion System** 🏫

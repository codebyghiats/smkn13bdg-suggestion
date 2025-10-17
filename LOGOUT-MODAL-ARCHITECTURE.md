# Arsitektur UI Validasi Logout

## Flow Diagram

```mermaid
graph TD
    A[User klik tombol Logout] --> B[Event listener terpicu]
    B --> C[showLogoutModal() dipanggil]
    C --> D[Modal overlay ditampilkan]
    D --> E[User melihat konfirmasi]
    E --> F{User memilih}
    F -->|Batal| G[hideLogoutModal()]
    F -->|Konfirmasi| H[Loading state ditampilkan]
    H --> I[Redirect ke halaman login]
    G --> J[Modal tertutup]
    J --> K[User tetap di halaman]
    
    style A fill:#8b1c1c,color:#fff
    style D fill:#4caf50,color:#fff
    style H fill:#ff9800,color:#fff
    style I fill:#2196f3,color:#fff
```

## Struktur File

```
public/
├── css/
│   └── logout-modal.css          # Styling modal
├── js/
│   └── logout-modal.js           # JavaScript functions
└── demo-logout.html             # Demo file

resources/views/
├── partials/
│   └── logout-modal.blade.php   # Modal component
├── dashboard.blade.php          # Updated with modal
├── pengumuman.blade.php         # Updated with modal
└── siswa.blade.php             # Updated with modal
```

## Komponen Utama

### 1. CSS (logout-modal.css)
- `.logout-modal-overlay` - Background overlay
- `.logout-modal` - Container modal
- `.logout-modal-buttons` - Tombol aksi
- Responsive breakpoints

### 2. JavaScript (logout-modal.js)
- `showLogoutModal()` - Tampilkan modal
- `hideLogoutModal()` - Sembunyikan modal
- Event listeners untuk interaksi
- Loading state management

### 3. HTML Component (logout-modal.blade.php)
- Modal structure
- Icon dan teks konfirmasi
- Tombol Batal dan Logout

## Event Flow

1. **Click Event**: User klik tombol logout
2. **Prevent Default**: Mencegah redirect langsung
3. **Show Modal**: Tampilkan modal konfirmasi
4. **User Choice**: User pilih Batal atau Konfirmasi
5. **Action**: 
   - Batal → Tutup modal
   - Konfirmasi → Loading → Redirect

## Styling Features

- **Smooth Animation**: CSS transitions untuk efek halus
- **Hover Effects**: Interactive button states
- **Responsive**: Mobile-first design
- **Theme Consistent**: Mengikuti warna website (#8b1c1c)
- **Accessibility**: Keyboard navigation support

## JavaScript Features

- **Event Delegation**: Efficient event handling
- **Loading State**: Visual feedback saat logout
- **Error Handling**: Graceful fallbacks
- **Cross-browser**: Compatible dengan browser modern

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ranking Talenta - KerjaIn</title>
    <link rel="icon" type="image/png" href="{{ asset('image/logo-kerjain.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700;800&family=Sora:wght@400;600;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons+Extended" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <style>
        .filter-container {
            display: flex;
            gap: 12px;
            margin-bottom: 24px;
            background: white;
            padding: 16px;
            border-radius: 16px;
            border: 1px solid var(--dash-border);
            align-items: center;
        }
        .filter-label {
            font-weight: 700;
            color: var(--text-dark);
            margin-right: 8px;
            font-size: 0.95rem;
        }
        .filter-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 20px;
            border-radius: 99px;
            border: 1px solid var(--dash-border);
            background: #f8fafc;
            color: var(--text-muted);
            font-weight: 600;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.2s ease;
        }
        .filter-btn:hover {
            background: #f1f5f9;
            color: var(--text-dark);
        }
        .filter-btn.active {
            background: var(--dash-accent-light);
            color: var(--dash-accent);
            border-color: var(--dash-accent);
        }
        .rank-badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 32px;
            height: 32px;
            border-radius: 50%;
            font-weight: 800;
            font-size: 0.95rem;
        }
        .rank-1 { background: #fef3c7; color: #d97706; border: 1px solid #fcd34d; }
        .rank-2 { background: #f1f5f9; color: #475569; border: 1px solid #cbd5e1; }
        .rank-3 { background: #ffedd5; color: #c2410c; border: 1px solid #fed7aa; }
        .rank-other { background: #f8fafc; color: #64748b; }
    </style>
</head>
<body>

<nav>
    <div class="logo" onclick="window.location.href='/'">
        <img src="{{ asset('image/logo-kerjain.png') }}" alt="Logo KerjaIn" class="logo-img" onerror="this.style.display='none'">
        KerjaIn
    </div>
    <div class="nav-links">
        <span class="nav-role-badge" style="background:#dbeafe;color:#1e3a8a;"><span class="material-icons" style="font-size: 18px; margin-right: 6px; display: inline-flex; vertical-align: middle;">school</span>Pelajar</span>
    </div>
    <div class="nav-auth">
        <a href="#" onclick="handleLogout()" class="btn-solid" style="background:#ef4444;">Keluar</a>
    </div>
</nav>

<div class="dashboard-container">
    <aside class="dash-sidebar">
        <div class="sidebar-header">
            <h3>Menu Pelajar</h3>
        </div>
        <a class="nav-item" href="/pages/pelajar/dashboard">
            <span class="material-icons nav-icon">bar_chart</span> Dashboard
        </a>
        <a class="nav-item" href="/pages/pelajar/dashboard?section=programs">
            <span class="material-icons nav-icon">menu_book</span> Program Saya
        </a>
        <a class="nav-item" href="/pages/programs">
            <span class="material-icons nav-icon">search</span> Cari Program
        </a>
        <a class="nav-item" href="/pages/pelajar/leaderboard">
            <span class="material-icons nav-icon">emoji_events</span> Leaderboard
        </a>
        <a class="nav-item active" href="/pages/pelajar/ranking">
            <span class="material-icons nav-icon">military_tech</span> Ranking
        </a>
        <a class="nav-item" href="/pages/pelajar/profile">
            <span class="material-icons nav-icon">account_circle</span> Profil Saya
        </a>
        <a class="nav-item" href="/pages/messages">
            <span class="material-icons nav-icon">email</span> Pesan
        </a>
    </aside>

    <main class="dash-main">
        <div class="dash-welcome" style="background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%); color: white;">
            <h2 style="display: flex; align-items: center; gap: 8px; margin: 0 0 8px;">Peringkat Talenta Nasional <span class="material-icons" style="font-size: 1.8rem;">military_tech</span></h2>
            <p style="opacity: 0.9; font-size: 0.95rem;">Temukan seluruh talenta pelajar terbaik yang terdaftar secara publik di platform KerjaIn.</p>
        </div>

        <div class="filter-container">
            <span class="filter-label">Urutkan Berdasarkan:</span>
            <button class="filter-btn active" id="btn-poin" onclick="changeSort('poin')">
                <span class="material-icons" style="font-size: 18px;">auto_awesome</span> Jumlah Poin
            </button>
            <button class="filter-btn" id="btn-sertifikat" onclick="changeSort('sertifikat')">
                <span class="material-icons" style="font-size: 18px;">workspace_premium</span> Jumlah Sertifikat
            </button>
        </div>

        <div class="dash-card" style="padding: 0; overflow-x: auto; border-radius: 16px;">
            <table style="width: 100%; border-collapse: collapse; text-align: left; min-width: 600px;">
                <thead>
                    <tr style="border-bottom: 2px solid var(--dash-border); background: #f8fafc;">
                        <th style="padding: 16px 24px; font-weight: 700; color: var(--text-dark);">Peringkat</th>
                        <th style="padding: 16px 24px; font-weight: 700; color: var(--text-dark);">Nama Pelajar</th>
                        <th style="padding: 16px 24px; font-weight: 700; color: var(--text-dark);">Asal Institusi</th>
                        <th style="padding: 16px 24px; font-weight: 700; color: var(--text-dark); text-align: center;">Jumlah Poin</th>
                        <th style="padding: 16px 24px; font-weight: 700; color: var(--text-dark); text-align: center;">Sertifikat</th>
                    </tr>
                </thead>
                <tbody id="ranking-table">
                    <tr>
                        <td colspan="5" style="padding: 32px; text-align: center; color: var(--text-muted);">
                            <div style="display: flex; flex-direction: column; align-items: center; gap: 8px;">
                                <span class="material-icons spinner" style="font-size: 2rem; color: var(--dash-accent);">sync</span>
                                Memuat data peringkat...
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
</div>

<script>
    let currentSort = 'poin';

    document.addEventListener('DOMContentLoaded', loadRanking);

    function handleLogout() {
        fetch('/api/logout', { method: 'POST' })
            .then(() => window.location.href = '/')
            .catch(() => window.location.href = '/');
    }

    function changeSort(sortBy) {
        if (currentSort === sortBy) return;
        currentSort = sortBy;

        // Toggle button states
        document.getElementById('btn-poin').classList.toggle('active', sortBy === 'poin');
        document.getElementById('btn-sertifikat').classList.toggle('active', sortBy === 'sertifikat');

        loadRanking();
    }

    function loadRanking() {
        const table = document.getElementById('ranking-table');
        table.innerHTML = `
            <tr>
                <td colspan="5" style="padding: 32px; text-align: center; color: var(--text-muted);">
                    <div style="display: flex; flex-direction: column; align-items: center; gap: 8px;">
                        <span class="material-icons spinner" style="font-size: 2rem; color: var(--dash-accent);">sync</span>
                        Memuat data peringkat...
                    </div>
                </td>
            </tr>
        `;

        fetch(`/api/pelajar/ranking?sort_by=${currentSort}`)
            .then(res => res.json())
            .then(data => {
                if (data.status === 'success') {
                    renderRanking(data.data);
                } else {
                    table.innerHTML = `<tr><td colspan="5" style="padding: 24px; text-align: center; color: #ef4444;">Gagal memuat papan peringkat.</td></tr>`;
                }
            })
            .catch(err => {
                console.error(err);
                table.innerHTML = `<tr><td colspan="5" style="padding: 24px; text-align: center; color: #ef4444;">Terjadi kesalahan koneksi.</td></tr>`;
            });
    }

    function renderRanking(data) {
        const table = document.getElementById('ranking-table');
        if (data.length === 0) {
            table.innerHTML = `<tr><td colspan="5" style="padding: 32px; text-align: center; color: var(--text-muted);">Belum ada data pelajar.</td></tr>`;
            return;
        }

        table.innerHTML = data.map(p => {
            let rankClass = 'rank-other';
            let rankDisplay = `#${p.rank}`;

            if (p.rank === 1) {
                rankClass = 'rank-1';
                rankDisplay = '<span class="material-icons" style="font-size:18px;">emoji_events</span>';
            } else if (p.rank === 2) {
                rankClass = 'rank-2';
                rankDisplay = '<span class="material-icons" style="font-size:18px;">emoji_events</span>';
            } else if (p.rank === 3) {
                rankClass = 'rank-3';
                rankDisplay = '<span class="material-icons" style="font-size:18px;">emoji_events</span>';
            }

            const badgesHtml = p.badges && p.badges.length 
                ? p.badges.map(b => `<span title="${b.nama}" style="font-size: 1.2rem; margin-right: 4px;">🏅</span>`).join('')
                : '<span style="color:var(--text-muted);font-size:0.85rem;">-</span>';

            return `
                <tr style="border-bottom: 1px solid var(--dash-border); transition: background 0.15s;" onmouseover="this.style.background='#f8fafc'" onmouseout="this.style.background='transparent'">
                    <td style="padding: 16px 24px; font-weight: 700; white-space: nowrap;">
                        <span class="rank-badge ${rankClass}">${rankDisplay}</span>
                        <span style="margin-left: 8px; font-size: 0.95rem; color: #64748b;">#${p.rank}</span>
                    </td>
                    <td style="padding: 16px 24px; font-weight: 600;">
                        <a href="/profil/${p.id}" style="color: var(--dash-accent); text-decoration: none; display: inline-flex; align-items: center; gap: 6px;">
                            ${p.nama}
                            <span class="material-icons" style="font-size: 14px; opacity: 0; transition: opacity 0.2s;">open_in_new</span>
                        </a>
                    </td>
                    <td style="padding: 16px 24px; color: var(--text-muted); font-size: 0.95rem;">${p.universitas || '-'}</td>
                    <td style="padding: 16px 24px; font-weight: 700; color: #f59e0b; text-align: center; font-size: 1rem;">
                        <span class="material-icons icon-inline" style="font-size: 18px; vertical-align: text-bottom; margin-right: 2px;">auto_awesome</span>${p.total_poin}
                    </td>
                    <td style="padding: 16px 24px; font-weight: 700; color: #10b981; text-align: center; font-size: 1rem;">
                        <span class="material-icons icon-inline" style="font-size: 18px; vertical-align: text-bottom; margin-right: 2px;">workspace_premium</span>${p.certificates_count}
                    </td>
                </tr>
            `;
        }).join('');
    }
</script>
<script src="{{ asset('js/dashboard-global.js') }}"></script>
</body>
</html>

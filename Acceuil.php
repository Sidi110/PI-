<?php

$statusData = [
    'local' => 24,
    'international' => 15,
    'expiring' => 8,
    'online' => 32
];

$conventions = [
    [
        'id' => 1,
        'name' => 'CONV-2023-001',
        'partner' => 'Université Paris',
        'date' => '2023-06-15',
        'status' => 'success',
        'status_text' => 'Active'
    ],
    [
        'id' => 2,
        'name' => 'CONV-2023-002',
        'partner' => 'Tech Solutions',
        'date' => '2023-07-22',
        'status' => 'success',
        'status_text' => 'Active'
    ],
    [
        'id' => 3,
        'name' => 'CONV-2023-003',
        'partner' => 'Global Education',
        'date' => '2023-08-05',
        'status' => 'warning',
        'status_text' => 'En attente'
    ]
];

$notifications = [
    [
        'id' => 1,
        'title' => 'Nouvelle convention signée',
        'icon' => 'file-signature',
        'time' => 'Il y a 2 heures'
    ],
    [
        'id' => 2,
        'title' => 'Convention expirante',
        'icon' => 'exclamation-triangle',
        'time' => 'Il y a 1 jour'
    ]
];

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PI Dashboard</title>
    <link rel="stylesheet" href="Template.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <aside class="sidebar">
        <img src="logo-supnum2.png" class="logo" alt="Logo">
        <nav class="sidebar-nav">
            <a href="index.php" class="sidebar-link" title="Accueil">
                <i class="fas fa-home"></i> Accueil
            </a>
            <a href="users.php" class="sidebar-link" title="Utilisateurs">
                <i class="fas fa-users"></i> Utilisateurs
            </a>
            <a href="partners.php" class="sidebar-link" title="Partenaires">
                <i class="fas fa-handshake"></i> Partenaires
            </a>
            <a href="conventions.php" class="sidebar-link" title="Conventions">
                <i class="fas fa-file-contract"></i> Conventions
            </a>
            <a href="switched.php" class="sidebar-link" title="Commutées">
                <i class="fas fa-exchange-alt"></i> Commutées
            </a>
            <a href="settings.php" class="sidebar-link settings-link" title="Paramètres">
                <i class="fas fa-cog"></i> Paramètres
            </a>
        </nav>
    </aside>

    <main class="main-content">
        
        <div class="status-grid">
            <div class="status-card">
                <div class="status-icon local">
                    <i class="fas fa-building"></i>
                </div>
                <div class="status-value"><?= $statusData['local'] ?></div>
                <div class="status-label">Partenaires Locaux</div>
            </div>
            <div class="status-card">
                <div class="status-icon international">
                    <i class="fas fa-globe"></i>
                </div>
                <div class="status-value"><?= $statusData['international'] ?></div>
                <div class="status-label">Partenaires Internationaux</div>
            </div>
            <div class="status-card">
                <div class="status-icon expiring">
                    <i class="fas fa-clock"></i>
                </div>
                <div class="status-value"><?= $statusData['expiring'] ?></div>
                <div class="status-label">Expirent bientôt</div>
            </div>
            <div class="status-card">
                <div class="status-icon online">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="status-value"><?= $statusData['online'] ?></div>
                <div class="status-label">En ligne</div>
            </div>
        </div>

        
        <div class="dashboard-grid">
            <div class="table-card">
                <div class="card-header">
                    <h3 class="card-title">Dernières Conventions</h3>
                    <a href="conventions.php" class="view-all">Voir tout</a>
                </div>
                
                <div class="table-responsive">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Partenaire</th>
                                <th>Date</th>
                                <th>Statut</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($conventions as $convention): ?>
                            <tr>
                                <td><?= htmlspecialchars($convention['name']) ?></td>
                                <td><?= htmlspecialchars($convention['partner']) ?></td>
                                <td><?= date('d/m/Y', strtotime($convention['date'])) ?></td>
                                <td><span class="badge <?= $convention['status'] ?>"><?= $convention['status_text'] ?></span></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            
            <div class="notifications-card">
                <div class="card-header">
                    <h3 class="card-title">Notifications</h3>
                    <a href="notifications.php" class="view-all">Voir tout</a>
                </div>
                <div class="notifications-list">
                    <?php foreach ($notifications as $notification): ?>
                    <div class="notification-item">
                        <div class="notification-icon">
                            <i class="fas fa-<?= $notification['icon'] ?>"></i>
                        </div>
                        <div class="notification-text">
                            <div><?= htmlspecialchars($notification['title']) ?></div>
                            <div class="notification-time"><?= $notification['time'] ?></div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        
        <div class="stats-card">
            <div class="card-header">
                <h3 class="card-title">Statistiques des partenariats</h3>
            </div>
            <div class="chart-container">
                 <?php
                $chartData = [
                    'labels' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                    'data' => [12, 15, 18, 16, 20, 24]
                ];
                ?>
                <!-- src="generate_chart.php?<?= http_build_query($chartData) ?>" -->
                <img src="image.png" 
                     alt="Monthly Statistics Chart" style="width: 100%; height: 100%; object-fit: contain;">
            </div>
        </div>
    </main>
</body>
</html>
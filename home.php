<?php

require_once "statusChips.php";
require_once "navBarItems.php";

$statuses = ['approved', 'in-voyage', 'closed', 'pending', 'at-destination', 'in-transit', 'rejected'];
$sessionUser = 'Kaushalya P.V.N.';

function renderStatusChip($statusKey, $statusConfig) {
    if (!isset($statusConfig[$statusKey])) {
        return '';
    }

    $status = $statusConfig[$statusKey];
    return '<div class="chip ' . $status['class'] . ' ' . $statusKey . '">'
            . $status['svg'] .
            $status['label'] .
           '</div>';
};

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="./assets/css/globals.css" />
		<link rel="icon" href="./favicon.ico" type="image/x-icon">
		<title>Cway CSS Framework</title>
	</head>
	<body>
        <header>
            <div class="container">
                <div class="header-logo">
                    <img src="./logo.png" alt="Cway Logo">
                </div>
                <nav class="navbar">
                    <ul class="navbar-list">
                        <?php foreach ($navbarItems as $item):
							$isActive = ($_SERVER['SCRIPT_NAME'] === $item['url']) ? 'active' : '';
						?>
							<li class="navbar-item">
								<button type="button" class="navbar-btn <?= $isActive ?>" onclick="location.href='<?= $item['url'] ?>'">
									<span class="navbar-icon"><?= $item['icon'] ?></span>
									<span class="navbar-label"><?= $item['label'] ?></span>
								</button>
							</li>
                        <?php endforeach; ?>
                    </ul>
                </nav>
            </div>
        </header>

		<main>
            <div class="container">
                <div class="status-chips-container">
                    <?php foreach($statuses as $statusKey): ?>
                        <?= renderStatusChip($statusKey, $statusConfig) ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </main>
	</body>
</html>

<?php

include_once "statusChips.php";

$statuses = ['approved', 'in-voyage', 'closed', 'pending', 'at-destination', 'in-transit', 'rejected'];

function renderStatusChip($statusKey, $statusConfig) {
    if (!isset($statusConfig[$statusKey])) {
        return ''; // invalid status
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
		<title>Cway CSS Framework</title>
	</head>
	<body>
		<?php foreach($statuses as $statusKey): ?>
			<?= renderStatusChip($statusKey, $statusConfig) ?>
		<?php endforeach; ?>
	</body>
</html>

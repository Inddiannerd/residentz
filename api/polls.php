<?php
header('Content-Type: application/json');
require_once 'db_connection.php';

function getActivePolls() {
    global $conn;
    $sql = "SELECT p.*, 
            COUNT(DISTINCT pv.vote_id) as total_votes,
            GROUP_CONCAT(po.option_text) as options,
            GROUP_CONCAT(
                (SELECT COUNT(*) 
                 FROM poll_votes 
                 WHERE option_id = po.option_id)
            ) as vote_counts
            FROM polls p
            LEFT JOIN poll_options po ON p.poll_id = po.poll_id
            LEFT JOIN poll_votes pv ON p.poll_id = pv.poll_id
            WHERE p.status = 'active'
            AND p.end_date > NOW()
            GROUP BY p.poll_id";
    
    $result = $conn->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    echo json_encode(['success' => true, 'polls' => getActivePolls()]);
}
?>
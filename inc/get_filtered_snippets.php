<?php
header('Content-Type: application/json');
include 'connection.php';

// Get filter parameters
$search = isset($_GET['search']) ? trim($_GET['search']) : '';
$language = isset($_GET['language']) ? $_GET['language'] : [];
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$records_per_page = 5;

try {
    // Build the query
    $where_conditions = [];
    $params = [];

    // Add search condition if search term exists
    if ($search !== '') {
        // Split search terms and create conditions for each word
        $search_terms = explode(' ', $search);
        $search_conditions = [];
        
        foreach ($search_terms as $index => $term) {
            $search_param_title = ":search_title_" . $index;
            $search_param_code = ":search_code_" . $index;
            $search_conditions[] = "title LIKE " . $search_param_title . " OR code LIKE " . $search_param_code;
            $params[$search_param_title] = "%" . $term . "%";
            $params[$search_param_code] = "%" . $term . "%";
        }
        
        // Combine search conditions with OR
        $where_conditions[] = "(" . implode(" OR ", $search_conditions) . ")";
    }

    // Add language filter if languages are selected
    if (!empty($language)) {
        $placeholders = [];
        foreach ($language as $index => $lang) {
            $key = ":lang{$index}";
            $placeholders[] = $key;
            $params[$key] = $lang;
        }
        $where_conditions[] = "language IN (" . implode(',', $placeholders) . ")";
    }

    // Combine conditions
    $where_clause = !empty($where_conditions) ? 'WHERE ' . implode(' AND ', $where_conditions) : '';

    // Get total filtered records
    $count_sql = "SELECT COUNT(*) FROM snippets {$where_clause}";
    $count_stmt = $pdo->prepare($count_sql);
    $count_stmt->execute($params);
    $total_records = $count_stmt->fetchColumn();

    // Calculate pagination
    $total_pages = ceil($total_records / $records_per_page);
    $offset = ($page - 1) * $records_per_page;

    // Get filtered snippets
    $sql = "SELECT * FROM snippets {$where_clause} ORDER BY id DESC LIMIT :limit OFFSET :offset";
    $stmt = $pdo->prepare($sql);
    
    // Bind pagination parameters
    $stmt->bindValue(':limit', $records_per_page, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    
    // Bind other parameters
    foreach ($params as $key => $value) {
        $stmt->bindValue($key, $value);
    }
    
    $stmt->execute();
    $snippets = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Prepare response
    echo json_encode([
        'success' => true,
        'data' => [
            'snippets' => $snippets,
            'pagination' => [
                'current_page' => $page,
                'total_pages' => $total_pages,
                'total_records' => $total_records
            ]
        ]
    ]);

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'error' => 'Database error occurred'
    ]);
} 
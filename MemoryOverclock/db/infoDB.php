<?php
function loadEnv($path) {
    if (file_exists($path)) {
        $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            if (strpos($line, '#') === 0) continue;
            list($key, $value) = explode('=', $line, 2);
            putenv("$key=$value");
        }
    }
}

loadEnv(__DIR__ . '/../.env');

$host = getenv('DB_HOST');
$dbname = getenv('DB_NAME');
$username = getenv('DB_USER');
$password = getenv('DB_PASSWORD');

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    exit;
}

function getPosts($page = 1, $posts_per_page = 5) {
    global $pdo;

    // 총 게시물 수를 구하는 쿼리
    $total_posts_query = "SELECT COUNT(*) AS total FROM information";
    $result = $pdo->query($total_posts_query);

    if (!$result) {
        die("쿼리 실패: " . implode(' ', $pdo->errorInfo()));
    }

    $total_row = $result->fetch(PDO::FETCH_ASSOC);
    $total_posts = $total_row['total'];

    // 전체 페이지 수 계산
    $total_pages = ceil($total_posts / $posts_per_page);

    // 페이지 번호에 맞는 offset 계산
    $offset = ($page - 1) * $posts_per_page;

    // 게시물 데이터를 가져오는 쿼리
    $query = "SELECT * FROM information ORDER BY created_at DESC LIMIT $offset, $posts_per_page";
    $result = $pdo->query($query);

    // 쿼리 실행 실패 체크
    if (!$result) {
        die("쿼리 실패: " . implode(' ', $pdo->errorInfo()));
    }

    // 게시물 데이터를 가져옵니다
    $posts = $result->fetchAll(PDO::FETCH_ASSOC);

    // 게시물 데이터를 반환
    return $posts;
}

function countAllPosts() {
    global $pdo;

    // 총 게시물 수를 세는 쿼리
    $sql = "SELECT COUNT(*) FROM information";  // information 테이블에서 총 개수
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    return $stmt->fetchColumn();  // 반환된 개수를 반환
}

?>

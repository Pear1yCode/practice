<?php
// .env 파일을 읽어서 환경 변수로 설정
function loadEnv($path) {
    if (file_exists($path)) {
        $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            if (strpos($line, '#') === 0) continue; // 주석 무시
            list($key, $value) = explode('=', $line, 2);
            putenv("$key=$value"); // 환경 변수로 설정
        }
    }
}

// .env 파일 불러오기
loadEnv(__DIR__ . '/../.env');

// 환경 변수 사용
$host = getenv('DB_HOST');
$dbname = getenv('DB_NAME');
$username = getenv('DB_USER');
$password = getenv('DB_PASSWORD');

// 데이터베이스 연결
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  // 오류가 발생하면 예외를 던지도록 설정
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    exit;
}

function getPosts() {
    global $pdo;

    // 쿼리문 준비
    $sql = "SELECT * FROM memory_overclock ORDER BY created_at DESC";

    // 쿼리 실행
    $stmt = $pdo->query($sql);

    // 결과 반환
    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $posts ? $posts : [];  // 빈 배열 반환 처리
}

function addPost($title, $content, $cpu_manufacturer, $cpu_name, $memo) {
    global $pdo;  // PDO 객체를 가져옴

    try {
        // 비어있는 값 체크
        if (empty($title) || empty($content) || empty($cpu_manufacturer) || empty($cpu_name)) {
            throw new Exception("필수 항목이 비어 있습니다.");
        }

        // 쿼리문 준비
        $sql = "INSERT INTO memory_overclock (title, content, cpu_manufacturer, cpu_name, memo)
                VALUES (:title, :content, :cpu_manufacturer, :cpu_name, :memo)";

        $stmt = $pdo->prepare($sql);

        // 파라미터 바인딩
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':cpu_manufacturer', $cpu_manufacturer);
        $stmt->bindParam(':cpu_name', $cpu_name);
        $stmt->bindParam(':memo', $memo);

        // 쿼리 실행
        return $stmt->execute();

    } catch (Exception $e) {
        // 예외가 발생하면 false 반환하고 오류 메시지 출력
        echo "Error: " . $e->getMessage();
        return false;
    }
}

// 게시물 ID로 특정 게시물 조회
function getPostById($id) {
    global $pdo; // DB 연결 객체 사용

    // SQL 쿼리
    $stmt = $pdo->prepare("SELECT * FROM memory_overclock WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    // 결과 반환 (게시물 정보가 없으면 null 반환)
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// 게시물 삭제 함수
function deletePostById($post_id) {
    global $pdo;  // 데이터베이스 연결 객체

    $sql = "DELETE FROM memory_overclock WHERE id = :id";  // 테이블 이름 수정
    $stmt = $pdo->prepare($sql);  // $pdo를 사용하여 준비된 쿼리 실행
    $stmt->bindParam(':id', $post_id, PDO::PARAM_INT);  // 파라미터 바인딩

    return $stmt->execute();  // 쿼리 실행
}

?>

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

function addPost($title, $content, $cpu_manufacturer, $cpu_name, $system_memory_multiplier, $infinity_fabric_frequency, $uclk_div1_mode, $vcore_soc, $cpu_vddio_mem, $ddr_vdd_voltage, $ddr_vddq_voltage, $vddp, $cas_latency, $trcd, $trp, $tras, $trc, $twr, $tref, $trfc1, $trfc2, $trfcsb, $trtp, $trrd_l, $trrd_s, $tfaw, $twtrl, $twtrs, $trdrd_scl, $trdrdsc, $trdrdsd, $trdrddd, $twrwr_scl, $twrwrsc, $twrwrsd, $twrwrd, $twrrd, $trdwr, $gear_down_mode, $power_down_mode, $author, $memo) {
    global $pdo; // PDO 객체 사용

    // SQL 쿼리 준비
    $sql = "INSERT INTO memory_overclock (title, content, cpu_manufacturer, cpu_name, system_memory_multiplier, infinity_fabric_frequency, uclk_div1_mode, vcore_soc, cpu_vddio_mem, ddr_vdd_voltage, ddr_vddq_voltage, vddp, cas_latency, trcd, trp, tras, trc, twr, tref, trfc1, trfc2, trfcsb, trtp, trrd_l, trrd_s, tfaw, twtrl, twtrs, trdrd_scl, trdrdsc, trdrdsd, trdrddd, twrwr_scl, twrwrsc, twrwrsd, twrwrd, twrrd, trdwr, gear_down_mode, power_down_mode, author, memo) 
            VALUES (:title, :content, :cpu_manufacturer, :cpu_name, :system_memory_multiplier, :infinity_fabric_frequency, :uclk_div1_mode, :vcore_soc, :cpu_vddio_mem, :ddr_vdd_voltage, :ddr_vddq_voltage, :vddp, :cas_latency, :trcd, :trp, :tras, :trc, :twr, :tref, :trfc1, :trfc2, :trfcsb, :trtp, :trrd_l, :trrd_s, :tfaw, :twtrl, :twtrs, :trdrd_scl, :trdrdsc, :trdrdsd, :trdrddd, :twrwr_scl, :twrwrsc, :twrwrsd, :twrwrd, :twrrd, :trdwr, :gear_down_mode, :power_down_mode, :author, :memo)";

    // 준비된 쿼리 실행
    $stmt = $pdo->prepare($sql);

    // 파라미터 바인딩
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':content', $content);
    $stmt->bindParam(':cpu_manufacturer', $cpu_manufacturer);
    $stmt->bindParam(':cpu_name', $cpu_name);
    $stmt->bindParam(':system_memory_multiplier', $system_memory_multiplier);
    $stmt->bindParam(':infinity_fabric_frequency', $infinity_fabric_frequency);
    $stmt->bindParam(':uclk_div1_mode', $uclk_div1_mode);
    $stmt->bindParam(':vcore_soc', $vcore_soc);
    $stmt->bindParam(':cpu_vddio_mem', $cpu_vddio_mem);
    $stmt->bindParam(':ddr_vdd_voltage', $ddr_vdd_voltage);
    $stmt->bindParam(':ddr_vddq_voltage', $ddr_vddq_voltage);
    $stmt->bindParam(':vddp', $vddp);
    $stmt->bindParam(':cas_latency', $cas_latency);
    $stmt->bindParam(':trcd', $trcd);
    $stmt->bindParam(':trp', $trp);
    $stmt->bindParam(':tras', $tras);
    $stmt->bindParam(':trc', $trc);
    $stmt->bindParam(':twr', $twr);
    $stmt->bindParam(':tref', $tref);
    $stmt->bindParam(':trfc1', $trfc1);
    $stmt->bindParam(':trfc2', $trfc2);
    $stmt->bindParam(':trfcsb', $trfcsb);
    $stmt->bindParam(':trtp', $trtp);
    $stmt->bindParam(':trrd_l', $trrd_l);
    $stmt->bindParam(':trrd_s', $trrd_s);
    $stmt->bindParam(':tfaw', $tfaw);
    $stmt->bindParam(':twtrl', $twtrl);
    $stmt->bindParam(':twtrs', $twtrs);
    $stmt->bindParam(':trdrd_scl', $trdrd_scl);
    $stmt->bindParam(':trdrdsc', $trdrdsc);
    $stmt->bindParam(':trdrdsd', $trdrdsd);
    $stmt->bindParam(':trdrddd', $trdrddd);
    $stmt->bindParam(':twrwr_scl', $twrwr_scl);
    $stmt->bindParam(':twrwrsc', $twrwrsc);
    $stmt->bindParam(':twrwrsd', $twrwrsd);
    $stmt->bindParam(':twrwrd', $twrwrd);
    $stmt->bindParam(':twrrd', $twrrd);
    $stmt->bindParam(':trdwr', $trdwr);
    $stmt->bindParam(':gear_down_mode', $gear_down_mode);
    $stmt->bindParam(':power_down_mode', $power_down_mode);
    $stmt->bindParam(':author', $author);
    $stmt->bindParam(':memo', $memo);

    // 쿼리 실행
    try {
        if ($stmt->execute()) {
            return true;
        } else {
            throw new Exception('쿼리 실행 오류: ' . implode(' ', $stmt->errorInfo()));
        }
    } catch (Exception $e) {
        return '오류 발생: ' . $e->getMessage();  // 에러 메시지를 반환
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

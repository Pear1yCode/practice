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

function getPosts($page = 1, $posts_per_page = 5) {
    global $pdo;

    // 게시물의 총 개수를 구하는 쿼리 (테이블 이름을 memory_overclock으로 수정)
    $total_posts_query = "SELECT COUNT(*) AS total FROM memory_overclock";
    $total_result = $pdo->query($total_posts_query);
    $total_row = $total_result->fetch(PDO::FETCH_ASSOC); // PDO에서 fetch_assoc 대신 fetch 사용
    $total_posts = $total_row['total'];

    // 전체 페이지 수 계산
    $total_pages = ceil($total_posts / $posts_per_page);

    // 현재 페이지와 해당 페이지에 표시할 게시물의 범위 계산
    $offset = ($page - 1) * $posts_per_page;

    // 게시물 리스트 쿼리 (페이지네이션 적용, 테이블 이름을 memory_overclock으로 수정)
    $query = "SELECT * FROM memory_overclock ORDER BY created_at DESC LIMIT $offset, $posts_per_page";
    $result = $pdo->query($query);

    // 게시물 목록 반환
    return [
        'posts' => $result->fetchAll(PDO::FETCH_ASSOC), // fetch_all 대신 fetchAll 사용
        'total_pages' => $total_pages
    ];
}

function generatePaginationLinks($current_page, $total_pages) {
    $pagination = "";
    $pages_per_group = 5;  // 한 번에 보여줄 페이지 번호 수
    $start_page = floor(($current_page - 1) / $pages_per_group) * $pages_per_group + 1;
    $end_page = min($start_page + $pages_per_group - 1, $total_pages);

    // '처음' 버튼
    if ($current_page > 1) {
        $pagination .= "<a href='?page=1'>처음</a> ";
    } else {
        $pagination .= "<span class='disabled'>처음</span> ";
    }

    // '이전' 버튼
    if ($current_page > 1) {
        $pagination .= "<a href='?page=" . ($current_page - 1) . "'>◀</a> ";
    } else {
        $pagination .= "<span class='disabled'>◀</span> ";
    }

    // 페이지 번호들 (5개씩 그룹으로 출력)
    for ($i = $start_page; $i <= $end_page; $i++) {
        if ($i == $current_page) {
            $pagination .= "<strong class='current-page'>$i</strong> ";
        } else {
            $pagination .= "<a href='?page=$i'>$i</a> ";
        }
    }

    // '다음' 버튼
    if ($current_page < $total_pages) {
        $pagination .= "<a href='?page=" . ($current_page + 1) . "'>▶</a> ";
    } else {
        $pagination .= "<span class='disabled'>▶</span> ";
    }

    // '끝' 버튼
    if ($current_page < $total_pages) {
        $pagination .= "<a href='?page=$total_pages'>끝</a>";
    } else {
        $pagination .= "<span class='disabled'>끝</span>";
    }

    return $pagination;
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

function SearchPost($search) {
    global $pdo;

    // 기본적으로 검색어가 제공되지 않으면 빈 문자열로 초기화
    $search = '%' . $search . '%';

    // SQL 쿼리 작성: 하나의 검색어로 여러 필드를 검색
    $sql = "
        SELECT * FROM memory_overclock
        WHERE title LIKE :search
        OR content LIKE :search
        OR cpu_manufacturer LIKE :search
        OR cpu_name LIKE :search
        OR system_memory_multiplier LIKE :search
        OR infinity_fabric_frequency LIKE :search
        OR uclk_div1_mode LIKE :search
        OR vcore_soc LIKE :search
        OR cpu_vddio_mem LIKE :search
        OR ddr_vdd_voltage LIKE :search
        OR ddr_vddq_voltage LIKE :search
        OR vddp LIKE :search
        OR cas_latency LIKE :search
        OR trcd LIKE :search
        OR trp LIKE :search
        OR tras LIKE :search
        OR trc LIKE :search
        OR twr LIKE :search
        OR tref LIKE :search
        OR trfc1 LIKE :search
        OR trfc2 LIKE :search
        OR trfcsb LIKE :search
        OR trtp LIKE :search
        OR trrd_l LIKE :search
        OR trrd_s LIKE :search
        OR tfaw LIKE :search
        OR twtrl LIKE :search
        OR twtrs LIKE :search
        OR trdrd_scl LIKE :search
        OR trdrdsc LIKE :search
        OR trdrdsd LIKE :search
        OR trdrddd LIKE :search
        OR twrrd LIKE :search
        OR trdwr LIKE :search
        OR gear_down_mode LIKE :search
        OR power_down_mode LIKE :search
        OR author LIKE :search
        OR memo LIKE :search
    ";

    // DB 연결
    $stmt = $pdo->prepare($sql);

    // 파라미터 바인딩
    $stmt->bindParam(':search', $search);

    // 쿼리 실행
    $stmt->execute();

    // 결과 반환
    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $posts;
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

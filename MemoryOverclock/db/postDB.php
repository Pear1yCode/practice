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
    $total_posts_query = "SELECT COUNT(*) AS total FROM memory_overclock";
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

    // 전체 게시물 데이터를 가져오는 쿼리
    $query = "SELECT * FROM memory_overclock ORDER BY created_at DESC LIMIT $offset, $posts_per_page";
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

function addPost($title, $content, $cpu_manufacturer, $cpu_name, $system_memory_multiplier, $infinity_fabric_frequency, $uclk_div1_mode, $vcore_soc, $cpu_vddio_mem, $ddr_vdd_voltage, $ddr_vddq_voltage, $vddp, $cas_latency, $trcd, $trp, $tras, $trc, $twr, $tref, $trfc1, $trfc2, $trfcsb, $trtp, $trrd_l, $trrd_s, $tfaw, $twtrl, $twtrs, $trdrd_scl, $trdrdsc, $trdrdsd, $trdrddd, $twrwr_scl, $twrwrsc, $twrwrsd, $twrwrd, $twrrd, $trdwr, $gear_down_mode, $power_down_mode, $author, $memo) {
    global $pdo;

    $sql = "INSERT INTO memory_overclock (title, content, cpu_manufacturer, cpu_name, system_memory_multiplier, infinity_fabric_frequency, uclk_div1_mode, vcore_soc, cpu_vddio_mem, ddr_vdd_voltage, ddr_vddq_voltage, vddp, cas_latency, trcd, trp, tras, trc, twr, tref, trfc1, trfc2, trfcsb, trtp, trrd_l, trrd_s, tfaw, twtrl, twtrs, trdrd_scl, trdrdsc, trdrdsd, trdrddd, twrwr_scl, twrwrsc, twrwrsd, twrwrd, twrrd, trdwr, gear_down_mode, power_down_mode, author, memo) 
            VALUES (:title, :content, :cpu_manufacturer, :cpu_name, :system_memory_multiplier, :infinity_fabric_frequency, :uclk_div1_mode, :vcore_soc, :cpu_vddio_mem, :ddr_vdd_voltage, :ddr_vddq_voltage, :vddp, :cas_latency, :trcd, :trp, :tras, :trc, :twr, :tref, :trfc1, :trfc2, :trfcsb, :trtp, :trrd_l, :trrd_s, :tfaw, :twtrl, :twtrs, :trdrd_scl, :trdrdsc, :trdrdsd, :trdrddd, :twrwr_scl, :twrwrsc, :twrwrsd, :twrwrd, :twrrd, :trdwr, :gear_down_mode, :power_down_mode, :author, :memo)";

    $stmt = $pdo->prepare($sql);

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

    try {
        if ($stmt->execute()) {
            return true;
        } else {
            throw new Exception('쿼리 실행 오류: ' . implode(' ', $stmt->errorInfo()));
        }
    } catch (Exception $e) {
        return '오류 발생: ' . $e->getMessage();
    }
}

function countAllPosts() {
    global $pdo;

    $sql = "SELECT COUNT(*) FROM memory_overclock";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    return $stmt->fetchColumn();  // 전체 게시물 수를 반환
}


function SearchPost($search, $page = 1, $limit = 5) {
    global $pdo;

    $search = '%' . strtolower($search) . '%';
    $offset = ($page - 1) * $limit;

    $sql = "
        SELECT * FROM memory_overclock
        WHERE LOWER(title) LIKE :search
        OR LOWER(content) LIKE :search
        OR LOWER(cpu_manufacturer) LIKE :search
        OR LOWER(cpu_name) LIKE :search
        OR LOWER(system_memory_multiplier) LIKE :search
        OR LOWER(infinity_fabric_frequency) LIKE :search
        OR LOWER(uclk_div1_mode) LIKE :search
        OR LOWER(vcore_soc) LIKE :search
        OR LOWER(cpu_vddio_mem) LIKE :search
        OR LOWER(ddr_vdd_voltage) LIKE :search
        OR LOWER(ddr_vddq_voltage) LIKE :search
        OR LOWER(vddp) LIKE :search
        OR LOWER(cas_latency) LIKE :search
        OR LOWER(trcd) LIKE :search
        OR LOWER(trp) LIKE :search
        OR LOWER(tras) LIKE :search
        OR LOWER(trc) LIKE :search
        OR LOWER(twr) LIKE :search
        OR LOWER(tref) LIKE :search
        OR LOWER(trfc1) LIKE :search
        OR LOWER(trfc2) LIKE :search
        OR LOWER(trfcsb) LIKE :search
        OR LOWER(trtp) LIKE :search
        OR LOWER(trrd_l) LIKE :search
        OR LOWER(trrd_s) LIKE :search
        OR LOWER(tfaw) LIKE :search
        OR LOWER(twtrl) LIKE :search
        OR LOWER(twtrs) LIKE :search
        OR LOWER(trdrd_scl) LIKE :search
        OR LOWER(trdrdsc) LIKE :search
        OR LOWER(trdrdsd) LIKE :search
        OR LOWER(trdrddd) LIKE :search
        OR LOWER(twrrd) LIKE :search
        OR LOWER(trdwr) LIKE :search
        OR LOWER(gear_down_mode) LIKE :search
        OR LOWER(power_down_mode) LIKE :search
        OR LOWER(author) LIKE :search
        OR LOWER(memo) LIKE :search
        LIMIT :limit OFFSET :offset
    ";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':search', $search);
    $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
    $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function countSearchPosts($search) {
    global $pdo;

    $search = '%' . strtolower($search) . '%';

    $sql = "
        SELECT COUNT(*) FROM memory_overclock
        WHERE LOWER(title) LIKE :search
        OR LOWER(content) LIKE :search
        OR LOWER(cpu_manufacturer) LIKE :search
        OR LOWER(cpu_name) LIKE :search
        OR LOWER(system_memory_multiplier) LIKE :search
        OR LOWER(infinity_fabric_frequency) LIKE :search
        OR LOWER(uclk_div1_mode) LIKE :search
        OR LOWER(vcore_soc) LIKE :search
        OR LOWER(cpu_vddio_mem) LIKE :search
        OR LOWER(ddr_vdd_voltage) LIKE :search
        OR LOWER(ddr_vddq_voltage) LIKE :search
        OR LOWER(vddp) LIKE :search
        OR LOWER(cas_latency) LIKE :search
        OR LOWER(trcd) LIKE :search
        OR LOWER(trp) LIKE :search
        OR LOWER(tras) LIKE :search
        OR LOWER(trc) LIKE :search
        OR LOWER(twr) LIKE :search
        OR LOWER(tref) LIKE :search
        OR LOWER(trfc1) LIKE :search
        OR LOWER(trfc2) LIKE :search
        OR LOWER(trfcsb) LIKE :search
        OR LOWER(trtp) LIKE :search
        OR LOWER(trrd_l) LIKE :search
        OR LOWER(trrd_s) LIKE :search
        OR LOWER(tfaw) LIKE :search
        OR LOWER(twtrl) LIKE :search
        OR LOWER(twtrs) LIKE :search
        OR LOWER(trdrd_scl) LIKE :search
        OR LOWER(trdrdsc) LIKE :search
        OR LOWER(trdrdsd) LIKE :search
        OR LOWER(trdrddd) LIKE :search
        OR LOWER(twrrd) LIKE :search
        OR LOWER(trdwr) LIKE :search
        OR LOWER(gear_down_mode) LIKE :search
        OR LOWER(power_down_mode) LIKE :search
        OR LOWER(author) LIKE :search
        OR LOWER(memo) LIKE :search
    ";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':search', $search);
    $stmt->execute();

    return $stmt->fetchColumn();  // 검색된 게시물의 총 개수를 반환
}

function generatePagination($current_page, $total_pages, $search = '') {
    $pagination = "";
    $pages_per_group = 5;  // 한 번에 보여줄 페이지 번호 수
    $start_page = floor(($current_page - 1) / $pages_per_group) * $pages_per_group + 1;
    $end_page = min($start_page + $pages_per_group - 1, $total_pages);

    // '처음' 버튼
    if ($current_page > 1) {
        $pagination .= "<a href='?page=1&search=" . urlencode($search) . "'>처음</a> ";
    } else {
        $pagination .= "<span class='disabled'>처음</span> ";
    }

    // '이전' 버튼
    if ($current_page > 1) {
        $pagination .= "<a href='?page=" . ($current_page - 1) . "&search=" . urlencode($search) . "'>◀</a> ";
    } else {
        $pagination .= "<span class='disabled'>◀</span> ";
    }

    // 페이지 번호들 (5개씩 그룹으로 출력)
    for ($i = $start_page; $i <= $end_page; $i++) {
        if ($i == $current_page) {
            $pagination .= "<strong class='current-page'>$i</strong> ";
        } else {
            $pagination .= "<a href='?page=$i&search=" . urlencode($search) . "'>$i</a> ";
        }
    }

    // '다음' 버튼
    if ($current_page < $total_pages) {
        $pagination .= "<a href='?page=" . ($current_page + 1) . "&search=" . urlencode($search) . "'>▶</a> ";
    } else {
        $pagination .= "<span class='disabled'>▶</span> ";
    }

    // '끝' 버튼
    if ($current_page < $total_pages) {
        $pagination .= "<a href='?page=$total_pages&search=" . urlencode($search) . "'>끝</a>";
    } else {
        $pagination .= "<span class='disabled'>끝</span>";
    }

    return $pagination;
}

function getPostById($id) {
    global $pdo;

    $stmt = $pdo->prepare("SELECT * FROM memory_overclock WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function deletePostById($post_id) {
    global $pdo;

    $sql = "DELETE FROM memory_overclock WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $post_id, PDO::PARAM_INT);

    return $stmt->execute();
}

?>

<?php
// 데이터베이스 연결을 위한 파일
require_once '../db/postDB.php';

session_start();
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32)); // 랜덤한 CSRF 토큰 생성
}

// URL 파라미터에서 id 값을 받아옵니다.
if (isset($_GET['id'])) {
    $post_id = $_GET['id'];

    // id로 게시물 정보 가져오기
    $post = getPostById($post_id);  // getPostById는 특정 게시물을 가져오는 함수입니다.

    // 게시물이 존재하지 않으면 오류 메시지 표시
    if (!$post) {
        echo "게시물을 찾을 수 없습니다.";
        exit;
    }
} else {
    echo "잘못된 접근입니다.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/post_detail.css">
    <title>게시물 상세보기</title>
</head>
<body>

<h1><?php echo htmlspecialchars($post['title']); ?></h1>
<p><strong>작성자:</strong> <?php echo htmlspecialchars($post['author']); ?></p>
<p><strong>작성일:</strong> <?php echo $post['created_at']; ?></p>
<p><strong>내용:</strong></p>
<p><?php echo nl2br(htmlspecialchars($post['content'])); ?></p>

<h3>세부 정보</h3>
<ul>
    <li><strong>CPU 제조사:</strong> <?php echo htmlspecialchars($post['cpu_manufacturer']); ?></li>
    <li><strong>CPU 이름:</strong> <?php echo htmlspecialchars($post['cpu_name']); ?></li>
    <li><strong>램 클럭 (MHz):</strong> <?php echo htmlspecialchars($post['system_memory_multiplier']); ?></li>
    <li><strong>동기화 클럭 (MHz):</strong> <?php echo htmlspecialchars($post['infinity_fabric_frequency']); ?></li>
    <li><strong>SOC 전압 (V):</strong> <?php echo htmlspecialchars($post['vcore_soc']); ?></li>
    <li><strong>CPU VDDIO MEM 전압 (V):</strong> <?php echo htmlspecialchars($post['cpu_vddio_mem']); ?></li>
    <li><strong>DDR VDD 전압 (V):</strong> <?php echo htmlspecialchars($post['ddr_vdd_voltage']); ?></li>
    <li><strong>DDR VDDQ 전압 (V):</strong> <?php echo htmlspecialchars($post['ddr_vddq_voltage']); ?></li>
    <li><strong>VDDP 전압 (V):</strong> <?php echo htmlspecialchars($post['vddp']); ?></li>
    <li><strong>CAS Latency:</strong> <?php echo htmlspecialchars($post['cas_latency']); ?></li>
    <li><strong>tRCD:</strong> <?php echo htmlspecialchars($post['trcd']); ?></li>
    <li><strong>tRP:</strong> <?php echo htmlspecialchars($post['trp']); ?></li>
    <li><strong>tRAS:</strong> <?php echo htmlspecialchars($post['tras']); ?></li>
    <li><strong>tRC:</strong> <?php echo htmlspecialchars($post['trc']); ?></li>
    <li><strong>tWR:</strong> <?php echo htmlspecialchars($post['twr']); ?></li>
    <li><strong>tREF:</strong> <?php echo htmlspecialchars($post['tref']); ?></li>
    <li><strong>tRFC1:</strong> <?php echo htmlspecialchars($post['trfc1']); ?></li>
    <li><strong>tRFC2:</strong> <?php echo htmlspecialchars($post['trfc2']); ?></li>
    <li><strong>tRFCSb:</strong> <?php echo htmlspecialchars($post['trfcsb']); ?></li>
    <li><strong>tRTP:</strong> <?php echo htmlspecialchars($post['trtp']); ?></li>
    <li><strong>tRRD_L:</strong> <?php echo htmlspecialchars($post['trrd_l']); ?></li>
    <li><strong>tRRD_S:</strong> <?php echo htmlspecialchars($post['trrd_s']); ?></li>
    <li><strong>tFAW:</strong> <?php echo htmlspecialchars($post['tfaw']); ?></li>
    <li><strong>tWTRL:</strong> <?php echo htmlspecialchars($post['twtrl']); ?></li>
    <li><strong>tWTRS:</strong> <?php echo htmlspecialchars($post['twtrs']); ?></li>
    <li><strong>tRDRD_SCL:</strong> <?php echo htmlspecialchars($post['trdrd_scl']); ?></li>
    <li><strong>tRDRDSC:</strong> <?php echo htmlspecialchars($post['trdrdsc']); ?></li>
    <li><strong>tRDRDSD:</strong> <?php echo htmlspecialchars($post['trdrdsd']); ?></li>
    <li><strong>tRDRDDD:</strong> <?php echo htmlspecialchars($post['trdrddd']); ?></li>
    <li><strong>tWRWR_SCL:</strong> <?php echo htmlspecialchars($post['twrwr_scl']); ?></li>
    <li><strong>tWRWRSC:</strong> <?php echo htmlspecialchars($post['twrwrsc']); ?></li>
    <li><strong>tWRWRSD:</strong> <?php echo htmlspecialchars($post['twrwrsd']); ?></li>
    <li><strong>tWRWRDD:</strong> <?php echo htmlspecialchars($post['twrwrd']); ?></li>
    <li><strong>tWRRD:</strong> <?php echo htmlspecialchars($post['twrrd']); ?></li>
    <li><strong>tRDWR:</strong> <?php echo htmlspecialchars($post['trdwr']); ?></li>
    <li><strong>Gear Down Mode:</strong>
        <?php
        switch($post['gear_down_mode']) {
            case 'auto':
                echo 'AUTO';
                break;
            case 'enabled':
                echo 'Enabled';
                break;
            case 'disabled':
                echo 'Disabled';
                break;
            default:
                echo 'AUTO';  // 값을 찾을 수 없는 경우 "No"
        }
        ?>
    </li>

    <li><strong>Power Down Mode:</strong>
        <?php
        // power_down_mode 값에 맞춰 출력
        switch($post['power_down_mode']) {
            case 'auto':
                echo 'AUTO';
                break;
            case 'enabled':
                echo 'Enabled';
                break;
            case 'disabled':
                echo 'Disabled';
                break;
            default:
                echo 'AUTO';  // 값을 찾을 수 없는 경우 "No"
        }
        ?>
    </li>

</ul>

<p><strong>비고:</strong> <?php echo nl2br(htmlspecialchars($post['memo'])); ?></p>

<!-- 삭제 버튼 추가 -->
<form action="delete_post.php" method="POST" onsubmit="return confirm('정말 삭제하시겠습니까?');">
    <input type="hidden" name="id" value="<?php echo $post['id']; ?>">
    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>"> <!-- CSRF 토큰 추가 -->
    <button type="submit">삭제</button>
</form>


<a href="post.php">목록으로 돌아가기</a>

</body>
</html>

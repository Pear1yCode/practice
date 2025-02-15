<?php
// postDB.php 파일을 불러옵니다.
require_once '../db/postDB.php';

// 게시물 목록을 가져옵니다.
$posts = getPosts();  // getPosts() 함수 호출하여 게시물 목록을 가져옴

// 새 게시물이 제출되었을 때 처리하는 부분
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['title']) && isset($_POST['content'])) {
    $title = $_POST['title'];  // 사용자가 입력한 제목
    $content = $_POST['content'];  // 사용자가 입력한 내용
    $cpu_manufacturer = !empty($_POST['cpu_manufacturer']) ? $_POST['cpu_manufacturer'] : 'auto';  // CPU 제조사
    $cpu_name = !empty($_POST['cpu_name']) ? $_POST['cpu_name'] : 'auto';  // CPU 이름
    $memo = !empty($_POST['memo']) ? $_POST['memo'] : 'auto';  // 비고

    // 추가된 필드들
    $system_memory_multiplier = !empty($_POST['system_memory_multiplier']) ? $_POST['system_memory_multiplier'] : 'auto';
    $infinity_fabric_frequency = !empty($_POST['infinity_fabric_frequency']) ? $_POST['infinity_fabric_frequency'] : 'auto';
    $vcore_soc = !empty($_POST['vcore_soc']) ? $_POST['vcore_soc'] : 'auto';
    $cas_latency = !empty($_POST['cas_latency']) ? $_POST['cas_latency'] : 'auto';
    $trcd = !empty($_POST['trcd']) ? $_POST['trcd'] : 'auto';
    $trp = !empty($_POST['trp']) ? $_POST['trp'] : 'auto';
    $tras = !empty($_POST['tras']) ? $_POST['tras'] : 'auto';
    $trc = !empty($_POST['trc']) ? $_POST['trc'] : 'auto';
    $tw = !empty($_POST['tw']) ? $_POST['tw'] : 'auto';
    $tref = !empty($_POST['tref']) ? $_POST['tref'] : 'auto';
    $trfc1 = !empty($_POST['trfc1']) ? $_POST['trfc1'] : 'auto';
    $trfc2 = !empty($_POST['trfc2']) ? $_POST['trfc2'] : 'auto';
    $trfcsb = !empty($_POST['trfcsb']) ? $_POST['trfcsb'] : 'auto';
    $trtp = !empty($_POST['trtp']) ? $_POST['trtp'] : 'auto';
    $trrd_l = !empty($_POST['trrd_l']) ? $_POST['trrd_l'] : 'auto';
    $trrd_s = !empty($_POST['trrd_s']) ? $_POST['trrd_s'] : 'auto';
    $tfaw = !empty($_POST['tfaw']) ? $_POST['tfaw'] : 'auto';
    $twtrl = !empty($_POST['twtrl']) ? $_POST['twtrl'] : 'auto';
    $twtrs = !empty($_POST['twtrs']) ? $_POST['twtrs'] : 'auto';
    $trdrd_scl = !empty($_POST['trdrd_scl']) ? $_POST['trdrd_scl'] : 'auto';
    $trdrdsc = !empty($_POST['trdrdsc']) ? $_POST['trdrdsc'] : 'auto';
    $trdrdsd = !empty($_POST['trdrdsd']) ? $_POST['trdrdsd'] : 'auto';
    $trdrddd = !empty($_POST['trdrddd']) ? $_POST['trdrddd'] : 'auto';
    $twrwr_scl = !empty($_POST['twrwr_scl']) ? $_POST['twrwr_scl'] : 'auto';
    $twrwrsc = !empty($_POST['twrwrsc']) ? $_POST['twrwrsc'] : 'auto';
    $twrwrsd = !empty($_POST['twrwrsd']) ? $_POST['twrwrsd'] : 'auto';
    $twrwrd = !empty($_POST['twrwrd']) ? $_POST['twrwrd'] : 'auto';
    $twrrd = !empty($_POST['twrrd']) ? $_POST['twrrd'] : 'auto';
    $trdwr = !empty($_POST['trdwr']) ? $_POST['trdwr'] : 'auto';
    $gear_down_mode = isset($_POST['gear_down_mode']) ? $_POST['gear_down_mode'] : 'auto';  // Gear Down Mode
    $power_down_mode = isset($_POST['power_down_mode']) ? $_POST['power_down_mode'] : 'auto';  // Power Down Mode

    // 게시물 추가 함수 호출
    $result = addPost($title, $content, $cpu_manufacturer, $cpu_name, $memo,
        $system_memory_multiplier, $infinity_fabric_frequency,
        $vcore_soc, $cas_latency, $trcd, $trp, $tras, $trc, $tw, $tref,
        $trfc1, $trfc2, $trfcsb, $trtp, $trrd_l, $trrd_s, $tfaw, $twtrl,
        $twtrs, $trdrd_scl, $trdrdsc, $trdrdsd, $trdrddd, $twrwr_scl,
        $twrwrsc, $twrwrsd, $twrwrd, $twrrd, $trdwr, $gear_down_mode,
        $power_down_mode);
    if ($result) {
        echo "<script>alert('게시물이 성공적으로 추가되었습니다.'); window.location.href='post.php';</script>";
    } else {
        echo "게시물 추가에 실패했습니다.";
    }
}
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/post.css">
    <title>게시물</title>
    <script>
        function openPasswordPrompt() {
            // 비밀번호를 묻는 팝업 창
            var password = prompt("비밀번호를 입력하세요:");

            // 비밀번호가 맞으면 게시물 작성 폼을 보여주기
            if (password === "0000") {
                document.getElementById("postForm").style.display = "block"; // 게시물 작성 폼 보이기
            } else {
                alert("잘못된 비밀번호입니다.");
            }
        }
    </script>
</head>
<body>

<h1>게시물 목록</h1>
<ul>
    <?php if (!empty($posts)): ?>
        <?php foreach ($posts as $post): ?>
            <li>
                <a href="post_detail.php?id=<?php echo $post['id']; ?>">
                    <strong><?php echo htmlspecialchars($post['title']); ?></strong>
                </a><br>
                <?php echo nl2br(htmlspecialchars($post['content'])); ?><br>
                <small><?php echo $post['created_at']; ?></small>
            </li>
        <?php endforeach; ?>
    <?php else: ?>
        <li>게시물이 없습니다.</li>
    <?php endif; ?>
</ul>


<!-- 비밀번호 입력 팝업을 통해 게시물 작성 폼 보이기 -->
<button onclick="openPasswordPrompt()">게시물 작성</button>

<!-- 게시물 작성 폼 (초기에는 숨겨져 있음) -->
<div id="postForm" style="display:none;">
    <h2>새 게시물 작성</h2>
    <form method="POST" action="post.php">
        <label for="title">제목:</label>
        <input type="text" id="title" name="title" required><br>

        <label for="content">내용:</label>
        <textarea id="content" name="content" required></textarea><br>

        <label for="cpu_manufacturer">CPU 제조사:</label>
        <input type="text" id="cpu_manufacturer" name="cpu_manufacturer"><br>

        <label for="cpu_name">CPU 이름:</label>
        <input type="text" id="cpu_name" name="cpu_name"><br>

        <label for="system_memory_multiplier">램 클럭 (MHz):</label>
        <input type="text" id="system_memory_multiplier" name="system_memory_multiplier"><br>

        <label for="infinity_fabric_frequency">동기화 클럭 (MHz):</label>
        <input type="text" id="infinity_fabric_frequency" name="infinity_fabric_frequency"><br>

        <label for="vcore_soc">SOC 전압 (V):</label>
        <input type="text" id="vcore_soc" name="vcore_soc"><br>

        <label for="cas_latency">CAS Latency:</label>
        <input type="text" id="cas_latency" name="cas_latency"><br>

        <label for="trcd">tRCD:</label>
        <input type="text" id="trcd" name="trcd"><br>

        <label for="trp">tRP:</label>
        <input type="text" id="trp" name="trp"><br>

        <label for="tras">tRAS:</label>
        <input type="text" id="tras" name="tras"><br>

        <label for="trc">tRC:</label>
        <input type="text" id="trc" name="trc"><br>

        <label for="tw">tW:</label>
        <input type="text" id="tw" name="tw"><br>

        <label for="tref">tREF:</label>
        <input type="text" id="tref" name="tref"><br>

        <label for="trfc1">tRFC1:</label>
        <input type="text" id="trfc1" name="trfc1"><br>

        <label for="trfc2">tRFC2:</label>
        <input type="text" id="trfc2" name="trfc2"><br>

        <label for="trfcsb">tRFCSb:</label>
        <input type="text" id="trfcsb" name="trfcsb"><br>

        <label for="trtp">tRTP:</label>
        <input type="text" id="trtp" name="trtp"><br>

        <label for="trrd_l">tRRD_L:</label>
        <input type="text" id="trrd_l" name="trrd_l"><br>

        <label for="trrd_s">tRRD_S:</label>
        <input type="text" id="trrd_s" name="trrd_s"><br>

        <label for="tfaw">tFAW:</label>
        <input type="text" id="tfaw" name="tfaw"><br>

        <label for="twtrl">tWTRL:</label>
        <input type="text" id="twtrl" name="twtrl"><br>

        <label for="twtrs">tWTRS:</label>
        <input type="text" id="twtrs" name="twtrs"><br>

        <label for="trdrd_scl">tRDRD_SCL:</label>
        <input type="text" id="trdrd_scl" name="trdrd_scl"><br>

        <label for="trdrdsc">tRDRDSC:</label>
        <input type="text" id="trdrdsc" name="trdrdsc"><br>

        <label for="trdrdsd">tRDRDSD:</label>
        <input type="text" id="trdrdsd" name="trdrdsd"><br>

        <label for="trdrddd">tRDRDDD:</label>
        <input type="text" id="trdrddd" name="trdrddd"><br>

        <label for="twrwr_scl">tWRWR_SCL:</label>
        <input type="text" id="twrwr_scl" name="twrwr_scl"><br>

        <label for="twrwrsc">tWRWRSC:</label>
        <input type="text" id="twrwrsc" name="twrwrsc"><br>

        <label for="twrwrsd">tWRWRSD:</label>
        <input type="text" id="twrwrsd" name="twrwrsd"><br>

        <label for="twrwrd">tWRWRDD:</label>
        <input type="text" id="twrwrd" name="twrwrd"><br>

        <label for="twrrd">tWRRD:</label>
        <input type="text" id="twrrd" name="twrrd"><br>

        <label for="trdwr">tRDWR:</label>
        <input type="text" id="trdwr" name="trdwr"><br>

        <label for="gear_down_mode">Gear Down Mode:</label>
        <select id="gear_down_mode" name="gear_down_mode">
            <option value="1">Yes</option>
            <option value="0">No</option>
        </select><br>

        <label for="power_down_mode">Power Down Mode:</label>
        <select id="power_down_mode" name="power_down_mode">
            <option value="1">Yes</option>
            <option value="0">No</option>
        </select><br>

        <label for="memo">비고:</label>
        <textarea id="memo" name="memo"></textarea><br>

        <button type="submit">게시물 추가</button>
    </form>
</div>

</body>
</html>

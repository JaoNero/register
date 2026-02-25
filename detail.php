<html>

<head>
    <title> Show register Information 65</title>
</head>

<body>

    <?php
    if (isset($_GET["StudenID"])) {
        $strStudenID = $_GET["StunedID"];
    }
    echo $strStudenID;

    require "connect.php";
    $sql = "SELECT re.Term, re.Year,red.CourseID,c.name,c.credit,red.Grade from program p INNER JOIN course c on p.ProgramID = c.ProgramID INNER JOIN register_deteil red on c.CourseID = red.CourseID INNER JOIN register re on red.RegisterID = re.RegisterID INNER JOIN studen s on re.StudenID = s.StudenID;";
    $params = array($strStudenID);
    $stmt = $conn->prepare($sql);
    $stmt->execute($params);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    ?>
    <table width="300" border="1">
        <tr>
            <th width="325">เทอม</th>
            <td width="240"><?php echo $result["Term"]; ?></td>
        </tr>
        <tr>
            <th width="130">ปี</th>
            <td><?php echo $result["Year"]; ?></td>
        </tr>
        <tr>
            <th width="130">คอส</th>
            <td><?php echo $result["CourseID"]; ?></td>
        </tr>

        <tr>
            <th width="130">ชื่อ</th>
            <td><?php echo $result["name"]; ?></td>
        </tr>

        <tr>
            <th width="130">หน่วยกิต</th>
            <td><?php echo $result["credit"]; ?></td>
        </tr>
        <tr>
            <th width="130">เกรด</th>
            <td><?php echo $result["grade"]; ?></td>
        </tr>
    </table>
    <?php
    $conn = null;
    ?>
</body>

</html>
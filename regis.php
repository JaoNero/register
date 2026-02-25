<!DOCTYPE html>
<html lang="en">

<head>
    <title>Show register Information</title>
</head>

<body>
    <?php
    require 'connect.php';
    $sql = "SELECT re.Term, re.Year,red.CourseID,c.name,c.credit,red.Grade from program p INNER JOIN course c on p.ProgramID = c.ProgramID INNER JOIN register_deteil red on c.CourseID = red.CourseID INNER JOIN register re on red.RegisterID = re.RegisterID INNER JOIN studen s on re.StudenID = s.StudenID;";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $conn = null;
    ?>
    <table width="800" border="1">
        <tr>
            <th width="150">
                <div align="center">เทอม </div>
            </th>
            <th width="150">
                <div align="center">ปี </div>
            </th>
            <th width="150">
                <div align="center">คอส </div>
            </th>
            <th width="150">
                <div align="center">ชื่อ </div>
            </th>
            <th width="150">
                <div align="center">หน่วยกิต </div>
            </th>
            <th width="150">
                <div align="center">เกรด</div>
            </th>
        </tr>

        <?php
        while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        ?>

            <tr>

                <td>
                    <?php echo $result["Term"]; ?>
                </td>

                <td>
                    <?php echo  $result["Year"]; ?>
                </td>

                <td><?php echo  $result["CourseID"]; ?></div>
                </td>
                <td><?php echo  $result["name"]; ?></td>
                <td><?php echo  $result["credit"]; ?></div>
                </td>
                <td><?php echo $result["Grade"]; ?></td>

            </tr>

        <?php
        }
        ?>

    </table>

</body>

</html>
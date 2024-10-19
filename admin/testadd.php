<?php
session_start();
error_reporting(E_ALL); // Use E_ALL for better debugging
if (!isset($_SESSION['alogin'])) {
    echo "<br><h2>You are not Logged On Please Login to Access this Page</h2>";
    echo "<a href=index.php><h3 align=center>Click Here for Login</h3></a>";
    exit();
}
?>
<link href="../quiz.css" rel="stylesheet" type="text/css">
<?php
require("../database.php");
include("header.php");

echo "<br><h2><div class='head1'>Add Test</div></h2>";

if (isset($_POST['submit']) && $_POST['submit'] === 'Add') {
    extract($_POST);
    
    // Using prepared statements to prevent SQL injection
    $stmt = $cn->prepare("INSERT INTO mst_test (sub_id, test_name, total_que) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $subid, $testname, $totque); // Assuming total_que is an integer
    
    if ($stmt->execute()) {
        echo "<p align=center>Test <b>\"$testname\"</b> Added Successfully.</p>";
    } else {
        echo "<p align=center>Error: " . $stmt->error . "</p>";
    }
    
    $stmt->close(); // Close the prepared statement
    unset($_POST);
}
?>
<script language="JavaScript">
function check() {
    var mt = document.form1.testname.value;
    if (mt.length < 1) {
        alert("Please Enter Test Name");
        document.form1.testname.focus();
        return false;
    }
    var tt = document.form1.totque.value;
    if (tt.length < 1) {
        alert("Please Enter Total Questions");
        document.form1.totque.focus();
        return false;
    }
    return true;
}
</script>

<form name="form1" method="post" onSubmit="return check();">
    <table width="58%" border="0" align="center">
        <tr>
            <td width="49%" height="32">
                <div align="left"><strong>Enter Subject ID</strong></div>
            </td>
            <td width="3%" height="5"></td>
            <td width="48%" height="32">
                <select name="subid">
                    <?php
                    $rs = $cn->query("SELECT * FROM mst_subject ORDER BY sub_name");
                    while ($row = $rs->fetch_array(MYSQLI_ASSOC)) {
                        echo "<option value='{$row['id']}'>{$row['sub_name']}</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td height="26">
                <div align="left"><strong>Enter Test Name</strong></div>
            </td>
            <td>&nbsp;</td>
            <td><input name="testname" type="text" id="testname"></td>
        </tr>
        <tr>
            <td height="26">
                <div align="left"><strong>Enter Total Questions</strong></div>
            </td>
            <td>&nbsp;</td>
            <td><input name="totque" type="text" id="totque"></td>
        </tr>
        <tr>
            <td height="26"></td>
            <td>&nbsp;</td>
            <td><input type="submit" name="submit" value="Add"></td>
        </tr>
    </table>
</form>
<p>&nbsp;</p>

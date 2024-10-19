<?php
session_start();
require("../database.php");
include("header.php");
error_reporting(1);
?>
<link href="../quiz.css" rel="stylesheet" type="text/css">

<?php
// Check if the user is logged in
if (!isset($_SESSION['alogin'])) {
    echo "<br><h2><div class='head1'>You are not Logged On. Please Login to Access this Page</div></h2>";
    echo "<a href='index.php'><h3 align='center'>Click Here for Login</h3></a>";
    exit();
}

echo "<BR><h3 class='head1'>Add Question </h3>";

// Handle form submission
if (isset($_POST['submit']) && $_POST['submit'] === 'Add' && !empty($_POST['testid'])) {
    extract($_POST);

    // Prepare and bind
    $stmt = $cn->prepare("INSERT INTO `mst_question`(test_id, que_desc, ans1, ans2, ans3, ans4, true_ans) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("issssss", $testid, $addque, $ans1, $ans2, $ans3, $ans4, $anstrue);

    // Execute the statement
    if ($stmt->execute()) {
        echo "<p align='center'>Question Added Successfully.</p>";
        unset($_POST); // Clear form data
    } else {
        echo "<p align='center'>Error: " . $stmt->error . "</p>";
    }

    $stmt->close(); // Close the statement
}
?>

<script language="JavaScript">
function check() {
    let mt = document.form1.addque.value;
    if (mt.length < 1) {
        alert("Please Enter Question");
        document.form1.addque.focus();
        return false;
    }
    
    let answers = [document.form1.ans1.value, document.form1.ans2.value, document.form1.ans3.value, document.form1.ans4.value];
    for (let i = 0; i < answers.length; i++) {
        if (answers[i].length < 1) {
            alert("Please Enter Answer" + (i + 1));
            document.form1['ans' + (i + 1)].focus();
            return false;
        }
    }
    
    let at = document.form1.anstrue.value;
    if (at.length < 1) {
        alert("Please Enter True Answer");
        document.form1.anstrue.focus();
        return false;
    }
    
    return true;
}
</script>

<div style="margin:auto;width:90%;height:500px;box-shadow:2px 1px 2px 2px #CCCCCC;text-align:left">
<form name="form1" method="post" onSubmit="return check();">
    <table width="80%" border="1" align="center">
        <tr>
            <td width="24%" height="32"><div align="left"><strong>Select Test Name </strong></div></td>
            <td width="1%" height="5"></td>
            <td width="75%" height="32">
                <select name="testid" id="testid">
                    <?php
                    $rs = mysqli_query($cn, "SELECT * FROM mst_test ORDER BY test_name");
                    while ($row = mysqli_fetch_array($rs)) {
                        echo "<option value='{$row[0]}'>{$row[2]}</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td height="26"><div align="left"><strong>Enter Question </strong></div></td>
            <td>&nbsp;</td>
            <td><textarea name="addque" cols="60" rows="2" id="addque"></textarea></td>
        </tr>
        <tr>
            <td height="26"><div align="left"><strong>Enter Answer1 </strong></div></td>
            <td>&nbsp;</td>
            <td><input name="ans1" type="text" id="ans1" size="85" maxlength="85"></td>
        </tr>
        <tr>
            <td height="26"><strong>Enter Answer2 </strong></td>
            <td>&nbsp;</td>
            <td><input name="ans2" type="text" id="ans2" size="85" maxlength="85"></td>
        </tr>
        <tr>
            <td height="26"><strong>Enter Answer3 </strong></td>
            <td>&nbsp;</td>
            <td><input name="ans3" type="text" id="ans3" size="85" maxlength="85"></td>
        </tr>
        <tr>
            <td height="26"><strong>Enter Answer4</strong></td>
            <td>&nbsp;</td>
            <td><input name="ans4" type="text" id="ans4" size="85" maxlength="85"></td>
        </tr>
        <tr>
            <td height="26"><strong>Enter True Answer </strong></td>
            <td>&nbsp;</td>
            <td><input name="anstrue" type="text" id="anstrue" size="50" maxlength="50"></td>
        </tr>
        <tr>
            <td height="26"></td>
            <td>&nbsp;</td>
            <td><input type="submit" name="submit" value="Add"></td>
        </tr>
    </table>
</form>
<p>&nbsp;</p>
</div>

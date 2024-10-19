<?php
session_start();
require("../database.php");
include("header.php");
error_reporting(1);
?>
<link href="../quiz.css" rel="stylesheet" type="text/css">

<?php

extract($_POST);

echo "<BR>";
if (!isset($_SESSION['alogin'])) {
  echo "<br><h2><div  class=head1>You are not Logged On. Please Login to Access this Page</div></h2>";
  echo "<a href='index.php'><h3 align='center'>Click Here for Login</h3></a>";
  exit();
}
echo "<BR><h3 class='head1'>Subject Add</h3>";

echo "<table width='100%'>";
echo "<tr><td align='center'></td></tr></table>";

if (isset($submit) && $submit == 'Add' && strlen($subname) > 0) {
  // Check if the subject already exists
  $stmt = $cn->prepare("SELECT * FROM mst_subject WHERE sub_name=?");
  $stmt->bind_param("s", $subname);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    echo "<br><br><br><div class='head1'>Subject Already Exists</div>";
    exit;
  } else {
    // Insert the new subject
    $stmt = $cn->prepare("INSERT INTO mst_subject (sub_name) VALUES (?)");
    $stmt->bind_param("s", $subname);
    if ($stmt->execute()) {
      echo "<p align='center'>Subject <b>\"$subname\"</b> Added Successfully.</p>";
    } else {
      echo "<p align='center'>Failed to Add Subject. Please Try Again.</p>";
    }
  }
  // Clear form data
  $submit = "";
}
?>
<SCRIPT LANGUAGE="JavaScript">
  function check() {
    mt = document.form1.subname.value;
    if (mt.length < 1) {
      alert("Please Enter Subject Name");
      document.form1.subname.focus();
      return false;
    }
    return true;
  }
</SCRIPT>

<div style="margin:auto;width:90%;height:500px;box-shadow:2px 1px 2px 2px #CCCCCC;text-align:left">
  <title>Add Subject</title>
  <form name="form1" method="post" onSubmit="return check();">
    <table width="41%" border="0" align="center">
      <tr>
        <td width="45%" height="32">
          <div align="center"><strong>Enter Subject Name </strong></div>
        </td>
        <td width="2%" height="5">&nbsp;</td>
        <td width="53%" height="32">
          <input name="subname" placeholder="Enter subject name" type="text" id="subname">
        </td>
      </tr>
      <tr>
        <td height="26"></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
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

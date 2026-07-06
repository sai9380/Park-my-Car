<?php
session_start();
session_destroy();
?>
<script>
    alert ("Logged out successfully");
    window.location.href = "adminindex.html";
</script>

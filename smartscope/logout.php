<?php
session_start();
session_destroy();
?>
<script>
    localStorage.removeItem('username');
    window.location.href = 'index.php';
</script> 
<script>
function confirmDelete(wp_id) {
    if (confirm("Are you sure you want to delete this record?")) {
        location.href = 'waghur-price-delete.php?wp_id=' + wp_id;
    }
}
</script>

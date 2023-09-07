<script>
function confirmDelete(pe_id) {
    if (confirm("Are you sure you want to delete this record?")) {
        location.href = 'price-escalation-delete.php?pe_id=' + pe_id;
    }
}
</script>

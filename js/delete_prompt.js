function deleteItem(type, itemId) {
    if (confirm("Are you sure you want to delete this " + type + "?")) {
        window.location.href = "backend/delete.php?type=" + type + "&id=" + itemId;
    }
}

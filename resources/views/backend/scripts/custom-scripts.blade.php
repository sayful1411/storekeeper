<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Function to update data-sidebar based on data-bs-theme
        function updateSidebar() {
            var theme = document.documentElement.getAttribute("data-bs-theme");
            document.documentElement.setAttribute("data-sidebar", (theme === "dark") ? "dark" : "light");
        }

        // Initial update
        updateSidebar();

        // Add event listener for changes in data-bs-theme
        var observer = new MutationObserver(updateSidebar);
        observer.observe(document.documentElement, {
            attributes: true,
            attributeFilter: ['data-bs-theme']
        });
    });
</script>

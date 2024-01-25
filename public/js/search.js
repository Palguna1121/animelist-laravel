document.addEventListener("DOMContentLoaded", function () {
    var searchForm = document.getElementById("searchForm");

    searchForm.addEventListener("submit", function (event) {
        var searchTermInput = searchForm.querySelector(
            'input[name="searchTerm"]'
        );
        var searchTermValue = searchTermInput.value.trim();
        const searchTerm = document.getElementById("searchTerm").value;

        if (searchTermValue === "") {
            event.preventDefault();
            alert("Masukkan kata kunci pencarian.");
        } else {
            window.location.href = `{{ route('anime.search') }}/${encodeURIComponent(
                searchTermInput
            )}`;
        }
    });
});

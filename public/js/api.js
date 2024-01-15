document.addEventListener("DOMContentLoaded", function () {
    var filterControls = document.querySelectorAll(".filter__controls li");
    var filterGallery = document.querySelector(".filter__gallery");
    var apiUrl = filterGallery.getAttribute("data-api-url");

    function updateGallery(filter) {
        filterGallery.innerHTML = "";

        var xhr = new XMLHttpRequest();
        xhr.open("GET", apiUrl + "top/anime?limit=5", true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var dataFromApi = JSON.parse(xhr.responseText);

                dataFromApi.forEach(function (item) {
                    if (filter === "all" || item.status === filter) {
                        if (filter === "all" || item.status === filter) {
                            var itemDiv = document.createElement("div");
                            itemDiv.className =
                                "product__sidebar__view__item set-bg mix " +
                                item.status;
                            itemDiv.setAttribute("data-setbg", item.image_url);

                            var epDiv = document.createElement("div");
                            epDiv.className = "ep";
                            epDiv.textContent = item.episodes;

                            var viewDiv = document.createElement("div");
                            viewDiv.className = "view";
                            viewDiv.innerHTML =
                                '<i class="fa fa-eye"></i> ' + item.views;

                            var h5 = document.createElement("h5");
                            var a = document.createElement("a");
                            a.href = item.link;
                            a.textContent = item.title;
                            h5.appendChild(a);

                            itemDiv.appendChild(epDiv);
                            itemDiv.appendChild(viewDiv);
                            itemDiv.appendChild(h5);

                            filterGallery.appendChild(itemDiv);
                        }
                    }
                });
            }
        };
        xhr.send();
    }

    filterControls.forEach(function (filterControl) {
        filterControl.addEventListener("click", function () {
            filterControls.forEach(function (control) {
                control.classList.remove("active");
            });

            this.classList.add("active");
            var filter = this.getAttribute("data-filter");
            updateGallery(filter);
        });
    });

    updateGallery("all");
});

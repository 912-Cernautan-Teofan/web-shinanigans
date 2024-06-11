window.onload = function() {
    populateDateFilter();
    populateCategoryFilter();
    document.getElementById('filter-btn').addEventListener('click', filterNews);
};

function populateDateFilter() {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "get_dates.php", true);
    xhr.onload = function() {
        if (xhr.status == 200) {
            console.log("Dates fetched: ", xhr.responseText);
            var dates = JSON.parse(xhr.responseText);
            var dateFilterSelect = document.getElementById("date-filter");
            dates.forEach(function(date) {
                var option = document.createElement("option");
                option.value = date;
                option.textContent = date;
                dateFilterSelect.appendChild(option);
            });
        }
    };
    xhr.send();
}

function populateCategoryFilter() {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "get_categories.php", true);
    xhr.onload = function() {
        if (xhr.status == 200) {
            console.log("Categories fetched: ", xhr.responseText);
            var categories = JSON.parse(xhr.responseText);
            var categoryFilterSelect = document.getElementById("category-filter");
            categories.forEach(function(category) {
                var option = document.createElement("option");
                option.value = category;
                option.textContent = category;
                categoryFilterSelect.appendChild(option);
            });
        }
    };
    xhr.send();
}

function filterNews() {
    var date = document.getElementById("date-filter").value;
    var category = document.getElementById("category-filter").value;

    var xhr = new XMLHttpRequest();
    xhr.open("GET", "filter_news.php?date=" + date + "&category=" + category, true);
    xhr.onload = function() {
        if (xhr.status == 200) {
            var newsItems = JSON.parse(xhr.responseText);
            var newsContainer = document.getElementById("news-container");
            newsContainer.innerHTML = ''; // Clear previous news items

            newsItems.forEach(function(news) {
                var newsItem = document.createElement("div");
                newsItem.className = "news-item";
                
                var title = document.createElement("h3");
                title.textContent = news.title;
                newsItem.appendChild(title);

                var date = document.createElement("p");
                date.textContent = "Date: " + news.date;
                newsItem.appendChild(date);

                var category = document.createElement("p");
                category.textContent = "Category: " + news.category;
                newsItem.appendChild(category);

                var text = document.createElement("p");
                text.textContent = news.text;
                newsItem.appendChild(text);

                newsContainer.appendChild(newsItem);
            });

            // Display the selected filters
            displaySelectedFilters(date, category);
        }
    };
    xhr.send();
}

function displaySelectedFilters(date, category) {
    var filterInfo = document.getElementById("filter-info");
    if (!filterInfo) {
        filterInfo = document.createElement("div");
        filterInfo.id = "filter-info";
        document.getElementById("filter-container").appendChild(filterInfo);
    }
    filterInfo.innerHTML = "Selected Filters - Date: " + (date === 'any' ? 'Any' : date) + ", Category: " + (category === 'any' ? 'Any' : category);
}

document.addEventListener("DOMContentLoaded", function() {
    var form = document.getElementById("newsForm");
    var inputs = form.querySelectorAll("input, textarea");
    var isFormDirty = false;

    // Function to set the form as dirty when inputs change
    function setDirty() {
        isFormDirty = true;
    }

    // Add event listeners to detect changes in form fields
    inputs.forEach(function(input) {
        input.addEventListener("input", setDirty);
    });

    // Prevent navigating away with unsaved changes
    window.addEventListener("beforeunload", function(event) {
        if (isFormDirty) {
            event.preventDefault();
            event.returnValue = '';
            return ''; // Some browsers need this for compatibility
        }
    });

    // Handle the back button click
    document.getElementById("backButton").addEventListener("click", function(event) {
        if (isFormDirty) {
            var confirmation = confirm("You have unsaved changes. Are you sure you want to leave?");
            if (!confirmation) {
                event.preventDefault();
            } else {
                window.location.href = "index.php";
            }
        } else {
            window.location.href = "index.php";
        }
    });

    // Client-side form validation
    form.addEventListener("submit", function(event) {
        var allFieldsFilled = true;
        inputs.forEach(function(input) {
            if (input.value.trim() === "") {
                allFieldsFilled = false;
                input.style.borderColor = "red";
            } else {
                input.style.borderColor = "";
            }
        });

        if (!allFieldsFilled) {
            event.preventDefault();
            alert("All fields are required!");
        } else {
            isFormDirty = false; // Form is being submitted, so it's not dirty anymore
        }
    });
});


document.addEventListener("DOMContentLoaded", function () {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "fetch_data.php", true);

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                var data = JSON.parse(xhr.responseText);
                var dataContainerPlaceholder = document.getElementById("data-container-placeholder");

                if (data.length > 0) {
                    var table = document.createElement("table");
                    table.className = "data-table"; // Add a class to the table if needed

                    // Create table header
                    var thead = document.createElement("thead");
                    var headerRow = document.createElement("tr");
                    headerRow.innerHTML = `
                        <th>Serial</th>
                        <th>Model</th>
                        <th>Type</th>
                        <th>Purchase Date</th>
                        <th>User</th>
                        <th>Action</th> <!-- New column for buttons -->
                    `;
                    thead.appendChild(headerRow);
                    table.appendChild(thead);

                    // Create table body
                    var tbody = document.createElement("tbody");
                    data.forEach(function (row) {
                        var rowElement = document.createElement("tr");
                        rowElement.innerHTML = `
                            <td>${row.serialnumber}</td>
                            <td>${row.model}</td>
                            <td>${row.AssetType}</td>
                            <td>${row.PurchaseDate}</td>
                            <td>${row.AssignedUser}</td>
                            <td>
                                <button onclick="editAsset(${row.id})">Edit</button>
                                <button onclick="confirmDelete('${row.serialnumber}')">Delete</button>
                            </td>
                        `;
                        tbody.appendChild(rowElement);
                    });
                    table.appendChild(tbody);

                    dataContainerPlaceholder.appendChild(table);
                } else {
                    dataContainerPlaceholder.innerHTML = "No records found";
                }
            } else {
                console.error("Error fetching data:", xhr.status);
            }
        }
    };

    xhr.send();
});

// Function to confirm asset deletion
function confirmDelete(assetId) {
    console.log('Deleting asset with ID:', assetId);

    if (assetId === undefined || assetId === null || assetId.trim() === '') {
        console.error('Invalid asset ID.');
        return;
    }

    if (confirm("Are you sure you want to delete this asset?")) {
        // AJAX request using the Fetch API
        fetch(`delete_asset.php?id=${assetId}`, {
            method: 'DELETE', // HTTP method for deletion
        })
        .then(response => {
            if (response.ok) {
                // Attempt to find and remove the element
                var rowElement = document.getElementById(`row-${assetId}`);
                console.log('Row Element ID:', `row-${assetId}`);

                if (rowElement) {
                    rowElement.remove();
                } else {
                    console.error('Element not found:', `row-${assetId}`);
                }
            } else {
                return response.text().then(errorText => {
                    console.error('Error deleting asset:', errorText);
                    // Handle the error, display a message, or take appropriate action
                });
            }
        })
        .catch(error => {
            console.error('Fetch error:', error);

            if (error instanceof TypeError && error.message.includes('null is not an object')) {
                console.error('Possible issue: Element not found for removal.');
            } else {
                // Handle other types of errors, display a message, or take appropriate action
                console.error('Other error:', error);
            }
        });
    }
}

// Function to handle editing an asset
function editAsset(assetId) {

    // Open a modal for editing
    var modal = document.getElementById('edit-modal');
    modal.style.display = 'block';

    // Sample code to pre-fill form fields (adjust this to your form structure)
    // Replace these lines with code to populate your form fields
    var asset = getAssetById(assetId); // Implement a function to retrieve asset data by ID
    document.getElementById('edit-serial').value = asset.serialnumber;
    document.getElementById('edit-model').value = asset.model;
    document.getElementById('edit-type').value = asset.AssetType;
    document.getElementById('edit-purchase-date').value = asset.PurchaseDate;
    document.getElementById('edit-user').value = asset.AssignedUser;

    // Event listener for the form submission after editing
    document.getElementById('edit-form').addEventListener('submit', function (e) {
        e.preventDefault();

        // Get the updated data from form fields
        var updatedData = {
            serialnumber: document.getElementById('edit-serial').value,
            model: document.getElementById('edit-model').value,
            AssetType: document.getElementById('edit-type').value,
            PurchaseDate: document.getElementById('edit-purchase-date').value,
            AssignedUser: document.getElementById('edit-user').value,
        };

        // Make an AJAX request to update the asset data in the database
        // Similar to the delete request, you'll need to adjust this to your server's API
        fetch(`update_asset.php?id=${assetId}`, {
            method: 'PUT', // Use the appropriate HTTP method for updating
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(updatedData),
        })
        .then(response => {
            if (response.ok) {
                // Asset updated successfully
                // You can close the modal and refresh the table with the updated data

                // Example: Close the modal
                modal.style.display = 'none';

                // You may also want to refresh the table or update it with the latest data
            } else {
                return response.text().then(errorText => {
                    console.error('Error updating asset:', errorText);
                    // Handle the error, display a message, or take appropriate action
                });
            }
        })
        .catch(error => {
            console.error('Error:', error);
            // Handle the error, display a message, or take appropriate action
        });
    });
}
// Wait for the DOM to load
document.addEventListener('DOMContentLoaded', function () {
    // Fetch the table body element
    var tableBody = document.querySelector('.attendance-list table tbody');

    // Make an AJAX request to the PHP file to fetch the attendance data
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'dashboard.php', true);
    xhr.onload = function () {
        if (xhr.status === 200) {
            // Parse the response as JSON
            var response = JSON.parse(xhr.responseText);

            // Check if the response contains data
            if (response.length > 0) {
                // Generate HTML table rows dynamically based on the data
                var tableRows = '';
                response.forEach(function (row) {
                    var attendanceId = row.attendance_id;
                    var date = row.date;
                    var studentId = row.student_id;
                    var fullName = row.full_name;
                    var courseId = row.course_id;

                    tableRows += '<tr>' +
                        '<td>' + attendanceId + '</td>' +
                        '<td>' + fullName + '</td>' +
                        '<td>' + studentId + '</td>' +
                        '<td>' + courseId + '</td>' +
                        '<td>' + date + '</td>' +
                        '</tr>';
                });

                // Append the table rows to the table body
                tableBody.innerHTML = tableRows;
            } else {
                // Display a message if no attendance records are found
                tableBody.innerHTML = '<tr><td colspan="5">No attendance records found</td></tr>';
            }
        }
    };
    xhr.send();
});

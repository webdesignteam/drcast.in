$(document).ready(function() {
            var table = $('#myTable');
            var tbody = table.find('tbody');
            var currentPage = 1; // Current page
            var rowsPerPage = parseInt($('#rowsPerPage').val()); // Number of rows to display per page
            var totalPages = Math.ceil(tbody.find('tr').length / rowsPerPage); // Total number of pages
            showPage(1); // Display the first page
            generatePaginationNumbers();

            // Handle next page button click
            $('#nextPage').on('click', function() {
                if (currentPage < totalPages) {
                    showPage(++currentPage);
                    generatePaginationNumbers();
                }
            });

            // Handle previous page button click
            $('#prevPage').on('click', function() {
                if (currentPage > 1) {
                    showPage(--currentPage);
                    generatePaginationNumbers();
                }
            });

            // Handle rows per page change
            $('#rowsPerPage').on('change', function() {
                rowsPerPage = parseInt($(this).val());
                totalPages = Math.ceil(tbody.find('tr').length / rowsPerPage);
                currentPage = 1;
                showPage(1);
                generatePaginationNumbers();
            });

            // Handle pagination number click
            $('#paginationNumbers').on('click', '.pagination-numbers', function() {
                var page = parseInt($(this).text());
                if (!isNaN(page) && page !== currentPage && page >= 1 && page <= totalPages) {
                    currentPage = page; // Update the current page
                    showPage(currentPage);
                    generatePaginationNumbers();
                }
            });

            // Function to display the specified page
            function showPage(page) {
                tbody.find('tr').hide(); // Hide all rows
                var startIndex = (page - 1) * rowsPerPage;
                var endIndex = startIndex + rowsPerPage;
                tbody.find('tr').slice(startIndex, endIndex).show(); // Show the rows for the current page

                // Update the current page text
                $('#currentPage').text('Page ' + page);

                // Update the count
                var count = tbody.find('tr:visible').length;
                var totalCount = tbody.find('tr').length;
                $('#count').text('Showing ' + count + ' of ' + totalCount + ' rows');

                // Disable/enable next/previous buttons based on current page
                $('#prevPage').prop('disabled', page === 1);
                $('#nextPage').prop('disabled', page === totalPages);
            }

            // Function to generate the pagination numbers
            function generatePaginationNumbers() {
                var paginationNumbers = $('#paginationNumbers');
                paginationNumbers.empty();

                var startPage = Math.max(1, currentPage - 2); // Start with the current page or the third page before it
                var endPage = Math.min(startPage + 4, totalPages); // Show 5 pages or less

                for (var i = startPage; i <= endPage; i++) {
                    var pageNumber = $('<span class="pagination-numbers">' + i + '</span>');
                    if (i === currentPage) {
                        pageNumber.addClass('active');
                    }
                    paginationNumbers.append(pageNumber);
                }

                if (currentPage < totalPages - 4) {
                    // Add "Next" button if there are more pages after the current set
                    paginationNumbers.append('');
                }
            }

            // Handle "Next Set" click to show the next set of pagination numbers
            $('#paginationNumbers').on('click', '#nextSet', function() {
                var startPage = currentPage + 1;
                currentPage = startPage;
                showPage(currentPage);
                generatePaginationNumbers();
            });
        });
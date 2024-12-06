// DataTable for #datatable_custom

const customTable = new DataTable('#datatable_custom', {
    responsive: true,
    order: [],
    searching: false,
    paging: false,
    info: false,
    lengthMenu: [50],
    pageLength: 50,
});

// DataTable for #datatable_search
const dataTable1 = new DataTable('#datatable_search', {
    responsive: true,
});


// DataTable for #datatable_2
const dataTable2 = new DataTable("#datatable_2");

// Export buttons for dataTable_2
document.querySelector("button.csv").addEventListener("click", () => {
    dataTable2.exportData({ 
        format: {
            delimiter: ";", // columnDelimiter
            newline: "\n\n" // lineDelimiter
        },
        download: true 
    });
});

document.querySelector("button.sql").addEventListener("click", () => {
    dataTable2.exportData({ 
        format: {
            header: false, // no header in SQL format
            tableName: "export_table" // tableName
        },
        download: true 
    });
});

document.querySelector("button.txt").addEventListener("click", () => {
    dataTable2.exportData({ 
        format: {
            extension: ".txt" // type: "txt"
        },
        download: true 
    });
});

document.querySelector("button.json").addEventListener("click", () => {
    dataTable2.exportData({ 
        format: {
            json: true, // type: "json"
            escapeHTML: true, // escapeHTML
            space: 3 // space
        },
        download: true 
    });
});

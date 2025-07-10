# PITAHC DEVPIMS: Issuance Page User Guide

**Version:** 1.0
**Last Updated:** 2025-07-10

---

## 1. Introduction

Welcome to the Issuance Page User Guide. This document provides a comprehensive overview of the features and functionalities of the Issuances module within the PITAHC DEVPIMS application. It is designed to help new team members quickly understand and effectively use this core component.

The Issuances module serves as the central repository for all official PITAHC documents, such as orders, advisories, and memorandums. It is engineered for efficiency, providing powerful tools for filtering, searching, and managing the entire lifecycle of these documents.

## 2. Page Overview & Layout

The Issuance Page is divided into two main sections: the **Filter Options** panel on the left and the **List of Issuances** on the right.

-   **Filter Options Panel:** A collapsible panel containing a rich set of controls to refine the list of issuances.
-   **List of Issuances:** A dynamic, server-powered table that displays the documents based on your filter criteria.

### 2.1. Key UI/UX Features

-   **Collapsible Filter Panel:** You can hide the filter panel by clicking the minus (`-`) icon in its header to maximize screen space for viewing the document list.
-   **Fixed Table Header:** When you scroll through a long list of documents, the table header (`Subject`, `Issuance Number`, etc.) will remain "sticky" at the top of the screen for easy reference.
-   **Responsive Controls:** The layout is designed to be intuitive, with controls like the "Show Entries" dropdown positioned logically near the table it affects.

---

## 3. Core Workflows: Step-by-Step

This section provides detailed instructions for the primary user actions on the Issuance Page.

### 3.1. Searching and Filtering Issuances

The system provides a powerful set of tools to help you find specific documents quickly. All filters are applied in real-time by the server for maximum performance.

**To filter the list:**

1.  **Open the Filter Options Panel:** If the panel is collapsed, click the plus (`+`) icon to expand it.
2.  **Select an Issuance Category:** Use the "Issuance Category" dropdown to narrow results to a specific document type (e.g., "PITAHC Order," "PITAHC Memorandum").
3.  **Search by Title:** Enter keywords into the "Search (by Title)" text area. This field accepts longer search queries.
4.  **Search by Issuance No.:** Enter a specific number in the "Issuance No." field.
5.  **Filter by Date Range:** Use the two native date input fields (`From` and `To`) to select a specific time period.
6.  **Apply Filters:** Click the blue **Search** button. The table on the right will update with the results.

**To clear all filters:**

-   Click the red **Clear** button. All filter fields will be reset to their default values, and the table will refresh to show all documents.

### 3.2. Creating a New Issuance (Uploading a Document)

**Step 1: Open the Upload Modal**

-   Click the **Upload Document** button, located in the card below the "Filter Options" panel. This will open the "Upload Document" modal window.

**Step 2: Fill in Document Details**

-   **Issuance Category:** Select the appropriate category from the dropdown. This is a required field.
-   **Document Title:** Provide a clear and descriptive title. This is a required field.
-   **Reference Number:** Enter the official reference or issuance number. This is a required field.
-   **Document Date:** Select the date the document was issued using the date picker. This is a required field.

**Step 3: Upload the File and Preview**

1.  **Choose File:** Click the "Choose File" or "Browse" button next to "File Upload" to select the document from your computer.
    -   **Best Practice:** Only PDF files are supported for preview.
2.  **View Preview:** After selecting a PDF file, click the **View Preview** button. A preview of the selected PDF will appear on the right side of the modal. This allows you to confirm you've selected the correct file before uploading.

**Step 4: Add Recipients**

1.  **Manual Entry:** You can type a comma-separated list of recipient email addresses directly into the "Recipients" text area.
2.  **Browse Recipients:** Click the **Browse** button to open the "Select Recipients" modal.
    -   You can search for specific recipients using the search bar at the top.
    -   Check the boxes next to the names you wish to add.
    -   Click **Add Selected**, and they will be appended to the list in the main upload form.

**Step 5: Finalize the Upload**

-   Once all required fields are complete and you have verified the details, click the blue **Upload** button. The document will be saved to the system, the modal will close, and the main table will refresh to show your new issuance.

### 3.3. Editing an Existing Issuance

1.  **Locate the Document:** Find the issuance you wish to edit in the main table.
2.  **Open the Edit Modal:** In the "Actions" column for that row, click the **Edit** button (pencil icon).
3.  **Modify Details:** The "Edit Document" modal will appear, pre-filled with the existing document information. You can now modify the category, title, reference number, date, or recipients.
4.  **Replace File (Optional):** If you need to replace the PDF file, you can use the "File Upload" control in this modal.
5.  **Save Changes:** Click the blue **Update** button to save your changes.

### 3.4. Deleting an Issuance

1.  **Locate the Document:** Find the issuance you wish to delete in the main table.
2.  **Open the Delete Modal:** In the "Actions" column, click the **Delete** button (trash can icon).
3.  **Provide a Reason:** A confirmation modal will appear. You **must** provide a reason for the deletion in the text area provided.
    -   > **Warning:** Deletion is a permanent action. Ensure you have a valid reason and are authorized to remove the document.
4.  **Confirm Deletion:** Click the red **Delete** button to permanently remove the issuance from the system.

---

## 4. Troubleshooting and Known Behaviors

This section covers potential issues and specific system behaviors you should be aware of.

-   **Error: "Missing required parameter" / "GET method not supported"**
    -   **Context:** These errors were encountered during development due to a mismatch between server-side rendering and client-side scripting.
    -   **Status:** **RESOLVED**. The system's AJAX calls now use a consistent, relative URL pattern (`/issuances/delete/{id}`) that correctly handles the `POST` method required for these actions. If this error recurs, it indicates a new deviation from this established pattern.
-   **Issue: Document upload fails silently.**
    -   **Context:** This was a historical bug caused by a missing `document_date` column in the database.
    -   **Status:** **RESOLVED**. The database migration has been applied, and the controller logic is correct. All uploads should now succeed if the required fields are filled.
-   **System Performance:** The issuance list uses server-side processing, meaning all filtering and sorting operations are handled by the server. This ensures the page remains fast and responsive, even with a very large number of documents.
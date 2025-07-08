# System Patterns

## Architecture

The PITAHC DEVPIMS is built using the **Model-View-Controller (MVC)** architectural pattern, as is standard for Laravel applications.

- **Models:** Handle the data logic and interactions with the database.
- **Views:** Responsible for presenting the data to the user.
- **Controllers:** Act as an intermediary between Models and Views, handling user requests and business logic.

## Key Design Patterns

- **Repository Pattern:** To be implemented to abstract the data layer, making the application more flexible and easier to test.
- **Service Layer:** A layer of services will be used to contain business logic, keeping controllers lean.
- **Livewire Components:** For building dynamic interfaces with server-side logic.
- **Server-Side DataTables:** The `yajra/laravel-datatables` package is used to efficiently handle large datasets by processing filtering, pagination, and sorting on the server. This pattern is implemented in the Issuances module and should be the standard for all data-heavy tables.

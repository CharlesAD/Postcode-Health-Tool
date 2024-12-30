# Postcode Health Data Lookup Tool

## 🛠️ Project Overview
The **Postcode Health Data Lookup Tool** is a Laravel-based application designed to fetch and display health-related statistics for parliamentary constituencies based on postcode input. This tool integrates with external APIs, **Postcodes.io API** database storage **SQLite**, and showcases dynamic frontend functionality to provide users with meaningful insights into health data.

## 🎯 Project Goals
- **Fetch Constituency Data**: Retrieve parliamentary constituency information for a given postcode using the Postcodes.io API.  
- **Display Health Data**: Provide health-related statistics for the queried constituency, such as the prevalence of conditions like asthma, diabetes, and depression.  
- **Interactive UI**: Offer users a seamless experience with a responsive interface styled using Tailwind CSS.  
- **Showcase Skills**: Highlight proficiency in Laravel, Livewire, Tailwind CSS, AlpineJS, and database operations while reflecting the C6 Digital tech stack.

## 📌 Features
- Postcode-based constituency lookup via the Postcodes.io API.  
- Retrieval and display of health data stored in an SQLite database.  
- Responsive design styled with Tailwind CSS.  
- Real-time dynamic UI updates powered by AlpineJS.  
- Comprehensive error handling for invalid postcodes or unavailable data.  
- Adherence to industry best practices for clean and maintainable code.

## 🚀 Technologies Used
This project aligns with the preferred tech stack and tools used by C6 Digital:

### Backend
- **PHP (Laravel Framework)**: The core framework for building the application.  
- **SQLite**: Lightweight database for storing health data.  
- **Livewire**: Simplifies the creation of dynamic interfaces directly in Blade templates.

### Frontend
- **Tailwind CSS**: Used for designing a clean and responsive user interface.  
- **AlpineJS**: Enables lightweight and reactive frontend interactions.

### Tools
- **GitHub**: Version control and project repository hosting.   
- **SQLite CLI**: For direct database inspection and debugging.

The project was inspired by the requirements of a Laravel developer role at C6 Digital, incorporating their preferred tech stack and development practices. It demonstrates my ability to build full-stack applications, integrating external APIs with robust database operations, and implementing clean and responsive user interfaces.

## 🧑‍💻 Development Process
1. **Setting Up the Environment**  
   - Configured a Laravel project with SQLite as the database in the `.env` file, for example:

        DB_CONNECTION=sqlite
        DB_DATABASE=/path/to/health_database.sqlite

2. **Database Design and Seeding**  
   - Created a `health_data` table to store health statistics with columns for constituency name, condition type, prevalence, and description.  
   - Seeded the database using a CSV file containing health data.

3. **API Integration**  
   - Integrated the Postcodes.io API to retrieve constituency data based on user-entered postcodes.  
   - Implemented error handling for invalid or unavailable postcodes.

4. **Querying Health Data**  
   - Used Laravel’s Query Builder to fetch constituency-specific health data, for example:

        $healthData = DB::table('health_data')
            ->whereRaw('LOWER(TRIM(pcon_name)) = ?', [strtolower(trim($constituency))])
            ->get();

5. **Frontend Implementation**  
   - Designed a responsive UI with Tailwind CSS to match the style of C6 Digital’s job portal.  
   - Built dynamic table updates using AlpineJS.

6. **Logging and Debugging**  
   - **Utilised** Laravel’s logging system to track API responses and database queries for troubleshooting.

7. **Testing**  
   - Tested the application extensively using Postman, browser developer tools, and the SQLite CLI.

## 💻 How to Run the Project Locally

### Prerequisites
- PHP (>=8.1)  
- Composer  
- SQLite  
- Node.js & npm  

### Steps
1. **Clone the Repository**:

       git clone https://github.com/yourusername/postcode-health-tool.git
       cd postcode-health-tool

2. **Install Dependencies**:

       composer install
       npm install

3. **Set Up Environment Variables**  
   - Copy `.env.example` to `.env`.  
   - Update the `DB_DATABASE` path to your SQLite file:

         DB_DATABASE=/path/to/health_database.sqlite

4. **Run Database Migrations and Seeders**:

       php artisan migrate
       php artisan db:seed --class=HealthDataSeeder

5. **Compile Frontend Assets**:

       npm run dev

6. **Start the Development Server**:

       php artisan serve

7. **Access the Application**  
   Open your browser and navigate to:

       http://127.0.0.1:8000

## 📝 Example Usage
1. Enter a valid UK postcode (e.g., **SS13 3EB**) in the input field.  
2. View the constituency name and related health statistics.  
3. If no data is available for the constituency, a fallback message will be displayed.

## 🤝 Contributions
Contributions, issues, and feature requests are welcome! Feel free to open an issue or submit a pull request.

## 🏆 Acknowledgements
- **Postcodes.io API** for constituency data.  
- **Laravel, Tailwind CSS, and AlpineJS** for providing the tools to create this project.  
- **C6 Digital** for inspiring this project idea through their Laravel Developer role requirements.

## 📜 License
This project is licensed under the MIT License. See the `LICENSE` file for more details.

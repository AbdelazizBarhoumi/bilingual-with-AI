# Bilingual with AI - AI-Powered Language Learning Platform

A bilingual web application that leverages Google's Gemini AI to provide intelligent business metrics evaluation and digital transformation recommendations in both English and French.

## Description

Bilingual with AI is a Laravel-based platform designed to help businesses evaluate their metrics and receive AI-generated insights. Users can submit their business data through an intuitive form, and the application generates personalized recommendations using Google's Gemini 2.5 Flash model. The results are automatically compiled into a downloadable PDF report, with full support for both English and French languages.

## Features

- 🌐 **Full Bilingual Support** - Seamless English/French language switching with URL-based locale routing
- 🤖 **AI-Powered Analysis** - Integration with Google Gemini 2.5 Flash for intelligent business metrics evaluation
- 📄 **PDF Report Generation** - Automatic generation of downloadable evaluation reports using DomPDF
- 📝 **Dynamic Forms** - Validated form submissions with real-time error handling
- 💾 **Submission Tracking** - Database storage of all submissions with AI results
- 🎨 **Modern UI** - Responsive design with Tailwind CSS and Alpine.js
- 🔄 **Language Toggle** - Easy language switching that preserves user context

## Tech Stack

- **Backend:** PHP 8.2+, Laravel 12
- **Frontend:** Vite, Tailwind CSS 4, Alpine.js
- **AI Integration:** Google Gemini API (Gemini 2.5 Flash)
- **PDF Generation:** Barryvdh DomPDF, Spatie Laravel PDF
- **Localization:** mcamara/laravel-localization
- **Database:** SQLite (default) or MySQL/PostgreSQL
- **HTTP Client:** Guzzle

## Requirements

- PHP 8.2 or higher
- Composer
- Node.js 18+ and npm
- Google Gemini API Key

## Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/yourusername/bilingual-with-AI.git
   cd bilingual-with-AI
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install Node.js dependencies**
   ```bash
   npm install
   ```

4. **Environment Setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Configure the database**
   ```bash
   # SQLite (default) - create the database file
   touch database/database.sqlite
   
   # Run migrations
   php artisan migrate
   ```

6. **Build frontend assets**
   ```bash
   npm run build
   ```

## Configuration

### AI API Key

Add your Google Gemini API key to the `.env` file:

```env
GEMINI_API_KEY=your_gemini_api_key_here
```

To obtain a Gemini API key:
1. Visit [Google AI Studio](https://makersuite.google.com/app/apikey)
2. Create a new API key
3. Copy the key to your `.env` file

### Localization

The application supports English (`en`) and French (`fr`) locales. Configuration can be modified in `config/laravellocalization.php`.

## Usage

### Development Server

Start all services (web server, queue worker, logs, and Vite) with a single command:

```bash
composer dev
```

Or start services individually:

```bash
# Start Laravel development server
php artisan serve

# Start Vite dev server (in a separate terminal)
npm run dev

# Start queue worker (in a separate terminal)
php artisan queue:listen
```

### Accessing the Application

- **English:** `http://localhost:8000/en`
- **French:** `http://localhost:8000/fr`

### Workflow

1. Navigate to the home page and select your preferred language
2. Fill in the form with your name, email, and business metrics
3. Submit the form to receive AI-generated evaluation
4. Download your personalized PDF report

## Project Structure

```
├── app/
│   ├── Http/Controllers/
│   │   └── FormController.php    # Handles form submissions and PDF downloads
│   ├── Models/
│   │   └── Submission.php        # Submission data model
│   └── Services/
│       └── AIService.php         # Google Gemini API integration
├── resources/
│   ├── lang/
│   │   ├── en/forms.php          # English translations
│   │   └── fr/forms.php          # French translations
│   └── views/
│       ├── components/           # Reusable Blade components
│       ├── layouts/              # Application layouts
│       ├── pdf/                  # PDF templates
│       └── *.blade.php           # Page views
├── routes/
│   └── web.php                   # Web routes with localization
└── database/
    └── migrations/               # Database migrations
```

## Testing

Run the test suite:

```bash
composer test
```

Or using PHPUnit directly:

```bash
php artisan test
```

## Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add some amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
